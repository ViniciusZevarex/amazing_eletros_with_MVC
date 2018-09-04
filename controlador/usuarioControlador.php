<?php

require_once "modelo/usuarioModelo.php";
require "bibliotecas/validacaoCadastro.php";
/** anon */
function index() {
    exibir("usuario/formulario");
}

function listar($id){
    $dados["user"] = pegarUsuarioPorId($id);
    exibir("usuario/listar",$dados);
}
/** anon */
function adicionar() {
    if (ehPost()) {
        extract($_POST);
        $data = explode("/",$data_nascimento);
        $dia = $data[0]; 
        $mes = $data[1];
        $ano = $data[2];
        $data_nascimento = "$ano-$mes-$dia";

        $erros = validacaoCadastro($nome_cadastro, $CPF_cadastro, $email_cadastro, $senha_cadastro,$confirmar_senha,$dia,$mes,$ano, $pais, $endereco, $sexo,$data);

        if (empty($erros)) {   
            alert(adicionarUsuario($nome_cadastro, $CPF_cadastro, $email_cadastro, $senha_cadastro, $data_nascimento, $pais, $endereco, $sexo));

                $user = pegarUsuarioLogin($email,$senha_cadastro);

                $_SESSION["auth"] = array(
                    "user" => $user["tipoUsuario"], 
                    "role" => $user["tipoUsuario"],
                    "nome" => $user["Nome"],
                    "codCliente" => $user["CodCliente"]);

            redirecionar("produto/index");
        }else{
            print_r($erros);
        }
    } else {
        exibir("usuario/formulario");
    }
}
/** user */
function deletar($id) {
    authLogout();
    alert(deletarUsuario($id));
    redirecionar("usuario/index");
}

/** user */
function editar($id) {
    if (ehPost()) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        alert(editarUsuario($id, $nome, $email));
        redirecionar("usuario/index");
    } else {
        $dados['usuario'] = pegarUsuarioPorId($id);
        $dados['acao'] = "./usuario/editar/$id";
        exibir("usuario/formulario", $dados);
    }
}
/** user */
function visualizar($id) {
    $dados['usuario'] = pegarUsuarioPorId($id);
    exibir("usuario/visualizar", $dados);
}