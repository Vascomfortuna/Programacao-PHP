<?php

$id = filter_input(INPUT_GET, "id");

$ligacao = mysql_connect("localhost", "root", "");
if (!$ligacao) {
    die("nao foi possivel ligar:" . mysql_error());
}

$delete_inscricao= "delete from inscricoes where id_inscricao = $id";
$delete_login= "delete from login_inscricoes where id_inscricao = $id";


mysql_select_db("robo_bombeiro");
try {
    mysql_query($delete_login, $ligacao);
    mysql_query($delete_inscricao, $ligacao);
    
        echo "Apagado com sucesso";
        header("Refresh:2; url=./gcontas.php");// Redirect browser 

       
    
    
} catch (PDOException $e) {
    die($e);
}
