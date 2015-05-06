<?php

$id = filter_input(INPUT_GET, "id");

$ligacao = mysql_connect("localhost", "root", "");
if (!$ligacao) {
    die("nao foi possivel ligar:" . mysql_error());
}
$int = 0;
$sql = "select nome_equipa,instituto,observacoes from inscricoes where id_inscricao='$id'";
$membros=array("", "", "");
mysql_select_db("robo_bombeiro");
 $result = mysql_query($sql, $ligacao);
    while ($row = mysql_fetch_assoc($result)) {
        $nome=$row['nome_equipa'];
        $instituto=$row['instituto'];
        $obs=$row['observacoes'];
    }
  $sql2 = "Select l.username from login l join login_inscricoes i on l.id_login = i.id_login where id_inscricao = $id;";

 $result2 = mysql_query($sql2, $ligacao);
    while ($row2 = mysql_fetch_assoc($result2)) {
        $membros[$int]=$row2['username'];
        $int++;
    }  
?>
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
            function Participante(id,div2){
                var text = document.getElementById(id).value;
                
                var div = document.getElementById(div2);
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
        
        <form action="form_alterar.php?id=<?php echo $id;?>" method="POST" name="insc">
        <table align="center" >
            <tr>
                <th>
                   <script>getLangText("nomeEquipa");</script>
                </th>
                <td>
                    <input type="text" width ="30px" name="nomeEquipa" value="<?php echo $nome;?>"/>
                </td>
            </tr>
            <tr>
                <th style="vertical-align: text-top; ">
                   <script>getLangText("membros");</script>
                </th>
                <td>
                    <input type="text" id="pt1" width ="30px" name="participante1" oninput="Participante('pt1','div_pesq');pesqNomes(this.value,'pt1','div_pesq')" 
                           value="<?php echo $membros[0];?>"/> 
                    <br/><div hidden id="div_pesq" class='div_pesq' >  
                    </div>
                    <br/>
                    <input type="text" id="pt2"  width ="30px" name="participante2"   oninput="Participante('pt2','div_pesq2');pesqNomes(this.value,'pt2','div_pesq2')"
                           value="<?php echo $membros[1];?>" />
                    <br/><div hidden id="div_pesq2" class='div_pesq' >
                    </div>
                    <br/>
                    <input type="text" id="pt3"  width ="30px" name="participante3"   oninput="Participante('pt3','div_pesq3');pesqNomes(this.value,'pt3','div_pesq3')"
                           value="<?php echo $membros[2];?>" />
                    <br/><div hidden id="div_pesq3" class='div_pesq' ></div>
                </td>
            </tr>
            <tr>
                <th>
                   <script>getLangText("instituto");</script>
                </th>
                <td>
                    <input type="text" width ="30px" name="instituto" value="<?php echo $instituto;?>"/>
                </td>
            </tr>
            <tr>
                <th>
                   Obs:
                </th>
                <td>
                    <textarea rows="4" cols="50" maxlength="250" name="obs"><?php echo $obs;?></textarea>
                </td>
            </tr>
            <tr>
                <th>
                  
                </th>
                <td>
                    <input type="submit" value="Alterar equipa"/>
                </td>
            </tr>
        </table>
        </form>
       
    </body>
</html>
