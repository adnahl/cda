<?PHP
// Iniciar sesión
   session_start();
?>

<HTML LANG="es">
<HEAD>
   <TITLE>Actualizar datos</TITLE>
</HEAD>

<BODY oncontextmenu="return false">

<?PHP

   if (isset($_SESSION["usuario_valido"]))
   {
		if ($_SESSION["prioridad"]==1)
		{
			//Nombre de usuario, clave y prioridad.
		   $usuario = $_POST['usuario_A'];
		   $clave = $_POST['clave_A'];
		   $prioridad = $_POST['prioridad_A'];
		   
		   //Datos del usuario
		   $nombre = $_POST['nombre_A'];
		   $apellido = $_POST['apellido_A'];
		   $email = $_POST['mail_A'];
		   $telefono = $_POST['telefono_A'];
			  
		   $conexion = mysql_connect ("localhost", "root", "asdn96")
			  or die ("No se puede conectar con el servidor");
		   mysql_select_db ("cda")
			  or die ("No se puede seleccionar la base de datos");
		   		   
		   $instruccion = "UPDATE usuarios SET clave = '$clave', prioridad = '$prioridad', nombre = '$nombre', apellido = '$apellido', email = '$email', telefono = '$telefono' WHERE  usuario = '$usuario'";
			  
		   $consulta = mysql_query ($instruccion, $conexion)
			  or die ('Fallo en la inserción.<p><a href="javascript:history.back()">Ir atras</a></p>');
		
		   print ("<center>Al usuario <b>$usuario</b> se le han actulizado los datos.\n");
		   print ('<br>[<a href="usuarios.php">Actualizar otro usuario</a>]</br>');
		   print ('<br>[<a href="login.php">Volver al inicio</a>]</br>');
		   print ('[<a href="logout.php">Desconectar</a>]</center>');
		   $_SESSION["prioridad"]=1;
		   
		   mysql_close ($conexion);
		   }
		}

	   else 
	   {
		echo "Debe iniciar sesi&oacute;n como administrador.<br>";
		echo '[<a href="login.php">Conectar</a>]';
		}
		
		   

?>

</BODY>
</HTML>