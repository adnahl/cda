<?PHP
   session_start ();
   
	//Varibles para el usuario a localizar/notificar.
	$mail = $_POST['mail'];
	$CI = $_POST['cedula'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>::.CDA.::</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

<script languaje="javascript">
	function esconde(form)
	{
		if (form.cedula.value!= "")
			document.registro.enviar.disabled = false;
		else
			document.registro.enviar.disabled = true;
		}
</script>
                
<script languaje="javascript">
	function isEmailAddress(Elemento, nombre_del_elemento )
	{
		var s = Elemento.value;
		var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/;

		if (s.length == 0 ) return true;
		
		if (filter.test(s))	
			return true;
		else
			alert("Ingrese una direcci&#243;n de correo v&#225;lida");
		
		Elemento.focus();
		return false;
	}
</script>

</head>
<body>
	<div id="logo">
		<h1><a href="index.html">CDA</a></h1>
	  <p><em>Control de acceso</em></p>
	</div>
	<hr />
	<!-- end #logo -->
	<div id="header">
		<div id="menu">
			<ul>
			  <li><a href="index.html" class="first">Inicio</a></li>
              <li><a href="login.php">Ingresar</a></li>
		   <?PHP      
        	//--> Sesión iniciada
		   if (isset($_SESSION["usuario_valido"]))
		   {
		   ?>
				<script>
				window.location="login.php";
				</script>
           <?      
		   }
		   else
		   {
		   	?>
                <li><a href="#">&nbsp;</a></li>
              	<li><a href="contacto.html">Contacto</a></li>
                <li><a href="#">&nbsp;</a></li>
		   <?
           }
		   ?>
		  </ul>
		</div>
		<!-- end #menu -->
	</div>
	<!-- end #header -->
	<!-- end #header-wrapper -->
	<div id="page">
	  <div id="content">
	    <div class="post">
    
  
                 <h2>Recuperaci&Oacute;n de clave</h2>
			     <em>Para recuperar su clave debe llenar los campos mostrados</em>
                 <div class="entry">
                  <p>&nbsp;</p>
                  
                  
      <?PHP
	  
	  if(isset($_POST['cedula'])){

					$flag = 0; //bandera, uasada para verificar datos.
                    
			
		 		   //----- Registrar ingreso en la BD el ingreso
				   $conexion = mysql_connect ("localhost", "root", "asdn96")
						 or die ("No se puede conectar con el servidor");
				   mysql_select_db ("cda")
						 or die ("No se puede seleccionar la base de datos");
				   $instruccion = "select * from usuarios";
				   $consulta = mysql_query($instruccion);
                        
                    
                    //Mostramos
                    while ($row=mysql_fetch_array($consulta))
                    {	
                        if(($row["cedula"] == $CI) && ($row["email"] == $mail)){
                           	
							$nom = $row["nombre"];
							$apell = $row["apellido"];
							$telf = $row["telefono"];
							$clav = $row["clave"];
							$flag = 1;
                        }
                    }
            

					if ($flag==1){
		   
						echo "<h2>Petici&oacute;n de cambio de clave enviada con &eacute;xito.</h2><br>";
						echo '<b>La clave ser&aacute; enviada al email registrado.</b>';	
						
						/* -->Habilitar cuando este montado en el servidor
						
						$asunto = 'Solicitud para recuperar clave';
						
						$header = 'From: ' . $mail . " \r\n";
						$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
						$header .= "Mime-Version: 1.0 \r\n";
						$header .= "Content-Type: text/plain";
						
						$mensaje = "EL usuario " . $nom . " ha solicitado un cambio de clave.\r\n";
						$mensaje .= "Datos del usuario: \r\n";
						$mensaje .= "Nombre: " . $nom . " " . $apell . "\r\n";
						$mensaje .= "Telefono: ". $telf ." \r\n";
						$mensaje .= "Cedula: ". $CI ."\r\n";
						
						$mensaje .= "\r\nEnviado el " .date_default_timezone_set("America/Caracas");. date('d/m/Y   [h:i:s a]   T[P]', time());
						
						$para = 'gabriel2011@hotmail.com';
						
						mail($para, $asunto, utf8_decode($mensaje), $header);
						
											
						$header2 = 'From: ' . $para . " \r\n";
						$header2 .= "X-Mailer: PHP/" . phpversion() . " \r\n";
						$header2 .= "Mime-Version: 1.0 \r\n";
						$header2 .= "Content-Type: text/plain";
						
						$mensaje2 .= "Saludos, " . $nom . " " . $apell . ".\r\n";
						$mensaje2 .= "Su clave es: ". $clav ."\r\n";
						$mensaje2 .= "\r\nEn caso que no haya realizado tal solicitud enviar la notificacion por este mismo medio.\r\n";
						
						$mensaje2 .= "\r\nEnviado el " . date('d/m/Y   [h:i:s a]   T[P]', time());
						
						mail($mail, $asunto, utf8_decode($mensaje2), $header2);
						*/
																		
						}
					else {
					echo '<div class="error" align="center"><h2>Uno de los datos introducidos es incorrecto.</h2>';
					echo '<br>&igrave;Verificar datos!<p>';
					echo '<br><a href="javascript:history.back()">Volver</a></div>';
					}
                    
					//Liberamos BD
                    mysql_free_result($consulta);
										
					
				}//...
else{

  ?>

						<form class="borde" name="registro" method = "post" action = "recuperar.php">
                        <table width="377" border="0" cellpadding="blue">
  <tr>
    <td width="84"><b>Identificaci&oacute;n:</b></td>
    <td width="145"><input name = 'cedula' type = "text" maxlength="8"  onkeyup="esconde(this.form)"/></td>
    <td width="140">&nbsp;<i>(Ejemplo: 12345678)</i></td>
  </tr>
  <tr>
    <td><b>E-mail:</b></td>
    <td><input name = 'mail' type = text value="@" maxlength="60" id="mail" onkeyup="esconde(this.form)"/></td>
    <td></td>
  </tr>
</table>

<br/>
            			<p>
            			  <input name="enviar" type = "submit" value = " Enviar " disabled />
            			  <input name="reset" type = "reset" value = " Reiniciar " />
          			    </p>
						</form>

				<? } ?>

          </div>
        </div>
		<div class="post">
       </div>
	  </div>
      <!-- end #content -->
      <!-- end #sidebar -->
	  <div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
	<div id="footer">
		<center>
        Administrador <a href="mailto:adnahl@gmail.com">adnahl@gmail.com</a>
        <br />Todos los derechos reservados
		<br />Copyright (c) 2010. </center>
	</div>
<!-- end #footer -->
</body>
</html>