
<?php
include './classes/usuario.php';

$nome =$_POST['nome'];
$nome_completo = $_POST['nome_completo'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];
if(!empty($nome) && !empty($nome_completo) && !empty($senha) && !empty($confirmar)){
	echo "Preencheu todos os campos";
	if($senha==$confirmar){
		try{
    		$conn = getConnection();
    		insert($nome, $nome_completo, $senha, $conn);
		} catch (PDOException $ex){
    		echo 'Erro'.$ex->getMessage();
		}
	}else{
		echo "Senhas diferentes";
	}
}else{
	echo "Preencha todos os itens do formulario";
}