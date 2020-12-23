<?php
	require_once "../vendor/databases.php";
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
  <style media="screen">
    .alert{
			width: 15%;
			margin-left: auto;
			margin-right: 1.4em;
		}
		p{
			text-align: right;
		}
  </style>
	<title>Чеки - <?= $_SESSION['name_shop'] ?></title>
</head>
<body>
	<?php
		require "../blocks/header.php";
		if ($_SESSION['user']['position'] == "покупець") {
			$id_user = $_SESSION['user']['id'];
			$id_baskets = mysqli_query($induction, "SELECT `id`, `date_buy` FROM `basket` WHERE `id_user` = $id_user");
		} elseif ($_SESSION['user']['position'] == 'кур"єр') {
			$id_baskets = mysqli_query($induction, "SELECT `id`, `date_buy` FROM `basket` WHERE `payment` = 'false'");
		} else {
			$id_baskets = mysqli_query($induction, "SELECT `id`, `date_buy` FROM `basket`");
		}

?>

	<br><br>
	<?php while ($id_basket = mysqli_fetch_assoc($id_baskets)) { ?>
	<div class="col">
			<div class="card mb-4 shadow-sm">
			  <div class="card-header">
			    <h4 class="my-0 fw-normal">Чек №<?= $id_basket['id'] ?></h4>
			  </div>
			  <div class="card-body">
					<p><?= $id_basket['date_buy'] ?></p>
					<br>
					<table class="table">
			      <thead>
			        <tr>
			          <th>Продукт</th>
			          <th>Кількість</th>
			          <th>Ціна</th>
			          <th>Сума</th>
			        </tr>
			      </thead>
			      <tbody>
			        <?php
								$id_basket = $id_basket['id'];
								$res = mysqli_query($induction,
																		"SELECT `products`.`name_prod`, `basket_product`.`quantity_purchased`, `products`.`price`, `products`.`quantity_weight`, `basket_product`.`sum`
																		FROM `basket`
																		INNER JOIN `basket_product` ON `basket`.`id` = `basket_product`.`id_basket`
																		INNER JOIN `products` ON `basket_product`.`id_product` = `products`.`id`
																		WHERE `basket`.`id` = $id_basket");
								while ($product = mysqli_fetch_assoc($res)){
							?>
			          <tr>
			            <td><?= $product['name_prod'] ?></td>
			            <td><?= $product['quantity_purchased'] ?></td>
			            <td><?= $product['price'] . " " . $product['quantity_weight'] ?></td>
			            <td><?= $product['sum'] . " грн." ?></td>
			          </tr>
								<?php
									};
									$sum = mysqli_query($induction, "SELECT SUM(`sum`) AS `sum` FROM `basket_product` WHERE `id_basket` = $id_basket");
									$sum = mysqli_fetch_assoc($sum);
									$sum = $sum['sum'];
								?>
			          <tr>
			            <th>Всього</th>
			            <td></td><td></td>
			            <td><?= $sum . " грн." ?></td>
			          </tr>
			      </tbody>
			    </table>
					<?php
						$product = mysqli_query($induction,
																"SELECT `basket`.`payment`
																FROM `basket`
																WHERE `basket`.`id` = $id_basket");
						$product = mysqli_fetch_assoc($product);
					 	if ($product['payment'] === 'true') { ?>
					 	<div class="alert alert-success text-center">
					 		Оплачено
					 	</div>
					 <?php } else { ?>
					 	<div class="alert alert-danger text-center">
					 		Не оплачено
					 	</div>
						<form class="" action="../vendor/delivery.php" method="post">
							<input type="hidden" name="id" value="<?= $id_basket ?>">
							<button style="float: right; margin-right: 1%;" class="btn btn-outline-success">Доставлено</button>
						</form>
					 <?php } ?>
		  	</div>
			</div>
		</div>
		<?php } ?>


	<?php require "../blocks/footer.php" ?>

</body>
</html>
