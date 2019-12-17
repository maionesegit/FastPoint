<?php
class PedidoService {
	private $conexao;
	private $pedido;

	function __construct(Conexao $conexao, Pedido $pedido){
		$this->conexao = $conexao->connect();
		$this->pedido = $pedido;
	}

	function create(){
		try{
			//FAZER QUERY ANTES DA INSERÇÃO
			$sql = 'INSERT INTO pedido VALUES (NULL, NULL, :rmCli, false);';
			$stmt = $this->conexao->prepare($sql);

			$stmt->bindValue(':rmCli', $this->pedido->__get('rmCli'));
			$stmt->execute();

			$sql = 'SELECT id FROM pedido';
			$stmt = $this->conexao->prepare($sql);

			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_OBJ);
				
			return true;
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}

	function read($action){
		//try {
			if($action=='pedCli'){
				try{
					$sql = 'SELECT id, rmCli, obs FROM pedido WHERE rmCli = :rmCli AND entrega = "0"';
					$stmt = $this->conexao->prepare($sql);

					$stmt->bindValue(':rmCli', $this->pedido->__get('rmCli'));
					$stmt->execute();

					
					$result[0] = $stmt->fetchAll(PDO::FETCH_OBJ);

					return $result;
				} catch(PDOException $e) {
					$result[0] = false;
					return $result;
				}
			}

			if($action=='read'){
				$sql = 'SELECT id, rmCli, codEtec, obs FROM pedido WHERE id = :id';
				$stmt = $this->conexao->prepare($sql);

				$stmt->bindValue(':id', $this->pedido->__get('id'));
				$stmt->execute();

				$result[0] = true;
				$result[1] = $stmt->fetchAll(PDO::FETCH_OBJ);

				return $result;
			}

			if($action=='list'){
				$sql = 'SELECT p.id, p.rmCli, p.obs, p.entrega, c.codEtec AS "codEtec"
						FROM pedido p INNER JOIN cliente c WHERE p.rmCli = :rmCli';
				$stmt = $this->conexao->prepare($sql);

				$stmt->bindValue(':rmCli', $this->pedido->__get('rmCli'));
				$stmt->execute();

				$result[0] = true;
				$result[1] = $stmt->fetchAll(PDO::FETCH_OBJ);

				return $result;
			}

			if($action=='listEmp'){
				$sql = 'SELECT p.id, p.rmCli, p.obs, p.entrega FROM pedido p, cliente c WHERE c.codEtec = :codEtec AND p.rmCli = c.rm AND p.entrega = 0';
				$stmt = $this->conexao->prepare($sql);

				$stmt->bindValue(':codEtec', $this->pedido->__get('codEtec'));
				$stmt->execute();

				//$result[0] = true;
				$result = $stmt->fetchAll(PDO::FETCH_OBJ);

				return $result;
			}

			if ($action=='ler') {
				$sql = 'SELECT p.id, p.rmCli, p.obs, p.entrega FROM pedido p, cliente c WHERE p.rmCli = c.rm AND c.codEtec = : order by p.id desc LIMIT 1';
				$stmt = $this->conexao->prepare($sql);

				$stmt->bindValue(':codEtec', $this->pedido->__get('codEtec'));
				$stmt->execute();

				$result = $stmt->fetchAll(PDO::FETCH_OBJ);

				return $result;
			}
		/*} catch(PDOException $e) {
			return $e->getMessage();
		}*/
	}

	function delete($action){
		try{
			if($action=='entregar'){
				$sql = 'UPDATE pedido SET entrega = 1 WHERE id = :id';
				$stmt = $this->conexao->prepare($sql);

				$stmt->bindValue(':id', $this->pedido->__get('id'));
				$stmt->execute();
				return true;
			}
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}
}
?>