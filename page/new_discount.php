<?php
	require_once "../vendor/databases.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/style_autho.css">
  <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <style media="screen">

  </style>
	<title>Нові знижки на сайті - <?= $_SESSION['name_shop'] ?></title>
</head>
<body>
	<?php
    require "../blocks/header.php";
  ?>

  <br><br>
  <div class="container">
    <div class="row">

      <div class="col-md-offset-3 col-md-6">
        <form class="form-horizontal" action="../vendor/insert_new_discount.php" method="post">
          <div class="form-group">
            <label style="font-size: 17px;" for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>

          <div class="form-group">
            <label style="font-size: 17px;" for="text">Основний текст</label>
            <textarea type="text" class="form-control" id="text" name="text"></textarea>
          </div>

          <div class="form-group">
            <label style="font-size: 17px;" for="start_date">Дата початку</label>
            <input type="date" class="form-control" id="start_date" name="start_date">
          </div>

          <div class="form-group">
            <label style="font-size: 17px;" for="end_date">Дата завершення</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
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

            <button type="submit" class="btn btn-default" name="new_discount">ОК</button>
        </form>
      </div>

    </div><!-- /.row -->
  </div><!-- /.container -->

  <?php require "../blocks/footer.php" ?>

</body>
</html>
