<html>
    <head>
        <style>
            table{
                font-family: Georgia;
                font-size: 18px;
                text-align: center;
                width: 100%;
            }
            td{
                width: 33%;
            }
        </style>
    </head>
    <body>
<?php
$id = filter_input(INPUT_GET, "id");
include("./masterPage.php");


$ligacao = mysql_connect("localhost", "root", "");
if (!$ligacao) {
    die("nao foi possivel ligar:" . mysql_error());
}

$membros= "Select l.nome from login l join login_inscricoes i on l.id_login = i.id_login where id_inscricao = $id;";


mysql_select_db("robo_bombeiro");
try {?>
    <table align="center">
   <tr>
       <td><script>getLangText("membros2");</script></td>
       
   </tr>
   <tr><td></td></tr>
    <?php
    
    $result = mysql_query($membros, $ligacao);
    while ($row = mysql_fetch_assoc($result)) {
        echo '<tr>';
        echo "<td>".$row['nome']."</td>";
        echo '</tr>';
    }
   ?></table><?php
} catch (PDOException $e) {
    die($e);
}
?>
    </body>
    </html>