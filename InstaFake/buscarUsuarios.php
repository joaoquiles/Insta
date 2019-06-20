<?php
require_once 'classes/usuario.php';
$conn = getConnection();
$palavra = addslashes($_POST['busca']);
$dados = buscarUsuario($palavra,$conn);
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
                    <a href=""> Seguir </a>
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
