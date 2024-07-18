<?php

class atendimentoDAO
{
    public function cadastraAtendimento(AtendimentoModel $atendimento)
    {
        include "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "INSERT INTO `atendimento` (idAtendimento, idFormaAtendimento, idPerguntaPublico, idUsuario, dataCadastro, ativo, respostaAtendimento) 
            VALUES (:idAtendimento, :idFormaAtendimento, :idPerguntaPublico, :idUsuario, :dataCadastro, :ativo, :respostaAtendimento)";

        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idAtendimento", $atendimento->getId());
        $stmt->bindValue(":idFormaAtendimento", $atendimento->getIdFormaAtendimento());
        $stmt->bindValue(":idPerguntaPublico", $atendimento->getIdPerguntaPublico());
        $stmt->bindValue(":idUsuario", $atendimento->getIdUsuario());
        $stmt->bindValue(":dataCadastro", $atendimento->getDataCadastro());
        $stmt->bindValue(":ativo", $atendimento->getAtivo());
        $stmt->bindValue(":respostaAtendimento", $atendimento->getRespostaAtendimento());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Atendimento cadastrado com sucesso!')</script>";
        } else {
            echo "<script>alert('Ocorreu um erro ao cadastrar o atendimento')</script>";
        }
    }

    public function listarAtendimentos()
    {
        include "ConexaoA3.php";
        
        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `atendimento` ORDER BY idAtendimento";

        return $conexao->connection->query($sql);
    }

    public function resgataPorId($id)
    {
        include "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `atendimento` WHERE idAtendimento = '$id'";

        return $conexao->connection->query($sql);
    }

    public function alterarAtendimento(AtendimentoModel $atendimento)
    {
        include "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "UPDATE `atendimento` SET idFormaAtendimento = :idFormaAtendimento, idPerguntaPublico = :idPerguntaPublico, idUsuario = :idUsuario, dataCadastro = :dataCadastro, ativo = :ativo, respostaAtendimento = :respostaAtendimento WHERE idAtendimento = :idAtendimento";

        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idAtendimento", $atendimento->getId());
        $stmt->bindValue(":idFormaAtendimento", $atendimento->getIdFormaAtendimento());
        $stmt->bindValue(":idPerguntaPublico", $atendimento->getIdPerguntaPublico());
        $stmt->bindValue(":idUsuario", $atendimento->getIdUsuario());
        $stmt->bindValue(":dataCadastro", $atendimento->getDataCadastro());
        $stmt->bindValue(":ativo", $atendimento->getAtivo());
        $stmt->bindValue(":respostaAtendimento", $atendimento->getRespostaAtendimento());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Atendimento alterado com sucesso!')</script>";
        } else {
            echo "<script>alert('Ocorreu um erro ao alterar o atendimento')</script>";
        }
    }

    public function excluirAtendimento($id)
    {
        include "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "DELETE FROM `atendimento` WHERE idAtendimento='$id'";

        $res = $conexao->connection->query($sql);

        if ($res) {
            echo "<script>alert('Atendimento excluído com sucesso!')</script>";
        } else {
            echo "<script>alert('Ocorreu um erro ao excluir o atendimento')</script>";
        }
    }
}