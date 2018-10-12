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
  if (isset($data['REG_button'])){
    if (trim($data['Login']) == '')
      echo '<div style="color:red;">'.'Введите логин'.'</div><hr>';
    else if (trim($data['email']) == '')
      echo '<div style="color:red;">'.'Введите почту'.'</div><hr>';
    else if ($data['Password_1'] == '')
      echo '<div style="color:red;">'.'Введите пароль'.'</div><hr>';
    else if ($data['Password_1'] != $data['Password_2'])
      echo '<div style="color:red;">'.'Пароли не совпадают'.'</div><hr>';
    else if ( R::count('users', "_login = ? OR _mail = ?", array($data['Login'], $data['email'])) > 0)
      echo '<div style="color:red;">'.'Пользователь с таким логином или email уже существует'.'</div><hr>';
    else{
        $user =   R::dispense('users');
        $user->Level_access = 'xxxxxxxxx';
        $user->Login = $data['Login'];
        $user->Mail = $data['email'];
        $user->Password =  password_hash( $data['Password_1'], PASSWORD_DEFAULT);
        R::store($user);
        echo '<div style="color:green;">'.'Вы зарегестрированы!'.'<br><a href = "index.php" style = "color:#758900;">Перейти на главную страницу</a>'.'</div><hr>';
        $_SESSION['logged_user'] = $user;
        $errors = array();
        system("mkdir /var/www/html/users".$data['Login'],$errors);
        echo $errors;

        }

  }


 ?>



<main>

  <form class="" action="SIGN_UP.php" method="post">
      <p>
        <p><strong>Введите логин:</strong></p>
        <input type="text" name="Login" value="<?php echo $data['Login']; ?>">
      </p>
      <p>
        <p> <strong>Введите почту:</strong> </p>
        <input type="email" name="email" value="<?php echo $data['email'] ?>">
      </p>

      <p>
        <p> <strong>Введите пароль:</strong> </p>
        <input type="password" name="Password_1" value="">
      </p>

      <p>
        <p> <strong>Введите пароль еще раз:</strong> </p>
        <input type="password" name="Password_2" value="">
      </p>

      <p>
        <button type="submit" name="REG_button"> <h3>SIGN UP</h3>  </button>
      </p>

  </form>

</main>




  <script src="/js/scripts.js">  </script>
</body>
</html>
