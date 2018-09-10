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

            if (authLogin($email_cadastro, $senha_cadastro)) {
                alert("bem vindo" . $login);
                redirecionar("produto");
            }

            redirecionar("produto/index");
        }else{
            alert(implode(",<br>", $erros));
            redirecionar("usuario/adicionar");
        }
    } else {
        exibir("usuario/formulario");
    }
}
/** user, admin */
function deletar($id) {
    authLogout();
    alert(deletarUsuario($id));
    redirecionar("usuario/index");
}

/** user, admin */
function editar($id) {
    if (ehPost()) {
        extract($_POST);
        $data = explode("/",$data_nascimento);
        $dia = $data[0]; 
        $mes = $data[1];
        $ano = $data[2];
        $data_nascimento = "$ano-$mes-$dia";

        $erros = validacaoCadastro($nome_cadastro, $CPF_cadastro, $email_cadastro, $senha_cadastro,$confirmar_senha,$dia,$mes,$ano, $pais, $endereco, $sexo,$data);

        if (empty($erros)) {   
            alert(editarUsuario($id,$nome_cadastro, $CPF_cadastro, $email_cadastro, $senha_cadastro, $data_nascimento, $pais, $endereco, $sexo));

            alert("usuarios editados com sucesso");
            redirecionar("usuario/listar/$id");
        }else{
            alert(implode(",<br>", $erros));
            redirecionar("usuario/editar");
        }
    } else {
        $dados['usuario'] = pegarUsuarioPorId($id);
        $dados['acao'] = "./usuario/editar/$id";
        exibir("usuario/formulario", $dados);
    }
}
/** user,admin */
function visualizar($id) {
    $dados['usuario'] = pegarUsuarioPorId($id);
    exibir("usuario/visualizar", $dados);
}