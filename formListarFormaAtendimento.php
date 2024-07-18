<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Formas de Atendimento</title>
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
    include "../../controller/formaAtendimentoController.php";

    $res = FormaAtendimentoController::listarFormasAtendimento();
    $qtd = $res->rowCount();

    if ($qtd > 0) {
        echo "<div><table border='1'>
                <tr>
                    <th>Id</th>
                    <th>Id Usuario</th>
                    <th>Nome</th>
                    <th>Data Cadastro</th>
                    <th>Ativo</th>
                </tr></div>";

        while ($row = $res->fetch(PDO::FETCH_OBJ)) {
            echo "<div><tr>
                    <td>$row->idFormaAtendimento</td>
                    <td>$row->idUsuario</td>
                    <td>$row->nomeAtendimento</td>
                    <td>$row->dataCadastro</td>
                    <td>$row->ativo</td>

                    <td>
                        <a href='formFormaAtendimento.php?op=Alterar&idFormaAtendimento=$row->idFormaAtendimento'>Alterar</a> 
                        <a href='../../controller/processaFormaAtendimento.php?op=Excluir&idFormaAtendimento=$row->idFormaAtendimento'>Excluir</a>
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