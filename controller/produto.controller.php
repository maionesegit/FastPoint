<?php
require_once('model/produto.model.php');
require_once('service/produto.service.php');
require_once('conexao/conexao.php');

if ($action=='create') {
	$produto = new Produto();
	$conexao = new Conexao();

	$produto->__set('descr', $_POST['descr']);
	$produto->__set('prVen', $_POST['prVen']);
	$produto->__set('tipo', $_POST['tipo']);
	$produto->__set('estoque', $_POST['estoque']);
	$produto->__set('codEtec', $_SESSION['codEtec']);
	
	$prodService = new ProdService($conexao, $produto);
	$prodService->create();
	
	if(isset($_SESSION['codEtec'])){
		header('Location:index.php?link=10');
	}
}

if($action=='update') {
	$produto = new Produto();
	$conexao = new Conexao();

	$produto->__set('id', $_POST['id']);
	$produto->__set('descr', $_POST['descr']);
	$produto->__set('prVen', $_POST['prVen']);
	$produto->__set('tipo', $_POST['tipo']);
	$produto->__set('estoque', $_POST['estoque']);

	$prodService = new ProdService($conexao, $produto);
	$prodService->update();

	if(isset($_SESSION['codEtec'])){
		header('Location:index.php?link=10');
	}
}

if ($action=='delete') {
	$produto = new Produto();
	$conexao = new Conexao();

	$produto->__set('id', $_POST['id']);

	$prodService = new ProdService($conexao, $produto);
	$prodService->delete();

	header('Location:index.php?link=10');
}

if($action=='show') {
	$produto = new Produto();
	$conexao = new Conexao();

	$produto->__set('codEtec', 94);

	$prodService = new ProdService($conexao, $produto);
	$produto = $prodService->read('show');
}

if ($action=='list') {
	$produto = new Produto();
	$conexao = new Conexao();

	$produto->__set('id', $pedido->__get('idProd'));

	$prodService = new ProdService($conexao, $produto);
	$produtos = $prodService->read('list');
}

if ($action == 'mostrar') {
	$produto = new Produto();
	$conexao = new Conexao();

	$produto->__set('id', $item->idProd);
// var_dump($produto);
	$prodService = new ProdService($conexao, $produto);
	$produtos = $prodService->read('mostrar');
	
}
?>