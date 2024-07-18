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
    $id_usuario = $_REQUEST["idUsuario"];
    $nome_atendimento = $_REQUEST["nomeAtendimento"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];

    include_once "formaAtendimentoController.php";

    $controller = new FormaAtendimentoController();
    $controller->cadastraFormaAtendimento($id_usuario, $nome_atendimento, $data_cadastro, $ativo);

    echo "
        <script>
            location.href='../view/crud/formListarFormaAtendimento.php';
        </script>
    ";
}

function alterar()
{
    $id_forma_atendimento = $_REQUEST["idFormaAtendimento"];
    $id_usuario = $_REQUEST["idUsuario"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $nome_atendimento = $_REQUEST["nomeAtendimento"];
    $ativo = $_REQUEST["ativo"];

    include_once "formaAtendimentoController.php";

    $controller = new FormaAtendimentoController();
    $controller->alteraFormaAtendimento($id_forma_atendimento, $id_usuario, $nome_atendimento, $data_cadastro, $ativo);

    echo "
        <script>
            location.href='../view/crud/formListarFormaAtendimento.php';
        </script>
    ";
}

function excluir()
{
    $id_forma_atendimento = $_REQUEST["idFormaAtendimento"];

    include_once "formaAtendimentoController.php";

    $controller = new FormaAtendimentoController();
    $controller->excluirFormaAtendimento($id_forma_atendimento);

    echo "
        <script>
            location.href='../view/crud/formListarFormaAtendimento.php';
        </script>
    ";
}

function listar()
{
    //include_once "formListarFormaAtendimento.php";
}
