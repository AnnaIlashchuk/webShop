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
	<title>Нові товари на сайті - <?= $_SESSION['name_shop'] ?></title>
</head>
<body>
	<?php
    require "../blocks/header.php";
  ?>

  <br><br>
  <div class="container">
    <div class="row">

      <div>
				<form method="post" action="../vendor/insert_new_product.php" enctype="multipart/form-data">
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="NameProd">Назва</label>
				      <input type="text" class="form-control" id="NameProd" name="NameProd" placeholder="Назва продукту">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="Depart">Відділ</label>
				      <select id="Depart" class="form-control" name="Depart">
				        <option selected>Хлібобулочні вироби</option>
				        <option>Напої</option>
				        <option>Риба</option>
				        <option>Овочі і фрукти</option>
				        <option>М'ясо</option>
				        <option>Солодощі</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="Price">Ціна</label>
				      <input type="number" class="form-control" id="Price" name="Price">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="Quantity">Оплата</label>
				      <select id="Quantity" class="form-control" name="Quantity">
				        <option selected>грн/шт</option>
				        <option>грн/кг</option>
				      </select>
				    </div>
				    <div class="form-group col-md-6">
				      <label for="Count">Кількість</label>
				      <input type="number" class="form-control" id="Count" name="Count">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="Image">Зображення</label>
				      <input style="width: 75%;" type="file" class="form-control" id="Image" name="Image">
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




  <?php require "../blocks/footer.php" ?>

</body>
</html>
