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
        echo "N�o encontrou chave.";
}

function incluir() 
{
    $nome = $_REQUEST["nomeUsuario"];
    $email = $_REQUEST["emailUsuario"];
    $login = $_REQUEST["loginUsuario"];
    $senha = $_REQUEST["senhaUsuario"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $telefone = $_REQUEST["telefoneCelular"];
    $ativo = $_REQUEST["ativo"];
    $id_perfil = $_REQUEST["idPerfil"];

    include_once "usuarioController.php";

    $usuario = new UsuarioController();
    $usuario->cadastraUsuario($nome, $email, $login, $senha, $data_cadastro, $telefone, $ativo, $id_perfil);

    echo "
        <script>
            location.href='../view/crud/formListarUsuario.php';
        </script>
    ";
}

function alterar() 
{
    $id = $_REQUEST["idUsuario"];
    $nome = $_REQUEST["nomeUsuario"];
    $email = $_REQUEST["emailUsuario"];
    $login = $_REQUEST["loginUsuario"];
    $senha = $_REQUEST["senhaUsuario"];
    $data_cadastro = $_REQUEST["dataCadastro"];
    $telefone = $_REQUEST["telefoneCelular"];
    $ativo = $_REQUEST["ativo"];
    $id_perfil = $_REQUEST["idPerfil"];

    include_once "usuarioController.php";

    $usuario = new UsuarioController();
    $usuario->alterarUsuario($id, $nome, $email, $login, $senha, $data_cadastro, $telefone, $ativo, $id_perfil);

    echo "
        <script>
            location.href='../view/crud/formListarUsuario.php';
        </script>
    ";
}

function excluir()
{
    $id = $_REQUEST["idUsuario"];

    include "usuarioController.php";

    $controller = new UsuarioController();
    $controller->excluirUsuario($id);
    
    echo "
        <script>
            location.href='../view/crud/formListarUsuario.php';
        </script>
    ";
}

function listar()
{
    include "../view/crud/formListarUsuario.php";
}