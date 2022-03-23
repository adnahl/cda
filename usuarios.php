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
			 	<li class="current_page_item"><a href="#">Usuarios</a></li>
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
                 <h2>Agregar usuario</h2>
			     <em>Para registrar un nuevo usuario</em>
                 <div class="entry">
                  <a class="links" href="registrar.php">clic aqu&iacute;</a>
          </div>
				<p>&nbsp;</p>
                <?
                }//fin if Prioridad 1
				?>
                <h2>Lista de usuario registrados</h2>
                <div class="entry">

				
				<table border='0' bgcolor="#fffff">
                <tbody align="center" bgcolor="#CCCCCC">
                <tr>
                <? 
				if($_SESSION["prioridad"]==1)
				{
				 echo "<td><b>&nbsp;&nbsp;</td>";
				 echo "<td><b>&nbsp;Prioridad&nbsp;</td>";
				 echo "<td><b>&nbsp;Usuario&nbsp;</td>";
                 echo "<td><b>&nbsp;Cedula&nbsp;</td>";
				}
				?>
                <td><b>&nbsp;Nombre&nbsp;</td>
                <td><b>&nbsp;Apellido&nbsp;</td>
                <td><b>&nbsp;Telefono&nbsp;</td>
                <td><b>&nbsp;E-mail&nbsp;</td>
                </tr></tbody><tr>

				<?php
				//----- Registrar ingreso en la BD el ingreso
				$conexion = mysql_connect ("localhost", "root", "asdn96")
					or die ("No se puede conectar con el servidor");
				mysql_select_db ("cda")
					or die ("No se puede seleccionar la base de datos");
				$instruccion = "select * from usuarios";
				$result = mysql_query($instruccion);
				
				while ($row=mysql_fetch_array($result))
				{	

					if($_SESSION["prioridad"]==1)
					{
						if($row["prioridad"]==1) $auxpri='Administrador';
						else $auxpri='Regular';
						echo '<td>';
							echo '<form method="post" action="actualizar.php">';
							echo '<input type="hidden" value="'.$row["usuario"].'" name="usuhi"/>';
							echo '<input type="submit" value="Editar" class="btn-editar"/>';
							echo '</form>';
						echo '</td>';
												
						echo '<td>&nbsp;&nbsp;'.$auxpri.'&nbsp;&nbsp;</td>';
						echo '<td>&nbsp;&nbsp;'.$row["usuario"].'&nbsp;&nbsp;</td>';
						echo '<td>&nbsp;&nbsp;'.$row["cedula"].'&nbsp;&nbsp;</td>';
					}
						echo '<td>&nbsp;&nbsp;'.$row["nombre"].'&nbsp;&nbsp;</td>';
						echo '<td>&nbsp;&nbsp;'.$row["apellido"].'&nbsp;&nbsp;</td>';
						echo '<td>&nbsp;&nbsp;'.'0'.$row["telefono"].'&nbsp;&nbsp;</td>';
						echo '<td>&nbsp;&nbsp;'.$row["email"].'&nbsp;&nbsp;</td>';
						
						echo ('</tr>');
						echo ('<tr>');
					
				}
				//Liberamos BD
				mysql_free_result($result);
				
				?>
		        </tr></table>
        <?
				
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