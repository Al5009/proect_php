<?php 
	session_start();
	$con = mysqli_connect('mysql.09-15-pn.myjino.ru', '09-15-pn', 'IT.SCHOOL123', '09-15-pn_alina-ivanova');
	$query = mysqli_query($con, "SELECT * FROM apprentice");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Проект</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	
	<div class="col-12 d-flex" style="height: 75px;">
		<div class="col-3"><a class="navbar-brand text-black" href="index.php">aaaaaaaaaaaaaaaaa</a></div>
		<div class="col-5"></div>
		<div class="col-2"><a href="accountAppr.php" class="ml-auto">Аккаунт ученика</a></div>
	    <div class="col-2"><a href="accountTeach.php" class="ml-auto">Аккаунт учителя</a></div>
	</div>

	<div class="col-9 mx-auto">
		<img src="5fc28a39-9cf2-4807-abfa-982238f16abc.jpg" style="width: 100%;">
	</div>
</body>
</html>