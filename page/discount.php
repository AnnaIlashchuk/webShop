<?php
	require_once "../vendor/databases.php";
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
  <style media="screen">

  </style>
	<title>Знижки на сайті - <?= $_SESSION['name_shop'] ?></title>
</head>
<body>
	<?php
    require "../blocks/header.php";
    $discounts = mysqli_query($induction, "SELECT * FROM `discounts`");
  ?>

  <br><br>
  <div style="margin-left: 30px; width: 95%;" class="d-flex flex-wrap">
    <?php while ($discount = mysqli_fetch_assoc($discounts)){ ?>
      <div class="col">
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 style="text-align: center;" class="my-0 fw-normal"><?= $discount['title'] ?></h4>
          </div>
          <div class="card-body">
            <h6 style="text-align: right;" class="card-title pricing-card-title"><?= $discount['start_date'] . " / " . $discount['end_date'] ?></h6>
            <h4><?= $discount['text'] ?></h4>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <?php require "../blocks/footer.php" ?>

</body>
</html>
