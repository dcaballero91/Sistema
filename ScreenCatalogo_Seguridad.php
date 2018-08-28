<?php
	session_start();
	$usuario      = $_SESSION['USERCORE'];
	if ($usuario==""){
		header('Location:Login.php');
	}	
	
	/*reseteamos visible*/
	$nofiltro = "";
	include('Conexion_Abrir.php');
	$sqlx = "SELECT RUT FROM callcenter.log_llamadas ORDER BY ID";
	$rsx  = mysqli_query($conexion,$sqlx);
	if(mysqli_num_rows($rsx)!=0){
		while($rows = mysqli_fetch_assoc($rsx)){
			$nofiltro = $nofiltro.$rows['RUT'].",";
		}		
	}
	$sqly = "UPDATE clientes SET VISIBLE=0 WHERE RUT NOT IN (".$nofiltro."0)";
	mysqli_query($conexion,$sqly);
	
	
?>