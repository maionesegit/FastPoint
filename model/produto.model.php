<?php
class Produto{
	private $id;
	private $descr;
	private $tipo;
	private $estoque;
	private $codEtec;
	private $prVen;
	private $dtaInativo;

	function __get($atributo){
		return $this->$atributo;
	}

	function __set($atributo, $valor){
		$this->$atributo = $valor;
		return $this;
	}
}
?>