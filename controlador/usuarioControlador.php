<?php

require "modelo/usuarioModelo.php";

function index() {
    exibir("usuario/formulario");
}

function adicionar() {
    if (ehPost()) {
        extract($_POST);
        alert(adicionarUsuario($nome, $email, $sexo));
        redirecionar("usuario/index");
    } else {
        exibir("usuario/formulario");
    }
}

function deletar($id) {
    alert(deletarUsuario($id));
    redirecionar("usuario/index");
}

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

function visualizar($id) {
    $dados['usuario'] = pegarUsuarioPorId($id);
    exibir("usuario/visualizar", $dados);
}