<?php

class FormaAtendimentoController
{
    public static function cadastraFormaAtendimento($idUsuario, $nomeAtendimento, $data_cadastro, $ativo)
    {
        include "../model/formaAtendimentoModel.php";

        $forma_atendimento = new formaAtendimentoModel(null, $idUsuario, $nomeAtendimento, $data_cadastro, $ativo);
        $forma_atendimento->cadastraFormaAtendimento($forma_atendimento);
    }

    public static function listarFormasAtendimento()
    {
        include "../../model/formaAtendimentoModel.php";

        $model = new formaAtendimentoModel(null, null, null, null, null);
        return $model->listarFormasAtendimento();
    }

    public static function listarIdFormasAtendimento()
    {
        include "../../model/formaAtendimentoModel.php";

        $model = new formaAtendimentoModel(null, null, null, null, null);
        return $model->listarIdFormasAtendimento();
    }

    public static function resgataPorId($id)
    {
        include "../../model/formaAtendimentoModel.php";

        $model = new formaAtendimentoModel(null, null, null, null, null);
        return $model->resgataPorId($id);
    }

    public static function alteraFormaAtendimento($id, $idUsuario, $nomeAtendimento, $data_cadastro, $ativo)
    {
        include "../model/formaAtendimentoModel.php";

        $forma_atendimento = new formaAtendimentoModel($id, $idUsuario, $nomeAtendimento, $data_cadastro, $ativo);
        $forma_atendimento->alterarFormaAtendimento($forma_atendimento);
    }

    public static function excluirFormaAtendimento($id)
    {
        include "../model/formaAtendimentoModel.php";

        $forma_atendimento = new formaAtendimentoModel(null, null, null, null, null);
        $forma_atendimento->excluirFormaAtendimento($id);
    }
}