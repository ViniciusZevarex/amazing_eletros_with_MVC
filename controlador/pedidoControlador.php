<?php

require "modelo/produtoModelo.php";
require_once "modelo/usuarioModelo.php";
require_once "modelo/pedidoModelo.php";

/* user,admin*/
function index(){
    $carrinhoProdutos = $_SESSION["carrinho"];
    $dados["produtos"] = pegarVariosProdutosPorId($carrinhoProdutos);
    
    //pegar os dados do cliente logado
    $id_cliente = $_SESSION['auth']['codCliente'];
    $dados["cliente"] = pegarUsuarioPorId($id_cliente);
    
    exibir("pedido/index",$dados);
}

function finalizar($codCliente){
	$carrinhoProdutos = $_SESSION["carrinho"];
    $dados["produtos"] = pegarVariosProdutosPorId($carrinhoProdutos);

    $data_pedido = date("Y-m-d");

    $id_cliente = $_SESSION['auth']['codCliente'];
    $dadosCliente = pegarUsuarioPorId($id_cliente);

    $id_pedido = inserirPedido($id_cliente, $dadosCliente['CPF'], $dadosCliente['Pais'],$dadosCliente['Estado'],$dadosCliente['Municipio'],$dadosCliente['endereco'],$data_pedido,$_SESSION["carrinho"]["total"]);

    foreach ($dados["produtos"] as $produto) {
        inserirProdutosPedidoId($id_pedido,$produto["CodProduto"],$produto["quantidade"]);
        updateEstoqueProduto($produto["CodProduto"], $produto["quantidade"], $produto["Estoque"]);
    }

    
}