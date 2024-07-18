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
    $nome = $_REQUEST["nomePerfil"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];

    include_once "perfilController.php";

    $perfil = new PerfilController();
    $perfil->cadastraPerfil($nome, $data_cadastro, $ativo);

    echo "
        <script>
            location.href='../view/crud/formListarPerfil.php';
        </script>
    ";
}

function alterar()
{
    $id = $_REQUEST["idPerfil"];
    $nome = $_REQUEST["nomePerfil"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $ativo = $_REQUEST["ativo"];

    include_once "perfilController.php";

    $perfil = new PerfilController();
    $perfil->alterarPerfil($id, $nome, $data_cadastro, $ativo);

    echo "
        <script>
            location.href='../view/crud/formListarPerfil.php';
        </script>
    ";
}

function excluir()
{
    $id = $_REQUEST["idPerfil"];

    include_once "perfilController.php";

    $perfil = new PerfilController();
    $perfil->excluirPerfil($id);

    echo "
        <script>
            location.href='../view/crud/formListarPerfil.php';
        </script>
    ";
}

function listar()
{
    include "../view/formListarPerfil.php";
}