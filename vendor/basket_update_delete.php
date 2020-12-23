<?php
  require_once "databases.php";

  if (isset($_POST['button_update'])) {
    print_r($_POST);
    $id = $_POST['id'];
    $count = $_POST['count_buy'];

    $result = mysqli_query($induction, "SELECT * FROM `products` WHERE `id` = $id");
    $result = mysqli_fetch_assoc($result);
    print_r($result);

    $result2 = mysqli_query($induction, "SELECT * FROM `cheque` WHERE `id_product` = $id");
    $result2 = mysqli_fetch_assoc($result2);
    print_r($result2);

    $count_res = $result['count'] + $result2['quantity_purchased'];
    echo $count_res;
    $count_res -= $count;
    echo $count_res;
    if ($count_res < 0) {
      $_SESSION['error'] = "Перевищено ліміт!";
      header('Location: ../page/basket.php');
    } else {
      $sum = $count * $result['price'];
      $id_user = $_SESSION['user']['id'];
      mysqli_query($induction, "UPDATE `cheque` SET `quantity_purchased` = $count, `sum` = $sum  WHERE `id_user` = $id_user AND `id_product` = $id");

      mysqli_query($induction, "UPDATE `products` SET `count` = $count_res WHERE `products`.`id` = $id");

      $_SESSION['message'] = "Покупку змінено!";
      header('Location: ../page/basket.php');
    }
  } elseif (isset($_POST['button_delete'])) {
    $id = $_POST['id'];
    $id_user = $_SESSION['user']['id'];
    $id_product = $_POST['id'];

    $result = mysqli_query($induction, "SELECT * FROM `products` WHERE `id` = $id");
    $result = mysqli_fetch_assoc($result);
    print_r($result);

    $result2 = mysqli_query($induction, "SELECT * FROM `cheque` WHERE `id_product` = $id");
    $result2 = mysqli_fetch_assoc($result2);
    print_r($result2);

    $count = $result['count'] + $result2['quantity_purchased'];
    mysqli_query($induction, "UPDATE `products` SET `count` = $count WHERE `products`.`id` = $id");

    mysqli_query($induction, "DELETE FROM `cheque` WHERE `id_user` = $id_user AND `id_product` = $id_product");

    header('Location: ../page/basket.php');
  }

 ?>
