<?php
  require_once "databases.php";

  $firstName = $_POST['firstName'];
  $last_name = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $address = $_POST['address'];

  if(empty($_POST['firstName']) or empty($_POST['lastName']) or empty($_POST['email']) or empty($_POST['password']) or empty($_POST['address'])){
    if (empty($_POST['password'])) {
      $_SESSION['error'] = 'Помилка при реєстрації';
      header('Location: ../page/new_account.php');
    } else {
      $_SESSION['message'] = 'Помилка при реєстрації';
      header('Location: ../page/register.php');
    }


  } else {

    $sql = mysqli_query($induction, "SELECT `email` FROM `users`");
    while ($emails = mysqli_fetch_assoc($sql)){
      if (in_array($email, $emails)) {
        if (empty($_POST['password'])) {
          $_SESSION['error'] = 'Такий email вже існує!';
          header('Location: ../page/new_account.php');
        } else {
          $_SESSION['message'] = 'Такий email вже існує!';
          header('Location: ../page/register.php');
        }
      }
    }

    $password = md5($password);

    if (isset($_POST['position'])) {
      $position = $_POST['position'];
      echo $position;
      if ($position = "кур'єр") {
        $position = 'кур"єр';
      }
      mysqli_query($induction, "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `position`)
        VALUES (NULL, '$firstName', '$last_name', '$email', '$password', '$address', '$position')");
        $_SESSION['message'] = 'Регістрація пройшла успішно!';
        header('Location: ../page/new_account.php');
    } else {
      mysqli_query($induction, "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `position`)
        VALUES (NULL, '$firstName', '$last_name', '$email', '$password', '$address', 'покупець')");
      $_SESSION['message'] = 'Регістрація пройшла успішно!';
      header('Location: ../page/auth.php');
    }



  }
 ?>
