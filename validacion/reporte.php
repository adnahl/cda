<?PHP
// Iniciar sesi&#243;n
   session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style2.css" type="text/css" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

<?
   if (isset($_SESSION["usuario_valido"]))
   {		  				
				//----- Ingresos
				$conexion = mysql_connect ("localhost", "root", "asdn96")
					or die ("No se puede conectar con el servidor");
				mysql_select_db ("cda")
					or die ("No se puede seleccionar la base de datos");
				$instruccion = "select * from ingresos";
				$result = mysql_query($instruccion);
				
				while ($row=mysql_fetch_array($result))
				{	
						$msj_ING = '\r\n&nbsp;&nbsp;'.$row["usuario"].'&nbsp;&nbsp;-';
						$msj_ING .=  '-&nbsp;&nbsp;'.$row["fecha"].'&nbsp;&nbsp;-';
						$msj_ING .=  '-&nbsp;&nbsp;'.$row["hora"].'&nbsp;&nbsp;-';
						$msj_ING .=  '-nbsp;&nbsp;'.$row["dia"].'&nbsp;&nbsp;';					
				}
				
				//----- Salidas
				$instruccion = "select * from salidas";
				$result = mysql_query($instruccion);
				
				while ($row=mysql_fetch_array($result))
				{	
						$msj_SAL = '\r\n&nbsp;&nbsp;'.$row["usuario"].'&nbsp;&nbsp;-';
						$msj_SAL .=  '-&nbsp;&nbsp;'.$row["fecha"].'&nbsp;&nbsp;-';
						$msj_SAL .=  '-&nbsp;&nbsp;'.$row["hora"].'&nbsp;&nbsp;-';
						$msj_SAL .=  '-nbsp;&nbsp;'.$row["dia"].'&nbsp;&nbsp;';	
				}
				
				//----- Advertencias
				$instruccion = "select * from advertencias";
				$result = mysql_query($instruccion);
				
				while ($row=mysql_fetch_array($result))
				{	
						$msj_ADV = '\r\n&nbsp;&nbsp;'.$row["fecha"].'&nbsp;&nbsp;-';
						$msj_ADV .= '-&nbsp;&nbsp;'.$row["hora"].'&nbsp;&nbsp;-';
						$msj_ADV .= '-&nbsp;&nbsp;'.$row["dia"].'&nbsp;&nbsp;</p>';					
				}
			          	
				
				//----- Verificar usuario
				$usuRep = $_SESSION["usuario_valido"];
				
				$conexion = mysql_connect ("localhost", "root", "asdn96")
					or die ("No se puede conectar con el servidor");
				mysql_select_db ("cda")
					or die ("No se puede seleccionar la base de datos");
				$instruccion = "select * from usuarios where usuario='$usuRep'";
				$consulta = mysql_query($instruccion);
                        
                    
                    //Obtenemos datos
                    while ($row=mysql_fetch_array($consulta))
                    {	
							$nom = $row["nombre"];
							$apell = $row["apellido"];
							$mail = $row["email"];
                    }		
						
				
				//Liberamos BD
				mysql_free_result($result);
				
				/* -->Habilitar cuando este montado en el servidor
				
				$asunto = 'Reporte desde CDA';
				
				$header = 'From: ' . $mail . " \r\n";
				$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
				$header .= "Mime-Version: 1.0 \r\n";
				$header .= "Content-Type: text/plain";
				
				$mensaje = "EL usuario " . $nom . " " . $apell ." ha enviado un reporte.\r\n";
				$mensaje .= "\r\nLista de ingresos\r\n"
				$mensaje .= $msj_ING;
				$mensaje .= "\r\nLista de salidas\r\n"
				$mensaje .= $msj_SAL;
				$mensaje .= "\r\nLista de advertencias\r\n"
				$mensaje .= $msj_ADV;
				
				
				$mensaje .= "\r\n\r\nEnviado el " .date_default_timezone_set("America/Caracas");. date('d/m/Y   [h:i:s a] ', time());
				
				$para = 'gabriel2011@hotmail.com';
				
				mail($para, $asunto, utf8_decode($mensaje), $header);
				
				echo "Reporte enviado con exito.";				
				
				*/

				
  }
  else
  {
	echo "Acceso negado!. Debe iniciar sesi&#243;n.";
   }//Fin sesion no iniciada
?>

</body>
</html>