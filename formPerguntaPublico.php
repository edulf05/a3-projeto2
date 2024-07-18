<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario cadastro de Pergunta Publico</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-image: linear-gradient(to right, gray, black);
            color:white;
        }
    </style>
</head>

<body>
    <h3>
        Formulário de Cadastro de Pergunta Publico
    </h3>

    <br><br>

    <?php
    $operacao = $_REQUEST["op"];

    if ($operacao == "Alterar") {
        include "../../controller/perguntaPublicoController.php";

        $res = PerguntaPublicoController::resgataPorID($_REQUEST["idPerguntaPublico"]);
        $qtd = $res->rowCount();
        $row = $res->fetch(PDO::FETCH_OBJ);

        $id = $row->idPerguntaPublico;
        $idPublico = $row->idPublico;
        $idUsuario = $row->idUsuario;
        $descricao_pergunta = $row->descricaoPergunta;
        $data_cadastro = $row->dataCadastro;
        $ativo = $row->ativo;

        $operacao = "Alterar";
    } else {
        $id = "";
        $idPublico = "";
        $idUsuario = "";
        $descricao_pergunta = "";
        $data_cadastro = "";
        $ativo = "";

        $operacao = "Incluir";
    }

    echo '
        <form action="../../controller/processaPerguntaPublico.php" method="post">
        <input type="hidden" name="idPerguntaPublico" value=' . $id . '>

        <label for="idPublico">Id do Publico:</label>
        <select name="idPublico">';

    include '../../controller/publicoController.php';

    $res = PublicoController::listarIdPublicos();
    $qtd = $res->rowCount();

    while ($row = $res->fetch(PDO::FETCH_OBJ)) {
        echo '<option value="'. $row->idPublico. '">'. $row->idPublico. '</option>';
    }

    echo '</select>

        <br><br>

        <label for="idUsuario">Id do Usuario:</label>
        <select name="idUsuario">';

    include '../../controller/usuarioController.php';

    $res = UsuarioController::listarIdUsuarios();
    $qtd = $res->rowCount();

    while ($row = $res->fetch(PDO::FETCH_OBJ)) {
        echo '<option value="'. $row->idUsuario. '">'. $row->idUsuario. '</option>';
    }

    echo '</select>

        <br><br>

        <label for="descricaoPergunta">Descricao da pergunta:</label>
        <input type="text" name="descricaoPergunta" value=' . $descricao_pergunta . '><br><br>

        <label for="data_cadastro">Data de Cadastro (AAAA-MM-DD):</label>
        <input type="text" name="dataCadastro" value=' . $data_cadastro . '><br><br>

        <label for="ativo">Ativo:</label>
        <input type="text" name="ativo" value=' . $ativo . '><br><br>
        
        <input type="hidden" name="op" value=' . $operacao . '>

        <input type="submit" value=' . $operacao . '>
        </form>

        <br><br>
        
        <a href="./homeCrud.html">Voltar</a>
    ';
    ?>
</body>

</html>