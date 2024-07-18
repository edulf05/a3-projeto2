<?php

class atendimentoController
{
    public static function cadastraAtendimento($idFormaAtendimento, $idPerguntaPublico, $idUsuario, $data_cadastro, $ativo, $respostaAtendimento) 
    {
        include_once "../model/atendimentoModel.php";

        $atendimento = new AtendimentoModel(null, $idFormaAtendimento, $idPerguntaPublico, $idUsuario, $data_cadastro, $ativo, $respostaAtendimento);
        $atendimento->cadastraAtendimento($atendimento);
    }

    public static function listarAtendimentos()
    {
        include_once "../../model/atendimentoModel.php";

        $model = new AtendimentoModel(null, null, null, null, null, null, null);
        return $model->listarAtendimentos();
    }

    public static function resgataPorId($id)
    {
        include_once "../../model/atendimentoModel.php";

        $model = new AtendimentoModel(null, null, null, null, null, null, null);
        return $model->resgataPorId($id);
    }

    public static function alterarAtendimento($id, $idFormaAtendimento, $idPerguntaPublico, $idUsuario, $data_cadastro, $ativo, $respostaAtendimento)
    {
        include_once "../model/atendimentoModel.php";

        $atendimento = new AtendimentoModel($id, $idFormaAtendimento, $idPerguntaPublico, $idUsuario, $data_cadastro, $ativo, $respostaAtendimento);
        $atendimento->alterarAtendimento($atendimento);
    }

    public static function excluirAtendimento($id)
    {
        include_once "../model/atendimentoModel.php";

        $model = new AtendimentoModel(null, null, null, null, null, null, null);
        $model->excluirAtendimento($id);
    }
}