<html>
    <body>
        <?php
        $username = filter_input(INPUT_POST, "username");
        $password = filter_input(INPUT_POST, "password");
        $perguntaS = filter_input(INPUT_POST, "perguntaS");
        $respostaS = filter_input(INPUT_POST, "respostaS");

        $ligacao = mysql_connect("localhost", "root", "");
        if (!$ligacao) {
            die("nao foi possivel ligar:" . mysql_error());
        }

        $insert_user = "Insert into login (Username,Password,PerguntaSeguranca,RespostaSeguranca) VALUES "
                . "('$username','$password','$perguntaS','$respostaS')";
        echo $insert_user;
        mysql_select_db("robo_bombeiro");
        try {
            mysql_query($insert_user);
        } catch (PDOException $e) {
            die($e);
        }
        ?>
    </body>
</html>