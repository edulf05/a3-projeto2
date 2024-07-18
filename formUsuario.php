<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario cadastro usuario</title> 
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-image: linear-gradient(to right, gray, black);
            color:white;
        }
        div{
            position: absolute;
            top: 50%;
            left:50%;
            transform:translate(-50%, -50%);
            
        }
    </style>
</head>

<body>
    <h3>
        Formulário de Cadastro de Usuário
    </h3>

    <br><br>

    <?php
    $operacao = $_REQUEST["op"];

    if ($operacao == "Alterar") {
        include "../../controller/usuarioController.php";

        $res = UsuarioController::resgataPorID($_REQUEST["id"]);
        $qtd = $res->rowCount();
        $row = $res->fetch(PDO::FETCH_OBJ);

        $id = $row->idUsuario;
        $nome = $row->nomeUsuario;
        $email = $row->emailUsuario;
        $login = $row->loginUsuario;
        $senha = $row->senhaUsuario;
        $data_cadastro = $row->dataCadastro;
        $telefone_celular = $row->telefoneCelular;
        $ativo = $row->ativo;
        $id_perfil = $row->idPerfil;

        $operacao = "Alterar";
    } else {
        $id = "";
        $nome = "";
        $email = "";
        $login = "";
        $senha = "";
        $data_cadastro = "";
        $telefone_celular = "";
        $ativo = "";
        $id_perfil = "";

        $operacao = "Incluir";
    }

    echo '<div>
        <form action="../../controller/processaUsuario.php" method="post">
        <input type="hidden" name="idUsuario" value=' . $id . '><br><br>

        <label for="nome">Nome:</label>
        <input type="text" name="nomeUsuario" value=' . $nome . '><br><br>

        <label for="email">E-mail:</label>
        <input type="text" name="emailUsuario" value=' . $email . '><br><br>

        <label for="login">Login:</label>
        <input type="text" name="loginUsuario" value=' . $login . '><br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senhaUsuario" value=' . $senha . '><br><br>

        <label for="data_cadastro">Data de Cadastro (DD-MM-YYYY):</label>
        <input type="date" name="dataCadastro" value=' . $data_cadastro . '><br><br>

        <label for="telefone_celular">Telefone Celular:</label>
        <input type="text" name="telefoneCelular" value=' . $telefone_celular . '><br><br>

        <label for="ativo">Ativo:</label>
        <input type="text" name="ativo" value=' . $ativo . '><br><br>
        
        <input type="hidden" name="op" value=' . $operacao . '>
        
        <label for="id_perfil">Id do Perfil:</label>
        <select name="idPerfil"> </div>';
    
    include "../../controller/perfilController.php";

    $res = PerfilController::listarIdPerfis();
    $qtd = $res->rowCount();

    while ($row = $res->fetch(PDO::FETCH_OBJ)) {
        echo "<option value='$row->idPerfil'>$row->idPerfil</option>";
    }

    echo '</select>

        <br><br>

        <input type="submit" value=' . $operacao . '>
        </form>

        <br><br>
        
        <a href="./homeCrud.html">Voltar</a>
    ';
    ?>        
</body>

</html>