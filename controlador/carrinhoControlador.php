<?php

require "./servicos/carrinhoServico.php";
require "./modelo/produtoModelo.php";

/** anon, admin, user */
function index() {
    $carrinhoProdutos = $_SESSION["carrinho"];
    $dados["produtos"] = pegarVariosProdutosPorId($carrinhoProdutos);    
    $precoTotal = 0;


    //morrer($dados["produtos"]);

    // unset($_SESSION["carrinho"]);
    // die();
    
    if (!empty($_SESSION["carrinho"])) {    
       foreach ($dados["produtos"] as $produto) {
      		$precoTotal += $produto['quantidade']*$produto["Preco"];
       }
    }

    $_SESSION["carrinho"]["total"] = $precoTotal;

    exibir("produto/carrinho", $dados);
}

/** anon, admin, user */
function adicionar($id) {
    addCarrinho($id);
    redirecionar("carrinho");
}

/** anon, admin, user */
function deletar($id) {
    unset($_SESSION["carrinho"][$id]);
    $_SESSION["carrinho"] = array_values($_SESSION["carrinho"]);
    redirecionar("carrinho/index");
}

?>