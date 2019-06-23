<?php
require_once 'classes/usuario.php';
$usuario = new Usuario("projeto_login","localhost","root","");
$palavra = addslashes($_POST['busca']);
$dados = $usuario->buscarUsuario($palavra);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Perfil Pessoal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style-buscarUsuarios.css">
</head>
<body>
	<section>
		<div id="layout">
			<img src="https://img.icons8.com/ios/48/000000/instagram-new.png" id="img1">
			<h1>InstaFake</h1>
			<img src="https://icon-icons.com/icons2/38/PNG/96/findtheuser_search_search_theuser_4518.png" id="img4">
			<a href="cadastro.php"><img src="https://img.icons8.com/ios/64/000000/add-user-male.png" id="img3" alt="Novo Usuário"></a>
			<a href="perfil.php"><img src="https://img.icons8.com/carbon-copy/64/000000/undo.png" id="img2" alt="Voltar"></a>
		</div>
    <div id="div1">
      <center><table>
        <tr>
            <td>Nome </td>
            <td>Nome Completo </td>
        </tr>
				<?php
              if(count($dados)>0){
                  for ($i = 0; $i <count($dados); $i++) {
                      echo "<tr>";
                      foreach ($dados[$i] as $k => $v){
                          if($k != "id" && $k != "senha"){
                              echo '<td>'.$v.'</td>';
                          }
                      }
                      ?>
                <td>
									<a href="buscarUsuarios.php?id_seguir=<?php echo $dados[$i]['id']; ?>" class="botao">Seguir</a>
                </td>
                      <?php
                      echo '</tr>';
                  }
              }
            ?>
      </table></center>
    </div>
  </section>
</body>
</html>
<?php
     if(isset($_GET['id_seguir'])){
			 session_start();
			 $meu_id = addslashes($_SESSION['id_usuario']);
			 $id_seguir=addslashes($_GET['id_seguir']);
			 var_dump($meu_id,$id_seguir);
		 }
?>
