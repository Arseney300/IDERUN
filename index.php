<?php
  require 'rb.php';
  R::setup( 'mysql:host=localhost;dbname=programms','tester', '123456789' );
  session_start();
?>
<?php
  if (isset($_SESSION['logged_user']))
    header('Location: /main_window.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Server</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/style_for_welcome.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body background="img/2348.jpg">

  <header>
    <div class="header_logo_name">
      <p>Server</p>
    </div>
  </header>







<!-- First div with sign_up_menu  -->
  <div class="SIGN_UP_menu">
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
            //system("mkdir /var/www/html/users".$data['Login'],$errors);
            //echo $errors;
            header('Location: /main_window.php');
            }

      }


     ?>
    <p class = "sign_up_text" >SIGN UP</p>
    <form class="sign_up_form" action="index.php" method="post">
      <p> <strong>Введите логин:</strong> </p>
      <input type="text" name="Login" value="<?php echo $data['Login']; ?>">

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
      <button class = "reg_button" type="submit" name="REG_button"> <h3>SIGN UP</h3>  </button>
      <a  href="LOG_IN.php"type="submit" name = "LOG_IN_button"> or log in</a>
    </p>

    </form>

  </div>

<!-- Div with "OR" text -->

  <div class="OR">
    <p> <h1>OR</h1> </p>
  </div>

<!-- Anon login -->
  <div class="anon_up">
    <p class = "anon_up_text">АНОНИМНЫЙ ВХОД</p>
    <form class="anon_up_form" action="main_window.php" method="post">
      <p> <strong>Выберите язык:</strong> </p>
        <select class="select_lang" name="select_lang">
          <option value="text/x-java"><h3>Java</h3></option>
          <option value="text/x-c++src"><h3>C++</h3></option>
          <option value="python"><h3>Python</h3></option>
        </select>
        <p>
          <button class="anon_up_button" type="submit" name="anon_up_button"> <h3>GO!</h3> </button>
        </p>
    </form>
  </div>


</body>
</html>
