<html>
    <body>
        <?php
        $username = filter_input(INPUT_POST, "username");
        $password = md5(filter_input(INPUT_POST, "password"));
        $perguntaS = filter_input(INPUT_POST, "perguntaS");
        $respostaS = filter_input(INPUT_POST, "respostaS");
        $nomeR = filter_input(INPUT_POST, "nomeR");
        $ligacao = mysql_connect("localhost", "root", "");
        if (!$ligacao) {
            die("nao foi possivel ligar:" . mysql_error());
        }

        $login_user = "Insert into login (Username,Password,PerguntaSeguranca,RespostaSeguranca,Nome) VALUES "
                . "('$username','$password','$perguntaS','$respostaS','$nomeR')";
        mysql_select_db("robo_bombeiro");
        try {
            mysql_query($login_user);
            echo "Registado com sucesso";
            header("Refresh:2; url=./index.php"); // Redirect browser 
        } catch (PDOException $e) {
            die($e);
        }
        ?>
    </body>
</html>