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
				<li><a href="#">&nbsp;</a></li>
                <li><a href="contacto.html">Contacto</a></li>
              <li><a href="#">&nbsp;</a></li>
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
			      session_unset(); 
				  session_destroy ();
				  
				  echo '<h2 class="title">!Conexi&oacute;n finalizada!</h2>';
				  echo '<div class="entry">';
				  echo "<P>[ <A HREF='login.php'>Conectar</A> ]</P>";
				 // echo "<P><br>[ <A HREF='javascript:window.close()'>Salir</A> ]</P>";
				  
			   }
			   else
			   {
				  echo '<h2>!No existe una conexi&oacute;n activa!</h2>';
				  echo "<em> !VERIFICAR DATOS! </em>";
				  echo '<div class="entry">';
				  echo "<P>[ <A HREF='login.php'>Conectar</A> ]</P>";
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