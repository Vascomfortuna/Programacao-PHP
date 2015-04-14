<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registo Robo</title>
        <script>
            function VerificarPass(){
                var a1= document.getElementById('pd1').value;
                var a2= document.getElementById('pd2').value;; //document.getElementById('p2').value;
                var x = document.getElementById('btRegistar');
                if(a1!==a2){
                    
                    alert("..");
                    x.setAttribute("type","button");
                }
                
            }
        </script>
    </head>
    <body>
        <?php include("./masterPage.php") ?>
        <form action="form_registo.php" type ="submit" method="POST" nome="registo">
            <table>
                <tr>
                    <th>Username/Email</th>
                    <td><input type="email" name="username"/></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input id="pd1" type="password"  name="password"/></td>
                </tr>
                <tr>
                    <th>Confirmação da password</th>
                    <td><input id="pd2" type="password"  name="passwordC" onchange="VerificarPass()"/>
                        
                    </td>
                </tr>
                <tr>
                    <th>Pergunta de segurança</th>
                    <td><select id="perguntaS" name="perguntaS">  

                            <option value="carro">Qual foi o seu primeiro carro?</option>
                            <option value="mae">Qual o apelido da sua mãe?</option>
                            <option value="animal">Qual o nome do seu primeiro animal de estimação?</option>
                            <option value="escola">Qual foi a sua escola primária?</option>     
                        </select></td>
                </tr>
                 <tr>
                    <th>Resposta de segurança</th>
                    <td><input id="respotaS" type="text" name="respostaS" />
                        
                    </td>
                </tr>
            </table>
            <input type='submit' value="Registar" id="btRegistar" />
        </form>
    </body>
</html>

