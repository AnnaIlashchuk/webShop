<?php
  require_once "databases.php";

  $email = $_POST['email'];
  $password = md5($_POST['password']);

	$user = mysqli_query($induction, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");

  if (mysqli_num_rows($user) > 0) {
    $user = mysqli_fetch_assoc($user);
    $_SESSION['user'] = [
      "id" => $user['id'],
      "firstName" => $user['first_name'],
      "lastName" => $user['last_name'],
      "email" => $user['email'],
      "address" => $user['address'],
      "position" => $user['position']
    ];

    header('Location: ../page/profile.php');
  } else {
    $_SESSION['error'] = "Не вірний логін або пароль!";
    header('Location: ../page/auth.php');
  }
?>
