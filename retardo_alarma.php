<?PHP
   session_start ();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?PHP
			   if (isset($_SESSION["usuario_valido"]))
			   {				
				echo '<meta http-equiv="Refresh" content="60;url=http://192.168.100.212:82/alarm.htm" />';
			   }
   			?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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

<title>Documento sin t&iacute;tulo</title>
</head>
<body>

<?PHP
			   if (isset($_SESSION["usuario_valido"]))
			   {				
				echo '<p><div class="error">Si en 60 segundos no se abre la puerta se activar&aacute; la alarma!</div></p>';
			   }
			   else
			   {
				 ?>                
				 <script> 	
                    window.location="login.php";
                 </script>
                 <? } ?>

</body>
</html>
