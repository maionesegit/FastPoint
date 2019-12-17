<?php
class ClienteService {
	private $conexao;
	private $cliente;

	function __construct(Conexao $conexao, Cliente $cliente){
		$this->conexao = $conexao->connect();
		$this->cliente = $cliente;
	}

	function read($action){
		try{
			if($action=='logar'){
				$sql = "SELECT rm, nome, email, senha, cred, codEtec FROM cliente WHERE rm = :rm AND senha = :senha";
				$stmt = $this->conexao->prepare($sql);
				$stmt->bindValue(':rm', $this->cliente->__get('rm'));
				$stmt->bindValue(':senha', $this->cliente->__get('senha'));
				$stmt->execute();
			}

			if ($action=='mostrar') {
				$sql = "SELECT rm, nome, email, senha, cred, codEtec FROM cliente WHERE rm = :rm";
				$stmt = $this->conexao->prepare($sql);
				$stmt->bindValue(':rm', $this->cliente->__get('rm'));
				$stmt->execute();
			}

			if ($action=='listEmp') {
				$sql = "SELECT rm, nome, email, senha, cred, codEtec FROM cliente WHERE codEtec = :codEtec";
				$stmt = $this->conexao->prepare($sql);
				$stmt->bindValue(':codEtec', $this->cliente->__get('codEtec'));
				$stmt->execute();
			}

			if ($action == 'ler') {
				$sql = 'SELECT c.rm, c.nome, c.email, c.senha, c.cred, c.codEtec, e.nome AS etec FROM cliente c INNER JOIN empresa e ON c.rm = :rm';
				$stmt = $this->conexao->prepare($sql);
				//$stmt->bindValue(':codEtec', $this->cliente->__get('codEtec'));
				$stmt->bindValue(':rm', $this->cliente->__get('rm'));
				$stmt->execute();
			}
			
			$result = $stmt->fetchAll(PDO::FETCH_OBJ);
			return $result;			
		} catch(PDOException $e) {			
			$result = $e->getMessage();
			return $result;
		}
	}

	function create(){
		try{
			$sql = "INSERT INTO cliente(rm, nome, email, senha, cred, codEtec) VALUES (:rm, :nome, :email, :senha, :cred, :codEtec)";
			$stmt = $this->conexao->prepare($sql);

			$stmt->bindValue(':rm', $this->cliente->__get('rm'));
			$stmt->bindValue(':nome', $this->cliente->__get('nome'));
			$stmt->bindValue(':email', $this->cliente->__get('email'));
			$stmt->bindValue(':senha', $this->cliente->__get('senha'));
			$stmt->bindValue(':cred', $this->cliente->__get('cred'));
			$stmt->bindValue(':codEtec', $this->cliente->__get('codEtec'));
			$stmt->execute();

			return true;
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}

	function update($action){
		if($action=='updateCred'){
			try{
				$sql = 'UPDATE cliente SET cred=:cred WHERE rm=:rm';
				$stmt = $this->conexao->prepare($sql);

				$stmt->bindValue(':rm', $this->cliente->__get('rm'));
				$stmt->bindValue(':cred', $this->cliente->__get('cred'));
				$stmt->execute();

				return true;
			} catch(PDOException $e) {
				return $e->getMessage();
			}
		}
	}

	function delete(){
		try{
			$sql = 'DELETE FROM cliente WHERE rm=:rm';
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindValue(':rm', $this->cliente->__get('rm'));
			$stmt->execute();

			return true;
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}
}
?>