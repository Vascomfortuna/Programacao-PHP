<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Robo Bombeiro 2015 </title>
       <?php include("./funcoes.php") ?> 
        <style>
            body{
                background-color: #35A0D9;
            }
            a{
                text-decoration: none;
                color:#1F1A44;
            }
            a:hover  {
                color:#7361FA; 
                background:#1F1A44; 
            }
           
            #titulo{
                height:100%;
                width:100%;
                text-align: center; 
                background:#7361FA; 
            }#titulo:hover{
                background:#1F1A44;  
            }
            
        </style>
    </head>
    <body>
     <?php include("./bannerTop.php") ?>
        <table width="100%">
           
            <tr >
                <td style="width: 33%"><a href="index.php" ><div id="titulo">Home</div></a></td>
                <?php if((null === (filter_input(INPUT_COOKIE, "id_login")) || (null === (filter_input(INPUT_COOKIE, "nome"))))){
                    echo '<td style="width: 33%"><a href="registo.php"><div id="titulo"><script>getLangText("registar");</script></div></a></td>';
                }else{
                    echo '<td style="width: 33%"><a href="conta.php"><div id="titulo"><script>getLangText("conta");</script></div></a></td>';   
                }
                ?>
                
                <td style="width: 33%"><a href="inscricoes.php"><div id="titulo"><script>getLangText("inscricoes");</script></div></a></td>
            </tr>
        </table>
    </body>
</html>


