<?php

class PerguntaPublicoDAO
{
    public function cadastraPerguntaPublico(PerguntaPublicoModel $perguntaPublico)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "INSERT INTO `perguntapublico` (idPerguntaPublico, idPublico, idUsuario, descricaoPergunta, dataCadastro, ativo) 
            VALUES (:idPerguntaPublico, :idPublico, :idUsuario, :descricaoPergunta, :dataCadastro, :ativo)";

        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idPerguntaPublico", $perguntaPublico->getId());
        $stmt->bindValue(":idPublico", $perguntaPublico->getIdPublico());
        $stmt->bindValue(":idUsuario", $perguntaPublico->getIdUsuario());
        $stmt->bindValue(":descricaoPergunta", $perguntaPublico->getDescricaoPergunta());
        $stmt->bindValue(":dataCadastro", $perguntaPublico->getDataCadastro());
        $stmt->bindValue(":ativo", $perguntaPublico->getAtivo());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Cadastro realizado com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar')</script>";
        }
    }

    public function listarPerguntasPublico()
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `perguntapublico` ORDER BY idPerguntaPublico";

        return $conexao->connection->query($sql);
    }

    public function listarIdPerguntasPublico()
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT idPerguntaPublico, ativo FROM `perguntapublico` ORDER BY idPerguntaPublico DESC";

        return $conexao->connection->query($sql);
    }

    public function resgataPorId($id)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `perguntapublico` WHERE idPerguntaPublico='$id'";

        return $conexao->connection->query($sql);
    }

    public function alterarPerguntaPublico(PerguntaPublicoModel $perguntaPublico)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "UPDATE `perguntapublico` SET idPublico=:idPublico, idUsuario=:idUsuario, descricaoPergunta=:descricaoPergunta, dataCadastro=:dataCadastro, ativo=:ativo WHERE idPerguntaPublico=:idPerguntaPublico";

        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idPerguntaPublico", $perguntaPublico->getId());
        $stmt->bindValue(":idPublico", $perguntaPublico->getIdPublico());
        $stmt->bindValue(":idUsuario", $perguntaPublico->getIdUsuario());
        $stmt->bindValue(":descricaoPergunta", $perguntaPublico->getDescricaoPergunta());
        $stmt->bindValue(":dataCadastro", $perguntaPublico->getDataCadastro());
        $stmt->bindValue(":ativo", $perguntaPublico->getAtivo());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Alteração realizada com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro ao alterar')</script>";
        }
    }

    public function excluirPerguntaPublico($id)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "DELETE FROM `perguntapublico` WHERE idPerguntaPublico='$id'";

        $res = $conexao->connection->exec($sql);

        if ($res) {
            echo "<script>alert('Exclusão realizada com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro ao excluir')</script>";
        }
    }
}