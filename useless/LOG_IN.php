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
  <title>signup</title>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">




</head>
<body>
  <header>
    <div class="header_logo_name">
      <p>Server</p>
    </div>

    <nav class="my_nav">
      <div class="menu">
        <a href="">ABOUT</a>
        <a href="index.php">NEW CODE</a>
        <a href="">PROBLEMS?</a>
        <a href="SIGN_UP.php">SIGN UP</a>
        <a href="LOG_IN.php">LOG IN</a>
        <a href="" id="menu_icon" class="icon">&#9776;</a>
      </div>
    </nav>
  </header>


<?php
  $data = $_POST;
  if (isset($data['LOG_button'])){
    if (trim($data['Login']) == '')
      echo '<div style="color:red;">'.'Введите логин'.'</div><hr>';
    else if ($data['Password_1'] == '')
      echo '<div style="color:red;">'.'Введите пароль'.'</div><hr>';
    else{
      $user = R::findOne('users', '_login = ? OR _mail = ?', array($data['Login'], $data['Login']));
      if ($user){
        if (password_verify($data['Password_1'],$user->Password) ){
          echo '<div style="color:green;">'.'Вы успешно авторизованы'.'<br><a href = "index.php" style = "color:#758900;">Перейти на главную страницу</a>'.'</div><hr>';
          $_SESSION['logged_user'] = $user;
        }
        else{
          echo '<div style="color:red;">'.'Пароль неверный'.'</div><hr>';
        }
      }
      else{
        echo '<div style="color:red;">'.'Такой пользователь не найден'.'</div><hr>';
      }
    }

  }


 ?>



<main>

  <form class="" action="LOG_IN.php" method="post">
      <p>
        <p><strong>Введите логин или почту:</strong></p>
        <input type="text" name="Login" value="<?php echo $data['Login']; ?>">
      </p>


      <p>
        <p> <strong>Введите пароль:</strong> </p>
        <input type="password" name="Password_1" value="">
      </p>



      <p>
        <button type="submit" name="LOG_button"> <h3>LOG IN</h3>  </button>
      </p>

  </form>

</main>




  <script src="/js/scripts.js">  </script>
</body>
</html>
