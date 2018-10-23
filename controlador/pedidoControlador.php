<?php

require "modelo/produtoModelo.php";
require_once "modelo/usuarioModelo.php";

function index(){
    $carrinhoProdutos = $_SESSION["carrinho"];
    $dados["produtos"] = pegarVariosProdutosPorId($carrinhoProdutos);
    
    //pegar os dados do cliente logado
    $id_cliente = $_SESSION['auth']['codCliente'];
    $dados["cliente"] = pegarUsuarioPorId($id_cliente);
    
    exibir("pedido/index",$dados);
}