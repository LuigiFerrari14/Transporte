<?php
$con = new pdo("mysql:host=localhost; dbname=transporte", "transporte", "");
if ( !empty($_POST)){
    $sql = $con->prepare("insert into post (data, nome, mensagem) VALUES (now(), ?, ?)");
    $sql->execute(array($_POST ['nome'], $_POST['mensagem']));
}


$sql = $con->prepare("SELECT * FROM post order by data desc limit 5");

$sql->execute();


$rows = $sql->fetchAll(PDO::FETCH_CLASS);



//fechAll  - fubção para selecionar todos os registros
//PDO::FETCH_CLASS -


?>