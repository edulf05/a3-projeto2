<?php

class PerfilController
{
    public static function cadastraPerfil($nome, $data_cadastro, $ativo)
    {
        include_once "../model/perfilModel.php";

        $perfil = new PerfilModel(null, $nome, $data_cadastro, $ativo);
        $perfil->cadastraPerfil($perfil);
    }

    public static function listarPerfis()
    {
        include_once "../../model/perfilModel.php";

        $model = new PerfilModel(null, null, null, null);
        return $model->listarPerfis();
    }

    public static function listarIdPerfis()
    {
        include_once "../../model/perfilModel.php";

        $model = new PerfilModel(null, null, null, null);
        return $model->listarIdPerfis();
    }

    public static function resgataPorId($id)
    {
        include_once "../../model/perfilModel.php";

        $model = new PerfilModel(null, null, null, null);
        return $model->resgataPorId($id);
    }

    public static function alterarPerfil($id, $nome, $data_cadastro, $ativo)
    {
        include_once "../model/perfilModel.php";

        $perfil = new PerfilModel($id, $nome, $data_cadastro, $ativo);
        $perfil->alterarPerfil($perfil);
    }

    public static function excluirPerfil($id)
    {
        include_once "../model/perfilModel.php";

        $perfil = new PerfilModel(null, null, null, null);
        $perfil->excluirPerfil($id);
    }
}