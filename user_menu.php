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
  <link rel="stylesheet" href="/css/user_menu.css">
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
        <a href="">PROBLEMS?</a>
        <!-- <a href="SIGN_UP.php">SIGN UP</a> -->
        <!-- <a href="LOG_IN.php">LOG IN</a> -->
        <a href="" id="menu_icon" class="icon">&#9776;</a>
      </div>
    </nav>
  </header>


<main>
  <!-- Main of user menu, account settings, logout , and then then then.... -->
  <p> <strong>Главное меню пользователя</strong> </p>
  <hr>

    <div class="name_of_user">
      <p> <strong> <h2>Hello <?php  echo $_SESSION['logged_user']->Login; ?> </h2> </strong> </p>
    </div>
    <br>
    <hr>

    <div class="block_1">
      <div class="properites_of_user">
        <div class="login_of_user">
            <p> Login:    <?php echo $_SESSION['logged_user']->Login ?></p>
        </div>
        <div class="email_of_user">
            <p> EMAIL:  <?php echo $_SESSION['logged_user']->Mail ?> </p>
        </div>
      </div>

      <br>
      <br>

      <div class="delete_user">
        <p>delete not work now</p>
        <p>
          <a href="scripts/delete_user.php">delete_user</a>
        </p>

      </div>


   <!-- logout link,like a button -->
    <div class="logout">
      <p>
        <a href="scripts/logout.php">logout</a>
      </p>
    </div>

  </div>

    <div class="block_2">
      <p> <strong>block_2</strong> </p>
    </div>

    <div class="block_3">
      <p> <strong> block_3 </strong> </p>
    </div>

    <div class="block_4">
      <p> <strong> block_4 </strong> </p>
    </div>


</main>


</body>
</html>
