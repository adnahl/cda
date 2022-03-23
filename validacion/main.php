<?PHP
// Iniciar sesi&#243;n
   session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style2.css" type="text/css" />
<title>Documento sin t&iacute;tulo</title>
<!--<script src="images/AC_RunActiveContent.js" type="text/javascript"></script>-->
<script languaje="JavaScript">
function AbroVentana(ventana){ 
    window.open(ventana,"","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1,width=600,height=500,top=100, left=50")
}
</script>
<style type="text/css">
<!--
.Estilo1 {
	color:#999999
}
-->
</style>
</head>

<body>

<?
   if (isset($_SESSION["usuario_valido"]))
   {
   ?>
   <center class="Estilo1">
     :: &Aacute;rea de supervisi&oacute;n y control del sistema ::
   </center>
   <br/>
   
   <table width="410" border="0" cellpadding="blue" align="center">
  <tr>
    <td width="34" height="51"><img src="puerta.png" alt="Estado de la Puerta" width="34" height="34" longdesc="Estado de la Puerta"></td>
    <td width="360" rowspan="2">
	<iframe height="120" src="http://192.168.100.212:82/pta.htm" width="360" frameborder="0" scrolling="no"></iframe></td>
  </tr>
  <tr>
    <td><img src="alarm.png" alt="Estado de la Alarma" width="34" height="34" longdesc="Estado de la Alarma"></td>
    </tr>
  <tr>
    <td valign="top"><br/>&nbsp;<br/><img src="control.png" alt="Control Manual" width="34" height="34" longdesc="Control Manual"></td>
    <td><iframe height="300" src="http://192.168.100.212:82/index.htm" width="360" frameborder="0" scrolling="no"></iframe></td>
  </tr>
  <!--
  <tr>
    <td>&nbsp;</td>
    <td><iframe height="50" src="http://192.168.100.212:82/sensor.htm" width="360" frameborder="0" scrolling="no"></iframe></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><iframe height="50" src="http://192.168.100.212:82/rxclave.htm" width="360" frameborder="0" scrolling="no"></iframe></td>
  </tr>
  -->
</table>


    <br />
    <br />

   
<!--<script>
	//		window.location="http://192.168.100.212:82/index.htm";
		</script>
		-->
		<?
  }
  else
  {
	echo "Acceso negado!. Debe iniciar sesi&#243;n.";
   }//Fin sesion no iniciada
?>

</body>
</html>