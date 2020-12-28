<?php 
	session_start();
	$con = mysqli_connect('mysql.09-15-pn.myjino.ru', '09-15-pn', 'IT.SCHOOL123', '09-15-pn_alina-ivanova');
	$query = mysqli_query($con, "SELECT * FROM teach WHERE login='{$_POST['login']}' AND password='{$_POST['password']}'");
	$num = mysqli_num_rows($query);
	if($num == true){
		$stroka = $query->fetch_assoc();
		$_SESSION['teach_id'] = $stroka['id'];
		header("Location: accountTeach.php");
	} else{
		header("Location: loginTeach.php?lol=Nein");
	}
?>