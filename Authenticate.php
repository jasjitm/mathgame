<?php
session_start();
if($error) {
  header("Location: login.php?msg=Invalid%20login%20credentials.");
} else {
  $_SESSION['login'] = 'yes';
  header("Location: index.php");
  die();
}
if(isset($_SESSION['login']) && $_SESSION['login'] == 'yes') {
	header('Location: index.php');
}
if(!isset($_POST['password']) && $_POST['password'] !== "aaa") {
  $error = true;
}
$error = false;
if(!isset($_POST['email']) && $_POST['email'] !== "a@a.a") {
  $error = true;
}
?>
