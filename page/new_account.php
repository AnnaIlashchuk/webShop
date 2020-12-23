<?php
  require_once "../vendor/databases.php";
?>


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <style media="screen">
    .alert {
      width: 50%;
    }
  </style>
	<title>Реєстрація - <?= $_SESSION['name_shop'] ?></title>
</head>
<body>
	<!--	меню	-->
	<?php require "../blocks/header.php" ?>

<br><br>
  <div class="container">
    <div class="row">

      <div>
        <form method="post" action="../vendor/signup.php" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="firstName">Ім'я</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Ім'я">
            </div>
            <div class="form-group col-md-6">
              <label for="lastName">Прізвище</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Прізвище">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="address">Адреса</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Адреса">
            </div>
            <div class="form-group col-md-4">
              <label for="email">Email</label>
              <input style="width: 500px;" type="email" class="form-control" name="email" id="email" name="Email">
            </div>
            <div class="form-group col-md-4">
              <label for="password">Пароль</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group col-md-4">
              <label for="position">Позиція</label>
              <select id="position" class="form-control" name="position">
                <option selected>покупець</option>
                <option>кур'єр</option>
                <option>адміністратор</option>
              </select>
            </div>
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
          <button style="width: 100px;" type="submit" class="btn btn-primary">OK</button>
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
