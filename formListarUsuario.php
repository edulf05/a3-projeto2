<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-image: linear-gradient(to right, gray, black);
            color:white;
        }
        div{
            position: absolute;
            top: 50%;
            left:50%;
            transform:translate(-50%, -50%);
            
        }
    </style>
</head>

<body>
    <?php
    include "../../controller/usuarioController.php";

    $res = UsuarioController::listarUsuarios();
    $qtd = $res->rowCount();

    if ($qtd > 0) {
        echo "<div><table border='1'>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Login</th>
                    <th>Senha</th>
                    <th>Data Cadastro</th>
                    <th>Telefone/Celular</th>
                    <th>Ativo</th>
                    <th>Id Perfil</th>
                </tr></div>";

        while ($row = $res->fetch(PDO::FETCH_OBJ)) {
            echo "<div> <tr>
                    <td>$row->idUsuario</td>
                    <td>$row->nomeUsuario</td>
                    <td>$row->emailUsuario</td>
                    <td>$row->loginUsuario</td>
                    <td>$row->senhaUsuario</td>
                    <td>$row->dataCadastro</td>
                    <td>$row->telefoneCelular</td>
                    <td>$row->ativo</td>
                    <td>$row->idPerfil</td>

                    <td>
                        <a href='formUsuario.php?op=Alterar&id=$row->idUsuario'>Alterar</a> 
                        <a href='../../controller/processaUsuario.php?op=Excluir&idUsuario=$row->idUsuario'>Excluir</a>
                    </td>
                </tr> </div>";
        }

        echo "</table>";
    } else {
        echo "<p>Nenhum registro encontrado!</p>";
    }

    echo '
        <br><br>
        
        <a href="./homeCrud.html">Voltar</a>
    ';
    ?>
</body>

</html>