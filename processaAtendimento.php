<?php

switch ($_REQUEST["op"]) {
    case "Incluir":
        incluir();
        break;
    case "Alterar":
        alterar();
        break;
    case "Excluir":
        excluir();
        break;
    case "Listar":
        listar();
        break;
    default:
        echo "Nao encontrou chave.";
}

function incluir() {
    $id_forma_atendimento = $_REQUEST["idFormaAtendimento"];
    $id_pergunta_publico = $_REQUEST["idPerguntaPublico"];
    $id_usuario = $_REQUEST["idUsuario"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];
    $resposta_atendimento = $_REQUEST["respostaAtendimento"];

    include_once "atendimentoController.php";

    $controller = new AtendimentoController();
    $controller->cadastraAtendimento($id_forma_atendimento, $id_pergunta_publico, $id_usuario, $data_cadastro, $ativo, $resposta_atendimento);

    echo "
        <script>
            location.href='../view/crud/formListarAtendimento.php';
        </script>
    ";
}

function alterar()
{
    $id = $_REQUEST["idAtendimento"];
    $id_forma_atendimento = $_REQUEST["idFormaAtendimento"];
    $id_pergunta_publico = $_REQUEST["idPerguntaPublico"];
    $id_usuario = $_REQUEST["idUsuario"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];
    $resposta_atendimento = $_REQUEST["respostaAtendimento"];

    include_once "atendimentoController.php";

    $controller = new AtendimentoController();
    $controller->alterarAtendimento($id, $id_forma_atendimento, $id_pergunta_publico, $id_usuario, $data_cadastro, $ativo, $resposta_atendimento);

    echo "
        <script>
            location.href='../view/crud/formListarAtendimento.php';
        </script>
    ";
}

function excluir()
{
    $id = $_REQUEST["idAtendimento"];

    include_once "atendimentoController.php";

    $controller = new AtendimentoController();
    $controller->excluirAtendimento($id);

    echo "
        <script>
            location.href='../view/crud/formListarAtendimento.php';
        </script>
    ";
}

function listar()
{
    // include "../view/formListarAtendimento.php";
}