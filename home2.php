<?php
function debug_to_console( $data ) {
	$output = $data;
	if ( is_array( $output ) )
			$output = implode( ',', $output);

	echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
header('Content-Type: text/html; charset=utf-8');
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

<!doctype html>
 <html> 
  <head>
	<link rel="shortcut icon" type="image/png" href="/icon.png"/>
		<link rel="stylesheet" type="text/css" href="stylehome2atual.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">-->
		<meta charset="utf-8" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="stylehome3.css">
    <title>SmartConnect</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="iconhome.png" />
		<meta charset="ISO-8859-1">
		<meta charset="UTF-8">
		<meta charset="utf-8">
    <link rel="shortcut icon" href="icon.png">
    <script type="text/javascript" src="script2.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  </head>
  <body>
    <nav class="menulateral">
    	<div class="logocimonav">
    		<img src="logocimonav.png" onclick="funcaohomepage()" class="logocimonavimg" width="27px" height="auto" alt="Italian Trulli">
        <a class="asmartconnect" onclick="funcaohomepage()">SmartConnect</a>
    	</div>
      <div class="bordadebaixo">
      </div>
    	<div class="segundoespaconav">
      	<img src="homedois.png" onclick="funcaohomepage()" id="homeid" class="imghomeum" width="20px" height="auto" alt="Italian Trulli">
      	<!--<img src="homedois.png" class="imghomedois" width="20px" height="auto" alt="Italian Trulli">-->
      	<a id="hometextid" onclick="funcaohomepage()">&nbsp;&nbsp; Home Page</a>
    		<div class="dirsegundoespaconav">
    			&nbsp;&nbsp;&nbsp;&nbsp;<img src="defenicoesicon.png" width="20px" height="auto" alt="Italian Trulli" >
    		</div>
    	</div>
    	<div class="developnav">
    		<div class="titledevelopnav">
    			Central de Controlo
    		</div>
    		<div class="menubotaonav">
    		 <img src="databaseum.png" onclick="funcaodispositivos()" id="dispositivosimgid" width="20px" height="auto" alt="Italian Trulli">
         <a id="dispositivostextid" onclick="funcaodispositivos()">&nbsp;&nbsp;	Dispositivos</a>
    		</div>
    		<div class="menubotaonav">
    		 <img src="lampum.png" onclick="funcaoluzes()" id="luzesimgid" width="20px" height="auto" alt="Italian Trulli">
         <a id="luzestextid" onclick="funcaoluzes()">&nbsp;&nbsp;
    			Luzes</a>
    		</div>
    		<div class="menubotaonav">
    		 <img src="sensorsum.png" onclick="funcaosensores()" id="sensoresimgid" width="20px" height="auto" alt="Italian Trulli">
         <a id="sensorestextid" onclick="funcaosensores()">&nbsp;&nbsp;
    			Sensores</a>
    		</div>
    		<div class="menubotaonav">
    		 <img src="alarmum.png" onclick="funcaoalarme()" id="alarmeimgid" width="20px" height="auto" alt="Italian Trulli">
         <a id="alarmetextid" onclick="funcaoalarme()">&nbsp;&nbsp;
    			Alarme</a>
    		</div>
    		<div class="menubotaonav">
    		 <img src="camaraum.png" onclick="funcaocamara()" id="camaraimgid" width="20px" height="auto" alt="Italian Trulli">
         <a id="camaratextid" onclick="funcaocamara()">&nbsp;&nbsp;
    			Câmaras</a>
    		</div>
    	</div>
      <div class="developnavdois">
    		<div class="titledevelopnav">
    			Utilizadores
    		</div>
    		<div class="menubotaonav">
    			<img src="listausersicon.png" onclick="funcaolistausers()" id="listaisersimgid" width="20px" height="auto" alt="Italian Trulli">
					<a id="listauserstextid"   onclick="funcaolistausers()">&nbsp;&nbsp; Lista de Utilizadores</a>
    		</div>
    		<div class="menubotaonav">
    			<img src="addusericon.png" onclick="funcaocriarusers()" id="criaruserimgid" width="20px" height="auto" alt="Italian Trulli">
    			<a onclick="funcaocriarusers()" id="criarusertextid">&nbsp;&nbsp; Criar Utilizador</a>
    		</div>
    		<div class="menubotaonav">
    			<img src="modusericon.png" onclick="funcaomodusers()" id="modificararuserimgid" width="20px" height="auto" alt="Italian Trulli">
          <a id="modificarusertextid" onclick="funcaomodusers()">&nbsp;&nbsp; Modificar Utlizador</a>
    		</div>
    		<div class="menubotaonav">
    		<img src="defenicoesicon.png" onclick="funcaozonascontrol()" id="zonascontrolimgid" width="20px" height="auto" alt="Italian Trulli"><a onclick="funcaozonascontrol()" id="zonascontroltextid">&nbsp;&nbsp; Zonas de Controlo</a>
    		</div>
    	</div>
      <div class="developnavtres">
    		<div class="titledevelopnav">
    			title developnav
    		</div>
    		<div class="menubotaonav">
    			botao um
    		</div>
    		<div class="menubotaonav">
    			botao dois
    		</div>
    		<div class="menubotaonav">
    			botao tres
    		</div>
    		<div class="menubotaonav">
    			botao quatro
    		</div>
    		<div class="menubotaonav">
    			botao cinco
    		</div>
    		<div class="menubotaonav">
    			botao seis
    		</div>
    		<div class="menubotaonav">
    			botao sete
    		</div>
    		<div class="menubotaonav">
    			botao oito
    		</div>
    		<div class="menubotaonav">
    			botao nove
    		</div>
    		<div class="menubotaonav">
    			botao dez
    		</div>
    	</div>
    </nav>



<!-- -                  cabecalho--------------------------------->
    <div class="cabecalho">
      <div class="nomecabecalho">
      Olá <?php echo $dados['nome']; ?>!
			<br>
			<!--<button onclick="myFunction()">Reload page</button>-->

			<script>
			function myFunction() {
			  location.reload();
			}
			</script>
      </div>


			<div class="botsair">
<a href="logout.php" id="sairbot">
<img src="bazarlogo.png" href="logout.php" id="botsairimg" width="30px" height="auto" alt="Italian Trulli">
</a>
			</div>
    </div>


		<div class="conteudoprincipal">
			&nbsp;

<!--        corpo DIV HOME PAGE----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="homepage">
	HOME PAGE - pilinha
</div>
<!--     FIM DIV HOME PAGE --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--        corpo DISPOSITIVOS----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="dispositivosdiv">
	dispositivos
</div>
<!--     FIM DIV DISPOSITIVOS --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--        corpo DIV LUZES----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="luzesdiv">
	luzes
</div>
<!--     FIM DIV LUZES --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--        corpo DIV SENSORES----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="sensoresdiv">
	sensores
</div>
<!--     FIM DIV SENSORES --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--        corpo DIV ALARME----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="alarmediv">
	alarme
</div>
<!--     FIM DIV ALARME --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--        corpo DIV CAMARAS----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="camarasdiv">
	camaras
</div>
<!--     FIM DIV CAMARAS --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--        corpo DIV LISTA usuarios----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="listausers">
	<section class="titlistausers">
		Lista de Utilizadores
	</section>
	<section class="txtlistausers">
		<p>Bem-vindo à lista de utilizaores da plantaforma SmartConnect!
		Aqui pode ver e controlar a conta de cada pessoa com acesso à SmartConnect.</p>
		<p>Selecione o utilizador para ver detalhes mais promenorizados. Clique em "Editar" para alterar os parametros da conta.</p>
	</section> 




 
	



	<section class="tabelalistausers">
		<br>
		<section class="linhatabhead">
			<section class="colunaa" id="nomecompum">Nome Completo</section>
			<section class="colunaa" id="tipouserum">Tipo de Utilizador</section>
			<section class="colunaa" id="loginum">Login</section>
			<section class="colunaa" id="pginicialum">Defenições</section>
		</section>


		<?php

// Check connection
require_once 'db_connect.php';

/*-----------------O ID E MSM NECESSARIO?!------------------------*/

$selecao = "SELECT id, nome, sobrenome, login, hierarquia, intropage FROM usuarios";
$resultsel = $connect->query($selecao);
if ($resultsel->num_rows > 0) {
 // output data of each row
 while($row = $resultsel->fetch_assoc()) {
?>

			<section class="linhatabela">
				<section class="colunab" id="nomecompdois"><?=$row["nome"]. "  " .  $row["sobrenome"]?></section>
				<section class="colunab" id="tipouserdois">
					<?php if ($row["hierarquia"] == 0){$hierar = "Utilizador Padrão";} else {$hierar = "Administrador";}
					?> <?=$hierar?></section>
				<section class="colunab" id="logindois"><?=$row["login"]?></section>

				<section class="colunab" id="pginicialdois"><input id="modificaruser" name="testeee" value="modificar" onclick="divmodificarusertable('<?=$row['id']?>', '<?=$row['nome']?>', '<?=$row['sobrenome']?>', '<?=$row['login']?>', '<?=$row['hierarquia']?>', '<?=$row['intropage']?>')" type="button"></section>
		
			</section>

	
	<?php
}
echo "</section>";
} else { echo "0 results"; }
$connect->close();
?>






<section class="modusertot" id="voltaraonormalumdois" /*onclick="voltar()"*/>
	<section class="moduserbox" id="voltaraonormaldoisdois">
		<section class="inner" id="voltaraonormaldoistres">

			<section class="botaofecharjanela">
				<img src="icons8-close-window-52.png" width="30px" alt="close" class="botfecharimg"  
				onclick="javascript:fecharaspropri()">
			</section>

			<section class="boxletras">
				<section class="nomerece" id="vamolaave">
					
				</section>
				<form   action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
				<section class="nomesorece" id="vamolaavedois">
					<input type="text" name="nomedohome" id="nomedohome" placeholder="nome" /*value="nomereceffff"*/>
				</section>

				<section class="nomesorece" id="vamolaavedois">
					<input type="text" name="sobredohome" id="sobredohome" placeholder="sobrenome" /*value="nomereceffff"*/>
				</section>

				<section class="nomesorece" id="vamolaavedois">
					<input type="text" name="logindohome" id="logindohome" placeholder="login" /*value="nomereceffff"*/>
				</section>

				<section class="nomesoreceq" id="vamolaavedois">
					<a class="baza">
 					<input type="radio" id="radioum" name="tipodome" value="admin"> Administrador &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 					<input type="radio" id="radiodois" name="tipodome" value="padrao"> Utilizador Padrão</a>
				</section>
				
				<section class="nomesorece" id="vamolaavedois">
					<a class="baza"><input type="checkbox" id="pgintrocheck" name="intropagecheck" value="intropagecheck"> Página Inicial</a>
				</section>


				<section class="nomesorecetreis" id="vamolaavedois">
					<button type="submit" id="login" name="repor" onmouseover="this.id='loginover'" onmouseout="this.id='login'">Submeter</button>
					<button type="submit" id="passbot" name="reporpass" value="Repor Password" onmouseover="this.id='passbotover'" onmouseout="this.id='passbot'">Repor Password</button>
					<button type="submit" id="apagarbot" name="btn-entrar" value="Login" onmouseover="this.id='apagarbotover'" onmouseout="this.id='apagarbot'">Apagar Utilizador</button>
				</section>
</form>

			</section>


		</section>
	</section>
</section>



<?php
// Conexão
require_once 'db_connect.php';

//error_reporting(0);

if(isset($_GET['repor'])):
	$nomedome = $_GET['nomedohome'];
	$sebredome = $_GET['sobredohome'];
	$logindome = $_GET['logindohome'];
	$tipodome = $_GET['tipodome'];
	$intropagecheck = $_GET['intropagecheck'];
	debug_to_console( $intropagecheck );

	//falta apanhar o id para ir a bd
/*
	if(empty($nomedome)):
		$nomedome = echo( $saidaum );
	endif;

	if(empty($sobredome)):
		$sobredome =  echo( $saidadois );
	endif;

	if(empty($logindome)):
		$logindome =  echo( $saidatres );
	endif;

	if(empty($tipodome)):
		$tipodome =  echo( $saidaquatro );
	endif;

	if(empty($intropagecheck)):
		$intropagecheck =  echo( $saidacinco );
	endif;

	$sqlum = "SELECT login FROM usuarios WHERE login = '$login'";
	$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
	$resultadoum = mysqli_query($connect, $sqlum);




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
*/

endif;
?>




<script>
	/*window.onload = function(){
            var hideMe = document.getElementById('voltaraonormaltres');
            document.onclick = function(e){
               if(e.target.id !== 'voltaraonormaltres'){
				voltaraonormaltres	.style.display = 'none';
               }
            };
	};*/
	function ficar(){
		document.getElementById('voltaraonormal').id = 'voltaraonormal';
		document.getElementById('voltaraonormaldois').id = 'voltaraonormaldois';
		document.getElementById('voltaraonormaltres').id = 'voltaraonormaltres';
	}
	function voltar(){
		document.getElementById('voltaraonormal').id = 'voltaraonormalumdois';
		document.getElementById('voltaraonormaldois').id = 'voltaraonormaldoisdois';
		document.getElementById('voltaraonormaltres').id = 'voltaraonormaldoistres';
	}
	function divmodificarusertable(id, nome, sobrenome, login, hierarquia, intropage){
		/*console.log(id+" - "+nome+" - "+sobrenome+" - "+login+" - "+hierarquia+" - "+intropage);*/
		var varid = id;
		var varnome = nome;
		var varsobre = sobrenome;
		var varlogin = login;
		var varhierarquia = hierarquia;
		var varintro = intropage;

		document.getElementById('vamolaave').innerHTML = varnome+" "+varsobre;
		/*console.log(varid);
		console.log(varnome);
		console.log(varsobre);
		console.log(varlogin);
		console.log(varhierarquia);
		console.log(varintro);*/
		document.getElementById('voltaraonormalumdois').id = 'voltaraonormal';
		document.getElementById('voltaraonormaldoisdois').id = 'voltaraonormaldois';
		document.getElementById('voltaraonormaldoistres').id = 'voltaraonormaltres';
  		/*document.getElementById("voltaraonormaltres").style.display = "block";*/
		 /*
		  var obj = document.querySelector('.inner').id;
		  console.log(obj);
		  if (obj == voltaraonormaltres){
			  document.onclick = function(eee){
				  if(eee.target.id !== 'voltaraonormaltres'){
					voltaraonormaltres	.style.display = 'none';
				  }
			  }
			}*/
			
			document.getElementById("nomedohome").placeholder = "Nome: "+nome; 
			document.getElementById("nomedohome").value = nome; 
			document.getElementById("sobredohome").placeholder = "Sobrenome: "+sobrenome;
			document.getElementById("sobredohome").value = sobrenome; 
			document.getElementById("logindohome").placeholder = "Login: "+login;
			document.getElementById("logindohome").value = login; 


			if (varhierarquia == 0){
				document.getElementById("radiodois").checked = true;
			}else{
				document.getElementById("radioum").checked = true;
			}

			
			if (varintro == 0){
				document.getElementById("pgintrocheck").checked = false;
			}else{
				document.getElementById("pgintrocheck").checked = true;
			}
	}
	
	
	
	
	/*
	window.onload = function(){
		var obj = document.querySelector('.inner').id;
		  console.log(obj);
		  if (obj == voltaraonormaltres){
			  document.onclick = function(eee){
				  if(eee.target.id !== 'voltaraonormaltres'){
					voltaraonormaltres	.style.display = 'none';
				  }
			  }
		  }
	};*/
	function fecharaspropri(){
		document.getElementById('voltaraonormal').id = 'voltaraonormalumdois';
		document.getElementById('voltaraonormaldois').id = 'voltaraonormaldoisdois';
		document.getElementById('voltaraonormaltres').id = 'voltaraonormaldoistres';

	}
</script>



</div>
<!--     FIM DIV LISTA USERS --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--     DIV CRIAR USERS ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div id="criarusers">
<section class="titlistausers">
		Criar Utilizador
	</section>
	<section class="txtlistausers">
		<p>Bem-vindo à base de criação de utilizadores da plantaforma!
		Aqui pode criar utilizadores para que possam ter acesso à SmartConnect.</p>
		<p>Comece por inserir o nome e os outros tópicos do formulário, após esse passo, carregue no botão enviar.</p>
	</section> 
	<section class="conteudocriaruser">
		<section class="caixaumcriar">
			<input type="text" name="nomedohome" id="nomedohome" placeholder="Nome" /*value="nomereceffff"*/>
			
		</section>
		<section class="caixaumcriar">
			<input type="text" name="nomedohome" id="nomedohome" placeholder="Sobrenome" /*value="nomereceffff"*/>
			
		</section>
		<section class="caixaumcriar">
			<input type="text" name="nomedohome" id="nomedohome" placeholder="Login" /*value="nomereceffff"*/>
			
		</section>
		<section class="caixaumcriar">
			<input type="password" name="nomedohome" id="nomedohome" placeholder="Password" /*value="nomereceffff"*/>
			
		</section>
		
		<section class="caixadoiscriar">
		<a class="bazacriar">
 					<input type="radio" id="radioum" name="tipodome" value="admin"> Administrador &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 					<input type="radio" id="radiodois" name="tipodome" value="padrao"> Utilizador Padrão</a>
		</section>	


		<section class="caixadoiscriar">
				<button type="submit" id="loginq" name="repor" onmouseover="this.id='loginqover'" onmouseout="this.id='loginq'">Submeter</button>
		</section>
	<section>

















</div>
<!--     FIM DIV criiar USERS --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--     DIV modificar USERS ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="modificarusers">
	modificar users
</div>

<!--     FIM DIV modificar USERS --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--     DIV zonas de controlo ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="zonasdecontrolo">
	zonas de controlo
</div>
<!--     FIM DIV zonas de controlo --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

		</div>
  </body>
</html>
