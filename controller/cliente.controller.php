<?php
require_once ('model/cliente.model.php');
require_once ('service/cliente.service.php');
require_once ('conexao/conexao.php');

if ($action == 'create') {
    $cliente = new Cliente();
    $cliente->__set('rm', $_POST['rm']);
    $cliente->__set('nome', $_POST['nome']);
    $cliente->__set('email', $_POST['email']);
    $cliente->__set('senha', $_POST['senha']);
    $cliente->__set('cred', $_POST['cred']);
    $cliente->__set('codEtec', $_POST['codEtec']);

    $conexao = new Conexao();
	$clienteService = new ClienteService($conexao, $cliente);
    $result = $clienteService->create();
	
    if ($result == true) {
        header('Location:index.php');
    } else {
        echo "NÃO FOI POSSÍVEL CRIAR REGISTRO DE CLIENTE! <br> Anote o Erro: $result";
    }
}

if ($action == 'read') {
    $cliente = new Cliente();
    $cliente->__set('rm', $_SESSION['rmCli']);

    $conexao = new Conexao;

    $clienteService = new ClienteService($conexao, $cliente);
    $cli = $clienteService->read('ler');
    $cliente = $cli[0];
}

if ($action == 'update') {
    $cliente = new Cliente();
    $cliente->__set('rm', $_POST['rm']);
    $cliente->__set('nome', $_POST['nome']);
    $cliente->__set('email', $_POST['email']);
    $cliente->__set('senha', $_POST['senha']);
    $cliente->__set('cred', $_POST['cred']);
    $cliente->__set('codEtec', $_POST['codEtec']);

    $conexao = new Conexao();

    $clienteService = new ClienteService($conexao, $cliente);
    $result = $clienteService->update();

    if ($result == true) {
        header('Location:index.php');
    } else {
        echo "NÃO FOI POSSÍVEL CRIAR REGISTRO DE CLIENTE! <br> Anote o Erro: $result";
    }
}

if ($action == 'delete') {
    $cliente = new Cliente();
    $cliente->__set('rm', $_POST['rm']);
    $cliente->__set('nome', $_POST['nome']);
    $cliente->__set('email', $_POST['email']);
    $cliente->__set('senha', $_POST['senha']);
    $cliente->__set('cred', $_POST['cred']);
    $cliente->__set('codEtec', $_POST['codEtec']);

    $conexao = new Conexao();

    $clienteService = new ClienteService($conexao, $cliente);
    $result = $clienteService->delete();

    if ($result == true) {
        header('Location:index.php');
    } else {
        echo "NÃO FOI POSSÍVEL CRIAR REGISTRO DE CLIENTE! <br> Anote o Erro: $result";
    }
}

if ($action == 'logar') {
    $cliente = new Cliente();
    $conexao = new Conexao();

    $cliente->__set('rm', $_POST['rm']);
    $cliente->__set('senha', $_POST['senha']);

    $cli = new ClienteService($conexao, $cliente);
    $result = $cli->read('logar');
	
	if($result[0]!=null) {
		$_SESSION['rmCli'] = $result[0]->rm;
		$_SESSION['senhaCli'] = $result[0]->senha;
		$_SESSION['nomeCli'] = $result[0]->nome;
		$_SESSION['emailCli'] = $result[0]->email;
		$_SESSION['credCli'] = $result[0]->cred;
		$_SESSION['codEtec'] = $result[0]->codEtec;
		
		header('Location:index.php?link=8');
	} else {
		header('Location:index.php?link=1');
	}    
}

if ($action == 'listEmp') {
    $cliente = new Cliente;
    $conexao = new Conexao;

    $cliente->__set('codEtec', $_SESSION['codEtec']);

    $clienteService = new ClienteService($conexao, $cliente);
    $clientes = $clienteService->read('listEmp');
}

if ($action == 'updateCred') {
    $cliente = new Cliente;
    $conexao = new Conexao;

    $cliente->__set('rm', $_POST['rm']);
    $cliente->__set('cred', $_POST['credAtual'] + $_POST['cred']);

    $clienteService = new ClienteService($conexao, $cliente);
    $result = $clienteService->update('updateCred');

    header('Location:index.php?link=15');
}

if ($action == 'updateCred2') {
    $cliente = new Cliente;
    $conexao = new Conexao;

    $cliente->__set('rm', $_SESSION['rmCli']);
    $cliente->__set('cred', $_POST['credRes']);

    $clienteService = new ClienteService($conexao, $cliente);
    $result = $clienteService->update('updateCred');

    header('Location:index.php?link=6');
}
?>
