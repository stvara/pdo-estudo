<?php


declare (strict_types=1);

$pdo = require 'conexao.php';
$sql = 'insert into produtos(descricao) values(?)';

$prepare = $pdo->prepare($sql);

$prepare->bindParam(1, $_GET['descricao']);
$prepare->execute();

echo $prepare->rowCount();


//http://localhost/php/pdo/insert.php?descricao=produto01
?>
<html><title>insert</title></html>