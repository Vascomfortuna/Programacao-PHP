<html>
    <head>
        <title>Robo Bombeiro 2015 </title>
        
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open Sans">
        <style>
            #section{
                float:left; 
                width:48%; 
                border-style:solid;
                border-color: #1F1A44;
                border-width: 3px; 
                margin-right: 5px; 
                height: 50% 
            }
        </style>
        
    </head>
    <body>
        <?php include("./masterPage.php") ?>
        <div id="section" style="">
            Noticias:<div ><script>getLangText("noticias"); </script>
            </div>
        
        </div>
        <div id="section" style="width:50%;">
            Eventos:<div>
                <script>getLangText("eventos"); </script>
            </div>
        </div>
    </body>
</html>

