<?php
class ProdService{
	private $conexao;
	private $produto;

	function __construct(Conexao $conexao, Produto $produto){
		$this->conexao = $conexao->connect();
		$this->produto = $produto;
	}

	function create(){
		//try{
			$sql = 'INSERT INTO produto(id, descr, tipo, estoque, codEtec, prVen) VALUES (NULL, :descr, :tipo, :estoque, :codEtec, :prVen)';
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindValue(':descr', $this->produto->__get('descr'));
			$stmt->bindValue(':prVen', $this->produto->__get('prVen'));
			$stmt->bindValue(':tipo', $this->produto->__get('tipo'));
			$stmt->bindValue(':estoque', $this->produto->__get('estoque'));
			$stmt->bindValue(':codEtec', $this->produto->__get('codEtec'));
			$stmt->execute();
		/*} catch(PDOException $e) {
			echo "FALHA AO CADASTRAR PRODUTO: $e->getMessage()";
		}*/
	}

	function read($action){
		try{
			if ($action=='mostrar') {
				$sql = 'SELECT id, descr, prVen, tipo, estoque, codEtec FROM produto WHERE id = :id AND dtaInativo IS NULL ORDER BY descr';
				$stmt = $this->conexao->prepare($sql);
				$stmt->bindValue(':id', $this->produto->__get('id'));
				$stmt->execute();
			}

			if($action=='show'){
				$sql = 'SELECT id, descr, tipo, estoque, prVen FROM produto WHERE codEtec = :codEtec AND dtaInativo IS NULL ORDER BY descr';
				$stmt = $this->conexao->prepare($sql);
				$stmt->bindValue(':codEtec', $this->produto->__get('codEtec'));
				$stmt->execute();
			}

			if ($action=='list') {
				$sql = 'SELECT id, descr, prVen, tipo, estoque FROM produto WHERE id = :id AND dtaInativo IS NULL ';
				$stmt = $this->conexao->prepare($sql);
				$stmt->bindValue(':id', $this->produto->__get('id'));
				$stmt->execute();
			}

			return $stmt->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			//echo "ERRO NA BUSCA POR CLIENTE: ".$e->getMessage()."";
		}
	}

	function update(){
		try {
			$sql =	'UPDATE produto SET descr = :descr, prVen = :prVen, tipo = :tipo, estoque = :estoque WHERE id = :id';
			$stmt = $this->conexao->prepare($sql);

			$stmt->bindValue(':descr', $this->produto->__get('descr'));
			$stmt->bindValue(':prVen', $this->produto->__get('prVen'));
			$stmt->bindValue(':tipo', $this->produto->__get('tipo'));
			$stmt->bindValue(':estoque', $this->produto->__get('estoque'));
			$stmt->bindValue(':id', $this->produto->__get('id'));
			var_dump($stmt);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "FALHA AO ATUALIZAR PRODUTO: $e.getMessage()";
		}
	}

	function delete(){
		//try{
			$sql = 'UPDATE produto SET dtaInativo = NOW() WHERE id = :id';
			$stmt = $this->conexao->prepare($sql);

			$stmt->bindValue('id', $this->produto->__get('id'));
			$stmt->execute();
		/*} catch(PDOException $e) {
			echo "FALHA AO DELETAR PRODUTO: $e.getMessage()";
		}*/
	}
}
?>