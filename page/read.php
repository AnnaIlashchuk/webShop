 <?php
 	require_once "../vendor/databases.php";
  $id = $_GET['id'];
  $result = mysqli_query($induction,
            "SELECT `products`.`id`, `departments`.`name_depart`
            FROM `products`
            INNER JOIN `departments` ON `departments`.`id` = `products`.`id_depart`
            WHERE `products`.`id` = $id");
  $p = mysqli_fetch_assoc($result);
  $depart = $p['name_depart'];

 	$result = mysqli_query($induction, "SELECT * FROM `products` WHERE `id` = $id");
  $result = mysqli_fetch_assoc($result);
 ?>

 <!DOCTYPE html>
 <html lang="ru">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
 	<style>
 	  .row img{
  		margin-left: 25%;
      width: 50%;
    }
    .row button{
  		font-size: 20px;
    	margin-left: 25%;
    }
    .row table {
      margin-top: 15px;
  		font-size: 20px;
      width: 60%;
    }
    .alert {
      width: 200px;
      height: 40px;
      margin: auto;
    }
 	</style>
 	<title><?= $depart . " - " . $_SESSION['name_shop'] ?></title>
 </head>
 <body>
 	<?php	require "../blocks/header.php" ?>


  <div class="row">
    <div class="col-6 col-md ">
      <img src="../img/products/<?= $result['image'] ?>" class="mt-3" >
  	</div>
    <div class="col-6 col-md ">
      <table>
        <tbody>
          <br><br>
          <tr><th>Номер товару:</th><td><?= $result['id']?></td></tr>
          <tr><th>Назва товару:</th><td><?= $result['name_prod'] ?></td></tr>
          <tr><th>Ціна товару:</th><td><?= $result['price'] . " " . $result['quantity_weight'] ?></td></tr>
        </tbody>
      </table>
      <br>
      <?php if($result['count'] == 0){ ?>
        <div class="alert alert-danger d-flex justify-content-center align-items-center">
            <p class="text-center">Товар розпродано!</p>
        </div>
      <?php } else { ?>
      <form action="../vendor/check.php?id=<?= $id ?>&count=<?= $result['count'] ?>" method="post">
        <table>
          <tr>
            <th style="width: 120px;"><input class="form-control" name="count_buy" type="number" value="1" ></th>
            <th>/ <?= $result['count'] ?></th>
            <th><button type="submit" class="btn btn-link" name="button_cash">Купити</button></th>
          </tr>
        </table>
      </form>
      <?php }
      if(isset($_SESSION['buy'])) {
      ?>
        <div class="alert alert-success d-flex justify-content-center align-items-center">
         <?php
               echo $_SESSION['buy'];
               unset($_SESSION['buy']);
         ?>
        </div>
      <?php } elseif (isset($_SESSION['error_buy'])) { ?>
          <div class="alert alert-danger d-flex justify-content-center align-items-center">
            <p class="text-center"><?php
                  echo $_SESSION['error_buy'];
                  unset($_SESSION['error_buy']);
            ?></p>
          </div>
      <?php } ?>
  	</div>
  </div>
 	<?php require "../blocks/footer.php" ?>

 	<script src="bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
 	<script src="jquery-3.5.1.min.js"></script>
 </body>
 </html>
