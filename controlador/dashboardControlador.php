<?php 
require "./modelo/produtoModelo.php";
require "modelo/categoriaModelo.php";
require "servicos/uploadImagemServico.php";

/** anon */
function index() {
    exibir("dashboard/index");
}

/** anon */
function produto() {
    if (ehPost()) {
        extract($_POST);

        $dados["produtos"] = searchForCategoria($categoria);
        $dados["categorias"] = getCategorias();
    } else {
        $dados["produtos"] = getAllProducts();
        $dados["categorias"] = getCategorias();
    }
    exibir("dashboard/produto", $dados);
}

/** anon */
function usuario(){
   if (ehPost()) {
        extract($_POST);
        $msgRetorno = adicionarUsuario($nome, $CPF, $email, $senha, $data_nascimento, $pais, $estado, $municipio, $endereco, $sexo);

        redirecionar("dashboard/usuario");
    } else {
        $dados["usuarios"] = pegarTodosUsuarios();
    }
    exibir("dashboard/usuario", $dados);
}

function editar() {
}



?>