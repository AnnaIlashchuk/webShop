<?php
  require_once "../vendor/databases.php";
?>


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="../css/style_autho.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

	<title>Реєстрація - <?= $_SESSION['name_shop'] ?></title>
</head>
<body>
	<!--	меню	-->
	<?php require "../blocks/header.php" ?>

	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6">
				<form class="form-horizontal" action="../vendor/signup.php" method="post">
					<span class="heading">РЕЄСТРАЦІЯ</span>
					<div class="form-group">
						<input type="text" class="form-control" id="firstName" name="firstName" placeholder="Ім'я">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Прізвище">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
					</div>
					<div class="form-group help">
						<input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="address" name="address" placeholder="Адрес">
					</div>
					<?php
						if(isset($_SESSION['message'])) {
					?>
						<div class="alert alert-danger text-center" role="alert">
						 <?php
									 echo $_SESSION['message'];
									 unset($_SESSION['message']);
						 ?>
						</div>
					<?php } ?>
					<div class="form-group">
						<button type="submit" class="btn btn-default">РЕЄСТРАЦІЯ</button>
					</div>
				</form>
			</div>

		</div><!-- /.row -->
	</div><!-- /.container -->

	<!--	футер	-->
	<?php require "../blocks/footer.php" ?>

	<script src="bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
	<script src="jquery-3.5.1.min.js"></script>
</body>
</html>
