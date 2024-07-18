<?php

class PerfilDAO
{
    public function cadastraPerfil(PerfilModel $perfil)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "INSERT INTO `perfil` (idPerfil, nomePerfil, dataCadastro, ativo)
                VALUES (:idPerfil, :nomePerfil, :dataCadastro, :ativo)";

        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idPerfil", $perfil->getId());
        $stmt->bindValue(":nomePerfil", $perfil->getNome());
        $stmt->bindValue(":dataCadastro", $perfil->getDataCadastro());
        $stmt->bindValue(":ativo", $perfil->getAtivo());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Cadastro realizado com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: nao foi possivel alterar o cadastro')</script>";
        }
    }

    public function listarPerfis()
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `perfil` ORDER BY idPerfil";

        return $conexao->connection->query($sql);
    }

    public function listarIdPerfis()
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT idPerfil, ativo FROM `perfil` ORDER BY idPerfil DESC";

        return $conexao->connection->query($sql);
    }

    public function resgataPorId($id)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `perfil` WHERE idPerfil='$id'";

        return $conexao->connection->query($sql);
    }

    public function alterarPerfil(PerfilModel $perfil)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "UPDATE `perfil` SET nomePerfil = :nomePerfil, dataCadastro = :dataCadastro, ativo = :ativo WHERE idPerfil = :idPerfil";

        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idPerfil", $perfil->getId());
        $stmt->bindValue(":nomePerfil", $perfil->getNome());
        $stmt->bindValue(":dataCadastro", $perfil->getDataCadastro());
        $stmt->bindValue(":ativo", $perfil->getAtivo());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Cadastro realizado com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: nao foi possivel alterar o cadastro')</script>";
        }
    }

    public function excluirPerfil($id)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "DELETE FROM `perfil` WHERE idPerfil='$id'";

        $res = $conexao->connection->query($sql);

        if ($res) {
            echo "<script>alert('Exclusao realizada com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: nao foi possivel excluir o usuario!')</script>";
        }
    }
}