<!DOCTYPE html>
<html>
<head>
	<title>Cadastro InstaFake</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style-cadastro.css">
	<script >
		var clock = document.getElementById('div-3');
    	setInterval(function () {
    	clock.innerHTML = ((new Date).toLocaleString().substr(11, 8));  
		}, 1000); 
	</script>
</head>
<body >
	<img src="image/image.png" id="imagem" width="400" height="600"> 
	<div id="div-1">
		<form method="POST" action="processa.php">
			<center>
				<h1>InstaFake</h1>
				<input type="name" name="" placeholder="Nome do usuário">
				<br>
				<input type="password" name="" placeholder="Senha">
				<br><br>
				<input type="submit" placeholder="Enviar">
				<br><br><br>
				<a href="">Esqueceu a senha ?</a>	
			</center>
		</form>
	</div>
	<div id="div-2">
		<center><p>Não tem uma conta ? <a href="cadastro.php">Cadastre-se</a></p></center>
	</div>
	
	<div id="div-3"></div>
</body>
</html>