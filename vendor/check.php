<?php
  require_once "databases.php";
  print_r($_POST);
  $id = $_GET['id'];
  $count_buy = $_POST['count_buy'];
  $count = $_GET['count'];
  if (empty($_SESSION['user'])){
    header("Location: ../page/auth.php");
  } elseif ($count_buy <= $count){
    $sql = mysqli_query($induction, "SELECT * FROM `products` WHERE `id` = $id");
    $product = mysqli_fetch_assoc($sql);
    $sum = $product['price'] * $count_buy;
    $new_count = $count - $count_buy;
    $id_user = $_SESSION['user']['id'];
    mysqli_query($induction, "INSERT INTO `cheque` (`id_user`, `id_product`, `quantity_purchased`, `sum`)
      VALUES ('$id_user', '$id', '$count_buy', '$sum')");

    mysqli_query($induction, "UPDATE `products` SET `count` = $new_count WHERE `products`.`id` = $id");

    $_SESSION['buy'] = "Купівля здійснена!";
    echo $_SESSION['buy'];

    header("Location: ../page/read.php?id=" . $_GET['id']);

  } else {
    $_SESSION['error_buy'] = "Перевищено ліміт!";
    header("Location: ../page/read.php?id=" . $_GET['id']);
  }

?>
