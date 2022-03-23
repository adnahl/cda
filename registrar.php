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

		?>				                
          		<script languaje="javascript">
                    function esconde(form)
                    {
                        if ( (form.usuario.value!= "") && (form.clave.value!= "") && 
						   (form.nombre.value!= "") && (form.apellido.value!= "") && 
						   (form.cedula.value!= "") && (form.telefono.value!= "") )
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

                 <h2> Registrar nuevo usuario </h2>
                 <em> Todos los campos son obligatorio.</em>
                 <p>&nbsp;</p>
                  <form class="borde" id="registro" name="registro" method = "post" action = "registra_datos.php">
					<table width="359" border="0" cellpadding="blue">
                      <tr>
                        <td width="75">Nombre:</td>
                        <td width="148"><input name = 'nombre' type = text maxlength="20"  onkeyup="esconde(this.form)"/></td>
                        <td width="128">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Apellido:</td>
                        <td><input name = 'apellido' type = text maxlength="30"  onkeyup="esconde(this.form)"/></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Identificaci&oacute;n:</td>
                        <td><input name = 'cedula' type = "text" maxlength="8"  onkeyup="esconde(this.form)"/></td>
                        <td>&nbsp;<i>(Ejemplo: 12345678)</i></td>
                      </tr>
                      <tr>
                        <td>E-mail:</td>
                        <td><input name = 'mail' type = text value="@" maxlength="60" id="mail" onkeyup="esconde(this.form)"/></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>Telefono:</label></td>
                        <td><input name = 'telefono' type = text maxlength="11"  onkeyup="esconde(this.form)"/></td>
                        <td><i>(Solo n&uacute;meros)</i></td>
                      </tr>
                      <tr>
                        <td>Usuario:</td>
                        <td><input name = 'usuario' type = text maxlength="12"  onkeyup="esconde(this.form)"/></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>Clave:</label></td>
                        <td><input name = 'clave' type = password maxlength="5" onkeyup="esconde(this.form)"/></td>
                        <td>&nbsp;<i>(Solo n&uacute;meros)</i></td>
                      </tr>
                      <tr>
                        <td>Prioridad:</td>
                        <td><input name="prioridad" type="radio" value="1"/>Administrador<br /><input name="prioridad" type="radio" value="2" checked="checked" />Regular</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
					<P>&nbsp;</P>
					  <input name="enviar" id="enviar" type = submit value = " Enviar " onclick="return isValido(telefono,clave,mail,'mail' )"disabled />
					  <input name="reset" id="reset" type = "reset" value = " Reiniciar " />
		    
			</form>
                        
            <?
			
				}//...if prioridad = 1
				else{
						echo "<h2>Area restringida</h2><br>";
						echo "<em>Acceso permitido solo para los Administradores</em>";
				}
					
				}//...if Usuario valido?
				
				else{
					  echo "<h2>Area restringida, &igrave;debe iniciar sesi&oacute;n!</h2><br>";
                      echo '[<a href="login.php">Conectar</a>]';
					  
				}
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