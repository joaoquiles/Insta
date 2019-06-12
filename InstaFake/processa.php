
<?php
include './classes/usuario.php';

$nome = $_POST['nome'];
$nome_completo = $_POST['nome_completo'];
$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];
if($senha==$confirmar){
	echo "Senhas iguais";
}
try{
    $conn = getConnection();
    insert($nome, $nome_completo, $senha, $conn);
} catch (PDOException $ex){
    echo 'Erro'.$ex->getMessage();
}