<html>
<head>
  <title>Divisao</title>
</head>
<body>


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

if  ($inteiro > 0){
  				header('Location: intro.php');
}else{
				header('Location: home2.php');
}








?>


<p>
  oi?
<p>
  <a href="home.php">home</a><p>
  <a href="logout.php">Sair</a><p>

</body>
</html>
