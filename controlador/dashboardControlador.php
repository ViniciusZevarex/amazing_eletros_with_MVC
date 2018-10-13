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
        $msgRetorno = insertProduct($codCategoria, $nomeProduto, $precoProduto, $descricaoProduto, $diretorio_imagem);

        redirecionar("dashboard/produto");
    } else {
        $dados["produtos"] = getAllProducts();
        $dados["categorias"] = getCategorias();
    }
    exibir("dashboard/produto", $dados);
}

function editar() {
}



?>