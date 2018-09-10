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

function pegarUsuarioLogin($email,$senha){
    $sql = "SELECT * FROM tblusuario WHERE Email = '$email' AND Senha = '$senha'";

    $resultado = mysqli_query($cnx = conexao(), $sql);
    $tblusuario = mysqli_fetch_array($resultado);

    if (!$resultado) {
        echo "Não deu certo " . mysqli_error($cnx);
        die();
    }
    
    return $tblusuario;
}

function pegarUsuarioPorId($id) {
    $sql = "SELECT * FROM tblusuario WHERE CodCliente= '$id'";
    $resultado = mysqli_query($cnx = conexao(), $sql);

    if (!$resultado) {
        echo "Erro" . mysqli_error($cnx);
        die();
    }

    $tblusuario = mysqli_fetch_array($resultado);
    return $tblusuario;
}

function adicionarUsuario($nome_cadastro, $CPF, $email, $senha, $data_nascimento, $pais, $endereco, $sexo){
    $tipoUsuario = "user";

    $insert = "INSERT INTO tblUsuario(Nome,Email,Senha,CPF,Pais,endereco,dtNasc,tipoUsuario) VALUES('$nome_cadastro', '$email', '$senha', '$CPF', '$pais', '$endereco', '$data_nascimento','$tipoUsuario')";

    $resultado = mysqli_query($cnx = conexao(),$insert);
    if (!$resultado) {
        echo "Não deu certo " . mysqli_error($cnx);
        die();
    }
}

function editarUsuario($id,$nome, $CPF, $email_cadastro, $senha, $data_nascimento, $pais, $endereco, $sexo) {

    $update = "UPDATE tblusuario SET 
    Nome = '$nome',
    CPF = '$CPF',
    Email = '$email_cadastro',
    Senha = '$senha',
    Pais = '$pais',
    endereco = '$endereco',
    dtNasc = '$data_nascimento'
    WHERE CodCliente = $id";

    $resultado = mysqli_query($cnx = conexao(),$update);
    if (!$resultado) {
       echo "Não deu certo " . mysqli_error($cnx);
       die();
   }
}

function deletarUsuario($id) {
    $exclusao   = "DELETE FROM tblusuario WHERE CodCliente = '$id'";
    $resultado     = mysqli_query($cnx = conexao(),$exclusao);
    
    if (!$resultado) {
     echo "Não deu certo " . mysqli_error($cnx);
     die();
 }
}
