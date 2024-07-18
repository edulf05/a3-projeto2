<?php

class formaAtendimentoDAO
{
    public function cadastraFormaAtendimento(formaAtendimentoModel $formaAtendimento)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "INSERT INTO `formaatendimento` (idFormaAtendimento, idUsuario, nomeAtendimento, dataCadastro, ativo)
                VALUES (:idFormaAtendimento, :idUsuario, :nomeAtendimento, :dataCadastro, :ativo)";

        $stmt = $conexao->connection->prepare($sql);
        
        $stmt->bindValue(":idFormaAtendimento", $formaAtendimento->getId());
        $stmt->bindValue(":idUsuario", $formaAtendimento->getIdUsuario());
        $stmt->bindValue("nomeAtendimento", $formaAtendimento->getNomeAtendimento());
        $stmt->bindValue(":dataCadastro", $formaAtendimento->getDataCadastro());
        $stmt->bindValue(":ativo", $formaAtendimento->getAtivo());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Cadastro realizado com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: nao foi possivel cadastrar a forma de atendimento')</script>";
        }
    }

    public function listarFormasAtendimento()
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `formaatendimento` ORDER BY idFormaAtendimento";

        return $conexao->connection->query($sql);
    }
    
    public function listarIdFormasAtendimento()
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT idFormaAtendimento, ativo FROM `formaatendimento` ORDER BY idFormaAtendimento DESC";

        return $conexao->connection->query($sql);
    }

    public function resgataPorId($id)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `formaatendimento` WHERE idFormaAtendimento='$id'";

        return $conexao->connection->query($sql);
    }

    public function alterarFormaAtendimento(formaAtendimentoModel $formaAtendimento)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "UPDATE `formaatendimento` SET idUsuario=:idUsuario, nomeAtendimento=:nomeAtendimento, dataCadastro=:dataCadastro, ativo=:ativo
                WHERE idFormaAtendimento=:idFormaAtendimento";

        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idFormaAtendimento", $formaAtendimento->getId());
        $stmt->bindValue(":idUsuario", $formaAtendimento->getIdUsuario());
        $stmt->bindValue(":nomeAtendimento", $formaAtendimento->getNomeAtendimento());
        $stmt->bindValue(":dataCadastro", $formaAtendimento->getDataCadastro());
        $stmt->bindValue(":ativo", $formaAtendimento->getAtivo());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Alteracao realizada com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: nao foi possivel alterar a forma de atendimento')</script>";
        }
    }

    public function excluirFormaAtendimento($id)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "DELETE FROM `formaatendimento` WHERE idFormaAtendimento='$id'";

        $res = $conexao->connection->query($sql);

        if ($res) {
            echo "<script>alert('Exclusao realizada com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: nao foi possivel excluir a forma de atendimento')</script>";
        }
    }
}