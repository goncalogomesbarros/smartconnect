<?php
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
	echo $js_code;
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
    <link rel="stylesheet" type="text/css" href="pagaberta.css">
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
    			Acerca do Projeto
    		</div>
    		<div class="menubotaonav">
    			

				<img src="bibliografiaum.png" onclick="funcaobibliografia()" id="bibliografiaimgid" width="20px" height="auto" alt="Italian Trulli">
    			<a onclick="funcaobibliografia()" id="bibliografiatextid">&nbsp;&nbsp; Biografia</a>

    		</div>
    		<div class="menubotaonav">
    			

				<img src="papum.png" onclick="funcaopap()" id="papimgid" width="20px" height="auto" alt="Italian Trulli">
    			<a onclick="funcaopap()" id="paptextid">&nbsp;&nbsp; PAP</a>

    		</div>
    		<div class="menubotaonav">
    			

				<img src="relatorioum.png" onclick="funcaorelatorio()" id="relatorioimgid" width="20px" height="auto" alt="Italian Trulli">
    			<a onclick="funcaorelatorio()" id="relatoriotextid">&nbsp;&nbsp; Relatório</a>

    		</div>
    		<div class="menubotaonav">
    			

				<img src="codeum.png" onclick="funcaoprogramacao()" id="programacaoimgid" width="20px" height="auto" alt="Italian Trulli">
    			<a onclick="funcaoprogramacao()" id="programacaotextid">&nbsp;&nbsp; Programação</a>

    		</div>
    		<div class="menubotaonav">
    			

				<img src="schoolum.png" onclick="funcaoescola()" id="escolaimgid" width="20px" height="auto" alt="Italian Trulli">
    			<a onclick="funcaoescola()" id="escolatextid">&nbsp;&nbsp; Escola</a>

    		</div>
    		<div class="menubotaonav">
    			

				<img src="portugalum.png" onclick="funcaoansiao()" id="ansiaoimgid" width="20px" height="auto" alt="Italian Trulli">
    			<a onclick="funcaoansiao()" id="ansiaotextid">&nbsp;&nbsp; Ansião</a>

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

	
		<div class="conteudoprincipal" style="position:relative; left:232px">
			&nbsp;
		
<!--        corpo DIV HOME PAGE----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="homepage" class="dia">

<section class="titqwert">
		Bem-Vindo <?php echo $dados['nome']; ?>!
	</section>
	<section class="txtlistausers">
		<p>Bem-vindo à plataforma SmartConnect! </p><p>Aqui consegue controlar todos os sensores de movimento, sensores de temperatura,
			 alarme e luzes da sua casa!
		</p>
		<p>Sente-se, relaxe e desfrute de toda a automação que tem ao seu dispor!</p>
	</section> 






<section class="caixaa">
	<section class="titaaa">
		Controle as suas luzes!
	</section>
	<section class="boardluzes">
		<section class="luxlig">
			<span>Quarto Principal<span>     <!--por configurar php-->
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
	</section>
</section>



<section class="tempcx">
<section class="titbbbb">
	A sua temperatura:
</section>
	<section class="boardtemp">
		<section class="atem">A temperatura da sua casa neste momento está a:<br></section>

		<section class="tempumaa">
			20ºC
		</section>
	</section>

</section>



<section class="tempcx">
<section class="titbbbb">
	Deteção de Pessoas:
</section>
	<section class="boardtemp">
		<section class="atem"><br></section>

		<section class="detet">
			<span><img src="sensorpng.png" id="sensorpngid" alt="" width="150px"></span>
		</section>

<section class="txtdetet">
			O sensor de aproximação humana consegue fazer com que o sistema de alarme 
			seja ativado em caso de assalto. Com o seu uso consegue tambem com que 
			visione de hexiste movimento na area capturada pelo mesmo.
		<BR><BR>
			A figura do lado esquerdo representa se hexiste movimento humano, 
			se o fundo estiver verde é porque não se deteta movimento, se o mesmo estiver 
			vermelho é porque foi deetado.
</section>
	</section>

</section>




<section class="tempcx">
<section class="titbbbb">
	Sistema de Alarme:
</section>
	<section class="boardtemp">
		<section class="atem"><br></section>

		<section class="deteta">
			<span><img src="alarmepng.png" id="alarmepngid" alt="" width="150px"></span>
		</section>

<section class="txtdetet">
			O sistema de alarme permite que tranquilize enquanto está fora. 
			Se estiver ativado, em caso de movimento detetado o temporizador será ativado por 40 segundos,
			se ao fim desse tempo o sistema de alarme não for desativado a sirene será disparada.
			<br><br>
			No caso de o sistema de alarme estar desativado, pode ser ativado a qualquer momento.
	</section>

</section>




























</div>
<!--     FIM DIV HOME PAGE --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--        corpo DISPOSITIVOS----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="dispositivosdiv" class="dia">

<section class="titlistausers">
	Dispositivos
</section>
</div>
<!--     FIM DIV DISPOSITIVOS --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--        corpo DIV LUZES----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="luzesdiv" class="dia">
	
<section class="titqwert">
		Bem-Vindo <?php echo $dados['nome']; ?>!
	</section>
	<section class="txtlistausers">
		<p>Bem-vindo à plataforma SmartConnect! </p><p>Aqui consegue controlar todos os sensores de movimento, sensores de temperatura,
			 alarme e luzes da sua casa!
		</p>
		<p>Sente-se, relaxe e desfrute de toda a automação que tem ao seu dispor!</p>
	</section> 






<section class="caixaa">
	<section class="titaaa">
		Controle as suas luzes!
	</section>
	<section class="boardluzes">
		<section class="luxlig">
			<span>Quarto Principal<span>     <!--por configurar php-->
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
		
		<section class="luxlig">
			<span>Quarto Principal<span>
		</section>
	</section>
</section>
</div>
<!--     FIM DIV LUZES --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--        corpo DIV SENSORES----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="sensoresdiv" class="dia">
	

<section class="tempcx">
<section class="titbbbb">
	A sua temperatura:
</section>
	<section class="boardtemp">
		<section class="atem">A temperatura da sua casa neste momento está a:<br></section>

		<section class="tempumaa">
			20ºC
		</section>
	</section>

</section>



<section class="tempcx">
<section class="titbbbb">
	Deteção de Pessoas:
</section>
	<section class="boardtemp">
		<section class="atem"><br></section>

		<section class="detet">
			<span><img src="sensorpng.png" id="sensorpngid" alt="" width="150px"></span>
		</section>

<section class="txtdetet">
			O sensor de aproximação humana consegue fazer com que o sistema de alarme 
			seja ativado em caso de assalto. Com o seu uso consegue tambem com que 
			visione de hexiste movimento na area capturada pelo mesmo.
		<BR><BR>
			A figura do lado esquerdo representa se hexiste movimento humano, 
			se o fundo estiver verde é porque não se deteta movimento, se o mesmo estiver 
			vermelho é porque foi deetado.
</section>
	</section>

</section>
</div>
<!--     FIM DIV SENSORES --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--        corpo DIV ALARME----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="alarmediv" class="dia">
	

<section class="tempcx">
<section class="titbbbb">
	Sistema de Alarme:
</section>
	<section class="boardtemp">
		<section class="atem"><br></section>

		<section class="deteta">
			<span><img src="alarmepng.png" id="alarmepngid" alt="" width="150px"></span>
		</section>

<section class="txtdetet">
			O sistema de alarme permite que tranquilize enquanto está fora. 
			Se estiver ativado, em caso de movimento detetado o temporizador será ativado por 40 segundos,
			se ao fim desse tempo o sistema de alarme não for desativado a sirene será disparada.
			<br><br>
			No caso de o sistema de alarme estar desativado, pode ser ativado a qualquer momento.
	</section>

</section>


</div>
<!--     FIM DIV ALARME --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--        corpo DIV CAMARAS----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="camarasdiv" class="dia">
	camaras
</div>
<!--     FIM DIV CAMARAS --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--        corpo DIV LISTA usuarios----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="listausers" class="dia">


<!--
</?php
		// Conexão
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "smartconnect";
		
		$connectqq = mysqli_connect($servername, $username, $password, $db_name);
		
		if(mysqli_connect_error()):
			echo "Falha na conexão: ".mysqli_connect_error();
		endif;


// Verificação
if(!isset($_SESSION['logado'])):
	header('Location: index.php');
endif;
	





	$idqq = $_SESSION['id_usuario'];
	$sqlqq = "SELECT * FROM usuarios WHERE id = $idqq";
/* 
	$vamola = $connect->query($sqlqq);*/
	
	$resultadoqq = mysqli_query($connectqq, $sqlqq);
	$dadosqq = mysqli_fetch_array($resultadoqq);
	/*mysqli_close($connect);*/
	$loleqq = $dadosqq['hierarquia'];
	/*$inteiro = intval($dados);*/
 
	$inteiroqq = intval($loleqq);

	/*echo $inteiro;*/

	if  ($inteiroqq == 1){?>
		ksksksks
	</?php}else{?>
		ksss
	</?php}?>


	
	-->



<!--  sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss-->








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

$selecao = "SELECT * FROM usuarios";
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
				<input type="hidden" id="oculto" name="id"></input>
				<section class="nomesorece" id="vamolaavedois">
					<input type="text" name="nomedohome" id="nomedohome" placeholder="nome" required /*value="nomereceffff"*/>
				</section>

				<section class="nomesorece" id="vamolaavedois">
					<input type="text" name="sobredohome" id="sobredohome" placeholder="sobrenome" required  /*value="nomereceffff"*/>
				</section>

				<section class="nomesorece" id="vamolaavedois">
					<input type="text" name="logindohome" id="logindohome" placeholder="login" required  /*value="nomereceffff"*/>
				</section>

				<section class="nomesoreceq" id="vamolaavedois">
					<a class="baza">
 					<input type="radio" id="radioum" name="tipodome" value="1"> Administrador &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 					<input type="radio" id="radiodois" name="tipodome" value="0"> Utilizador Padrão</a>
				</section>
				
				<section class="nomesorece" id="vamolaavedois">
				<input type="hidden" name="intropagecheck" value="off" />
					<a class="baza"><input type="checkbox" id="pgintrocheck" name="intropagecheck"> Página Inicial</a>
				</section>


				<section class="nomesorecetreis" id="vamolaavedois">
					<button type="submit" id="login" name="repor" onmouseover="this.id='loginover'" onmouseout="this.id='login'">Submeter</button>
					<button type="submit" id="passbot" name="reporpass" value="reporpas" onmouseover="this.id='passbotover'"   onmouseout="this.id='passbot'">Repor Password</button>
					<button type="submit" id="apagarbot" name="apagaruserui" value="Login" onmouseover="this.id='apagarbotover'" onmouseout="this.id='apagarbot'">Apagar Utilizador</button>
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

if(isset($_GET['reporpass'])):
	$idreporpass = $_GET['id'];
	$passbase = "123456";
	$passnova = MD5($passbase);


/*
	$sqlupdt= "UPDATE usuarios SET nome='$nomedome', sobrenome='$sebredome', login='$logindome',
	hierarquia='$tipodome', intropage='$intropagecheckdois' WHERE id=$iddogajo";

	$resultadouma = mysqli_query($connect, $sqlupdt);
*/


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwqpi = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwqpi = "UPDATE usuarios SET senha='$passnova' WHERE id=$idreporpass";
$resultselwwqpi = $connectwwqpi->query($selecaowwqpi);
 



endif;
?>


<?php
// Conexão
require_once 'db_connect.php';

//error_reporting(0);

if(isset($_GET['apagaruserui'])):
	$idreporpass = $_GET['id'];




// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwqpiq = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwqpiq = "DELETE FROM `usuarios` WHERE id=$idreporpass";
$resultselwwqpiq = $connectwwqpiq->query($selecaowwqpiq);
 



endif;
?>



<?php
// Conexão
require_once 'db_connect.php';

//error_reporting(0);

if(isset($_GET['repor'])):
	$iddogajo = $_GET['id'];
	$nomedome = $_GET['nomedohome'];
	$sebredome = $_GET['sobredohome'];
	$logindome = $_GET['logindohome'];
	$tipodome = $_GET['tipodome'];
	$intropagecheck = $_GET['intropagecheck'];
	if ($intropagecheck == "on") {
		$intropagecheckdois = 1;
	}else{
		$intropagecheckdois = 0;
	}
	/*debug_to_console( $intropagecheck );*/


/*
	$sqlupdt= "UPDATE usuarios SET nome='$nomedome', sobrenome='$sebredome', login='$logindome',
	hierarquia='$tipodome', intropage='$intropagecheckdois' WHERE id=$iddogajo";

	$resultadouma = mysqli_query($connect, $sqlupdt);
*/


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwq = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwq = "UPDATE usuarios SET nome='$nomedome', sobrenome='$sebredome', login='$logindome',
hierarquia='$tipodome', intropage='$intropagecheckdois' WHERE id=$iddogajo";
$resultselwwq = $connectwwq->query($selecaowwq);
 




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
			document.getElementById("oculto").value = varid; 


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

<div id="criarusers" class="dia">
<section class="titlistausers">
		Criar Utilizador
	</section>
	<section class="txtlistausers">
		<p>Bem-vindo à base de criação de utilizadores da plantaforma!
		Aqui pode criar utilizadores para que possam ter acesso à SmartConnect.</p>
		<p>Comece por inserir o nome e os outros tópicos do formulário, após esse passo, carregue no botão enviar.</p>
	</section> 


	<section class="conteudocriaruser"><form method="get">
		<section class="caixaumcriar">
			<input type="text" name="nomedohomenovo" id="nomedohomenovo" required placeholder="Nome" /*value="nomereceffff"*/>
			
		</section>
		<section class="caixaumcriar">
			<input type="text" name="sobredohomenovo" id="sobredohomenovo" required placeholder="Sobrenome" /*value="nomereceffff"*/>
			
		</section>
		<section class="caixaumcriar">
			<input type="text" name="logindohomenovo" id="logindohomenovo" required placeholder="Login" /*value="nomereceffff"*/>
			
		</section>
		<section class="caixaumcriar">
			<input type="password" name="passdohomenovo" id="passdohomenovo" required placeholder="Password" /*value="nomereceffff"*/>
			
		</section>
		
		<section class="caixadoiscriar">
		<a class="bazacriar">
 					<input type="radio" id="radioum" name="tipodomennovo" value="1"> Administrador &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 					<input type="radio" id="radiodois" name="tipodomennovo" value="0" checked="checked"> Utilizador Padrão</a>
		</section>	


		<section class="caixadoiscriar">
				<button type="submit" id="loginq" name="criarnovo" onmouseover="this.id='loginqover'" onmouseout="this.id='loginq'">Submeter</button>
		</section>
	<section>
</form>





<?php
// Conexão
require_once 'db_connect.php';

//error_reporting(0);

if(isset($_GET['criarnovo'])):
	//$iddogajo = $_GET['id'];
	$nomedomenovo = $_GET['nomedohomenovo'];
	$sebredomenovo = $_GET['sobredohomenovo'];
	$logindomenovo = $_GET['logindohomenovo'];
	$tipodomenovo = $_GET['tipodomennovo'];
	$passdomenovo = $_GET['passdohomenovo'];
	$passdomenovomd = MD5($passdomenovo);
	/*debug_to_console( $intropagecheck );*/


/*
	$sqlupdt= "UPDATE usuarios SET nome='$nomedome', sobrenome='$sebredome', login='$logindome',
	hierarquia='$tipodome', intropage='$intropagecheckdois' WHERE id=$iddogajo";

	$resultadouma = mysqli_query($connect, $sqlupdt);
*/


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwqajh = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwqajh = "INSERT INTO `usuarios`(`nome`, `sobrenome`, `hierarquia`, `login`, `senha`, `intropage`) 
VALUES ('$nomedomenovo','$sebredomenovo','$tipodomenovo','$logindomenovo','$passdomenovomd','1')";
$resultselwwqajh = $connectwwqajh->query($selecaowwqajh);
 
endif

?> 











</div>
<!--     FIM DIV criiar USERS --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--     DIV modificar USERS ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="modificarusers" class="dia">
	
<section class="titbio">Alterar Password</section>
<form method="get">
<section class="alterarpasspriv">
<section class="caixaaaa">
<input type="password" name="passnovapriv" id="nomezonainp" placeholder="Password Nova" required>
</section>
<button type="submit" id="subzonas" name="subpassnovap" onmouseover="this.id='loginover'" onmouseout="this.id='login'">Submeter</button>
</section>

</form>



<?php

// Conexão
require_once 'db_connect.php';


// Botão enviar
	if(isset($_GET['subpassnovap'])):
	$passnovap = $_GET['passnovapriv'];
	$senhanova = MD5($passnovap);
	$getvalorp = $dados['id'];


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwqaaqzz = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwqaaqzz = "UPDATE `usuarios` SET 'senha'= '$senhanova' WHERE 'id'='$getvalorp'";
$resultselwwqaaqzz = $connectwwqaaqzz->query($selecaowwqaaqzz);

endif;

?>

<section class="titbioq">Selecionar Zonas</section>
<form method="get">
<section class="boxmoduser">
	
<table style="width:90%" class="tabelazonasuse">
  <tr>
    <td>
<?php

// Check connection
require_once 'db_connect.php';


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwr = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwr = "SELECT * FROM usuarios";
$resultselwwr = $connectwwr->query($selecaowwr);
if ($resultselwwr->num_rows > 0) {?>
 


<select name="valorra">
<?php

 while($rowwwr = $resultselwwr->fetch_assoc()) {
	?>


  <option value="<?=$rowwwr["id"]?>">         <?=$rowwwr["nome"]?></option>


  <?php
}
echo "</select>";
} else { echo "0 results"; }
?></td>
    <td>
<?php

// Check connection
require_once 'db_connect.php';


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwr = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwr = "SELECT * FROM zonas";
$resultselwwr = $connectwwr->query($selecaowwr);
if ($resultselwwr->num_rows > 0) {?>
 


<select name="valorrb">
<?php

 while($rowwwr = $resultselwwr->fetch_assoc()) {
	?>


  <option value="<?=$rowwwr["id"]?>">         <?=$rowwwr["nome"]?></option>


  <?php
}
echo "</select>";
} else { echo "0 results"; }
?></td> 
    <td><button type="submit" id="subzonas" name="subzonasnq" onmouseover="this.id='loginover'" onmouseout="this.id='login'">Submeter</button></td>
  </tr>

</table>

</section>
</form>



<?php

// Conexão
require_once 'db_connect.php';


// Botão enviar
	if(isset($_GET['subzonasnq'])):
	$getvalora = $_GET['valorra'];
	$getvalorb = $_GET['valorrb'];


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwqaaq = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwqaaq = "INSERT INTO `userszonas`(`iduser`, `idzona`) VALUES ($getvalora,$getvalorb)";
$resultselwwqaaq = $connectwwqaaq->query($selecaowwqaaq);

endif;

?>


<section class="titbioss">Apagar Zona de Utilizador</section>
<form method="get">
<section class="quarenta">

<?php

// Check connection
require_once 'db_connect.php';


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwr = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwr = "SELECT * FROM usuarios";
$resultselwwr = $connectwwr->query($selecaowwr);
if ($resultselwwr->num_rows > 0) {?>
 


<select name="valorrc">
<?php

 while($rowwwr = $resultselwwr->fetch_assoc()) {
	?>


  <option value="<?=$rowwwr["id"]?>">         <?=$rowwwr["nome"]?></option>


  <?php
}
echo "</select>";
} else { echo "0 results"; }
?>
</section>

<section class="quarenta">
<button type="submit" id="apagarbot" name="apagarzonauserx" value="apagarzona" onmouseover="this.id='apagarbotover'" onmouseout="this.id='apagarbot'">Apagar Zona de Utilizador</button>
</section>

</form>
<?php

// Conexão
require_once 'db_connect.php';


// Botão enviar
	if(isset($_GET['apagarzonauserx'])):
	$getvalorc = $_GET['valorrc'];


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwqaaqc = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwqaaqc = "DELETE FROM `userszonas` WHERE 'iduser' = '$getvalorc'";
$resultselwwqaaqc = $connectwwqaaqc->query($selecaowwqaaqc);

endif;

?>


</div>
<!--     FIM DIV modificar USERS --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--     DIV zonas de controlo ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="zonasdecontrolo" class="dia">
	
<section class="titbio">Zonas de Controlo</section>





<section class="zonasmaxdiv">

		<?php

// Check connection
require_once 'db_connect.php';


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectww = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaoww = "SELECT * FROM zonas";
$resultselww = $connectww->query($selecaoww);
if ($resultselww->num_rows > 0) {?>
 


 <section class="tabelalistausers">
 <br>
 <section class="linhatabhead">
	 <section class="colunaa" id="nomezona">Nome da Zona</section>
	 
	 <section class="colunaa" id="qum">Q1</section>
	 <section class="colunaa" id="qdois">Q2</section>
	 <section class="colunaa" id="qtres">Q3</section>
	 <section class="colunaa" id="qquatro">Q4</section>

	 <section class="colunaa" id="saladeestar">Sala de Estar</section>
	 <section class="colunaa" id="saladejantar">Sala de Jantar</section>
	 <section class="colunaa" id="cozinha">Cozinha</section>
	 <section class="colunaa" id="hall">Hall</section>
	 
	 <section class="colunaa" id="saladearmas">Sala de Armas</section>
	 <section class="colunaa" id="escritorio">Escritório</section>
	 <section class="colunaa" id="roupeiro">Roupeiro</section>
	 <section class="colunaa" id="wc">wc</section>
 </section>
<?php

 while($rowww = $resultselww->fetch_assoc()) {
	?>

			<section class="linhatabela">
	 <section class="colunad" id="nomezona"><?=$rowww["nome"]?></section>
	 
	 <section class="colunad" id="qum">
		 <?php if ($rowww["q1"] == "1"){$qumaf = "On";} else {$qumaf = "Off";}
					?> <?=$qumaf?>
	 </section>
	 <section class="colunad" id="qdois">
		 <?php if ($rowww["q2"] == "1"){$qdoisaf = "On";} else {$qdoisaf = "Off";}
					?> <?=$qdoisaf?>

		<!--
		 </?php if ($rowww["hierarquia"] == 0){$hierar = "Utilizador Padrão";} else {$hierar = "Administrador";}
					?> </?=$hierar?>-->



	 </section>
	 <section class="colunad" id="qtres">
		 <?php if ($rowww["q3"] == 0){$qtresaf = "Off";} else {$qtresaf = "On";}
					?> <?=$qtresaf?>
	 </section>
	 <section class="colunad" id="qquatro">
		 <?php if ($rowww["q4"] == 0){$qquatroaf = "Off";} else {$qquatroaf = "On";}
					?> <?=$qquatroaf?>
	 </section>

	 <section class="colunad" id="saladeestar">
		 <?php if ($rowww["salaestar"] == 0){$qquatroaf = "Off";} else {$qquatroaf = "On";}
					?> <?=$qquatroaf?>
	 </section>
	 <section class="colunad" id="saladejantar">
		 <?php if($rowww["salajantar"] == 0){echo "Off";}else{echo "On";}?>
	 </section>
	 <section class="colunad" id="cozinha">
		 <?php if($rowww["cozinha"] == 0){echo "Off";}else{echo "On";}?>
	 </section>
	 <section class="colunad" id="hall">
		 <?php if($rowww["hall"] == 0){echo "Off";}else{echo "On";}?>
	 </section>
	 
	 <section class="colunad" id="saladearmas">
	 	<?php if($rowww["salaarmas"] == 0){echo "Off";}else{echo "On";}?>
	 </section>
	 <section class="colunad" id="escritorio">
	 	<?php if($rowww["escritorio"] == 0){echo "Off";}else{echo "On";}?>
	 </section>
	 <section class="colunad" id="roupeiro">
		 <?php if($rowww["roupeiro"] == 0){echo "Off";}else{echo "On";}?>
	 </section>
	 <section class="colunad" id="wc">
	 	<?php if($rowww["wc"] == 0){echo "Off";}else{echo "On";}?>
	 </section>
			</section>

	
	<?php
}
echo "</section>";
} else { echo "0 results"; }
?>

</section>

<section class="titbio">Criar Zona de Controlo</section>
<section class="criarzonadecontrolo">
	<form method="get">
		<input type="hidden" name="q1check" value="0"/>
		<input type="hidden" name="q2check" value="0"/>
		<input type="hidden" name="q3check" value="0"/>
		<input type="hidden" name="q4check" value="0"/>
		<input type="hidden" name="salajantarcheck" value="0"/>
		<input type="hidden" name="salaestarcheck" value="0"/>
		<input type="hidden" name="cozinhacheck" value="0"/>
		<input type="hidden" name="hallcheck" value="0"/>
		<input type="hidden" name="wccheck" value="0"/>
		<input type="hidden" name="roupeirocheck" value="0"/>
		<input type="hidden" name="escritoriocheck" value="0"/>
		<input type="hidden" name="salaarmascheck" value="0"/>
	<section>
	<table class="tabelacriarzona" >
  <tr>
    <td colspan="2"><input type="text" name="nomezonanv" id="nomezonainp" placeholder="Nome da Zona" required></td>
  </tr>
  <tr>
    <td><input type="checkbox" id="pgintrocheck" name="q1check" value="1"></td>
    <td>Quarto Principal</td>
  </tr>
  <tr>
    <td><input type="checkbox" id="pgintrocheck" name="q2check" value="1"></td>
    <td>Quarto André</td>
  </tr>
  <tr>
    <td><input type="checkbox" id="pgintrocheck" name="q3check" value="1"></td>
    <td>Quarto Diana</td>
  </tr>
    <td><input type="checkbox" id="pgintrocheck" name="q4check" value="1"></td>
    <td>Quarto Hospedes</td>
  </tr>
    <td><input type="checkbox" id="pgintrocheck" name="salajantarcheck" value="1"></td>
    <td>Sala de Jantar</td>
  </tr>
    <td><input type="checkbox" id="pgintrocheck" name="salaestarcheck" value="1"></td>
    <td>Sala de Estar</td>
  </tr>
    <td><input type="checkbox" id="pgintrocheck" name="cozinhacheck" value="1"></td>
    <td>Cozinha</td>
  </tr>
    <td><input type="checkbox" id="pgintrocheck" name="hallcheck" value="1"></td>
    <td>Hall</td>
  </tr>
    <td><input type="checkbox" id="pgintrocheck" name="wccheck" value="1"></td>
    <td>WC</td>
  </tr>
    <td><input type="checkbox" id="pgintrocheck" name="roupeirocheck" value="1"></td>
    <td>Roupeiro</td>
  </tr>
    <td><input type="checkbox" id="pgintrocheck" name="escritoriocheck" value="1"></td>
    <td>Escritório</td>
  </tr>
    <td><input type="checkbox" id="pgintrocheck" name="salaarmascheck" value="1"></td>
    <td>Sala de Armas</td>
  </tr>
  <tr>
    <td colspan="2"><button type="submit" id="subzonas" name="subzonasn" onmouseover="this.id='loginover'" onmouseout="this.id='login'">Submeter</button></td></form>
  </tr>
</table>
	</section>
	<?php
// Conexão
require_once 'db_connect.php';


// Botão enviar
	if(isset($_GET['subzonasn'])):
	$nomezonanva = $_GET['nomezonanv'];
	$q1zonanv =  $_GET['q1check'];
	$q2zonanv =  $_GET['q2check'];
	$q3zonanv =  $_GET['q3check'];
	$q4zonanv =  $_GET['q4check'];
	$salajantarzonanv =  $_GET['salajantarcheck'];
	$salaestarzonanv =  $_GET['salaestarcheck'];
	$cozinhazonanv =  $_GET['cozinhacheck'];
	$hallzonanv =  $_GET['hallcheck'];
	$wczonanv =  $_GET['wccheck'];
	$roupeirozonanv =  $_GET['roupeirocheck'];
	$escritoriozonanv =  $_GET['escritoriocheck'];
	$salaarmaszonanv =  $_GET['salaarmascheck'];


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwqaa = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwqaa = "INSERT INTO `zonas`(`nome`, `q1`, `q2`, `q3`, `q4`, `salaestar`, `salajantar`, `cozinha`, `hall`, `roupeiro`, `salaarmas`, `wc`, `escritorio`) 
VALUES ('$nomezonanva','$q1zonanv','$q2zonanv','$q3zonanv','$q4zonanv','$salaestarzonanv','$salajantarzonanv','$cozinhazonanv','$hallzonanv','$roupeirozonanv',
'$salaarmaszonanv','$wczonanv','$escritoriozonanv')";
$resultselwwqaa = $connectwwqaa->query($selecaowwqaa);

endif;

?>
</section>
<section class="apagarzona">
	
<section class="titbio">Apagar Zona de Controlo</section>


<section class="txtlistausers">
		<p>
		Aqui pode as zonas que criou para cada controlo dos utilizadores.</p>
		<p>Basta selecionar e apagar!.</p>
	</section> 


<section class="listazonasss">
<section class="bloko">


<form method="get">

<?php

// Check connection
require_once 'db_connect.php';


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwr = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwr = "SELECT * FROM zonas";
$resultselwwr = $connectwwr->query($selecaowwr);
if ($resultselwwr->num_rows > 0) {?>
 


<select name="valorr">
<?php

 while($rowwwr = $resultselwwr->fetch_assoc()) {
	?>


  <option value="<?=$rowwwr["id"]?>">         <?=$rowwwr["nome"]?></option>


  <?php
}
echo "</select>";
} else { echo "0 results"; }
?>


</section>
<section class="aplicarzona">
<button type="submit" id="apagarbot" name="apagarzonex" value="apagarzona" onmouseover="this.id='apagarbotover'" onmouseout="this.id='apagarbot'">Apagar Zona</button>
</section>
</section>



</form>


<?php

// Conexão
require_once 'db_connect.php';


// Botão enviar
	if(isset($_GET['apagarzonex'])):
	$getvalor = $_GET['valorr'];


// Conexão
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "smartconnect";

$connectwwqaaq = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Verificação
if(!isset($_SESSION['logado'])):
header('Location: index.php');
endif;

$selecaowwqaaq = "DELETE FROM `zonas` WHERE id=$getvalor";
$resultselwwqaaq = $connectwwqaaq->query($selecaowwqaaq);

endif;

?>









</section>

</div>
<!--     FIM DIV zonas de controlo --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->






































<!--        DIV BIOGRAFIA----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="bibliografiadiv" class="dia">
	
	<section class="titbio">
		Biografia
	</section>
	<section class="txtbio">
		<p class="pbio">Gonçalo Gomes de Barros, rapaz adolescente nascido a 24 de agosto de 2001 em Coimbra (atualmente com 17 anos), natural da freguesia de Abiul. 
			Desde cedo que aprecia a área tecnológica e o seu desenvolvimento. <br><br>

			Seu desporto, ciclismo, algo completamente fundamental na sua vida que pratica regularmente.
Seus passatempos mais comuns englobam se na programação e codificação web. Diferencia-se da maioria da sociedade pelo facto de não apreciar ver séries ou filmes constantemente. Bastante pensativo quando a vontade lhe toca fazendo-o criar filosofias aleatórias. Constitui opinião formada em política, religião ciência e factos, e, completamente acessível para uma discussão amigável sobre pensamentos e factos aleatórios.

<br><br>Gonçalo já planifica as suas ideias académicas e profissionais a algum tempo, planeia seguir em caminho a uma licenciatura de design, multimédia e programação na Universidade de Coimbra.

<br><br>Em suma, rapaz amigável e sociável, com perspetivas para os seus horizontes.

		</p>
	</section>

	<section class="imgbios">
		<img src="imgbio.jpg" width="350px" height="auto" alt="Italian Trulli">
	</section>



</div>
<!--     FIM DIV BIBLIOGRAFIA --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--        DIV PAP----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="papdiv" class="dia">
	
<section class="titbio">
		PAP
	</section>

	<section class="txtpap">
		<p class="ppap">A minha PAP é um sistema de automação e controlo da casa que se desenvolve atravéz de uma página web e controlo pelo smartphone, na qual dei o nome SmartConnect,
			no qual engloba Smart, de algo inovador, inteligente e Connect pela sua facilidade de conecção, para que possa 
			ser controlado.
			<br><br>
			Seu desporto, ciclismo, algo completamente fundamental na sua vida que pratica regularmente.
Seus passatempos mais comuns englobam se na programação e codificação web. Diferencia-se da maioria da sociedade pelo facto de não apreciar ver séries ou filmes constantemente. Bastante pensativo quando a vontade lhe toca fazendo-o criar filosofias aleatórias. Constitui opinião formada em política, religião ciência e factos, e, completamente acessível para uma discussão amigável sobre pensamentos e factos aleatórios.
<br><br>Gonçalo já planifica as suas ideias académicas e profissionais a algum tempo, planeia seguir em caminho a uma licenciatura de design, multimédia e programação na Universidade de Coimbra.
<br><br>Em suma, rapaz amigável e sociável, com perspetivas para os seus horizontes.

		</p>
	</section>
</div>
<!--     FIM DIV PAP --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--        DIV RELATORIO----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="relatoriodiv" class="dia">
	relatorio div
</div>
<!--     FIM DIV RELATORIO --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


<!--        DIV programacao----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="programacaodiv" class="dia">
	programacao div
</div>
<!--     FIM DIV programacao --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--        DIV ESCOLA----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="escoladiv" class="dia">
	escola div
</div>
<!--     FIM DIV ESCOLA --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!--        DIV ansiao----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="ansiaodiv" class="dia">
	ansiao div
</div>
<!--     FIM DIV ansiao --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->














		</div>
  </body>
</html>
