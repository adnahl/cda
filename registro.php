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
                <li class="current_page_item"><a href="#">Registro</a></li>
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
			   		$usuP2 = $_SESSION["usuario_valido"];
				
				///
				if($_SESSION["prioridad"]==1){
					echo "<h2>Registros de usuarios</h2>";
					echo "<em>Resgistro de los usuarios al ingreso y salida</em>";
					
				}
				else{
				
					echo "<h2>Registros de ". $usuP2 ."</h2>";
					echo "<em>Resgistros de ingreso y salida</em>";
					
				}
				?>
                 
                 <div class="entry">
                  <p>&nbsp;</p>
                  
                  <table width="660" border="0" cellpadding="blue">
                  <tr>
                    <td valign="top">
                  
                <table border='0' bgcolor="#fffff">
                <tbody align="center" bgcolor="#CCCCCC">
	            <tr>
                    <td width="60" rowspan="2"><b>&nbsp;Usuario&nbsp;</td>
                    <td colspan="3"><b>&nbsp;Entrada&nbsp;</td>
                </tr>
                <tr>
                    <td width="70"><b>&nbsp;Fecha&nbsp;</td>
                    <td width="99"><b>&nbsp;Hora&nbsp;</td>
                    <td width="65"><b>&nbsp;D&iacute;a&nbsp;</td>
                </tr>
				</tbody>
                <tr>
                
				<?php
				//----- Ingresos
				$conexion = mysql_connect ("localhost", "root", "asdn96")
					or die ("No se puede conectar con el servidor");
				mysql_select_db ("cda")
					or die ("No se puede seleccionar la base de datos");
				if($_SESSION["prioridad"]==1){
					$instruccion = "select * from ingresos";
				}
				else{
					$instruccion = "select * from ingresos where usuario='$usuP2'";
				}
				$result = mysql_query($instruccion);
				
				while ($row=mysql_fetch_array($result))
				{	

						echo '<td>&nbsp;&nbsp;'.$row["usuario"].'&nbsp;&nbsp;</td>';
						echo '<td>&nbsp;&nbsp;'.$row["fecha"].'&nbsp;&nbsp;</td>';
						echo '<td>&nbsp;&nbsp;'.$row["hora"].'&nbsp;&nbsp;</td>';
						echo '<td>&nbsp;&nbsp;'.$row["dia"].'&nbsp;&nbsp;</td>';					
						echo ('</tr>');
						echo ('<tr>');
				}
			
				?>
					</tr></table>
            
            
            	</td>
                    <td>&nbsp;</td>
                    <td valign="top">
					
					
                <table border='0' bgcolor="#fffff">
                <tbody align="center" bgcolor="#CCCCCC">
	            <tr>
                    <td width="60" rowspan="2"><b>&nbsp;Usuario&nbsp;</td>
                    <td colspan="3"><b>&nbsp;Salida&nbsp;</td>
                </tr>
                <tr>
                    <td width="70"><b>&nbsp;Fecha&nbsp;</td>
                    <td width="99"><b>&nbsp;Hora&nbsp;</td>
                    <td width="65"><b>&nbsp;D&iacute;a&nbsp;</td>
                </tr>
				</tbody>
                <tr>
                
				<?php
				//----- Salidas
				
				if($_SESSION["prioridad"]==1){
					$instruccion = "select * from salidas";
				}
				else{
					$instruccion = "select * from salidas where usuario='$usuP2'";
				}
				
				
				$result = mysql_query($instruccion);
				
				while ($row=mysql_fetch_array($result))
				{	

						echo '<td>&nbsp;&nbsp;'.$row["usuario"].'&nbsp;&nbsp;</td>';
						echo '<td>&nbsp;&nbsp;'.$row["fecha"].'&nbsp;&nbsp;</td>';
						echo '<td>&nbsp;&nbsp;'.$row["hora"].'&nbsp;&nbsp;</td>';
						echo '<td>&nbsp;&nbsp;'.$row["dia"].'&nbsp;&nbsp;</td>';					
						echo ('</tr>');
						echo ('<tr>');
				}
				//Liberamos BD
				mysql_free_result($result);
			
				?>
					</tr></table>					
					
					

					
					</td>
                  </tr>
                </table>
				
				<?
				
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