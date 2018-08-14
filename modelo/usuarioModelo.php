<?php

function pegarTodosUsuarios() {
    $sql = "SELECT * FROM tblusuario";
    $resultado = mysqli_query(conexao(), $sql);
    $tblusuarios = array();
    while ($linha = mysqli_fetch_array($resultado)) {
        $tblusuarios[] = $linha;
    }
    return $tblusuarios;
}

function pegarUsuarioPorId($id) {
    $sql = "SELECT * FROM tblusuario WHERE id= $id";
    $resultado = mysqli_query(conexao(), $sql);
    $tblusuario = mysqli_fetch_array($resultado);
    return $tblusuario;
}

function adicionarUsuario($nome, $email, $senha, $CPF_cadastro, $Pais, $endereco, $data_total) {
    $insert = "INSERT INTO tblUsuario(Nome,Email,Senha,CPF,Pais,endereco,dtNasc) VALUES('$nome', '$email', '$senha', '$CPF_cadastro', '$Pais', '$endereco', '$data_total')";

    $resultado = mysqli_query($cnx = conexao(),$insert);
    if (!$resultado) {
        echo "Não deu certo " . mysqli_error($cnx);
        die();
    }
}

function editarUsuario($id, $nome, $email) {
    $update = "UPDATE tblusuario SET 
    Nome = '$nome',
    Email = '$email',
    Senha = '$senha',
    ConfirmarSenha = '$confirmaSenha',
    Pais = '$Pais',
    endereco = '$endereco'
    WHERE CodCliente = $id";

    $resultado = mysqli_query($conexao,$update);
    if (!$resultado) {
       echo "Não deu certo " . mysqli_error($conexao);
       die();
   }
}

function deletarUsuario($id) {
    $exclusao   = "DELETE FROM tblusuario WHERE CodCliente = '$id'";
    $resultado     = mysqli_query($conexao,$exclusao);
    
    if (!$resultado) {
     echo "Não deu certo " . mysqli_error($cnx);
     die();
 }
}
