<?php

/* Utilizo o mesmo esquema de conexão com o banco de dados,
   porém, dessa vez eu vou executar um comando INSERT.
   Atente-se para as diferenças. */
$nomeBD = 'mural';
$usuarioBD = 'root';
$senhaBD = 'root';

$pdo = new PDO("mysql:dbname={$nomeBD};host=localhost", $usuarioBD, $senhaBD);

/* Uso um "comando SQL preparado" porque ele é mais seguro */
$sql = "INSERT INTO recado (autor, texto) VALUES (?, ?)";

$comando = $pdo->prepare($sql);
$sucesso = $comando->execute([$_POST['usuario'], $_POST['recado']]);

if ($sucesso)
   header('Location: mural.php'); /* redireciono para a página mural.php */
else
   echo "ops"; /* Preciso melhorar esse tratamento de erros */

