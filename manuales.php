<?PHP
// Iniciar sesi&#243;n
   session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style2.css" type="text/css" />
<title>Manual CDA</title>
<!--<script src="images/AC_RunActiveContent.js" type="text/javascript"></script>-->
<script languaje="JavaScript">
function AbroVentana(ventana){ 
    window.open(ventana,"","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=600,height=500,top=100, left=50")
}
</script>
</head>

<body>

<?
   if (isset($_SESSION["usuario_valido"]))
   {
   ?>
		<script>
			window.location="IRED.pdf";
		</script>
		<?
  }
  else
  {
	echo "Acceso negado!. Debe iniciar sesi&#243;n.";
   }//Fin sesion no iniciada
?>

</body>
</html>