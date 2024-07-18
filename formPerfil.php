<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario cadastro perfil</title>
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
    <h3>
        Formulário de Cadastro de Perfil
    </h3>

    <br><br>

    <?php
    $operacao = $_REQUEST["op"];

    if ($operacao == "Alterar") {
        include "../../controller/perfilController.php";

        $res = PerfilController::resgataPorID($_REQUEST["idPerfil"]);
        $qtd = $res->rowCount();
        $row = $res->fetch(PDO::FETCH_OBJ);

        $id = $row->idPerfil;
        $nome = $row->nomePerfil;
        $data_cadastro = $row->dataCadastro;
        $ativo = $row->ativo;

        $operacao = "Alterar";
    } else {
        $id = "";
        $nome = "";
        $data_cadastro = "";
        $ativo = "";

        $operacao = "Incluir";
    }

    echo '
        <div>
        <form action="../../controller/processaPerfil.php" method="post">
        <input type="hidden" name="idPerfil" value=' . $id . '>

        <label for="nome">Nome:</label>
        <input type="text" name="nomePerfil" value=' . $nome . '><br><br>

        <label for="data_cadastro">Data de Cadastro (DD-MM-YYYY):</label>
        <input type="date" name="dataCadastro" value=' . $data_cadastro . '><br><br>

        <label for="ativo">Ativo:</label>
        <input type="text" name="ativo" value=' . $ativo . '><br><br>
        
        <input type="hidden" name="op" value=' . $operacao . '>

        <input type="submit" value=' . $operacao . '>
        </form>

        <br><br>
        
        <a href="./homeCrud.html">Voltar</a> </div>';
    ?>
</body>

</html>