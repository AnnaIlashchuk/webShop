<?php
	require_once "../vendor/databases.php";
	$id_depart = $_GET['id'];
	$result = mysqli_query($induction,
            "SELECT `products`.`id`, `products`.`name_prod`, `products`.`image`, `products`.`price`, `products`.`quantity_weight`, `departments`.`name_depart`
            FROM `products`
            INNER JOIN `departments` ON `departments`.`id` = `products`.`id_depart`
            WHERE `id_depart` = $id_depart");
  $p = mysqli_fetch_assoc($result);
  $depart = $p['name_depart'];
  $result = mysqli_query($induction,
            "SELECT `products`.`id`, `products`.`name_prod`, `products`.`image`, `products`.`price`, `products`.`quantity_weight`, `departments`.`name_depart`
            FROM `products`
            INNER JOIN `departments` ON `departments`.`id` = `products`.`id_depart`
            WHERE `id_depart` = $id_depart");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/style_products.css">
  <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<style media="screen">
		form {
			text-align: center;
		}

		.card a{
			color: black;
		}
	</style>
	<title><?= $depart . " - " . $_SESSION['name_shop'] ?></title>
</head>
<body>
	<?php
		require "../blocks/header.php";
		// require_once "../blocks/filter_buttons.php";
	?>

	<div class="container mt-5">
		<h3 class="mb-5">
      <?= $depart ?>
		</h3>

		<div class="d-flex flex-wrap">
			<?php while ($product = mysqli_fetch_assoc($result)){ ?>
			<div class="card shadow-sm">
				<a href="read.php?id=<?= $product['id'] ?>">
          <img src="../img/products/<?= $product['image'] ?>" class="mt-3" >
        </a>
				<div class="card-body">
					<a href="read.php?id=<?= $product['id'] ?>"><?= $product['name_prod'] ?></a>
					<br>
					<a><?= $product['price']. " " . $product['quantity_weight']?></a>
					<br>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php require "../blocks/footer.php" ?>

	<script src="bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
	<script src="jquery-3.5.1.min.js"></script>
</body>
</html>
