<?php
include './classes/usuario.php';
$bus =$_POST['busca'];
try {
  $resposta=[];
  $conn = getConnection();
  $resposta=buscarUsuario($bus,$conn);
  echo "Elementos :".count($resposta);
} catch (PDOException $e) {
     echo "Erro de Conexao";
}
?>
