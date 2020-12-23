<?php
  require_once "../vendor/databases.php";

  $id_user = $_SESSION['user']['id'];

  date_default_timezone_set('Europe/Kiev');
  $date_today = date("Y-m-d H:i:s");
  $result = mysqli_query($induction, "INSERT INTO `basket` (`id`, `id_user`, `date_buy`, `payment`) VALUES (NULL, '$id_user', '$date_today', 'false')");

  $result = mysqli_query($induction, "SELECT id FROM `basket` ORDER BY id DESC");
  $result = mysqli_fetch_assoc($result);

  print_r($result);

  $id_basket = $result['id'];
  echo $id_basket;

  $result = mysqli_query($induction, "SELECT `id_product`, `quantity_purchased`, `sum` FROM `cheque`");

  while ($res = mysqli_fetch_assoc($result)) {
    print_r($res);
    $id_product = $res['id_product'];
    $quantity_purchased = $res['quantity_purchased'];
    $sum = $res['sum'];
    echo $id_product . " " . $quantity_purchased . " " . $sum . "<br>";
    mysqli_query($induction,
                  "INSERT INTO `basket_product` (`id_basket`, `id_product`, `quantity_purchased`, `sum`)
                  VALUES ('$id_basket', '$id_product', '$quantity_purchased', '$sum')");
  }

  mysqli_query($induction, "DELETE FROM `cheque` WHERE `id_user` = $id_user");
  header('Location: ../page/check.php');

 ?>
