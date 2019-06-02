<?php
/**
 * Classe Usuario para conexão com o banco,cadastro e confirmar senha
 */
class Usuario(){
	private $pdo;
	public function conexao($nome,$host,$usuario,$senha)
	{
		global $pdo;
		try{
			pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
		}catch(PDOEexcption $e){
			global $msg = $e->getMessage();
		}
	}

	public function cadastro($nome_user,$nome,$senha){
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM cliente WHERE  email = :e");
		$sql->bindValue(":n",$nome);
		$sql->execute();
		if($sql->rowCount()>0){
			return false;
		}else{
			$sql = $pdo->prepare("INSERT INTO cliente(nome,nome_completo,senha)
				VALUES(:n,:nc,:s)");
		}
		$sql->bindValue(":n",$nome_user);
		$sql->bindValue(":nc",$nome);
		$sql->bindValue(":s",$senha);
		$sql->execute();
		return true;
	}

	public function login($nome_user,$senha){
		global $pdo;
		$sql = pdo->prepare
	}
}