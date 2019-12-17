<?php
class Empresa{
	private $codEtec;
	private $nome;
	private $senha;

	function __get($atributo){
		return $this->$atributo;
	}

	function __set($atributo, $valor){
		$this->$atributo = $valor;
		return $this;
	}
}
?>