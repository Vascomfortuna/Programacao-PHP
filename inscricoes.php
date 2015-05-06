<html>
    <head>
        
        <script>
            function pesqNomes(text,id,div)
                {
                    var xmlhttp;
                    if (window.XMLHttpRequest)
                    {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    }
                    else
                    {// code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function ()
                    {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {

                            x = xmlhttp.responseText.split(",");
                            if (x[0] == "") {
                                y = "Nao foram encontrados utilizadores com este nome";
                            } else {
                                y = "<select multiple size ='3' width='300px' onmouseup='BuscarNome(this.value,\""+id+"\",\""+div+"\")'>";
                                for (i = 0; i < x.length; i++) {
                                    y += " <option>" + x[i] + "</option>";
                                }
                                y += "</select >";
                            }
                            document.getElementById(div).innerHTML = y;
                        }
                    };

                    xmlhttp.open("GET", "pesq_nomes.php?nome=" + text, true);
                    xmlhttp.send();
                }
                
                function BuscarNome(text,id,div){
                        document.getElementById(id).value=text;
                        document.getElementById(div).setAttribute("hidden","");
                    }
        </script>
        <script src="getlangtext.js"></script>
        <style>
            body{
                z-index: 0;
            }
            .div_pesq{
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
            function Participante(id,div){
                var text = document.getElementById(id).value;
                
                var div = document.getElementById(div);
                if(text.length === 0){  
                if (div.getAttribute("hidden") === null) {
                    div.setAttribute("hidden","");  
                }
                }
                else if (div.getAttribute("hidden") === "") {
                        div.removeAttribute("hidden");
                    }
                }
        </script>
    </head>
    <body>
        <?php include("./masterPage.php") ?>
         <?php
        if ((null !== (filter_input(INPUT_COOKIE, "id_login")) && (null !== (filter_input(INPUT_COOKIE, "nome"))&&(null === (filter_input(INPUT_COOKIE, "id_inscricao")))))) {
            ?>
        <form action="form_inscricao.php" type ="submit" method="POST" name="insc">
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
                    <input type="text" id="pt1" width ="30px" name="participante2" oninput="Participante('pt1','div_pesq');pesqNomes(this.value,'pt1','div_pesq')" name="text1"/> 
                    <br/><div hidden id="div_pesq" class='div_pesq' >  
                    </div>
                    <br/>
                    <input type="text" id="pt2"  width ="30px" name="participante3"   oninput="Participante('pt2','div_pesq2');pesqNomes(this.value,'pt2','div_pesq2')"/>
                    <br/><div hidden id="div_pesq2" class='div_pesq' ></div>
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
        }else if(((null !== (filter_input(INPUT_COOKIE, "id_login")) && (null !== (filter_input(INPUT_COOKIE, "nome"))&&(null !== (filter_input(INPUT_COOKIE, "id_inscricao"))))))){
            echo '<div align="center">Já se encontra inscrito</div>';
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

