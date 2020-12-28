<?php
	session_start();
	$folder = 'img/';
	$file_upload = $folder . basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], $file_upload );

	$con = mysqli_connect('mysql.09-15-pn.myjino.ru', '09-15-pn', 'IT.SCHOOL123', '09-15-pn_alina-ivanova');
	$ins = "INSERT INTO dz (appr_id, pred_id, photo, text) VALUES ('{$_SESSION['student_id']}', {$_POST['pred_id']}, '{$file_upload}', '{$_POST['desc']}')";
	mysqli_query($con, $ins);
	header("Location: pred.php?pred_id={$_POST['pred_id']}");
?>