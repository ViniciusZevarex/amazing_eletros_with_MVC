<?php

require "./servicos/carrinhoServico.php";
require "./modelo/produtoModelo.php";

// unset($_SESSION["carrinho"]);
// die();

/** anon, admin, user */
function index() {
    if(ehPost()){
        extract($_POST);
        $_SESSION["carrinho"][$index_produto]["quantidade"] = $quantidade;
    }

    if (!empty($_SESSION["carrinho"])) {
        $carrinhoProdutos = $_SESSION["carrinho"];
        $dados["produtos"] = pegarVariosProdutosPorId($carrinhoProdutos);    
        $precoTotal = 0;
     
       foreach ($dados["produtos"] as $produto) {
      		$precoTotal += $produto['quantidade']*$produto["Preco"];
       }

       $_SESSION["carrinho"]["total"] = $precoTotal;

       exibir("produto/carrinho", $dados);
    }else{
        exibir("produto/carrinho");
    }
}

/** anon, admin, user */
function adicionar($id) {
    addCarrinho($id);
    redirecionar("carrinho");
}

/** anon, admin, user */
function deletar($id,$preco) {
    // salvando o preco total e atualizando
    $total = $_SESSION["carrinho"]["total"];
    $total = $total - ($preco*$_SESSION["carrinho"][$id]["quantidade"]);

    //deletando produto
    unset($_SESSION["carrinho"][$id]);

    //dando um unset no total para não ocorrer bugs na funcao array_values 
    unset($_SESSION["carrinho"]["total"]);
    $_SESSION["carrinho"] = array_values($_SESSION["carrinho"]);

    //restaurando a posicao total da sessão
    $_SESSION["carrinho"]["total"] = $total;

    redirecionar("carrinho/index");
}

?>