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








  <div class="SIGN_UP_menu">
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
            header('Location: /main_window.php');
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
    <p class = "sign_up_text" >SIGN UP</p>
    <form class="sign_up_form" action="LOG_IN.php" method="post">
      <p> <strong>Введите логин или почту:</strong> </p>
      <input type="text" name="Login" value="<?php echo $data['Login']; ?>">



      <p> <strong>Введите пароль:</strong> </p>
      <input type="password" name="Password_1" value="">
    </p>


    <p>
      <button class = "reg_button" type="submit" name="LOG_button"> <h3>LOG IN</h3>  </button>
      <a  href="index.php"type="submit" name = "LOG_IN_button"> or sign up</a>
    </p>

    </form>

  </div>

  <div class="OR">
    <p> <h1>OR</h1> </p>
  </div>


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
