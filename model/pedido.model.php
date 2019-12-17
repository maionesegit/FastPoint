<?php
require_once 'model/entidade.model.php';
class Pedido extends Entidade {
	private $id;
	private $rmCli;
	private $obs;

	function __get($atributo){
		return $this->$atributo;
	}

	function __set($atributo, $valor){
		$this->$atributo = $valor;
	}
}
?>