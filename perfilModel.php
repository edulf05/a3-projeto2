<?php

class PerfilModel
{
    protected $id;
    protected $nome;
    protected $data_cadastro;
    protected $ativo;

    public function __construct($id, $nome, $data_cadastro, $ativo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->data_cadastro = $data_cadastro;
        $this->ativo = $ativo;
    }

    public function cadastraPerfil(PerfilModel $perfil)
    {
        include_once "../dao/perfilDAO.php";

        $perfil = new PerfilDAO();
        $perfil->cadastraPerfil($this);
    }

    public function listarPerfis()
    {
        include "../../dao/perfilDAO.php";

        $dao = new PerfilDAO();
        return $dao->listarPerfis();
    }

    public function listarIdPerfis()
    {
        include "../../dao/perfilDAO.php";

        $dao = new PerfilDAO();
        return $dao->listarIdPerfis();
    }

    public function resgataPorId($id)
    {
        include_once "../../dao/perfilDAO.php";

        $perfil = new PerfilDAO();
        return $perfil->resgataPorId($id);
    }

    public function alterarPerfil(PerfilModel $perfil)
    {
        include_once "../dao/perfilDAO.php";

        $perfil = new PerfilDAO();
        $perfil->alterarPerfil($this);
    }

    public function excluirPerfil($id)
    {
        include_once "../dao/perfilDAO.php";

        $perfil = new PerfilDAO();
        $perfil->excluirPerfil($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
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