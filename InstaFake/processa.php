<?php
isset($_POST('nome_user')){
		$nome = addcslashes($_POST['nome_user']);
		$nome_completo = addcslashes($_POST['nome']);
		$senha = addcslashes($_POST['senha']);
		if(!empty(nome) && !empty(nome_user) && !empty(senha)){
					echo "Cadastrando";
		}else{
			echo "Preencha corretamente";
		}
}

?>
