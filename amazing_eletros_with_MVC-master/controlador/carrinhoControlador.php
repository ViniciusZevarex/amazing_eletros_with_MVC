<?php 
	require "./servicos/carrinhoServico.php";
	require "./modelo/produtoModelo.php";

	/** anon, admin, user */
	function index(){
		$carrinhoProdutos = $_SESSION["carrinho"];
		$dados["produtos"] = pegarVariosProdutosPorId($carrinhoProdutos);

		exibir("produto/carrinho",$dados);
	}

	/** anon, admin, user */
	function adicionar($id){
		addCarrinho($id);
		redirecionar("carrinho");
	}

	/** anon, admin, user */
	function deletar($id){
		unset($_SESSION["carrinho"][$id]);
		$_SESSION["carrinho"] = array_values($_SESSION["carrinho"]);
		redirecionar("carrinho/index");
	}

?>