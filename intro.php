<?php
// Conexão
require_once 'db_connect.php';

// Sessão
session_start();

// Verificação
if(!isset($_SESSION['logado'])):
	header('Location: index.php');
endif;


// Dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
/*mysqli_close($connect);*/
$lole = $dados['intropage'];
/*$inteiro = intval($dados);*/

$inteiro = intval($lole);

/*echo $inteiro;*/
/*
if  ($inteiro > 0){
  				header('Location: intro.php');
}else{
				header('Location: home.php');
}
*/

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  <script type="text/javascript" src="script.js"></script>
  <style type="text/css">
  @font-face {
  font-family: opensansreg;
  src: url(OpenSans-Regular.ttf);
  }
  @font-face {
  font-family: opensanssemi;
  src: url(OpenSans-SemiBold.ttf);
  }
  @font-face {
  font-family: helveticabold;
  src: url(Helvetica-Bold.ttf);
  }
  .bk {
	background-attachment: fixed;
	background-image: url(9c608a_70d2892571a04a37b4a196bcef7065c1_mv2_d_3401_2242_s_2.jpeg);
	background-repeat: no-repeat;
	background-position: center center;
	background-size:cover;
  }
  .boxmeio{
  /*margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;*/


        width: 950px;
        height: 400px;
        min-width: 950px;
        /*background-color: blue;*/
        border: 0px solid red;

        position:absolute; /*it can be fixed too*/
        left:0; right:0;
        top:0; bottom:0;
        margin:auto;

        /*this to solve "the content will not be cut when the window is smaller than the content": */
        max-width:100%;
        max-height:100%;
        overflow:auto;
  }
  .tit{
    font-family: helveticabold;
    color: white;
    font-size: 54px;
    border: 0px solid green;
    text-align: center;
    height: 90px;
  }
  .txt{
    border: 0px solid blue;
    text-align: center;
    color: white;
    font-family: opensansreg;
    font-size: 27px;
  }
  .nop{
    border: 0px solid red;
    text-align: center;
    color: white;
    font-family: opensansreg;
    font-size: 15px;
		height: 55px;
  line-height: 30px;
  }
	.bot{
		border: 0px solid red;
		text-align: center;
	}

	.botpro{
  height: 50px;
  width: 160px;
  background-color: #40B4DE;
  color: #fff;
  font-size: 0.75em;
  border-radius: 50px;
  border: none;
	}

input[type=submit]:hover {
  background-color: #82D2F0;
}

input[type=submit]:focus {
  outline: 0;
}
  </style>
  </head>
  <body class="bk">
    <article class="boxmeio">
      <section class="tit">
         Controle tudo com a SmartConnect!
      </section>
      <section class="txt">
        <p>Controle desde a iluminação, temperatura e humidade até ao alarme central da sua residência.
        SmartConnect é a sua plataforma que lhe permite estar em casa à distância.
        esqueceu-se de alguma luz ou dispositivo ligado? Não se preocupe, desligue-o na SmartConnect.</p>
      </section>
      <section class="nop">
        <form method="POST" action="intropage.php">
        <input type="checkbox" name="naoaparecer" value="3"> Selecione esta opção para desativar a página inicial.
      </section>
      <section class="bot">
        <input class="botpro" type="submit" value="Próximo">
				</form>
        <!--<br><a href="home2.php">home</a>
        <br><a href="logout.php">Sair</a>-->
      </section>
    </article>
  </body>
</html>
