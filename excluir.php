<?php

$nomeBD = 'mural';
$usuarioBD = 'root';
$senhaBD = 'root';

$pdo = new PDO("mysql:dbname={$nomeBD};host=localhost", $usuarioBD, $senhaBD);

$sql = "DELETE FROM recado WHERE id=?"; 

$comando = $pdo->prepare($sql);
$sucesso = $comando->execute([$_GET['id']]);

if ($sucesso) {
   echo 'O recado foi excluído. Voltando para a página em alguns segundos...';
   header("Refresh: 3;URL='mural.php'");
} else {
   echo 'Ocorreu algum problema.';
}

?>
