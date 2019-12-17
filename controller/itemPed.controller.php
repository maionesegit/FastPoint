<?php
require_once 'conexao/conexao.php';
require_once 'model/pedido.model.php';
require_once 'model/itemPed.model.php';
require_once 'service/itemPed.service.php';

if ($action=='read') {
	$conexao = new Conexao();
	$itemPed = new ItemPed();

	$itemPed->__set('idPed', $ped->id);
	$itemPed->__set('codEtec', $_SESSION['codEtec']);

	$itemPedService = new ItemPedService($conexao, $itemPed, $ped);
	$items = $itemPedService->read('list');
	// var_dump($items);
}

if ($action=='listEmp') {
	$conexao = new Conexao();
	$itemPed = new ItemPed();

	$itemPed->__set('idPed', $pedido->__get('id'));
	$itemPedService = new ItemPedService($conexao, $itemPed, $pedido);
	$items = $itemPedService->read('listEmp');
}

if($action=="create") {
	$conexao = new Conexao();
	$itemPed = new ItemPed();
	$pedido = new Pedido();
	
	/*
	$pedido->__set('rmCli', $_SESSION['rmCli']);
	$pedidoService = new PedidoService($conexao, $pedido);
	$result = $pedidoService->read('list');
	var_dump($result[1]);

	//
	
	$itemPed->__set('idProd', $_POST['idProd']);
	$itemPed->__set('qtdProd', $_POST['qtdProd']);

	$itemPedService = new ItemPedService($conexao, $itemPed, $pedido);
	$result = $itemPedService->create();
	*/
	
	for($i = 0; $i < sizeof($_POST['idProd']); $i++){
		$itemPed->__set('idProd', $_POST['idProd'][$i]);
		$itemPed->__set('qtdProd', $_POST['qtdProd'][$i]);

		$itemPedService = new ItemPedService($conexao, $itemPed, $pedido);
		$result = $itemPedService->create();
	}
}
?>