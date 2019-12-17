<?php
	require_once('conexao/conexao.php');
	require_once('model/pedido.model.php');
	require_once('service/pedido.service.php');

	if ($action=='create') {
		$conexao = new Conexao;
		$pedido = new Pedido;

		$pedido->__set('rmCli', $_SESSION['rmCli']);

		$pedidoService = new PedidoService($conexao, $pedido);
		$result = $pedidoService->create();
	}

	if($action=='readId') {
		$conexao = new Conexao;
		$pedido = new Pedido;
		
		$pedido->__set('rmCli', $_SESSION['rmCli']);
		$pedido->__set('obs', $_POST['obs']);
		
		$pedidoService = new PedidoService($conexao, $pedido);
		$pedidos = $pedidoService->read('id');	
	}

	if($action=='read'){
		$conexao = new Conexao;
		$pedido = new Pedido;

		$pedido->__set('codEtec', $_SESSION['codEtec']);
		
		$pedidoService = new PedidoService($conexao, $pedido);
		$pedidos = $pedidoService->read('listEmp');
	}

	if ($action=='ler') {
		$conexao = new Conexao;
		$pedido = new Pedido;

		$pedido->__set('codEtec', $_SESSION['codEtec']);
		$pedido->__set('rmCli', $cliente->rm);
		$pedidoService = new PedidoService($conexao, $pedido);
		$pedidos = $pedidoService->read('ler');
		$pedido = new Pedido();
		if (count($pedidos)>0) {
			$pedido->cast($pedidos[0]);
		}
	}

	if($action=='pedCli'){
		$conexao = new Conexao;
		$pedido = new Pedido;

		$pedido->__set('rmCli', $_SESSION['rmCli']);

		$pedidoService = new PedidoService($conexao, $pedido);
		$pedidos = $pedidoService->read('pedCli');
		$pedidoEx;
		$pedidos[0]==true ? $pedidoEx = true : $pedidoEx = false;
	}

	if($action=='delete'){
		$conexao = new Conexao;
		$pedido = new Pedido;

		$pedido->__set('id', $_POST['id']);

		$pedidoService = new PedidoService($conexao, $pedido);
		$pedidos = $pedidoService->delete('entregar');
		if($pedidos==true){
			header('Location:index.php?link=9');
		} else {
			echo 'Algo deu bosta ein ;-;';
		}
	}
?>