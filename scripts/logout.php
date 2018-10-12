<?php
  require '../rb.php';
  R::setup( 'mysql:host=localhost;dbname=programms','tester', '123456789' );
  session_start();
  unset($_SESSION['logged_user']);
  header('Location: /index.php');
?>
