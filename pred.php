<?php 
	session_start();
	$con = mysqli_connect('mysql.09-15-pn.myjino.ru', '09-15-pn', 'IT.SCHOOL123', '09-15-pn_alina-ivanova');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="col-10 mx-auto mt-3">
	<a href="accountAppr.php">Назад</a>
	<h1 class="mb-4">
	<?php 
		$query0 = mysqli_query($con, "SELECT * FROM pred WHERE id={$_GET['pred_id']}"); 
		$stroka0 = $query0->fetch_assoc();
		echo $stroka0['name'];
	?>
	</h1>
	<h2>Добавить работу</h2>
	<div class="row">
		<div class="col-3 border py-3 rounded">
			<form action="addWork.php" method="POST" enctype="multipart/form-data">
				<input class="mt-3 form-control" type="" placeholder="Описание" name="desc">
				<input class="mt-3 form-control d-none" type="" value="<?php echo $_GET['pred_id'] ?>" name="pred_id">
				<input placeholder="Выбрать файл" class="mt-3" type="file" name="file">
				<button class="btn btn-info mt-3">Загрузить работу в портфолио</button>
			</form>
		</div>
	</div>	
	<h2>Дз</h2>
	<?php 
		$query1 = mysqli_query($con, "SELECT * FROM dz WHERE appr_id={$_SESSION['student_id']} AND pred_id={$_GET['pred_id']}");
		for ($i=0; $i < mysqli_num_rows($query1); $i++) { 
			$stroka1 = $query1->fetch_assoc();
	?>
			<div class="col-12 mx-auto d-flex">
				<div class="col-4">
					<img style="width: 100%" src="<?php echo $stroka1['photo'] ?>">
				</div>
				<div class="col-8">
					<p><?php echo $stroka1['text'] ?></p>
				</div>
			</div>
	<?php
		}
	 ?>
	</div>
</div>
</body>
</html>