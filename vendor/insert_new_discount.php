<?php
  require_once "databases.php";

  $title = $_POST['title'];
  $text = $_POST['text'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];

  if(empty($_POST['title']) or empty($_POST['text']) or empty($_POST['start_date']) or empty($_POST['end_date'])){
    $_SESSION['error'] = 'Не заповнено всі поля!';
    $_SESSION['new_discount'] = "";
    header('Location: ../page/new_discount.php');

  } else {

    mysqli_query($induction, "INSERT INTO `discounts` (`id`, `title`, `text`, `start_date`, `end_date`)
    VALUES (NULL, '$title', '$text', '$start_date', '$end_date')");
    $_SESSION['message'] = 'Нова знижка створена!';
    header('Location: ../page/new_discount.php');
  }
 ?>
