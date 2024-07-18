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

function incluir()
{
    $id_publico = $_REQUEST["idPublico"];
    $id_usuario = $_REQUEST["idUsuario"];
    $descricao_pergunta = $_REQUEST["descricaoPergunta"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];

    include_once "perguntaPublicoController.php";

    $pergunta = new PerguntaPublicoController();
    $pergunta->cadastraPerguntaPublico($id_publico, $id_usuario, $descricao_pergunta, $data_cadastro, $ativo);

    echo "
        <script>
            location.href='../view/crud/formListarPerguntaPublico.php';
        </script>
    ";
}

function alterar()
{
    $id = $_REQUEST["idPerguntaPublico"];
    $id_publico = $_REQUEST["idPublico"];
    $id_usuario = $_REQUEST["idUsuario"];
    $descricao_pergunta = $_REQUEST["descricaoPergunta"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];

    include_once "perguntaPublicoController.php";

    $pergunta = new PerguntaPublicoController();
    $pergunta->alterarPerguntaPublico($id, $id_publico, $id_usuario, $descricao_pergunta, $data_cadastro, $ativo);

    echo "
        <script>
            location.href='../view/crud/formListarPerguntaPublico.php';
        </script>
    ";
}

function excluir()
{
    $id = $_REQUEST["idPerguntaPublico"];

    include_once "perguntaPublicoController.php";

    $pergunta = new PerguntaPublicoController();
    $pergunta->excluirPerguntaPublico($id);

    echo "
        <script>
            location.href='../view/crud/formListarPerguntaPublico.php';
        </script>
    ";
}

function listar()
{
    // include_once "formListarPerguntaPublico.php";
}