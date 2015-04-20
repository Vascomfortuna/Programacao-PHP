<?php

$username = filter_input(INPUT_POST, "username");
$password = md5(filter_input(INPUT_POST, "password"));

$ligacao = mysql_connect("localhost", "root", "");
if (!$ligacao) {
    die("nao foi possivel ligar:" . mysql_error());
}

$login_user = "Select Id_Login,Nome from login where Username='$username' and Password='$password'";
echo $login_user;
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
       
        
    }
     if (null ===(filter_input(INPUT_COOKIE,"id_login"))) {
            echo "<br/>Cookie named '" . "id_login". "' is not set!";
        } else {
            echo "<br/>Cookie '" ."id_login". "' is set!";
            echo "<br/>Value is: " . filter_input(INPUT_COOKIE, "id_login");
        }
        if (null ===(filter_input(INPUT_COOKIE,"nome"))) {
            echo "<br/>Cookie named '" . "nome". "' is not set!";
        } else {
            echo "<br/>Cookie '" ."nome". "' is set!";
            echo "<br/>Value is: " . filter_input(INPUT_COOKIE, "nome");
        }
        header("Refresh:5; url=./index.php"); // Redirect browser 
       
        exit();
    //setcookie("Username",$result["Username"]);
} catch (PDOException $e) {
    die($e);
}


