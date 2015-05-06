<?php

$nome = filter_input(INPUT_GET, "nome");

$ligacao = mysql_connect("localhost", "root", "");
if (!$ligacao) {
    die("nao foi possivel ligar:" . mysql_error());
}

$login_user = "Select username
                from login
                where login.Username LIKE '$nome%'";

mysql_select_db("robo_bombeiro");
try {
    $result = mysql_query($login_user, $ligacao);
    if (!$result) {
        echo "<br/>falhou query<br/>";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }
    $r="";
    while ($row = mysql_fetch_assoc($result)) {
        //echo "<br/>" . $row['Id_Login'] . ", " . $row['Nome'];
        $r.=$row['username'].",";
    }
     echo $r;   
     
} catch (PDOException $e) {
    die($e);
}

