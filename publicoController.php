<?php

class PublicoController
{
    public static function cadastraPublico($id_usuario, $nome_publico, $data_cadastro, $ativo)
    {
        include_once "../model/publicoModel.php";

        $publico = new PublicoModel(null, $id_usuario, $nome_publico, $data_cadastro, $ativo);
        $publico->cadastraPublico($publico);
    }

    public static function listarPublicos()
    {
        include_once "../../model/publicoModel.php";

        $model = new PublicoModel(null, null, null, null, null);
        return $model->listarPublicos();
    }

    public static function listarIdPublicos()
    {
        include_once "../../model/publicoModel.php";

        $model = new PublicoModel(null, null, null, null, null);
        return $model->listarIdPublicos();
    }

    public static function resgataPorId($id)
    {
        include_once "../../model/publicoModel.php";

        $model = new PublicoModel(null, null, null, null, null);
        return $model->resgataPorId($id);
    }

    public static function alteraPublico($id, $id_usuario, $nome_publico, $data_cadastro, $ativo)
    {
        include_once "../model/publicoModel.php";

        $publico = new PublicoModel($id, $id_usuario, $nome_publico, $data_cadastro, $ativo);
        $publico->alterarPublico($publico);
    }

    public static function excluirPublico($id)
    {
        include_once "../model/publicoModel.php";

        $publico = new PublicoModel(null, null, null, null, null);
        $publico->excluirPublico($id);
    }
}