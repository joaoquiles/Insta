<?php
/**
 * funcoes usuario
 */
function getConnection()
{
	$url = 'mysql:host=localhost;dbname=projeto_login';
	$name = 'root';
	$senha = '';
	try {
		$conn = new PDO($url,$name,$senha);
		return $conn;
	} catch (PDOException $e) {
		echo "Erro de conexão :".$e->getMessage();
	}
}
function insert($nome,$nome_completo,$sen,$conn){
	try {
		$sql = 'INSERT INTO cliente(nome,nome_completo,senha)
		VALUES(:n,:n_c,:s)';
		$stnt = $conn->prepare($sql);
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
function login($nome,$senha,$conn){
	try {
		$sql = 'SELECT * FROM cliente WHERE nome = :n AND senha = :s';
		$stnt = $conn->prepare($sql);
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
function buscarUsuario($palavra,$conn){
	try {
		$res = [];
    $stnt = $conn->prepare("SELECT nome FROM cliente where nome = :n");
		$stnt->bindParam(':n',$palavra);
    $stnt->execute();
    $res = $stnt->fetch(PDO::FETCH_ASSOC);
    return $res;
	} catch (PDOException $e) {
		echo "PDOException : ".$e->getMessage();
	}

}
