<?php

$nomeEquipa = filter_input(INPUT_POST, "nomeEquipa");
$instituto = filter_input(INPUT_POST, "instituto");
$obs = filter_input(INPUT_POST, "obs");
$id_login = filter_input(INPUT_COOKIE, "id_login");
$participante2 = filter_input(INPUT_POST, "participante2");
$participante3 = filter_input(INPUT_POST, "participante3");

$ligacao = mysql_connect("localhost", "root", "");
if (!$ligacao) {
    die("nao foi possivel ligar:" . mysql_error());
}

$insert_inscricao = "Insert into inscricoes (Nome_Equipa,Instituto,Observacoes) VALUES ('$nomeEquipa','$instituto','$obs')";
$update_inscricao = "Update login set estado = 1 where id_login = '$id_login'";
$id_inscricao = "select LAST_INSERT_ID() id_inscricao  from inscricoes;";


mysql_select_db("robo_bombeiro");
try {
    mysql_query($update_inscricao, $ligacao);
    mysql_query($insert_inscricao, $ligacao);
    $result = mysql_query($id_inscricao, $ligacao);
    while ($row = mysql_fetch_assoc($result)) {
        $id_ins = $row['id_inscricao'];
    }
    $insert_login = "Insert into login_inscricoes (id_login,id_inscricao,timestamp) VALUES ('$id_login','$id_ins',curdate())";
    if (mysql_query($insert_login, $ligacao)) {
        
        if ($participante2 != "") {
            $id2 = "Select id_login,username from login where Username = '$participante2'";
            $result = mysql_query($id2, $ligacao);
            while ($row = mysql_fetch_assoc($result)) {
                $id_login2 = $row['id_login'];
            }
            $insert_login2 = "Insert into login_inscricoes (id_login,id_inscricao,timestamp) VALUES ('$id_login2','$id_ins',curdate())";
            echo $insert_login2;
            if (mysql_query($insert_login2, $ligacao)) {
                if ($participante3 !== "") {
                    $id3 = "Select id_login,username from login where Username = '$participante3'";
                    $result = mysql_query($id3, $ligacao);
                    while ($row = mysql_fetch_assoc($result)) {
                        $id_login3 = $row['id_login'];
                    }
                    $insert_login3 = "Insert into login_inscricoes (id_login,id_inscricao,timestamp) VALUES ('$id_login3','$id_ins',curdate())";

                    mysql_query($insert_login3, $ligacao);
                }
            }
           
        }
        echo "Inscrito com sucesso";
        header("Refresh:2; url=./inscricoes.php"); // Redirect browser 

        exit();
    }
} catch (PDOException $e) {
    die($e);
}
