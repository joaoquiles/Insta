<?php
/**
 * Classe Usuario
 */
class Usuario
{
	private $id;
	private $nome;
	private $nome_completo;
	private $senha;
	private $pdo;
	function __construct($dbname,$host,$user,$senha)
	{
		try {
					$this->pdo=new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
		} catch (Exception $e) {
		      echo "Erro generico :".$e->getMessage();
					exit();
		} catch (PDOException $e){
          echo "Erro de conexão".$e->getMessage();
					exit();
		}
	}
	function insert($nome,$nome_completo,$sen){
		try {
			$sql = 'INSERT INTO cliente(nome,nome_completo,senha)
			VALUES(:n,:n_c,:s)';
			$stnt = $this->pdo->prepare($sql);
			$stnt->bindParam(':n',$nome);
			$stnt->bindParam(':n_c',$nome_completo);
			$stnt->bindParam(':s',$sen);
			if ($stnt->execute()) {
				echo "Cadastro feito com seucesso ";
			} else {
				echo "Erro ao cadastrar !";
			}

		} catch (PDOException $e) {
			echo "Erro de banco :".$e->getMessage();
		}
	}
	function login($nome,$senha){
		try {
			echo "nome :".$nome.$senha;
			$sql = 'SELECT * FROM cliente WHERE nome = :n AND senha = :s';
			$stnt = $this->pdo->prepare($sql);
			$stnt->bindParam(':n',$nome);
			$stnt->bindParam(':s',$senha);
			$stnt->execute();
			if($stnt->rowCount()>0){
				$dados = $stnt->fetch();
				session_start();
				if($dados['id'] > 0){
					$_SESSION['id_usuario']=$dados['id'];
					return true;
				}else {
					return false;
				}
			}else{
				return false;
				echo "Usuario nao existe";
			}
		} catch (PDOException $e) {
			echo'Erro de exception'.$e->getMessage();
		}
	}
	function buscarUsuario($palavra){
		try {
			$busca=$palavra.'%';
			$res = [];
	    $stnt = $this->pdo->prepare("SELECT * FROM cliente where nome LIKE :n");
			$stnt->bindParam(':n',$busca);
	    $stnt->execute();
	    $res = $stnt->fetchAll(PDO::FETCH_ASSOC);
	    return $res;
		} catch (PDOException $e) {
			echo "PDOException : ".$e->getMessage();
		}
	}
	function buscaDadosUsuario($id){
		$stnt = $this->pdo->prepare('SELECT * FROM cliente where id = :id');
		$stnt->bindParam(":id",$id);
		$stnt->execute();
		$dados = $stnt->fetchAll(PDO :: FETCH_ASSOC);
		return $dados;
	}
	function verificarSeguidor($meu_id,$id_seguidor){
		$sql='SELECT * FROM pessoa WHERE idPessoa=:meu_seguidor AND idUsuario=:meu_id';
		$stnt = $this->pdo->prepare($sql);
		$stnt->bindParam(":meu_seguidor",$id_seguidor);
		$stnt->bindParam(":meu_id",$meu_id);
		$stnt->execute();
		if($stnt->rowCount()>0){
			echo "Já sigo essa Pessoa !";
			return false;
		}else {
			return true;
		}
	}
	function seguir($meu_id,$id_seguidor,$nome,$nome_completo,$senha){
			$sql='INSERT INTO pessoa(idPessoa,nome,nome_completo,senha,idUsuario)
			VALUES(:id_seguidor,:nome,:nome_completo,:senha,:meu_id)';
			$stnt = $this->pdo->prepare($sql);
			$stnt->bindParam(":id_seguidor",$id_seguidor);
			$stnt->bindParam(":nome",$nome);
			$stnt->bindParam(":nome_completo",$nome_completo);
			$stnt->bindParam(":senha",$senha);
			$stnt->bindParam(":meu_id",$meu_id);
			if($stnt->execute()){
				echo "Seguindo";
				true;
			}else {
				echo "Erro ao seguir";
				false;
			}
	}
	function quantidadeSeguidores($id){
		$sql = 'SELECT COUNT(*) FROM pessoa WHERE pessoa.idUsuario=:n';
		$stnt = $this->pdo->prepare($sql);
		$stnt->bindParam(":n",$id);
		$stnt->execute();
		return $stnt->fetch();

	}
	function seguindo($id){

	}
}
