<?php
	require_once "../vendor/databases.php";
	$_SESSION['name_shop'] = 'Магазин "Кошик"';
	$result = mysqli_query($induction, "SELECT * FROM `departments`");
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
	<title>Головна - <?= $_SESSION['name_shop'] ?></title>
</head>
<body>
	<?php require "../blocks/header.php" ?>

	<div class="container mt-5">
		<h3 class="mb-5">Каталог товарів</h3>

		<div class="d-flex flex-wrap">
			<?php while ($depart = mysqli_fetch_assoc($result)){ ?>
			<div class="card mb-4 shadow-sm">
					<a class="p-2 text-dark" href="department.php?id=<?= $depart['id'] ?>">
						<img src="../img/departments/<?= $depart['images'] ?>" class="mt-3">
					</a>
					<div class="card-body">
						<a class="p-2 text-dark" href="department.php?id=<?= $depart['id'] ?>">
							<?= $depart['name_depart'] ?>
						</a>
					</div>
			</div>
			<?php } ?>
		</div>
	</div>

	<?php require "../blocks/footer.php" ?>

</body>
</html>
