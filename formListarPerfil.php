<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de perfis</title>
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
    include "../../controller/perfilController.php";

    $res = PerfilController::listarPerfis();
    $qtd = $res->rowCount();

    if ($qtd > 0) {
        echo "<div><table border='1'>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Data Cadastro</th>
                    <th>Ativo</th>
                </tr></div>";

        while ($row = $res->fetch(PDO::FETCH_OBJ)) {
            echo "<div><tr>
                    <td>$row->idPerfil</td>
                    <td>$row->nomePerfil</td>
                    <td>$row->dataCadastro</td>
                    <td>$row->ativo</td>

                    <td>
                        <a href='formPerfil.php?op=Alterar&idPerfil=$row->idPerfil'>Alterar</a> 
                        <a href='../../controller/processaPerfil.php?op=Excluir&idPerfil=$row->idPerfil'>Excluir</a>
                    </td>
                </tr></div>";
        }

        echo "<div></table></div>";
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