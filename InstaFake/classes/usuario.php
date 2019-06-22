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
			$sql = 'SELECT * FROM cliente WHERE nome = :n AND senha = :s';
			$stnt = $this->pdo->prepare($sql);
			$stnt->bindParam(':n',$nome);
			$stnt->bindParam(':s',$senha);
			$stnt->execute();
			if($stnt->rowCount()>0){
				echo "Existe esse usuario cadastrado:".$nome.$senha;
				header("location: perfil.php");
			}else{
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
}
