<?php

class UsuarioController {
    public static function cadastraUsuario($nome, $email, $login, $senha, $data_cadastro, $telefone_celular, $ativo, $id_perfil)
    {
        include "../model/usuarioModel.php";

        $usuario = new UsuarioModel(null, $nome, $email, $login, $senha, $data_cadastro, $telefone_celular, $ativo, $id_perfil);
        $usuario->cadastraUsuario($usuario);
    }

    public static function listarUsuarios()
    {
        include "../../model/usuarioModel.php";

        $model = new UsuarioModel(null, null, null, null, null, null, null, null, null);
        return $model->listarUsuarios();
    }

    public static function listarIdUsuarios()
    {
        include "../../model/usuarioModel.php";

        $model = new UsuarioModel(null, null, null, null, null, null, null, null, null);
        return $model->listarIdUsuarios();
    }

    public static function resgataPorId($id)
    {
        include "../../model/usuarioModel.php";

        $model = new UsuarioModel(null, null, null, null, null, null, null, null, null);
        return $model->resgataPorId($id);
    }

    public static function alterarUsuario($id, $nome, $email, $login, $senha, $data_cadastro, $telefone_celular, $ativo, $id_perfil)
    {
        include "../model/usuarioModel.php";

        $usuario = new UsuarioModel($id, $nome, $email, $login, $senha, $data_cadastro, $telefone_celular, $ativo, $id_perfil);
        $usuario->alterarUsuario($usuario);
    }

    public static function excluirUsuario($id)
    {
        include "../model/usuarioModel.php";

        $usuario = new UsuarioModel(null, null, null, null, null, null, null, null, null);
        return $usuario->excluirUsuario($id);
    }
}