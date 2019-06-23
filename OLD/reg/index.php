<? session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<?php
  $title = "Document";
?>

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Amaranth" rel="stylesheet">
<meta charset="UTF-8">
<link rel="stylesheet" href="../styles/first.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?=$title?></title>
</head>
  <body>
    <?php /*

      $url = $_SERVER['REQUEST_URI'];

      $goto = strtok($url, '?');

      $goto = substr($goto, 0, -1);

      $goto = substr($goto, 1);

      #$goto = strtok($goto, '/');

      if ($goto == "") $goto = 'main';

    */
    ?>


    <div class="mob-menu close_menu">
      <div class="close">
        <span class="close_line"></span>
        <span class="close_line"></span>
      </div>
      <div class="links">
          <ul class="nav-menu-mob">
              <li><a href="/" class = 'mob_link'>MAIN</a></li>
              <li><a href="#" class = 'mob_link'>PROJECTS</a></li>
              <li><a href="#" class = 'mob_link'>FEEDBACK</a></li>
              <li><a href="#" class = 'mob_link'>CONTACTS</a></li>
            </ul>
      </div>

    </div>
    <div class="parallax">
      <div class="background"></div>
    </div>
    <header class="header">
      <h1 class="mob-title">PORTFOLIO</h1>
      <div class="nav-mobile">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
      </div>
      <ul class="nav">
        <li><a href="/" class = 'header_link'>MAIN</a></li>
        <li><a href="#" class = 'header_link'>PROJECTS</a></li>
        <li><a href="/feedback" class = 'header_link'>FEEDBACK</a></li>
        <li><a href="#" class = 'header_link'>CONTACTS</a></li>
      </ul>


    <?
      require '../php/conn.php';
      if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $passwordU = $_POST['password'];
        $email = $_POST['email'];
        //$password = password_hash($passwordU, PASSWORD_DEFAULT);

        function genRandStr($length = 10) {
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $charactersLength = strlen($characters);
          $randomString = '';
          for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
          }
          return $randomString;
        };

        $randL = genRandStr(16);

        $_SESSION['randl'] = $randL;
        $_SESSION['usernamecheck'] = $username;
        $_SESSION['emailcheck'] = $email;
        $_SESSION['passwordcheck'] = $passwordU;


        $mes = 'Link: http://localhost/check/?id='.$randL;

        mail($email, 'Verify e-mail', $mes);

        $msgOutAuth = 'Message send. Check your e-mail now.';

        /*$query = "INSERT INTO auth (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($conn, $query);

        if ($result) {
          $msgOutAuth = 'Вы успешно зарегистрированы!';
          $_SESSION['username'] = $username;
        }
        else {
          $msgOutAuth = 'Произошла ошибка на сервере :/ Ваш username уже занят! Оригинальность ;D';
        }*/
      }
    ?>



    <?=$msgOutAuth?>

  <?  if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "Hello, ".$username;
        echo "Вы уже вошли. <a href='../login/logout.php'>Выйти?</a>";
      }
      else {
        ?><form method="post" id="formReg">

          <input type="text" id="username" name="username" placeholder="Username" required/>
          <input type="email" id="email" name="email" placeholder="E-mail" required/>
          <input type="password" id="password" name="password" placeholder="Password" required/>
          <button type="button" id="submit">Register</button>

        </form>
        <div id="messageShow">

        </div><?
      }
  ?>

    <? mysqli_close($conn);
    //require_once "../blocks/footer.php"; ?>

    <footer class="footer">
      <ul class="soc">
        <li class="soc_item"><a href="#"><i class="fab fa-github"></i></a></li>
        <li class="soc_item"><a href="#"><i class="fab fa-vk"></i></a></li>
        <li class="soc_item"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
        <li class="soc_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li class="soc_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
      </ul>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="../JS/first.js"></script>
    <script src="../JS/reg.js"></script>
    <script src="../particles.js-master/particles.js"></script>
    <script src="../particles.js-master/demo/js/app.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  </body>
</html>