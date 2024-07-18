<?php

class PublicoModel
{
    protected $id;
    protected $id_usuario;
    protected $nomePublico;
    protected $dataCadastro;
    protected $ativo;

    public function __construct($id, $id_usuario, $nomePublico, $dataCadastro, $ativo)
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->nomePublico = $nomePublico;
        $this->dataCadastro = $dataCadastro;
        $this->ativo = $ativo;
    }

    public function cadastraPublico(PublicoModel $publico)
    {
        include_once "../dao/publicoDAO.php";

        $publico = new PublicoDAO();
        $publico->cadastraPublico($this);
    }

    public function listarPublicos()
    {
        include "../../dao/publicoDAO.php";

        $dao = new PublicoDAO();
        return $dao->listarPublico();
    }

    public function listarIdPublicos()
    {
        include "../../dao/publicoDAO.php";

        $dao = new PublicoDAO();
        return $dao->listarIdPublico();
    }

    public function resgataPorId($id)
    {
        include_once "../../dao/publicoDAO.php";

        $publico = new PublicoDAO();
        return $publico->resgataPorId($id);
    }

    public function alterarPublico(PublicoModel $publico)
    {
        include_once "../dao/publicoDAO.php";

        $publico = new PublicoDAO();
        $publico->alterarPublico($this);
    }

    public function excluirPublico($id)
    {
        include_once "../dao/publicoDAO.php";

        $publico = new PublicoDAO();
        $publico->excluirPublico($id);
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

    public function getNomePublico()
    {
        return $this->nomePublico;
    }

    public function setNomePublico($nomePublico)
    {
        $this->nomePublico = $nomePublico;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
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