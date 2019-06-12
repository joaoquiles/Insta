<?php
include './classes/usuario.php';
$nome = $_POST['nome'];
$senha = $_POST['senha'];
try {
	$conn = getConnection();
	login($nome,$senha,$conn);
} catch (PDOException $e) {
	echo "Erro de exceção";
}