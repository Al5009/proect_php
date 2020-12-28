<?php 
	session_start();
	unset($_SESSION['teach_id']);
	header('Location: index.php');
 ?>