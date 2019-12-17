<?php
class ItemPedService {
	private $conexao;
	private $itemPed;
	private $pedido;

	function __construct(Conexao $conexao, ItemPed $itemPed, $pedido){
		$this->conexao = $conexao->connect();
		$this->itemPed = $itemPed;
		$this->pedido = $pedido;
	}

	function create(){
			$sql = 'SELECT id FROM pedido ORDER BY id DESC LIMIT 1';
			$stmt = $this->conexao->prepare($sql);		

			$stmt->execute();
			$result1 = $stmt->fetchAll(PDO::FETCH_OBJ);

			$sql = 'INSERT INTO itemped VALUES (NULL,' . $result1[0]->id . ',' . $this->itemPed->__get('idProd') . ',' . $this->itemPed->__get('qtdProd') . ');';
			$stmt = $this->conexao->prepare($sql);

			$stmt->execute();
	}
	function read($action){
		if($action == 'list'){
			try{
				$sql = 'SELECT 
							i.id,
							i.idPed,
							i.idProd,
							i.qtdProd,
							pr.descr AS "descricao",
							pr.tipo AS "tipo"
						FROM itemPed i
						INNER JOIN produto pr ON (pr.id = i.idProd)
						WHERE i.idPed = :idPed';
						
				$stmt = $this->conexao->prepare($sql);
				$stmt->bindValue(':idPed', $this->pedido->id);
				// $stmt->bindValue(':idPed', 'p.'.$this->itemPed->__get('idPed'));
				$stmt->execute();

				return $stmt->fetchAll(PDO::FETCH_OBJ);
			} catch(PDOException $e) {
				return$e->getMessage();
			}
		}
	}
}
?>