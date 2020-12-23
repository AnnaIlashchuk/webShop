<?php
	require_once "../vendor/databases.php";
  $id = $_SESSION['user']['id'];
  $result = mysqli_query($induction,
      "SELECT `products`.`id`, `products`.`name_prod`, `cheque`.`quantity_purchased`, `products`. `price`, `products`.`quantity_weight`, `cheque`.`sum`
      FROM `cheque`
      INNER JOIN `products`on `products`.`id` = `cheque`.`id_product`
      WHERE `id_user` = $id");

  $sum = mysqli_query($induction, "SELECT sum(`sum`) FROM `cheque` WHERE `id_user` = $id");
  $sum = mysqli_fetch_assoc($sum);
  $sum = $sum['sum(`sum`)'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/style_index.css">
  <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<title>Корзина - <?= $_SESSION['name_shop'] ?></title>
  <style media="screen">
    .table {
      margin-left: 50px;
      width: 95%;
      font-size: 20px;
    }
		.alert {
			font-size: 15px;
			width: 70%;
		}
  </style>
</head>
<body>
	<?php require "../blocks/header.php" ?>

  <br><br>
  <br><br>
  <?php
    if ($sum > 0) {
  ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Продукт</th>
            <th>Кількість</th>
            <th style="text-align: center;">Ціна</th>
            <th style="text-align: center;">Сума</th>
            <th></th><th></th>
          </tr>
        </thead>
        <tbody>
          <?php while ($product = mysqli_fetch_assoc($result)){ ?>
            <tr>
              <form action="../vendor/basket_update_delete.php" method="post">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <td><?= $product['name_prod'] ?></td>
                <td style="width: 120px;">
                  <input class="form-control" name="count_buy" type="number" value="<?= $product['quantity_purchased'] ?>">
                </td>
                <td style="text-align: center;"><?= $product['price'] . " " . $product['quantity_weight'] ?></td>
                <td style="text-align: center;"><?= $product['sum'] . " грн." ?></td>
                <td style="width: 15px;">
                  <button class="btn btn-outline-primary" name="button_update">Змінити</button>
                </td>
                <td style="width: 15px; ">
                  <button class="btn btn-outline-danger" name="button_delete">Видалити</button>
                </td>
              </form>
            </tr>
          <?php } ?>
            <tr>
              <th>Всього</th>
              <td></td><td></td>
              <td style="text-align: center;"><?= $sum . "грн." ?></td>
							<?php if(isset($_SESSION['message'])){ ?>
								<td style="width: 100px;" class="alert alert-success text-center">
									 <?php
												 echo $_SESSION['message'];
												 unset($_SESSION['message']);
									 ?>
								</td>
							<?php } elseif (isset($_SESSION['error'])) { ?>
								<td style="width: 100px;" class="alert alert-danger text-center">
									 <?php
												 echo $_SESSION['error'];
												 unset($_SESSION['error']);
									 ?>
								</td>
						<?php } else { ?>
								<td></td>
						<?php } ?>
							<td></td>
            </tr>
        </tbody>
      </table>
			<form class="" action="../vendor/finish_buy.php" method="post">
				<button style="float: right; margin-right: 1%;" class="btn btn-outline-success" name="button_finish">Завершити покупку!</button>
			</form>

			<br><br>
  <?php
    }
  ?>

  <br><br>

	<?php require "../blocks/footer.php" ?>

</body>
</html>
