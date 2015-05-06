<?php

$id = filter_input(INPUT_GET, "id");
$nomeEquipa = filter_input(INPUT_POST, "nomeEquipa");
$instituto = filter_input(INPUT_POST, "instituto");
$obs = filter_input(INPUT_POST, "obs");
$participante1 = filter_input(INPUT_POST, "participante1");
$participante2 = filter_input(INPUT_POST, "participante2");
$participante3 = filter_input(INPUT_POST, "participante3");

$ligacao = mysql_connect("localhost", "root", "");
if (!$ligacao) {
    die("nao foi possivel ligar:" . mysql_error());
}

$delete_inscricao= "delete from inscricoes where id_inscricao = $id";
$delete_login= "delete from login_inscricoes where id_inscricao = $id";
$insert_inscricao = "Insert into inscricoes (Nome_Equipa,Instituto,Observacoes) VALUES ('$nomeEquipa','$instituto','$obs')";
$id_inscricao = "select LAST_INSERT_ID() id_inscricao  from inscricoes;";


mysql_select_db("robo_bombeiro");
try {
    mysql_query($delete_login, $ligacao);
    mysql_query($delete_inscricao, $ligacao);
    mysql_query($insert_inscricao, $ligacao);
    $result = mysql_query($id_inscricao, $ligacao);
    while ($row = mysql_fetch_assoc($result)) {
        $id_ins = $row['id_inscricao'];
    }
     if ($participante1 != "") {
            $id2 = "Select id_login,username from login where Username = '$participante1'";
            $result = mysql_query($id2, $ligacao);
            while ($row = mysql_fetch_assoc($result)) {
                $id_login = $row['id_login'];
            }
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
        header("Refresh:2; url=./gcontas.php");// Redirect browser 

       
    }
     
} catch (PDOException $e) {
    die($e);
}
