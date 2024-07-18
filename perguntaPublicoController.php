<?php

class PerguntaPublicoController
{
    public static function cadastraPerguntaPublico($idPublico, $idUsuario, $descricaoPergunta, $data_cadastro, $ativo)
    {
        include_once "../model/perguntaPublicoModel.php";

        $pergunta = new PerguntaPublicoModel(null, $idPublico, $idUsuario, $descricaoPergunta, $data_cadastro, $ativo);
        $pergunta->cadastraPerguntaPublico($pergunta);
    }

    public static function listarPerguntasPublico()
    {
        include_once "../../model/perguntaPublicoModel.php";

        $pergunta = new PerguntaPublicoModel(null, null, null, null, null, null);
        return $pergunta->listarPerguntasPublico();
    }

    public static function listarIdPerguntasPublico()
    {
        include_once "../../model/perguntaPublicoModel.php";

        $pergunta = new PerguntaPublicoModel(null, null, null, null, null, null);
        return $pergunta->listarIdPerguntasPublico();
    }

    public static function resgataPorId($id)
    {
        include_once "../../model/perguntaPublicoModel.php";
        
        $pergunta = new PerguntaPublicoModel(null, null, null, null, null, null);
        return $pergunta->resgataPorId($id);
    }

    public static function alterarPerguntaPublico($id, $idPublico, $idUsuario, $descricaoPergunta, $data_cadastro, $ativo)
    {
        include_once "../model/perguntaPublicoModel.php";

        $pergunta = new PerguntaPublicoModel($id, $idPublico, $idUsuario, $descricaoPergunta, $data_cadastro, $ativo);
        $pergunta->alterarPerguntaPublico($pergunta);
    }

    public static function excluirPerguntaPublico($id)
    {
        include_once "../model/perguntaPublicoModel.php";

        $pergunta = new PerguntaPublicoModel(null, null, null, null, null, null);
        $pergunta->excluirPerguntaPublico($id);
    }
}