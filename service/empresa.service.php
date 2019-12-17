<?php
class EmpresaService{
	private $conexao;
	private $empresa;

	function __construct(Conexao $conexao, Empresa $empresa){
		$this->conexao = $conexao->connect();
		$this->empresa = $empresa;
	}

	function read($action){
		
			if($action=='logar'){
				try{
					$sql = "SELECT codEtec, nome, senha FROM empresa WHERE codEtec = :codEtec AND senha = :senha";
					$stmt = $this->conexao->prepare($sql);
					$stmt->bindValue(':codEtec', $this->empresa->__get('codEtec'));
					$stmt->bindValue(':senha', $this->empresa->__get('senha'));
					$stmt->execute();

					$result[1] = $stmt->fetch(PDO::FETCH_OBJ);
					$result[0] = true;

					return $result;

				} catch(PDOException $e) {
					return $e->getMessage();
				}
			}

			if ($action=='mostrar') {
				try{
					$sql = "SELECT codEtec, nome, senha FROM empresa WHERE codEtec = :codEtec";
					$stmt = $this->conexao->prepare($sql);
					$stmt->bindValue(':codEtec', $this->empresa->__get('codEtec'));
					$stmt->execute();

					$result[1] = $stmt->fetch(PDO::FETCH_OBJ);
					$result[0] = true;

					return $result;
					
				} catch(PDOException $e) {
					return $e->getMessage();
				}
			}
			//$sql = "SELECT id, codEtec, nome, senha, cred FROM empresa WHERE codEtec = ".$this->empresa->__get('id')." AND senha = ".$this->cliente->__get('senha')."";
			//$result = $this->conexao->query($sql);
	}

	function create(){
		try{
			$sql = "INSERT INTO empresa(codEtec, nome, senha) VALUES (:codEtec, :nome, :senha)";
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindValue(':codEtec', $this->empresa->__get('codEtec'));
			$stmt->bindValue(':nome', $this->empresa->__get('nome'));
			$stmt->bindValue(':senha', $this->empresa->__get('senha'));
			$stmt->execute();

			return true;
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}

	function update(){
		try{
			$sql = 'UPDATE empresa SET codEtec=:codEtec, nome=:nome, senha=:senha WHERE codEtec=:codEtec';
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindValue(':codEtec', $this->empresa->__get('codEtec'));
			$stmt->bindValue(':nome', $this->empresa->__get('nome'));
			$stmt->bindValue(':senha', $this->empresa->__get('senha'));
			$stmt->execute();

			return true;
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}

	function delete(){
		try{
			$sql = 'DELETE FROM empresa WHERE id=:id';
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindValue(':id', $this->empresa->__get('id'));
			$stmt->execute();

			return true;
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}
}
?>