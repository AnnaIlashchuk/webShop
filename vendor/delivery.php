<?php
  require_once "databases.php";

  $id = $_POST['id'];

  mysqli_query($induction, "UPDATE `basket` SET `payment` = 'true'  WHERE `id` = '$id'");
  header('Location: ../page/check.php');
 ?>
