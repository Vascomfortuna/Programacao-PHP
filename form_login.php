<?php

$username = filter_input(INPUT_POST, "username");
$password = md5(filter_input(INPUT_POST, "password"));

$ligacao = mysql_connect("localhost", "root", "");
if (!$ligacao) {
    die("nao foi possivel ligar:" . mysql_error());
}

$login_user = "Select login.Id_Login,login.Nome,login.Estado,inscricoes.Nome_Equipa,inscricoes.Instituto,inscricoes.Observacoes, inscricoes.Pago 
                from login
                inner join login_inscricoes
                on login.id_login=login_inscricoes.id_login 
                inner join inscricoes
                on inscricoes.id_inscricao = login_inscricoes.id_inscricao
                where login.Username='$username'and login.Password='$password'";

mysql_select_db("robo_bombeiro");
try {
    $result = mysql_query($login_user, $ligacao);
    if (!$result) {
        echo "<br/>falhou query<br/>";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }
    while ($row = mysql_fetch_assoc($result)) {
        //echo "<br/>" . $row['Id_Login'] . ", " . $row['Nome'];
        setcookie("id_login", $row['Id_Login']);
        setcookie("nome", $row['Nome']);
        setcookie("estado", $row['Estado']);
        setcookie("nome_equipa", $row['Nome_Equipa']);
        setcookie("instituto", $row['Instituto']);
        setcookie("pago", $row['Pago']);
        setcookie("obs", $row['Observacoes']);
    }

    if (null === (filter_input(INPUT_COOKIE, "id_login")) && (null === (filter_input(INPUT_COOKIE, "nome")))) {
        echo "<br/>Login efectuado com sucesso.";
    } else {
        echo filter_input(INPUT_COOKIE, "id_login");
        echo filter_input(INPUT_COOKIE, "nome") . "<br/>";
        echo "Cookie not set.";
    }

    header("Refresh:2; url=./index.php"); // Redirect browser 

    exit();
} catch (PDOException $e) {
    die($e);
}


