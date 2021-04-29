<?php 
	require 'connect.php';
	
	$id_credit = $_GET['id_credit'];

	$query = mysqli_query($connect, "DELETE FROM credits WHERE id_credit = '$id_credit'");

	if ($query) 
	{
		header("Location: index.php");
		exit();
	}
	else
	{
		echo "false";
	}
?>