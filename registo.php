<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script src="getlangtext.js"></script>
        <meta charset="UTF-8">
        <title>Registo Robo</title>
        <style>
            th{
                text-align: right;
                padding-bottom: 10px;
                
            }
            td{

                padding-bottom: 10px;
            }
            
        </style>
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
            <table align="center" >
                <tr>
                    <th>Username/Email</th>
                    <td><input type="email" name="username"/></td>
                </tr>
                <tr>
                    <th><script>getLangText("nomeR");</script></th>
                    <td><input id="nomeR" type="text" name="nomeR" />
                    </td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input id="pd1" type="password"  name="password"/></td>
                </tr>
                <tr>
                    <th><script>getLangText("confPass");</script></th>
                    <td><input id="pd2" type="password"  name="passwordC" onchange="VerificarPass()"/>
                        
                    </td>
                </tr>
                <tr>
                    <th><script>getLangText("pergSeg");</script></th>
                    <td><select id="perguntaS" name="perguntaS">  

                            <option value="carro"><script>getLangText("carro");</script></option>
                            <option value="mae"><script>getLangText("mae");</script></option>
                            <option value="animal"><script>getLangText("animal");</script></option>
                            <option value="escola"><script>getLangText("escola");</script></option>     
                        </select></td>
                </tr>
                 <tr>
                    <th><script>getLangText("respSeg")</script></th>
                    <td><input id="respotaS" type="text" name="respostaS" />
                        
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type='submit' value="Registar" id="btRegistar" /></td>
                </tr>
            </table>
            
        </form>
       
    </body>
</html>

