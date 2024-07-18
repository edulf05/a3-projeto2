<?php

class UsuarioModel
{
    protected $id;
    protected $nome;
    protected $email;
    protected $login;
    protected $senha;
    protected $data_cadastro;
    protected $telefone_celular;
    protected $ativo;
    protected $id_perfil;

    public function __construct($id, $nome, $email, $login, $senha, $data_cadastro, $telefone_celular, $ativo, $id_perfil)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->login = $login;
        $this->senha = $senha;
        $this->data_cadastro = $data_cadastro;
        $this->telefone_celular = $telefone_celular;
        $this->ativo = $ativo;
        $this->id_perfil = $id_perfil;
    }

    public function cadastraUsuario(UsuarioModel $usuario)
    {
        include_once "../dao/usuarioDAO.php";

        $usuario = new UsuarioDAO();
        $usuario->cadastraUsuario($this);
    }

    public function listarUsuarios()
    {
        include "../../dao/usuarioDAO.php";

        $dao = new UsuarioDAO();
        return $dao->listarUsuarios();
    }

    public function listarIdUsuarios()
    {
        include "../../dao/usuarioDAO.php";

        $dao = new UsuarioDAO();
        return $dao->listarIdUsuarios();
    }

    public function resgataPorId($id)
    {
        include_once "../../dao/usuarioDAO.php";

        $usuario = new UsuarioDAO();
        return $usuario->resgataPorId($id);
    }

    public function alterarUsuario(UsuarioModel $usuario)
    {
        include_once "../dao/usuarioDAO.php";

        $usuario = new UsuarioDAO();
        $usuario->alterarUsuario($this);
    }

    public function excluirUsuario($id)
    {
        include_once "../dao/usuarioDAO.php";

        $usuario = new UsuarioDAO();
        $usuario->excluirUsuario($id);
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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }

    public function getTelefoneCelular()
    {
        return $this->telefone_celular;
    }

    public function setTelefoneCelular($telefone_celular)
    {
        $this->telefone_celular = $telefone_celular;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    public function getIdPerfil()
    {
        return $this->id_perfil;
    }

    public function setIdPerfil($id_perfil)
    {
        $this->id_perfil = $id_perfil;
    }
}