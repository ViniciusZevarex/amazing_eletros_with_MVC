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
        $imagem_name = $_FILES["imagemProduto"]["name"];
        $imagem_tmp = $_FILES["imagemProduto"]["tmp_name"];

        $diretorio_imagem = uploadImagem($imagem_name, $imagem_tmp);
        $msgRetorno = insertProduct($codCategoria, $nomeProduto, $precoProduto,$estoque, $descricaoProduto, $diretorio_imagem);

        redirecionar("dashboard/produto");
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