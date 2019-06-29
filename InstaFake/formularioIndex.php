<?php
include 'classes/usuario.php';
$nome = addslashes($_POST['nome']);
$senha = addslashes($_POST['senha']);
try {
	$usuario = new Usuario("projeto_login","localhost","root","");
	if($usuario->login($nome,$senha)){
			header("location: perfil.php");
	}else{
		echo "ERRO";
	}
} catch (PDOException $e) {
	echo "Erro de exceção";
}
