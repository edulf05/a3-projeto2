<?php

class formaAtendimentoModel
{
    protected $id;
    protected $id_usuario;
    protected $nome_atendimento;
    protected $data_cadastro;
    protected $ativo;

    public function __construct($id, $id_usuario, $nome_atendimento, $data_cadastro, $ativo)
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->nome_atendimento = $nome_atendimento;
        $this->data_cadastro = $data_cadastro;
        $this->ativo = $ativo;
    }

    public function cadastraFormaAtendimento(FormaAtendimentoModel $formaAtendimento)
    {
        include_once "../dao/formaAtendimentoDAO.php";
        
        $formaAtendimento = new FormaAtendimentoDAO();
        $formaAtendimento->cadastraFormaAtendimento($this);
    }

    public function listarFormasAtendimento()
    {
        include "../../dao/formaAtendimentoDAO.php";

        $dao = new FormaAtendimentoDAO();
        return $dao->listarFormasAtendimento();
    }

    public function listarIdFormasAtendimento()
    {
        include "../../dao/formaAtendimentoDAO.php";

        $dao = new FormaAtendimentoDAO();
        return $dao->listarIdFormasAtendimento();
    }

    public function resgataPorId($id)
    {
        include_once "../../dao/formaAtendimentoDAO.php";

        $dao = new FormaAtendimentoDAO();
        return $dao->resgataPorId($id);
    }

    public function alterarFormaAtendimento(FormaAtendimentoModel $formaAtendimento)
    {
        include_once "../dao/formaAtendimentoDAO.php";
        
        $dao = new FormaAtendimentoDAO();
        $dao->alterarFormaAtendimento($this);
    }

    public function excluirFormaAtendimento($id)
    {
        include_once "../dao/formaAtendimentoDAO.php";

        $dao = new FormaAtendimentoDAO();
        $dao->excluirFormaAtendimento($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNomeAtendimento()
    {
        return $this->nome_atendimento;
    }

    public function setNomeAtendimento($nome_atendimento)
    {
        $this->nome_atendimento = $nome_atendimento;
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