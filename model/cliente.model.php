<?php
class Cliente {
	private $rm;
	private $nome;
	private $email;
	private $senha;
	private $cred;
	private $codEtec;
	
	function __get($atributo){
		return $this->$atributo;
	}

	function __set($atributo, $valor){
		$this->$atributo = $valor;
		return $this;
	}
}
?>