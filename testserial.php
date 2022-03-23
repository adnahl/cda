<?PHP
   session_start ();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>

<?PHP
			   if (isset($_SESSION["usuario_valido"]))
			   {
			   		$clave = $_POST['clave'];

					$conexion = mysql_connect ("localhost", "root", "asdn96")
					  or die ("No se puede conectar con el servidor");
				   mysql_select_db ("cda")
					  or die ("No se puede seleccionar la base de datos");   
				   $instruccion = "insert into test (val) VALUES ('$clave')";
				   				   
				   $consulta = mysql_query ($instruccion, $conexion)
					  or die ('Fallo en la inserci&oacute;n.');
					mysql_close ($conexion);
					?>
					<script>
						window.location="http://192.168.100.212:82/abrir.htm";
					</script>
					<?
					  
				   
			   }
			   else
			   {
				 ?>
				 <script> 
				 	alert ("NO EXISTE UNA CONEXION ACTIVA!\nAlerta de registro de ingreso de personal");
                 </script>
                 
				 <script> 	
                    window.location="login.php";
                 </script>
                 <?
			   }

   			?>

</body>
</html>
