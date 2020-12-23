<?php

  require_once "databases.php";

  $name = $_POST['NameProd'];
  $depart = $_POST['Depart'];
  $price = $_POST['Price'];
  $quantity = $_POST['Quantity'];
  $count = $_POST['Count'];
  $image = $_FILES['Image']['name'];

  if (empty($_POST['NameProd']) or empty($_POST['Depart']) or empty($_POST['Price']) or empty($_POST['Quantity']) or empty($_POST['Count']) or empty($_FILES['Image']['name'])) {
    $_SESSION['error'] = 'Помилка при заповненні продукту!';
    header('Location: ../page/new_product.php');
  }

  switch ($depart) {
    case 'Хлібобулочні вироби':
      $depart = 1;
      break;
    case 'Напої':
      $depart = 2;
      break;
    case 'Риба':
      $depart = 3;
      break;
    case 'Овочі і фрукти':
      $depart = 4;
      break;
    case "М'ясо":
      $depart = 5;
      break;
    case 'Солодощі':
      $depart = 6;
      break;
  }

  mysqli_query($induction, "INSERT INTO `products` (`id`, `name_prod`, `id_depart`, `image`, `price`, `quantity_weight`, `count`)
    VALUES (NULL, '$name', '$depart', '$image', '$price', '$quantity', '$count')");

  $_SESSION['message'] = 'Новий продукт створений!';
  header('Location: ../page/new_product.php');

 ?>
