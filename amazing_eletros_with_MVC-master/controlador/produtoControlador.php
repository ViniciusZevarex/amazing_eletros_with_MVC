<?php

require "modelo/produtoModelo.php";
require "modelo/categoriaModelo.php";
require "servicos/uploadImagemServico.php";

/** anon */
function index() {
    $dados["produtos"] = getAllProducts();
    exibir("produto/listar", $dados);
}

/** anon */
function search() {
    if (ehPost()) {
        extract($_POST);
        $dados["produtos"] = searchForNomeProduto($pesquisa);
        exibir("produto/listar", $dados);
    } else {
        
    }
}

/** anon */
function visualizar($id) {
    $dados["produto"] = getOneProduct($id);
    exibir("produto/visualizar", $dados);
}

/** admin */
function adicionar() {
    if (ehPost()) {
        extract($_POST);
        $imagem_name = $_FILES["imagemProduto"]["name"];
        $imagem_tmp = $_FILES["imagemProduto"]["tmp_name"];

        $diretorio_imagem = uploadImagem($imagem_name, $imagem_tmp);
        $msgRetorno = insertProduct($codCategoria, $nomeProduto, $precoProduto,$estoque, $descricaoProduto, $diretorio_imagem);

        redirecionar("produto/index");
    } else {
        $dados["categorias"] = getCategorias();
        exibir("produto/formulario", $dados);
    }
}

/** admin */
function editar($id) {
    if (ehPost()) {
        extract($_POST);
        //imagem produto
        $imagem_name = $_FILES["imagemProduto"]["name"];
        $imagem_tmp = $_FILES["imagemProduto"]["tmp_name"];

        $diretorio_imagem = uploadImagem($imagem_name, $imagem_tmp);
        //atualizar
        updateDataProduct($id, $codCategoria, $nomeProduto, $precoProduto,$estoque, $descricaoProduto, $diretorio_imagem);

        alert("Produtos deletados com sucesso!!!", "success");

        redirecionar("produto/index");
    } else {
        $dados['produto'] = getOneProduct($id);
        $dados["categorias"] = getCategorias();
        exibir("produto/formulario", $dados);
    }
}

/** admin */
function deletar($id) {
    deleteProduct($id);
    redirecionar("produto/index");
}

?>