<?php
require_once "modelo/usuarioModelo.php";
require "modelo/produtoModelo.php";
require "bibliotecas/validacaoCadastro.php";

/** anon */
function index() {
    exibir("usuario/formulario");
}
/** admin,user */
function listar(){
    $dados["user"] = pegarUsuarioPorId($_SESSION['auth']['codCliente']);
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

        $erros = validacaoCadastro($nome_cadastro, $CPF_cadastro, $email_cadastro, $senha_cadastro,$confirmar_senha,$dia,$mes,$ano, $pais, $estado,$municipio,  $endereco, $sexo,$data);

        if (empty($erros)) {
            adicionarUsuario($nome_cadastro, $CPF_cadastro, $email_cadastro, $senha_cadastro, $data_nascimento, $pais, $estado,$municipio,$endereco, $sexo);   
            alert("Usuario cadastrado com sucesso:<br>","success");

            $user = pegarUsuarioLogin($email_cadastro,$senha_cadastro);

            if (authLogin($email_cadastro, $senha_cadastro)) {
                alert("bem vindo" . $nome_cadastro,"success");
                redirecionar("produto");
            }

            redirecionar("produto/index");
        }else{
            alert(implode(",<br>", $erros),"danger");
            redirecionar("usuario/adicionar");
        }
    } else {
        exibir("usuario/formulario");
    }
}
/** user, admin */
function deletar($id) {
    authLogout();
    alert(deletarUsuario($id),"success");
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
            editarUsuario($id,$nome_cadastro, $CPF_cadastro, $email_cadastro, $senha_cadastro, $data_nascimento, $pais, $endereco, $sexo);
            $_SESSION["auth"]["nome"] = $nome_cadastro;

            alert("usuarios editados com sucesso","success");
            redirecionar("usuario/listar/$id");
        }else{
            alert(implode(",<br>", $erros),"danger");
            redirecionar("usuario/editar/$id");
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