<html>
    <head>
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
            td{
                width: 33%;
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
                <td><a href="index.php" ><div id="titulo">Home</div></a></td>
                <td><a href="registo.php"><div id="titulo"><script>getLangText("registar");</script></div></a></td>
                <td><a href=""><div id="titulo"><script>getLangText("inscricoes");</script></div></a></td>
            </tr>
        </table>
    </body>
</html>


