<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open Sans">
        <script src="jquery-1.11.2.min.js"></script>
        <style>
            body{
                height: -200px;
                width: 100%;
            }
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
                width: 25%;
                height: 100px;
                background-color: #1B5878;
            }
            
        </style>
        <script>
            
            function AbrirLogin(){
                var div = document.getElementById('login');
                if(div.getAttribute("hidden")===""){
                    div.removeAttribute("hidden");
                }else{
                    div.setAttribute("hidden","");
                }
                
            }
        </script>
        <?php
        function BuscarPT(){
            $xmlfile= "./pt/strings.xml";
            $parser=  xml_parser_create();
            $fp = fopen($xmlfile, 'r');
            $xmldata = fread($fp, 4096);
            $int = xml_parse_into_struct($parser, $xmldata, $values);
            
             xml_parser_free($parser); 
            echo "<script >alert('1');</script>";
            print_r($values);
            
        }
        ?>
    </head>
    <body>
       
        <input name="pt" type="image" src="pt.gif"  style="width:30px; height: 30px;">
        
        <div id="loginMenu">
            
            <input id="btLogin" type="button" onclick="AbrirLogin()" value="Login">
        </div>
         <div id="login" hidden>
                <p>Username:</p>
                <p>Password:</p>
            </div>
         <div id="nomeTitulo">Robo Bombeiro</div>
    </body>
</html>



