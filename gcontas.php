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
                width: 20%;
            }
        </style>
         <script>
            function ConfirmarApagar(id) {
                if(confirm("Tem a certeza que quer apagar esta inscricao?")){
                    window.location.href = "apagar_inscricao.php?id="+id;
                }
                else{
                    
                }
            }
        </script>
    </head>
    <body>
<?php

include("./masterPage.php");


$ligacao = mysql_connect("localhost", "root", "");
if (!$ligacao) {
    die("nao foi possivel ligar:" . mysql_error());
}

$equipas = "select id_inscricao,nome_equipa,instituto,observacoes from inscricoes";


mysql_select_db("robo_bombeiro");
try {?>
        <br/>
    <table align="center">
   <tr>
       <td><script>getLangText("nomeEquipa");</script></td>
       <td><script>getLangText("instituto");</script></td>
       <td>Obs.</td>
   </tr>
    <?php
    
    $result = mysql_query($equipas, $ligacao);
    while ($row = mysql_fetch_assoc($result)) {
        echo '<tr>';
        echo "<td> <a href=\"equipas.php?id=".$row['id_inscricao']."\">".$row['nome_equipa']."</a></td>";
        echo "<td>".$row['instituto']."</td>";
        echo "<td>".$row['observacoes']."</td>";
        echo "<td><a href=\"alterar_inscricao.php?id=".$row['id_inscricao']."\">Alterar</a></td>";
        echo "<td><a onclick=\"ConfirmarApagar(".$row['id_inscricao'].")\">Apagar</a></td>";
        echo '</tr>';
    }
   ?></table><?php
} catch (PDOException $e) {
    die($e);
}
?>
    </body>
    </html>