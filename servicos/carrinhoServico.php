<?php

function addCarrinho($id) {
    if (!isset($_SESSION["carrinho"])) {
        $_SESSION["carrinho"] = array();
    }

    $existeProduto = false;

    //procura se existe o produto no carrinho, e aumenta a quantidade!
    foreach ($_SESSION["carrinho"] as $idCarrinho => $produto) {
        if ($produto["id"] == $id) {
            $produto["quantidade"]++;
            
            $_SESSION["carrinho"][$idCarrinho] = $produto; //salvando a alteracao no carrinho!
            $existeProduto = true;
            break;
        }
    }
    
    echo "<pre>";
    print_r($_SESSION["carrinho"]);

    //se nao existe produto no carrinho, cria um
    if (!$existeProduto) {
        $produto2["id"] = $id;
        $produto2["quantidade"] = 1;
        $_SESSION["carrinho"][] = $produto2;
    }

    if(count($_SESSION["carrinho"] == 1)){
        $_SESSION["carrinho"]["total"] = 0;
    }

}

?>