<?php 
	require "./servicos/carrinhoServico.php";

	/** anon, admin, user */
	function index(){
		exibir("produto/carrinho");
	}

	/** anon, admin, user */
	function adicionar($id){
		addCarrinho($id);
		exibir("produto/index");
	}

?>