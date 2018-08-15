<?php

/* me conecto com o banco de dados mural
   que está hospedado no servidor MySQL local */
$nomeBD = 'mural';
$usuarioBD = 'root';
$senhaBD = 'root';

/* A conexão é feita com a criação de um objeto PDO */
$pdo = new PDO("mysql:dbname={$nomeBD};host=localhost", $usuarioBD, $senhaBD);

$sql = "SELECT * FROM recado";
$comando = $pdo->query($sql); /* O comando SQL é executado */

/* uso fetchAll() para obter todas as linhas resultantes */
$recados = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Mural de Recados</title>
   <link rel="stylesheet" href="estilo.css">
</head>
<body>
   <div id="formulario">
      <form action="postar.php" method="post">
         <p>Digite aqui seu recado:</p>
         <p><label>Usuário:<input name="usuario"></label></p>
         <textarea name="recado"></textarea>
         <div>
            <button>Enviar</button>
         </div>
      </form>
   </div>
   <div id="recados">
      <?php foreach ($recados as $linha) { ?>
         <p><strong><?= $linha['autor'] ?></strong> escreveu:
            <?= $linha['texto'] ?>
            <a href="excluir.php?id=<?= $linha['id']?>">Excluir</a> 
          </p>
      <?php } ?>
   </div>
</body>
</html>
