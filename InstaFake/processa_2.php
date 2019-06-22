<?php
include './classes/usuario.php';
$nome = $_POST['nome'];
$senha = $_POST['senha'];
try {
	$usuario = new Usuario("projeto_login","localhost","root","");
	$usuario->login($nome,$senha);
} catch (PDOException $e) {
	echo "Erro de exceção";
}
