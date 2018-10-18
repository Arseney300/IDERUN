<?php
  require 'rb.php';
  R::setup( 'mysql:host=localhost;dbname=programms','tester', '123456789' );
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    <?php
    if (isset($_SESSION['logged_user'])){
      echo $_SESSION['logged_user']->Login ;
    }
    else{
      echo "Server";
    }
     ?>
  </title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="css/problems.css">
</head>
<body>
  <header>
    <div class="header_logo_name">
      <p>Server</p>
    </div>

    <nav class="my_nav">
      <div class="menu">
        <a href="">ABOUT</a>
        <a href="main_window.php">NEW CODE</a>

        <?php
        if (isset($_SESSION['logged_user'])){
          echo  '<a href="user_menu.php" >'.$_SESSION['logged_user']->Login.'</a>';
        }
        else{
          echo '<a href="index.php">SIGN UP</a>';
          echo '<a href="LOG_IN.php">LOG IN</a>';
        }
        ?>
        <a href="" id="menu_icon" class="icon">&#9776;</a>
      </div>
    </nav>
  </header>


<main>
  <div class="text_problem">
    <p>
        Если у вас возникли проблемы, то пожалуйста напишите о ней в форму, представленную ниже
    </p>
  </div>
<hr class="hr">

  <div class="form_problem">
      <p>Тут в будущем будет форма</p>
  </div>


</main>

</body>
</html>
