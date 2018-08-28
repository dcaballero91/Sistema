<?php
	include('ScreenCatalogo_Seguridad.php');
	include('Conexion_Abrir.php');	
	$Usuario	= $_POST['Usuario'];
	$Password	= $_POST['Password'];
	
	$sql  		= "select * from usuarios where USUARIO='".strtoupper($Usuario)."' and PASSWORD='".strtoupper($Password)."' limit 1";
    
	$rs         = mysqli_query($conexion,$sql);
	
	if(mysqli_num_rows($rs)!=0){
		$row = mysqli_fetch_assoc($rs);
		$_SESSION['USERCORE'] = $row['ID'];
		header('Location:Contenido.php');
	}else{
		header('Location:Login.php');
	}

?>