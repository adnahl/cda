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
			if($_SESSION["prioridad"]==1)
				{
					//Nombre de usuario, clave y prioridad.
				   $usuario = $_POST['usuario'];
				   $clave = $_POST['clave'];
				   $prioridad = $_POST['prioridad'];
				   
				   //Datos del usuario
				   $nombre = $_POST['nombre'];
				   $apellido = $_POST['apellido'];
				   $cedula = $_POST['cedula']; //id
				   $email = $_POST['mail'];
				   $telefono = $_POST['telefono'];
				
				   //Conexion con la BD
				   $conexion = mysql_connect ("localhost", "root", "asdn96")
					  or die ("No se puede conectar con el servidor");
				   mysql_select_db ("cda")
					  or die ("No se puede seleccionar la base de datos");
										   
				   $instruccion = "insert into usuarios (usuario, clave, prioridad, nombre, apellido, cedula, email, telefono) VALUES ('$usuario', '$clave', '$prioridad', '$nombre', '$apellido', '$cedula', '$email', '$telefono')";
				   
				   $_SESSION["prioridad"] = 1;
				   
				   $consulta = mysql_query ($instruccion, $conexion)
					  or die ('Fallo en la inserci&oacute;n.<br>Datos de usuario <b>no disponible.<b><p><a href="javascript:history.back()">Ir atras</a></p>');
				   
				   mysql_close ($conexion);
				
				   print ("<center>Usuario <b>$usuario</b> insertado con exito.\n");
				   print ('<br>[<a href="registrar.php">Registrar otro usuario</a>]</br>');
				   print ('<br>[<a href="login.php">Volver al inicio</a>]</br>');
				   print ('[<a href="logout.php">Desconectar</a>]</center>');
				   //$_SESSION["prioridad"] = 1;
					
				}
				else 
			   {
				echo "Debe iniciar sesi&oacute;n como administrador.<br>";
				echo '[<a href="login.php"> Conectarse </a>]';
				}
			}
			else
			{
				echo "Debe iniciar sesi&oacute;n como administrador.<br>";
				echo '[<a href="login.php"> Conectarse </a>]';
			}

?>


</body>
</html>
