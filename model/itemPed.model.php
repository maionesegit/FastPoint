<?php
class ItemPed {
	private $id;
	private $idPed;
	private $idProd;
	private $qtdProd;

	function __get($attrib) {
		return $this->$attrib;
	}

	function __set($attrib, $value) {
		$this->$attrib = $value;
	}
}
?>