<?PHP
   session_start ();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>::.CDA.::</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
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
              <li><a href="registro.php">Registro</a></li>
			  <li><a href="usuarios.php">Usuarios</a></li>
              <li><a href="advertencias.php">Advertencias</a></li>
              <li><a href="#">&nbsp;</a></li>
              <li><a href="contacto.html">Contacto</a></li>
              <li><a href="logout.php">&gt;>SALIR</a></li>
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
    
        <?PHP
					if (isset($_SESSION["usuario_valido"]))
			{
					if($_SESSION["prioridad"]==1)
						{
						
						
					//Varibles para el usuario a localizar.
               		$usu = $_POST["usuhi"];
                    
					 //----- Registrar ingreso en la BD el ingreso
				   $conexion = mysql_connect ("localhost", "root", "asdn96")
						 or die ("No se puede conectar con el servidor");
				   mysql_select_db ("cda")
						 or die ("No se puede seleccionar la base de datos");
				   $instruccion = "select * from usuarios";
				   $consulta = mysql_query($instruccion);
				   
                    //Buscamos
                    while ($row=mysql_fetch_array($consulta))
                    {	
                        if($row["usuario"] == $usu)
						{

							$mail = $row['email'];
                    		$CI = $row['cedula'];
							$nom = $row["nombre"];
							$apell = $row["apellido"];
							$telf = $row["telefono"];
                       }
                    }
            
                    //Liberamos BD
                    mysql_free_result($consulta)
						
						
				?>
				<!--*************************************************-->
				<!--		<<< Actualizacion de datos >>> 			 -->
					
		    <script languaje="javascript">
                    function esconde(form)
                    {
                        if ( (form.nombre_A.value!= "") && (form.apellido_A.value!= "") && 
							 (form.telefono_A.value!= "") && (form.clave_A.value!= "") )
							document.registro.enviar.disabled = false;
						else
							document.registro.enviar.disabled = true;
						}
                </script>
                
            <script languaje="javascript">
               function isValido(Numtelf, Clave, Elemento, nombre_del_elemento )
                {
					//...<>Telefono
                	var num = Numtelf.value;
					valorT = parseInt(num)	
			
					//Compruebo si es un valor num�rico
					if (isNaN(valorT)){ 
						alert("Ingrese un n&uacute;mero de tel&eacute;fono v&aacute;lido");
						Numtelf.focus();
						return false;
					}
					
					//...<>Clave
					var clav = Clave.value;
					valorC = parseInt(clav)	
			
					//Compruebo si es un valor num�rico
					if (isNaN(valorC)){ 
						alert("La clave debe ser numerica");
						Clave.focus();
						return false;
					}
					
					//...<>Email
					var s = Elemento.value;
					var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/;
		
			
					if (filter.test(s))	
						return true;
					else
						alert("Ingrese una direcci&oacute;n de correo v&aacute;lida");
					
					Elemento.focus();
					return false;
						}
                </script> 
                 <h2>&nbsp; </h2>
            <h2>Actualiza los datos de <? echo $usu; ?></h2>
              <form class="borde" id="registro" name="registro" method = "post" action = "actualiza_datos.php">   
                 <table width="313" border="0" cellpadding="blue">
  <tr>
    <td width="55"><label><strong>Nombre:</strong></label></td>
    <td width="144"><input name = 'nombre_A' type = "text" value="<? echo $nom;?>" maxlength="20"  onkeyup="esconde(this.form)"/></td>
    <td width="106">&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Apellido:</strong></td>
    <td><input name = 'apellido_A' type = "text" value ="<? echo $apell; ?>" maxlength="30"  onkeyup="esconde(this.form)"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label>E-mail:</label>
    </strong></td>
    <td><input name = 'mail_A' type = "text" value="<? echo $mail; ?>" maxlength="60" id="mail" onkeyup="esconde(this.form)"/></td>
    <td>&nbsp;&nbsp;<i>(Solo n&uacute;meros)</i></td>
  </tr>
  <tr>
    <td><strong>
      <label>Telefono:</label>
    </strong></td>
    <td><input name = 'telefono_A' type = "text" value="<? echo $telf; ?>" maxlength="11"  onkeyup="esconde(this.form)"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>
      <label>Clave:</label>
    </strong></td>
    <td><input name = 'clave_A' type = password maxlength="5" onkeyup="esconde(this.form)"/></td>
    <td>&nbsp;&nbsp;<i>(Solo n&uacute;meros)</i></td>
  </tr>
  
  <? if ($usu!=$_SESSION["usuario_valido"]) {  ?>
      <tr>
        <td><b>Prioridad:</b></td>
        <td>
          
          <input name="prioridad_A" type="radio" value="1"/>Administrador
          <br />
          <input name="prioridad_A" type="radio" value="2" checked="checked"/>Regular            </td>
        <td>&nbsp;</td>
      </tr>
  <? }
		else{
		echo '<input name="prioridad_A" type="hidden" value="1"/>';
		}

  ?>
  
</table>

 &nbsp;<input type="hidden" name="usuario_A" value="<? echo $usu;?>" />
	 			   
				   <p align="right">
	 			     <input name="enviar" id="enviar" type = submit value = " Enviar " onclick="return isValido(telefono_A,clave_A,mail_A,'mail_A' )"disabled />
		 			  <input name="reset" id="reset" type = "reset" value = " Reiniciar " />
			       </p>
		    </form>

				<!--*************************************************-->
			<form action="eliminar.php" method="post" name="formelim">
                	<input type="hidden" name="usuario_Elim" value="<? echo $usu;?>" />
					<input name="elim" id="elim" type = submit value = " ELIMINAR " />
			</form>
<?
}}
?>
   			            
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