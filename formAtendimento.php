<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario cadastro de Atendimento</title>
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
        .click{
            top: 50%;
            color: white;
        }
    </style>
</head>
<body>
    <h3><b>
        Formulario de Cadastro de Atendimento
    </h3></b>

    <br><br>

    <?php
    $operacao = $_REQUEST["op"];

    if ($operacao == "Alterar") {
        include "../../controller/atendimentoController.php";

        $res = AtendimentoController::resgataPorID($_REQUEST["idAtendimento"]);
        $qtd = $res->rowCount();
        $row = $res->fetch(PDO::FETCH_OBJ);

        $id = $row->idAtendimento;
        $idFormaAtendimento = $row->idFormaAtendimento;
        $idPerguntaPublico = $row->idPerguntaPublico;
        $idUsuario = $row->idUsuario;
        $data_cadastro = $row->dataCadastro;
        $ativo = $row->ativo;
        $respostaAtendimento = $row->respostaAtendimento;

        $operacao = "Alterar";
    } else {
        $id = "";
        $idFormaAtendimento = "";
        $idPerguntaPublico = "";
        $idUsuario = "";
        $nome = "";
        $data_cadastro = "";
        $ativo = "";
        $respostaAtendimento = "";

        $operacao = "Incluir";
    }

    echo '<div>
        <form action="../../controller/processaAtendimento.php" method="post">
        <input type="hidden" name="idAtendimento" value=' . $id . '>

        <label for="idFormaAtendimento">Id da Forma de Atendimento:</label>
        <select name="idFormaAtendimento"></div>';

    include '../../controller/formaAtendimentoController.php';

    $res = FormaAtendimentoController::listarIdFormasAtendimento();
    $qtd = $res->rowCount();

    while ($row = $res->fetch(PDO::FETCH_OBJ)) {
        echo '<option value="'. $row->idFormaAtendimento. '">'. $row->idFormaAtendimento. '</option>';
    }

    echo '<div></select>

        <br><br>

        <label for="idPerguntaPublico">Id da Pergunta Publico:</label>
        <select name="idPerguntaPublico"></div>';

    include '../../controller/perguntaPublicoController.php';

    $res = PerguntaPublicoController::listarIdPerguntasPublico();
    $qtd = $res->rowCount();

    while ($row = $res->fetch(PDO::FETCH_OBJ)) {
        echo '<option value="'. $row->idPerguntaPublico. '">'. $row->idPerguntaPublico. '</option>';
    }

    echo '<div></select>

        <br><br>

        <label for="idUsuario">Id do Usuario:</label>
        <select name="idUsuario"></div>';

    include '../../controller/usuarioController.php';

    $res = UsuarioController::listarIdUsuarios();
    $qtd = $res->rowCount();

    while ($row = $res->fetch(PDO::FETCH_OBJ)) {
        echo '<option value="'. $row->idUsuario. '">'. $row->idUsuario. '</option>';
    }

    echo ' <div> </select>
    
        <br><br>
        <label for="data_cadastro">Data de Cadastro (DD-MM-YYYY):</label>
        <input type="date" name="dataCadastro" value=' . $data_cadastro . '><br><br>

        <label for="ativo">Ativo:</label>
        <input type="text" name="ativo" value=' . $ativo . '><br><br>

        <label for="respostaAtendimento">Resposta do Atendimento:</label>
        <input type="text" name="respostaAtendimento" value=' . $respostaAtendimento . '><br><br>
        
        <input type="hidden" name="op" value=' . $operacao . '>

        <input type="submit" class "click" value=' . $operacao . '>
        </form>

        <br><br>
        
        <a href="./homeCrud.html">Voltar</a></div>';
    ?>
</body>
</html>