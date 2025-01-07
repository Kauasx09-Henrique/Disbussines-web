<?php
    include_once '../control/listarUsuariosControl.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylelistaruser.css">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <table >
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th colspan="2">Operacões</th>
       
    </tr>
    <?php foreach($todos as $t){?>
           <tr>
                <td><?php echo $t['id_user']?></td>
                <td><?php echo $t['nome']?></td>
                <td><?php echo $t['email']?></td>
            <td>
                <a href="../control/excluirUsuariosControl.php?id_user=<?php echo $t['id_user']?>">
                  <button style="background-color: red; color: oldlace;">Excluir</button>  
                </a>
            
            </td>
            <td>
                <a href="alterarUsuario.php?id_user=<?php echo $t['id_user']?>">
                    <button style="background-color: green;color: oldlace;">Alterar</button>
                </a>
            
            </td>

           </tr>

        <?php }?>  
           

    </table>
</body>
</html>