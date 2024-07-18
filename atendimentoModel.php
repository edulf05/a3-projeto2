<?php

class AtendimentoModel
{
    protected $id;
    protected $id_forma_atendimento;
    protected $id_pergunta_publico;
    protected $id_usuario;
    protected $data_cadastro;
    protected $ativo;
    protected $resposta_atendimento;

    public function __construct($id, $id_forma_atendimento, $id_pergunta_publico, $id_usuario, $data_cadastro, $ativo, $resposta_atendimento)
    {
        $this->id = $id;
        $this->id_forma_atendimento = $id_forma_atendimento;
        $this->id_pergunta_publico = $id_pergunta_publico;
        $this->id_usuario = $id_usuario;
        $this->data_cadastro = $data_cadastro;
        $this->ativo = $ativo;
        $this->resposta_atendimento = $resposta_atendimento;
    }

    public function cadastraAtendimento(AtendimentoModel $atendimento)
    {
        include_once "../dao/atendimentoDAO.php";

        $atendimento = new AtendimentoDAO();
        $atendimento->cadastraAtendimento($this);
    }

    public function listarAtendimentos()
    {
        include "../../dao/atendimentoDAO.php";

        $dao = new AtendimentoDAO();
        return $dao->listarAtendimentos();
    }

    public function resgataPorId($id)
    {
        include_once "../../dao/atendimentoDAO.php";

        $atendimento = new AtendimentoDAO();
        return $atendimento->resgataPorId($id);
    }

    public function alterarAtendimento(AtendimentoModel $atendimento)
    {
        include_once "../dao/atendimentoDAO.php";

        $atendimento = new AtendimentoDAO();
        $atendimento->alterarAtendimento($this);
    }

    public function excluirAtendimento($id)
    {
        include_once "../dao/atendimentoDAO.php";

        $atendimento = new AtendimentoDAO();
        $atendimento->excluirAtendimento($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdFormaAtendimento()
    {
        return $this->id_forma_atendimento;
    }
    
    public function setIdFormaAtendimento($id_forma_atendimento)
    {
        $this->id_forma_atendimento = $id_forma_atendimento;
    }

    public function getIdPerguntaPublico()
    {
        return $this->id_pergunta_publico;
    }

    public function setIdPerguntaPublico($id_pergunta_publico)
    {
        $this->id_pergunta_publico = $id_pergunta_publico;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    public function getRespostaAtendimento()
    {
        return $this->resposta_atendimento;
    }
}