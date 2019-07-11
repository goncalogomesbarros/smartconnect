<html>
<head>
<title>Criando Pessoa...</title>

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

  $id = $_SESSION['id_usuario'];
  $sql = "SELECT * FROM usuarios WHERE id = '$id'";
  $resultado = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_array($resultado);
 ?>
<?php




$naoaparecer = filter_input(INPUT_POST, 'naoaparecer');
$inteiroq = intval($naoaparecer);

if ($inteiroq == 3){
  $numfinal = 0;
}else{
  $numfinal = 1;
}

$dadoschange = $dados['login'];



$sql = "UPDATE usuarios SET intropage=$numfinal WHERE login='$dadoschange'";
				/*header('Location: home.php');*/


/*  $resultverify = $connect->query($verificacaologin);*/


if ($connect->query($sql) === TRUE) {
    /*echo "Record updated successfully";*/
    header('Location: home2.php');
} else {
    /*echo "Error updating record: " . $connect->error;*/
    header('Location: home2.php');
}
















//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

/*<----  $verificacaologin = "SELECT login FROM usuarios WHERE login = '$loginsign'";
  $resultverify = $connect->query($verificacaologin);
/*
  if ($resultverify = $loginsign){
    echo "tem alguma cousa aki";

    /*if ($resultverify == $loginsign){
      echo "igual";
    } else {
      echo "nop";
    }
*/
/*

  } else {
    echo 'hum';



  }

*/


/*<------$result_usuario = "INSERT INTO usuarios (nome, sobrenome, hierarquia, login, senha, created)
VALUES ('$nome', '$sobrenome', '$hierarquia', '$loginsign', '$senha', NOW())";
$resultado_usuario = mysqli_query($connect, $result_usuario);



if(mysqli_insert_id($connect)){
  echo "pessoa criada com sucesso";
	/*$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";*/
	/*header("Location: index.php");*/
/*<----}else{
  echo "ja existe alguem com esse nome";
	/*$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";*/
	/*header("Location: index.php");*/
/*<-----}





  /*$nome=$_POST['nomesignup'];
  $sobrenome=$_POST['sobrenome'];
  $hierarquia=$_POST['hierarquia'];
  $login=$_POST['login'];
  $pass=$_POST['senha'];

  $sql = mysqli_query("INSERT INTO usuarios (nome, sobrenome, hierarquia, login, senha) VALUES('$nome', '$sobrenome', '$hierarquia', '$login', '$pass')");
*/



?>
<p>
  <br>
  <p>
<!--<a href="home.php"> voltar </a>-->
</body>
</html>
