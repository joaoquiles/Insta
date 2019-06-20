<?php
include './classes/usuario.php';
$bus =$_POST['busca'];
try {
  $resposta=[];
  $conn = getConnection();
  $resposta=buscarUsuario($bus,$conn);
  <table>
      
  </table>

} catch (PDOException $e) {
     echo "Erro de Conexao";
}
?>
