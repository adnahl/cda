<?PHP
// Iniciar sesi&#243;n
   session_start();

// Si se ha enviado el formulario
   $usuario = $_REQUEST['usuario'];
   $clave = $_REQUEST['clave'];
   
   if (isset($usuario) && isset($clave))
   {

   // Comprobar que el usuario est&#225; autorizado a entrar
      $conexion = mysql_connect ("localhost", "root", "asdn96")
         or die ("No se puede conectar con el servidor");
      mysql_select_db ("cda")
         or die ("No se puede seleccionar la base de datos");
      $instruccion = "select usuario, clave from usuarios where usuario = '$usuario'" . " and clave = '$clave'";
      $consulta = mysql_query ($instruccion, $conexion)
         or die ("Fallo en la consulta");
      $nfilas = mysql_num_rows ($consulta);
	    

   // Los datos introducidos son correctos
      if ($nfilas > 0)
      {
	  
	     $usuario_valido = $usuario;
         // Con register_globals On
         // session_register ("usuario_valido");
         
		 // Con register_globals Off
         $_SESSION['usuario_valido'] = $usuario_valido;
		 $_SESSION["SESION_TIME"] = date ("j/m/Y  [h:i:s a]" , time()); //time(); 
		 
		//__prioridad	
		$instruccion = "SELECT * FROM usuarios";
		$consulta = mysql_query ($instruccion, $conexion)
		 or die ("Fallo en la consulta");	
							
		//Consultar la prioridad del usuario
		while ($row=mysql_fetch_array($consulta))
		{	
			if ( $row["usuario"] == $usuario_valido )
				$_SESSION["prioridad"] = $row["prioridad"];
		}		 
      }
	  mysql_close ($conexion);
   }
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
            	<li class="current_page_item"><a href="#">Ingresar</a></li>
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
        //--> Sesión iniciada
		   if (isset($_SESSION["usuario_valido"]))
		   {
		   ?>
		    <h2>Hola, <? echo $_SESSION['usuario_valido']; ?>.</h2>
            <em>Sesi&oacute;n iniciada</em>
			<div class="entry">
            <iframe align="left" width="800" height="700" src="framaset.html" scrolling="no" frameborder="0">
            </iframe>
            
            
			<?
            }
			
		//--> Intento de entrada fallido
			else if (isset ($usuario))
			{
			?>
				<h2>Datos incorectos</h2>
            	<em>Verificar Usuario y Clave</em>
                <div class="entry">                
                <a href="javascript:history.back(1)">Volver Atrás</a>
                
			<?	
			}
		
		//--> Sesión no iniciada
		   else
		   {
   ?>
				<h2 class="title"><a href="#">Identificarse </a></h2>
				<p class="meta"><em>Para ingresar al sistema debe iniciar sesión</em></p>
				<div class="entry">
					<p>
</p>


					<form id="form1" method="post" action="login.php">
                     <table width="100" border="0" cellpadding="blue">
                      <tr>
                        <td><strong>&nbsp;USUARIO&nbsp;</strong></td>
                        <td>&nbsp;<input type="text" name="usuario"/>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><strong>&nbsp;CLAVE&nbsp;</strong></td>
                        <td>&nbsp;<input type="password" name="clave"/>&nbsp;</td>
                      </tr>
                    </table>
                    <p>&nbsp;
                      <input name="Enviar" type="submit" value="Ingresar"/>
                      </p>
                  </form>
                  
                  <p><a href="recuperar.php">&iexcl;Olvidó la clave!</a>
			<?
			}
			?>
              </div>
		  </div>
		  <div class="post"></div>
	  </div><!-- end #content -->
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

