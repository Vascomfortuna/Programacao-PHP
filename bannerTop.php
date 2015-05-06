<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open Sans">
        <script src="jquery-1.11.2.min.js"></script>
        <script src="getlangtext.js"></script>
        <style>
           

            #nomeTitulo{
                padding-top: 8%;
                height: -4%;
                font-size: 40px;
                color: #1B5878;
                vertical-align: bottom;
                font-family: 'Open Sans',extrabold, italic;
            } 
            #loginMenu{


                height: -100px;
                vertical-align: bottom;
                float:right;
                padding-right: 5px;
            }#login{
                float:right;
                border-style: solid;
                border-width: 3px;
                padding: 5px;
                width: 350px;
                height: 100px;
                background-color: #7361FA;
                color: #1F1A44;
            }

        </style>
        <script>
            function MudarPT() {
                document.cookie = "lan=./pt/strings.xml";
                location.reload();
            }
            function MudarEng() {
                document.cookie = "lan=./eng/strings.xml";
                location.reload();
            }
            function AbrirLogin() {
                var div = document.getElementById('login');
                var but = document.getElementById('btLogin');
                if (div.getAttribute("hidden") === "") {
                    div.removeAttribute("hidden");
                    but.setAttribute("hidden", "");
                }

            }
            function Logout() {
                        document.cookie = "id_login=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "nome=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "estado=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "nome_equipa=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "instituto=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "pago=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "obs=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "id_inscricao=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        document.cookie = "admin=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                        location.reload();
                }
            
        </script>

    </head>
    <body>

        <input name="pt" type="image" src="pt.gif"  onclick="MudarPT()"style="width:30px; height: 30px;">
        <input name="eng" type="image" src="uk.png"  onclick="MudarEng()"style="width:30px; height: 30px;">
        <?php
        if ((null === (filter_input(INPUT_COOKIE, "id_login")) || (null === (filter_input(INPUT_COOKIE, "nome"))))) {
            ?>
            <div id="loginMenu">

                <input id="btLogin" type="button" value="Login" onclick="AbrirLogin()">
            </div>

            <div id="login" hidden>
                <form action="form_login.php" type ="submit" method="POST" nome="formlogin">
                    <p>Username:<input type="text" width="20px" name="username"/></p>
                    <p>Password:<input type="password" width="20px" name="password"/>&nbsp;&nbsp;&nbsp;<input type="submit" value="Login"/></p>
                </form>
            </div>
            <?php
        } else {
            echo '<div id="loginMenu"> <table><tr><th>';
            echo 'Bem vindo, ' . filter_input(INPUT_COOKIE, "nome") . '</th></tr>';
            echo '<tr><td><input id="btLogout" type="button" value="Logout" onclick="Logout()"></td></tr>';
            if (filter_input(INPUT_COOKIE, "admin")=="1"){
                echo '<tr><td><form action="gcontas.php"><input type="submit" value="Gestão de contas" /></form></td></tr>';
            }
            echo '</table></div>';
        }
        ?>
        
        <div id="nomeTitulo"> <script>getLangText("nome");</script></div>
    </body>
</html>



