<?php
isset($POST_('nome_user'))
$nome = addcslashes($POST_['nome_user']);
$nome_completo = addcslashes($POST_['nome']);
$senha = addcslashes($POST_['senha']);
if(empty(nome)& empty(nome_user)&empty(senha)){
	echo "Cadastrando";
}else{
	echo "Preencha corretamente";
}
?>
