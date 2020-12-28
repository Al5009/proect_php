<?php 
	session_start();
	$con = mysqli_connect('mysql.09-15-pn.myjino.ru', '09-15-pn', 'IT.SCHOOL123', '09-15-pn_alina-ivanova');
	$query = mysqli_query($con, "SELECT * FROM apprentice WHERE login='{$_POST['login']}' AND password='{$_POST['password']}'");
	$num = mysqli_num_rows($query);
	if($num == true){
		$stroka = $query->fetch_assoc();
		$_SESSION['student_id'] = $stroka['id'];
		header("Location: accountAppr.php");
	} else{
		header("Location: loginAppr.php?lol=Nein");
	}
?>