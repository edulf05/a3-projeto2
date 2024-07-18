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
    $nome_publico = $_REQUEST["nomePublico"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];

    include_once "publicoController.php";

    $publico = new PublicoController();
    $publico->cadastraPublico($id_usuario, $nome_publico, $data_cadastro, $ativo);

    echo "
        <script>
            location.href='../view/crud/formListarPublico.php';
        </script>
    ";
}

function alterar()
{
    $id = $_REQUEST["idPublico"];
    $id_usuario = $_REQUEST["idUsuario"];
    $nome_publico = $_REQUEST["nomePublico"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];

    include_once "publicoController.php";
    
    $publico = new PublicoController();
    $publico->alteraPublico($id, $id_usuario, $nome_publico, $data_cadastro, $ativo);

    echo "
        <script>
            location.href='../view/crud/formListarPublico.php';
        </script>
    ";
}

function excluir()
{
    $id = $_REQUEST["idPublico"];

    include_once "publicoController.php";
    
    $publico = new PublicoController();
    $publico->excluirPublico($id);

    echo "
        <script>
            location.href='../view/crud/formListarPublico.php';
        </script>
    ";
}

function listar()
{
    // include "../view/formListarPublico.php";
}
