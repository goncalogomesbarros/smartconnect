<!DOCTYPE html>
<?php
// Conexão
require_once 'db_connect.php';

// Sessão
session_start();

// Botão enviar
if(isset($_POST['btn-entrar'])):
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);

	if(isset($_POST['lembrar-senha'])):

		setcookie('login', $login, time()+3600);
		setcookie('senha', md5($senha), time()+3600);
	endif;

	if(empty($login) or empty($senha)):
		$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
	else:
		// 105 OR 1=1
	    // 1; DROP TABLE teste

		$sql = "SELECT login FROM usuarios WHERE login = '$login'";
		$resultado = mysqli_query($connect, $sql);

		if(mysqli_num_rows($resultado) > 0):
		$senha = md5($senha);
		$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";



		$resultado = mysqli_query($connect, $sql);

			if(mysqli_num_rows($resultado) == 1):
				$dados = mysqli_fetch_array($resultado);
				mysqli_close($connect);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('Location: divisao.php');
			else:
				$erros[] = "<li> Usuário e senha não conferem </li>";
			endif;

		else:
			$erros[] = "<li> Usuário inexistente </li>";
		endif;

	endif;

endif;
?>






<html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SmartConnect</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
        <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="icon.png">
        <link rel="stylesheet" type="text/css" href="style.css" />
		<script type="text/javascript" src="script.js"></script>
    </head>
    <body id="page">
        <ul class="cb-slideshow">
            <li><span>Image 01</span><div></div></li>
            <li><span>Image 02</span><div</div></li>
            <li><span>Image 03</span><div></div></li>
            <li><span>Image 04</span><div></div></li>
            <li><span>Image 05</span><div></div></li>
            <li><span>Image 06</span><div></div></li>
        </ul>
        <div class="container">

          <!-- Codrops top bar -->
            <!--
            <div class="codrops-top">
                <a href="http://tympanus.net/Development/RockingLetters/">
                    <strong>&laquo; Previous Demo: </strong>Rocking Letters with CSS3 &amp; jQuery
                </a>
                <span class="right">
                    <a href="http://www.flickr.com/photos/markjsebastian/" target="_blank">Photography by Mark Sebastian</a>
                    <a href="http://creativecommons.org/licenses/by-sa/2.0/deed.en" target="_blank">CC BY-SA 2.0</a>
                    <a href="http://tympanus.net/codrops/2012/01/02/fullscreen-background-image-slideshow-with-css3/">
                        <strong>Back to the Codrops Article</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
            -->
          <!--/ Codrops top bar -->

            <header>
            <!--<div class="espacocima">
            .
            </div>-->
            <div class="divlogin">
                <img class="logoum" src="logo tipo gb.png" width="1772" height="1772">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
           		<table width="100%" border="0" align="center" class="tablelogin">
                	<tr><td>&nbsp;</td></tr>
                	<tr><td>&nbsp;</td></tr>
                	<tr><td>&nbsp;</td></tr>
					<tr><td align="center"><input type="text" name="login" placeholder="User" value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : '' ?>"></td></tr>
					<tr><td align="center"><input type="password" name="senha" placeholder="Password" value="<?php echo isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '' ?>"></td></tr>
					<tr><td align="center"><button type="submit" id="login" name="btn-entrar" value="Login" onmouseover="this.id='loginover'" onmouseout="this.id='login'">Login</button></td></tr>
					<tr><td align="center"><button type="button" id="forgot" name="help" value="Help" onmouseover="this.id='forgotover'" onmouseout="this.id='forgot'">Help</button></td></tr>
          <tr><td>&nbsp;
            <?php
              if(!empty($erros)):
                foreach($erros as $erro):
                  echo $erro;
                endforeach;
              endif;
            ?>
          </td></tr>
				</table>
      </form>
            </div>
            <!--<div class="minilogo">
           	  <img src="minilogo.png" width="20" height="20">
            </div>-->

            </div>
            <!--<div class="letras">
           	  SmartConnect
            </div>-->

            </header>
        </div>
    </body>
</html>
