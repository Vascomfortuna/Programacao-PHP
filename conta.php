<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <style>
           
            th{
                text-align: left;
                padding-bottom: 5px;
            }
            td{
                text-align: left;
                padding-left: 5px;
            }
        </style>
    </head>
    <body>
     <?php include("./masterPage.php") ?>  
        <table align="left" style="font-size: 22px;">
            <tr>
                <th>
                     Nome:
                </th>
                <td>
                     <?php echo filter_input(INPUT_COOKIE, "nome");?>
                </td>
            </tr>
             <tr>
                <th>
                     Equipa:  
                </th>
                <td>
                     <?php echo filter_input(INPUT_COOKIE, "nome_equipa");?>
                </td>
            </tr>
            <tr>
                <th>
                     Estado:  
                </th>
                <td>
                      <?php if(filter_input(INPUT_COOKIE, "estado")==0){
                         echo "Não está inscrito.";
                     }else{
                         echo "Inscrito.";
                     }
                        
                       ?>
                </td>
            </tr>
            <tr>
                <th>
                     Instituto:  
                </th>
                <td>
                     <?php echo filter_input(INPUT_COOKIE, "instituto");?>
                </td>
            </tr>
           
        </table>
     
    </body>   
</html>

