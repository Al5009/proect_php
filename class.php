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
	<a href="accountTeach.php">Назад</a>
	<h1 class="mb-4">
	<?php 
		$query0 = mysqli_query($con, "SELECT * FROM class WHERE id={$_GET['class_id']}"); 
		$stroka0 = $query0->fetch_assoc();
		echo $stroka0['name'];
	?>
	</h1>
	<h2>Дз</h2>
	<?php 
		$query1 = mysqli_query($con, "SELECT * FROM dz INNER JOIN teach ON dz.pred_id = teach.id_pred INNER JOIN apprentice ON dz.appr_id = apprentice.id WHERE class_id={$_GET['class_id']}");
		for ($i=0; $i < mysqli_num_rows($query1); $i++) { 
			$stroka1 = $query1->fetch_assoc();
	?>
			<div class="col-12 mx-auto d-flex">
				<div class="col-4">
					<img style="width: 100%" src="<?php echo $stroka1['photo'] ?>">
				</div>
				<div class="col-6">
					<p><?php echo $stroka1['name'] ?></p>
					<p><?php echo $stroka1['text'] ?></p>
				</div>
				<div class="col-2">
					<form>
						<input type="otsenka" name="otsenka" placeholder="Оценка" class="form-control">
						<button class="btn bg-info"></button>
					</form>
				</div>
			</div>
	<?php
		}
	 ?>
	</div>
</div>
</body>
</html>