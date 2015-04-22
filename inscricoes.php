<html>
    <head>
        <script src="getlangtext.js"></script>
        <style>
            body{
                z-index: 0;
            }
            #div_pesq{
                position: absolute;
                z-index: 1;
                border-style: solid
            }
            table{
                z-index: 0;
            }
            th{
               text-align: right;
               padding-bottom: 10px;
            }
            td{
                padding-bottom: 10px;
            }
            
        </style>
        <script>
            function Participante(){
                
            }
        </script>
    </head>
    <body>
        <?php include("./masterPage.php") ?>
         <?php
        if ((null !== (filter_input(INPUT_COOKIE, "id_login")) && (null !== (filter_input(INPUT_COOKIE, "nome"))))) {
            ?>
        <form action="form_inscricao.php" type ="submit" method="POST">
        <table align="center" >
            <tr>
                <th>
                   <script>getLangText("nomeEquipa");</script>
                </th>
                <td>
                    <input type="text" width ="30px" name="nomeEquipa"/>
                </td>
            </tr>
            <tr>
                <th style="vertical-align: text-top; ">
                   <script>getLangText("membros");</script>
                </th>
                <td>
                    <input type="text" width ="30px" name="participante2" onchange="Participante()"/> 
                    <br/><div id="div_pesq"style=""></div>
                    <br/>
                    <input type="text" width ="30px" name="participante3" onchange="Participante()"/>
                </td>
            </tr>
            <tr>
                <th>
                   <script>getLangText("instituto");</script>
                </th>
                <td>
                    <input type="text" width ="30px" name="instituto"/>
                </td>
            </tr>
            <tr>
                <th>
                   Obs:
                </th>
                <td>
                    <textarea rows="4" cols="50" maxlength="250" name="obs"></textarea>
                </td>
            </tr>
            <tr>
                <th>
                  
                </th>
                <td>
                    <input type="submit" value="Inscrever equipa"/>
                </td>
            </tr>
        </table>
        </form>
        <?php
        } else {
           
            echo '<div align="center">
                Por favor efectue login para se inscrever.
                <form action="form_login.php" type ="submit" method="POST" nome="formlogin" >
                    <p>Username:<input type="text" width="20px" name="username"/></p>
                    <p>Password:<input type="password" width="20px" name="password"/></p>
                    <p><input type="submit" value="Login"/></p>
                </form>
                </div>';
        }
        ?>
    </body>
</html>

