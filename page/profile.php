<?php
	require_once "../vendor/databases.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/style_profile.css">
  <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/style_autho.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<title>Мій кабінет - <?= $_SESSION['name_shop'] ?></title>
	<style>
		.text-center img{
			width: 130px;
		}
		form {
			text-align: center;
		}
		.btn-link {
			font-size: 20px;
			color: black;
		}
		h3 {
			text-align: center;
		}
	</style>
</head>
<body>
	<?php
		require_once "../blocks/header.php";
	?>
	<br><br>
	<div class="container">
	  <div id="main">
	    <div class="row" id="real-estates-detail">
	      <div class="col-lg-4 col-md-4 col-xs-12">
	        <div class="panel panel-default">
	          <div class="panel-body">
	            <div class="text-center" id="author">
	              <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/512x512/plain/user.png">
	              <h3><?= $_SESSION['user']['firstName'] . " " . $_SESSION['user']['lastName'] ?></h3>
	              <small class="label label-warning"><?= $_SESSION['user']['address'] ?></small>
	            </div>
	          </div>
	        </div>
	      </div>
	      <div class="col-lg-8 col-md-8 col-xs-12">
	        <div class="panel">
	          <div class="panel-body">
	            <h4 class="text-center">Про себе</h4>
	            <div id="myTabContent" class="tab-content">
	              <hr>
	              <div class="tab-pane fade active in" id="detail">
	                <table class="table table-th-block">
	                  <tbody>
	                    <tr><td class="active">Ім'я:</td><td><?= $_SESSION['user']['firstName'] ?></td></tr>
	                    <tr><td class="active">Прізвище:</td><td><?= $_SESSION['user']['lastName'] ?></td></tr>
	                    <tr><td class="active">Email:</td><td><?= $_SESSION['user']['email'] ?></td></tr>
	                    <tr><td class="active">Адрес:</td><td><?= $_SESSION['user']['address'] ?></td></tr>
	                  </tbody>
	                </table>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div><!-- /.main -->
	</div><!-- /.container -->
	<br><br>
	<!--	футер	-->
	<?php require "../blocks/footer.php" ?>

	<script src="bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
	<script src="jquery-3.5.1.min.js"></script>
</body>
</html>
