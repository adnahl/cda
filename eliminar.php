<?
// Iniciar sesión
   session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="7; url=login.php" />

<title>...eliminando</title>
</head>

<style>
.error {
	color: #990000;
	background-color: #FFF0F0;
	padding: 7px;
	margin-top: 5px;
	margin-bottom: 10px;
	border: 1px dashed #990000;
}
</style>

<body>
	<?
		if ($_SESSION["prioridad"]==1){
		
			$usu = $_POST['usuario_Elim'];

			if($usu == $_SESSION["usuario_valido"]){
			   echo '<div class="error" align="center"> Advertencia: Usted no puede eliminarse como usuario del sistema. <br><I> Debe de 
			   existir  al menos un usuario administrador, por ello se limita a la eliminacion propia 
			   de cada usuario con privilegio a esta area.<I></br></div>';
			}
			
			else{
              		  $conexion = mysql_connect ("localhost", "root", "asdn96")
				 or die ("No se puede conectar con el servidor");
			   mysql_select_db ("cda")
				 or die ("No se puede seleccionar la base de datos");
			   $instruccion = "DELETE from usuarios WHERE usuario = '$usu'";
			   $consulta = mysql_query($instruccion);
			
			echo "<p>&nbsp;&nbsp;El usuario <b>".$usu."</b> fue eliminado con exito." ;
			}
		}
		else{
		echo "<h2>Solo los administradores tienen acceso a esta area.</h2>";
		}
    
    echo "<p>En 7seg estara de vuelta...";
    ?>
</body>
</html>