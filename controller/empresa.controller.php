<?php
require_once('model/empresa.model.php');
require_once('service/empresa.service.php');
require_once('conexao/conexao.php');

if ($action=='create') {
	$empresa = new Empresa();
	$empresa->__set('id', $_POST['idEmp']);
	$empresa->__set('codEtec', $_POST['codEtec']);
	$empresa->__set('nome', $_POST['nomeEmp']);
	$empresa->__set('senha', $_POST['senhaEmp']);

	$conexao = new Conexao();
	$empresaService = new EmpresaService($conexao, $empresa);
	$result = $empresaService->create();

	if($result==true){
		header('Location:index.php');
	} else {
		echo "NÃO FOI POSSÍVEL CRIAR REGISTRO DE EMPRESA! <br> Anote o Erro: $result";
	}
	
} else if($action=='update') {
	$empresa = new Empresa();
	$empresa->__set('id', $_POST['idEmp']);
	$empresa->__set('codEtec', $_POST['codEtec']);
	$empresa->__set('nome', $_POST['nomeEmp']);
	$empresa->__set('senha', $_POST['senhaEmp']);

	$conexao = new Conexao();
	$EmpresaService = new EmpresaService($conexao, $empresa);
	$result = $EmpresaService->update();

	if($result==true){
		header('Location:index.php');
	} else {
		echo "NÃO FOI POSSÍVEL ATUALIZAR REGISTRO DE EMPRESA! <br> Anote o Erro: $result";
	}
	
} else if ($action=='delete') {
	$empresa = new Empresa();
	$empresa->__set('id', $_POST['idEmp']);
	$empresa->__set('codEtec', $_POST['codEtec']);
	$empresa->__set('nome', $_POST['nomeEmp']);
	$empresa->__set('senha', $_POST['senhaEmp']);

	$conexao = new Conexao();
	$EmpresaService = new EmpresaService($conexao, $empresa);
	$result = $EmpresaService->delete();

	if($result==true) {
		header('Location:index.php');
	} else {
		echo "NÃO FOI POSSÍVEL DELETAR REGISTRO DE EMPRESA! <br> Anote o Erro: $result";
	}
	
} else if($action=='read') {
	$empresa = new Empresa();
	$conexao = new Conexao();

	$empresa->__set('codEtec', $_POST['codEtec']);
	$empresa->__set('senha', $_POST['senhaEmp']);

	$emp = new EmpresaService($conexao, $empresa);
	$empresa = $emp->read('logar');

	if($empresa[1]!=null && $empresa[0]==true) {

		$_SESSION['codEtec'] = $empresa[1]->codEtec;
		$_SESSION['nomeEmp'] = $empresa[1]->nome;
		$_SESSION['senhaEmp'] = $empresa[1]->senha;
		header('Location:index.php?link=9');
	} else {
		header('Location:index.php?link=1');
	}
	
}else if ($action=='show') {
	$empresa = new Empresa();
	$conexao = new Conexao();

	$empresa->__set('codEtec', $_SESSION['codEtec']);
	$emp = new EmpresaService($conexao, $empresa);
	$empresa = $emp->read('mostrar');
}
?>