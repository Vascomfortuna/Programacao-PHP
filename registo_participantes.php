<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body{
                background-color: #35A0D9;
                
            }
            
            /* The Magic Float Center Code */
            .float_center {
                float: right;

                position: relative;
                left:  -50%; /* or right 50% */
                text-align: left;
            }
            .float_center > .child {
                position: relative;
                //left: 50%;
            }
            input{
               size:30px;
            }
            
            
        </style>
    </head>
    <body>
        <?php include("./masterPage.php")?>
     
        <div class="float_center">
        <form action="form_participantes.php" type ="submit" method="POST">
            
            <table class="child">  
                <tr>
                    <th>Nome:</th>
                    <td><input type="text"  name='nome'></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><input type="text" name='email'></td>
                </tr>
                <tr>
                    <th>Data Nascimento:</th>
                    <td><input type="date"  name='dataNasc'></td>
                </tr>
                 <tr>
                    <th>Telefone:</th>
                    <td><input type="text" name='telefone'></td>
                </tr>
                <tr>
                    <th>NIF:</th>
                    <td><input type="text" name='NIF'></td>
                </tr>
                <tr>
                    <th>NIB:</th>
                    <td><input type="text" name='NIB'></td>
                </tr>
                <tr>
                    <th>Morada:</th>
                    <td><input type="text"  name='morada'></td>
                </tr>
                <tr>
                    <th>CodPostal:</th>
                    <td><input type="text" name='codpostal'></td>
                </tr>
                <tr>
                    <th>Localidade:</th>
                    <td><input type="text"  name='localidade'></td>
                </tr>
                
            </table>
            
            <input type='submit' value="Registar" />
        </form>
         </div>
       
          
    </body>
</html>
