<?php

class PublicoDAO
{
    public function cadastraPublico(PublicoModel $publico)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "INSERT INTO `publico` (idPublico, idUsuario, nomePublico, dataCadastro, ativo)
                VALUES (:idPublico, :idUsuario, :nomePublico, :dataCadastro, :ativo)";
        
        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idPublico", $publico->getId());
        $stmt->bindValue(":idUsuario", $publico->getIdUsuario());
        $stmt->bindValue(":nomePublico", $publico->getNomePublico());
        $stmt->bindValue(":dataCadastro", $publico->getDataCadastro());
        $stmt->bindValue(":ativo", $publico->getAtivo());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Cadastro realizado com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: nao foi possivel cadastrar o publico')</script>";
        }
    }

    public function listarPublico()
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `publico` ORDER BY idPublico";

        return $conexao->connection->query($sql);
    }

    public function listarIdPublico()
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT idPublico, ativo FROM `publico` ORDER BY idPublico DESC";

        return $conexao->connection->query($sql);
    }

    public function resgataPorId($id)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `publico` WHERE idPublico='$id'";

        return $conexao->connection->query($sql);
    }

    public function alterarPublico(PublicoModel $publico)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "UPDATE `publico` SET idUsuario=:idUsuario, nomePublico=:nomePublico, dataCadastro=:dataCadastro, ativo=:ativo
                WHERE idPublico=:idPublico";

        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idPublico", $publico->getId());
        $stmt->bindValue(":idUsuario", $publico->getIdUsuario());
        $stmt->bindValue(":nomePublico", $publico->getNomePublico());
        $stmt->bindValue(":dataCadastro", $publico->getDataCadastro());
        $stmt->bindValue(":ativo", $publico->getAtivo());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Registro alterado com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: nao foi possivel alterar o publico')</script>";
        }
    }

    public function excluirPublico($id)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "DELETE FROM `publico` WHERE idPublico=:idPublico";

        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idPublico", $id);

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Registro excluido com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: nao foi possivel excluir o publico')</script>";
        }
    }
}