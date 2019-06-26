<?php
     require_once 'classes/usuario.php';
		 session_start();
		 if (isset($_SESSION['id_usuario'])) {
		 	$pessoa = new usuario("projeto_login","localhost","root","");
			$dados=$pessoa->buscaDadosUsuario($_SESSION['id_usuario']);
      $quantidadeSeguidores =$pessoa->quantidadeSeguidores($_SESSION['id_usuario']);
      $quantidadeSeguindo = $pessoa->quantidadeSeguindo($_SESSION['id_usuario']);
     }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Perfil Pessoal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style-perfil.css">
</head>
<body>
	<div id="div1">
		<img src="https://img.icons8.com/ios/48/000000/instagram-new.png" id="img1">
		<form method="post" action="buscarUsuarios.php">
			<h1>InstaFake</h1>
			<input type="text" name="busca" placeholder="Buscar">
			<input type="submit" name="botao" value="Buscar">
		</form>
		<a href="cadastro.php"><img src="https://img.icons8.com/ios/64/000000/add-user-male.png" id="img3" alt="Novo Usuário"></a>
		<a href="index.php"><img src="https://img.icons8.com/carbon-copy/64/000000/undo.png" id="img2" alt="Voltar"></a>
	</div>
	<div id="div2">
		<img src="https://img.icons8.com/ios/100/000000/name.png" id="img4">
		<?php
		if(isset($_SESSION['id_usuario'])){
    ?>
				<h2>
					<?php
							echo $dados[0]['nome_completo'];
					 ?>
				</h2>
		<?php }
		?>
		<button class="btn btn-blue">Seguidores</button>
		<button class="btn btn-blue btn-blue-position">Seguindo</button>
    <?php
    if(isset($_SESSION['id_usuario'])){
    ?>
        <h3>
          <?php
              echo $quantidadeSeguidores[0];
           ?>
        </h3>
    <?php }
    ?>
    <?php
    if(isset($_SESSION['id_usuario'])){
    ?>
        <h4>
          <?php
              echo $quantidadeSeguindo[0];
           ?>
        </h4>
    <?php }
    ?>
	</div>
	<div id="div3">
    <h2>Fotos</h2>
	</div>
</body>
</html>
