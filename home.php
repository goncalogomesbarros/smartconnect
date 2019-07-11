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
?>

<html>
<head>
	<title>Página restrita</title>
	<meta charset="utf-8">
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" type="text/css" href="stylehome.css" />
</head>
<body>
<h1> Olá <?php echo $dados['nome']; ?> </h1>
<a href="logout.php">Sair</a><p>
	----------------------------------------------------------------------------------------------
	<p>
	 criar user:
	 <p>
		 <form method="POST" action="signup.php">
		 	<label>Nome:</label>        <input type="text" name="nomesignup" id="nomesignin" required placeholder="correct"><br>
 		 	<label>Subernome:</label>   <input type="text" name="sobrenome" id="sobrenomesignin" required placeholder="correct"><br>
 		 	<label>Tipo de Utilizador:</label>
				<select name="hierarquia" id="hierarquia" required>
					<!--<option value="escolha" hidden selected ><!--disabled selected value-->Escolha...<!--</option>-->
					<option value="padrao">Utilizador Padrão</option>
					<option value="admin">Administrador</option>
				</select><br>
		 	<label>Login:</label><input type="text" name="login" id="login" required placeholder="correct"><br>
		 	<label>Senha:</label><input type="password" name="senha" id="senha" required placeholder="correct"><br>
		 	<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar" required placeholder="correct">
	 	 </form>
		 <p>

			 ----------------------------------------------------------------------------------------------------
			 <p>
				 modificar utilizadores:
				 <p>







					 <table border="1">
<tr>
 <th>Id</th>
 <th>Nome</th>
 <th>Login</th>
 <th>Defs</th>
</tr>



<?php

 // Check connection
 require_once 'db_connect.php';

/*-----------------O ID E MSM NECESSARIO?!------------------------*/

 $selecao = "SELECT id, nome, sobrenome, login FROM usuarios";
 $resultsel = $connect->query($selecao);
 if ($resultsel->num_rows > 0) {
	// output data of each row
	while($row = $resultsel->fetch_assoc()) {
?>

	<tr>
	 <td><?=$row["id"]?></td>
	 <td><?=$row["nome"]. "  " .  $row["sobrenome"]?></td>
	 <td><?=$row["login"]?></td>

   <td> <input id="modificaruser" value="modificar" onclick="divmodificaruser('<?=$row['id']?>', '<?=$row['nome']?>', '<?=$row['sobrenome']?>', '<?=$row['login']?>')" type="button"></td>

	 <!--<td> <script>document.write(lineid)</script></td>-->
  </tr>

<?php
}
echo "</table>";
} else { echo "0 results"; }
$connect->close();
?>





</table>


<!--div de modificar user----------------------------------->
					 <div id="divmodificarpessoaum">
						 <a href="javascript:divmodificaruserfechar();">
							 Fechar
						 </a>
							 <p>
							 <?php echo  "<p>22"?>
								 <p>
									<!-- <script>document.write(altnome)</script>-->

								 <form method="post" action="alteracaobd">
								 <input type="text" name="alteracaonome" id="alteracaonome" placeholder=<?=$row?>>

							 </form>

					 </div>


					 <div id="divmodificarpessoa" onclick="divmodificaruserfechar()">

					 </div>
<!--div de modificar user-------------------------------->

<p>

	----------------------------------------------------------------------------------------------------
	<p>

Voltar a apresentar a pagina de entrada:

<p>
<form method="POST" action="intropagevoltar.php">
<input type="checkbox" name="aparecerdenovo" value="4"> voltar a apresentar

<p>

<input type="submit" value="Update">

</form>

<p>

	----------------------------------------------------------------------------------------------------
</p>































</body>
</html>
