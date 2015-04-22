<?php
$nomeEquipa = filter_input(INPUT_POST, "nomeEquipa");
$instituto = filter_input(INPUT_POST, "instituto");
$obs = filter_input(INPUT_POST, "obs");
$id_login = filter_input(INPUT_COOKIE, "id_login");

$ligacao = mysql_connect("localhost", "root", "");
if (!$ligacao) {
    die("nao foi possivel ligar:" . mysql_error());
}

$insert_inscricao = "Insert into inscricoes (Nome_Equipa,Instituto,Observacoes) VALUES ('$nomeEquipa','$instituto','$obs')";
$id_inscricao = "select LAST_INSERT_ID() id_inscricao  from inscricoes;";


mysql_select_db("robo_bombeiro");
try {
    mysql_query($insert_inscricao, $ligacao);
    $result = mysql_query($id_inscricao, $ligacao);
    while ($row = mysql_fetch_assoc($result)) {
        $id_ins = $row['id_inscricao'];
    }
    $insert_login = "Insert into login_inscricoes (id_login,id_inscricao,timestamp) VALUES ('$id_login','$id_ins',curdate())";
    if(mysql_query($insert_login, $ligacao)){
        echo "Inscrito com sucesso";
    }
        header("Refresh:5; url=./index.php"); // Redirect browser 
       
        exit();
    
} catch (PDOException $e) {
    die($e);
}
