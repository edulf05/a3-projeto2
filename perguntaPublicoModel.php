<?php

class PerguntaPublicoModel
{
    protected $id;
    protected $id_publico;
    protected $id_usuario;
    protected $descricao_pergunta;
    protected $data_cadastro;
    protected $ativo;

    public function __construct($id, $id_publico, $id_usuario, $descricao_pergunta, $data_cadastro, $ativo)
    {
        $this->id = $id;
        $this->id_publico = $id_publico;
        $this->id_usuario = $id_usuario;
        $this->descricao_pergunta = $descricao_pergunta;
        $this->data_cadastro = $data_cadastro;
        $this->ativo = $ativo;
    }

    public function cadastraPerguntaPublico(PerguntaPublicoModel $pergunta)
    {
        include_once "../dao/perguntaPublicoDAO.php";
        
        $pergunta = new PerguntaPublicoDAO();
        $pergunta->cadastraPerguntaPublico($this);
    }

    public function listarPerguntasPublico()
    {
        include_once "../../dao/perguntaPublicoDAO.php";
    
        $dao = new PerguntaPublicoDAO();
        return $dao->listarPerguntasPublico();
    }
    
    public function listarIdPerguntasPublico()
    {
        include_once "../../dao/perguntaPublicoDAO.php";
    
        $dao = new PerguntaPublicoDAO();
        return $dao->listarIdPerguntasPublico();
    }

    public function resgataPorId($id)
    {
        include_once "../../dao/perguntaPublicoDAO.php";
        
        $pergunta = new PerguntaPublicoDAO();
        return $pergunta->resgataPorId($id);
    }

    public function alterarPerguntaPublico(PerguntaPublicoModel $pergunta)
    {
        include_once "../dao/perguntaPublicoDAO.php";
        
        $pergunta = new PerguntaPublicoDAO();
        $pergunta->alterarPerguntaPublico($this);
    }

    public function excluirPerguntaPublico($id)
    {
        include_once "../dao/perguntaPublicoDAO.php";
        
        $pergunta = new PerguntaPublicoDAO();
        $pergunta->excluirPerguntaPublico($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdPublico()
    {
        return $this->id_publico;
    }

    public function setIdPublico($id_publico)
    {
        $this->id_publico = $id_publico;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getDescricaoPergunta()
    {
        return $this->descricao_pergunta;
    }

    public function setDescricaoPergunta($descricao_pergunta)
    {
        $this->descricao_pergunta = $descricao_pergunta;
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
}