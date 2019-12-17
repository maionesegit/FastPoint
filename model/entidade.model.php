<?php
class Entidade {
	function cast($object){
		foreach ($object as $key => $value) {
			$this->key = $value;
		}
	}
}