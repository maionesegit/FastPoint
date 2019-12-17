<!DOCTYPE html>
<?php
	session_start();
	function console_log( $data ){
		echo '<script>';
		echo 'console.log('. json_encode( $data ) .')';
		echo '</script>';
	}
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/materialize.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
		<title>Fast Point</title>
	</head>
	<body class="background grey darken-4">
		<nav class="nav-extended">
			<div class="nav-wrapper green">
				<a href="index.php?link=8" class="logo"><img src="img/logo.png" style='height: 4vh;'></a>
				<a class="sidenav-trigger" href='' data-target='mobNav'><i class='material-icons'>menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href='index.php?link=8'>Home</a></li>
					<li><a href='index.php?link=4' id='btnCadPc'>Cadastre-se</a></li>
					<li><a href="index.php?link=5" id='btnSairPc' class='hide'>Sair</a></li>
					<li><a id="btnPerfil" class="dropdown-trigger hide" data-constrainWidth="false" href="#!" data-target="cliente">Meu Perfil<i class="material-icons right">arrow_drop_down</i></a></li>
				</ul>
			</div>
		</nav>
		
		<div id="cliente" class="card dropdown-content" data-constrainWidth="false">
			<div class="card-image waves-effect  waves-light" style="width:200px;">
			  <img class="activator" src="img/vb.png" >
			</div>
			<div class="card-content green">
				<p style="padding: 0 15px"> RM: <span id="rmCli"><?=$_SESSION['rmCli']?></span></p>
				<a href="index.php?link=5"> Sair </a>
			</div>
		</div>
		
		<!-- Navbar Lateral para mobile -->
		<ul class='sidenav grey darken-4' id='mobNav'>
			<div id="cliente" class="card">
				<div class="card-image waves-effect  waves-light" style="width:200px;">
				  <img class="activator" src="img/vb.png" >
				</div>
				<div class="card-content green margi'n-left:200px">
				  <p> Cred: <?php var_dump($_SESSION['rmcli']) ?><br>
				  <a href="index.php?link=5"class="white-text"> Sair </a></p>
				</div>
			</div>
			<li><a href='index.php?link=8'><span class="white-text">Home</span></a></li>
			<li><a href="index.php?link=4" id='btnCadNav'><span class="white-text">Cadastre-se</span></a></li>
			<li><a href='index.php?link=5' id='btnSairNav' class='hide'><span class='white-text'>Sair</span></a></li>
		</ul>
		<!-- Fim da Navbar -->

		<div class='container' style="padding: 20px 0;">
			<!-- Declaração de conteúdo -->
			<?php
				$link = @$_GET['link'];
				$url[1] = 'telaInicial.php';
				
				$url[3] = 'login.php';
				$url[4] = 'cadConta.php';
				$url[5] = 'sair.php';
				$url[6] = 'telaCliente.php';
				$url[7] = 'loginEmp.php';
				$url[8] = 'home.php';
				$url[9] = 'telaEmpresa.php';
				$url[10] = 'listaProdutos.php';
				$url[11] = 'cadProduto.php';
				$url[12] = 'delProduto.php';
				$url[13] = 'cadProd.php';
				$url[14] = 'editProd.php';
				$url[15] = 'listaClientes.php';
				$url[16] = 'credCliEmp.php';
				$url[18] = 'pedidoCli.php';
				$url[19] = 'realizarPedido.php';
				$url[20] = 'entregarPedido.php';
				
				if(!empty($link)){
					if(file_exists($url[$link])){
						include $url[$link];
					}
				} else {
					trim(include 'telaInicial.php');
				}
			?>
			<!-- Fim da Declaração de conteúdo -->
		</div>
		
		<footer class='page-footer green'>
			<div class='container'>
				<div class='row'>
					<div class='col s12 m12 l6'>
						<h5 class='white-text'>FastPoint</h5>
						<p class='grey-text text-lighten-4'>Agilize seu refeitório. A fome não espera!</p>
					</div>
					<div class='col s12 l4 offset-12 hide-on-med-and-down'>
						<h5 class='white-text'>Navegue</h5>
						<p>
						  <div class="col"><a class="grey-text text-lighten-3" href="index.php?link=1">Home</a></div>
						  <div class="col"><a class="grey-text text-lighten-3" href="#!">Produtos</a></div>
						  <div class="col"><a class="grey-text text-lighten-3" href="#!">Contato</a></div>
						</p>			
					</div>
				</div>
			</div>
			<div class='footer-copyright'>
				<div class='container' style="line-height: 35px">
					©2019 Copyright - Alunos da ETEC Pedro Badran
					<a class="right hide-on-med-and-down" rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Licença Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png"/></a>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src='js/jquery-3.3.1.js'></script>
		<script type="text/javascript" src='js/materialize.js'></script>
		<script type="text/javascript" src="js/index.js"></script>
		<?php
			//Botão de Logout
			if(isset($_SESSION['rmCli'])||isset($_SESSION['codEtec'])){
				echo "<script>
						$('#btnSairPc').removeClass('hide');
						$('#btnSairNav').removeClass('hide');
						$('#btnLogin').addClass('hide');
						$('#btnCadNav').addClass('hide');
						$('#btnCadPc').addClass('hide');
						$('#btnLoginEmp').addClass('hide');
					</script>";
			}
			if(isset($_SESSION['rmCli'])){
				echo "<script>
						$('#btnPerfil').removeClass('hide');
					</script>";
			} else {				
				echo "<script>
						$('#btnPerfil').addClass('hide');
					</script>";
			}
		?>
	</body>
</html>