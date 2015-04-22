<html>
    <head>
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
        <table align="center" style="font-size: 22px;">
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
                     <?php echo filter_input(INPUT_COOKIE, "estado");?>
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
            <tr>
                <th>
                     Pago:  
                </th>
                <td>
                     <?php echo filter_input(INPUT_COOKIE, "pago");?>
                </td>
            </tr>
        </table>
     
    </body>   
</html>

