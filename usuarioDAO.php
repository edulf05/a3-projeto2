<?php

class UsuarioDAO 
{
    public function cadastraUsuario(UsuarioModel $usuario) 
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "INSERT INTO `usuario` (idUsuario, nomeUsuario, emailUsuario, loginUsuario, senhaUsuario, dataCadastro, telefoneCelular, ativo, idPerfil)
                VALUES (:idUsuario, :nomeUsuario, :emailUsuario, :loginUsuario, :senhaUsuario, :dataCadastro, :telefoneCelular, :ativo, :idPerfil)";

        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idUsuario", $usuario->getId());
        $stmt->bindValue(":nomeUsuario", $usuario->getNome());
        $stmt->bindValue(":emailUsuario", $usuario->getEmail());
        $stmt->bindValue(":loginUsuario", $usuario->getLogin());
        $stmt->bindValue(":senhaUsuario", $usuario->getSenha());
        $stmt->bindValue(":dataCadastro", $usuario->getDataCadastro());
        $stmt->bindValue(":telefoneCelular", $usuario->getTelefoneCelular());
        $stmt->bindValue(":ativo", $usuario->getAtivo());
        $stmt->bindValue(":idPerfil", $usuario->getIdPerfil());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Cadastro realizado com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: nao foi possivel alterar o cadastro')</script>";
        }
    }

    public function listarUsuarios()
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `usuario` ORDER BY idUsuario";

        return $conexao->connection->query($sql);
    }

    public function listarIdUsuarios()
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT idUsuario, ativo FROM `usuario` ORDER BY idUsuario DESC";

        return $conexao->connection->query($sql);
    }

    public function resgataPorId($id)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "SELECT * FROM `usuario` WHERE idUsuario='$id'";

        return $conexao->connection->query($sql);
    }

    public function alterarUsuario(UsuarioModel $usuario)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "UPDATE `usuario` SET idUsuario = :idUsuario, nomeUsuario = :nomeUsuario, emailUsuario = :emailUsuario, loginUsuario = :loginUsuario, senhaUsuario = :senhaUsuario, dataCadastro = :dataCadastro, telefoneCelular = :telefoneCelular, ativo = :ativo, idPerfil = :idPerfil WHERE idUsuario = :idUsuario";

        $stmt = $conexao->connection->prepare($sql);

        $stmt->bindValue(":idUsuario", $usuario->getId());
        $stmt->bindValue(":nomeUsuario", $usuario->getNome());
        $stmt->bindValue(":emailUsuario", $usuario->getEmail());
        $stmt->bindValue(":loginUsuario", $usuario->getLogin());
        $stmt->bindValue(":senhaUsuario", $usuario->getSenha());
        $stmt->bindValue(":dataCadastro", $usuario->getDataCadastro());
        $stmt->bindValue(":telefoneCelular", $usuario->getTelefoneCelular());
        $stmt->bindValue(":ativo", $usuario->getAtivo());
        $stmt->bindValue(":idPerfil", $usuario->getIdPerfil());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Registro alterado com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: n�o foi poss�vel alterar o cadastro')</script>";
        }
    }

    public function excluirUsuario($id)
    {
        include_once "ConexaoA3.php";

        $conexao = new Conexao();
        $conexao->fazConexao();

        $sql = "DELETE FROM `usuario` WHERE idUsuario='$id'";

        $res = $conexao->connection->query($sql);

        if ($res) {
            echo "<script>alert('Exclus�o realizada com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: n�o foi poss�vel excluir o usu�rio!')</script>";
        }
    }
}