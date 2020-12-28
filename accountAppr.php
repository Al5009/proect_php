<?php 
	session_start();
	$con = mysqli_connect('mysql.09-15-pn.myjino.ru', '09-15-pn', 'IT.SCHOOL123', '09-15-pn_alina-ivanova');
	$query = mysqli_query($con, "SELECT * FROM apprentice WHERE id={$_SESSION['student_id']}");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Профиль поступающего</title>
	 <style type="text/css">
        .bg-btn-dodo {
            background-color: #ff6900;
            color: white;
            font-weight: bold;
        }
        .banner {
            background-image: url(img/back.jpeg); height: 500px; background-size: 100% 100%;
        }
        .pizz {
            height: 150px;
        }
        .bsk-box {
            position: absolute; left: 74%; z-index: 100; top: 7%; display: none;
        }
    </style>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

	<!--если студент НЕ авторизовался, то показывается эта часть, в том числе ссылка на страницу  логина-->
	<?php if ($_SESSION['student_id'] == null) { ?>
		<div class="col-10 mx-auto">
			<h3>Войдите как абитуриент</h3>
			<p>Вы не авторизованы</p>
			<a href="loginAppr.php">Авторизация абитуриента</a>
		</div>
	<?php } else { $stroka = $query->fetch_assoc(); ?>
 	<!--если студент авторизовался, то показываются nav (меню) и контент всего сайта-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Привет, <?php echo $stroka['name'] ?></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a href="outAppr.php" class="nav-link text-danger">Выйти</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="index.php">Главная</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav>
	
	<h3>Предметы</h3>
	<?php 
		$query1 = mysqli_query($con, "SELECT * FROM pred");
		for ($i=0; $i < mysqli_num_rows($query1); $i++) { 
			$stroka1 = $query1->fetch_assoc();
	?>	
			<div class="col-9 bg-light mt-3 pt-4 pb-4 mx-auto border d-flex">
				<h2 class=""><?php echo $stroka1['name'] ?></h2>
				<a href="pred.php?pred_id=<?php echo $stroka1['id'] ?>" class="ml-auto mt-1"><button class="btn bg-info text-white">Добавить дз</button></a>
			</div>
	<?php	
		}
	?>
	<?php } ?>
</body>
</html>