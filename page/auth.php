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
	<title>Авторизація - <?= $_SESSION['name_shop'] ?></title>
</head>
<body>
	<!--	меню	-->
	<?php require "../blocks/header.php" ?>

	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6">
				<form class="form-horizontal" action="../vendor/signin.php" method="post">
					<span class="heading">АВТОРИЗАЦІЯ</span>
					<div class="form-group">
						<input type="email" class="form-control" name="email" placeholder="E-mail">
						<i class="fa fa-user"></i>
					</div>

					<div class="form-group help">
						<input type="password" class="form-control" name="password" placeholder="Пароль">
						<i class="fa fa-lock"></i>
						<a href="#" class="fa fa-question-circle"></a>
					</div>
					<?php
						if(isset($_SESSION['message'])) {
					?>
						<div class="alert alert-success text-center" role="alert">
						 <?php
									 echo $_SESSION['message'];
									 unset($_SESSION['message']);
						 ?>
						</div>
					<?php } elseif (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger text-center" role="alert">
						 <?php
									 echo $_SESSION['error'];
									 unset($_SESSION['error']);
						 ?>
						</div>
          <?php } ?>

						<button type="submit" class="btn btn-default">Вхід</button>
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
