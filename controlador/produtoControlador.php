<?php 
	require "modelo/produtoModelo.php";
	require "servicos/correiosServico.php";

	function index(){
		$dados["produtos"] = getAllProducts();
		exibir("produto/listar", $dados);
	}

	function visualizar($id) {
		$dados["produto"] = getOneProduct($id);
		exibir("produto/visualizar", $dados);
	}
	
	function adicionar(){
		// $dados["produto"] = insertProduct($codProduto,$codCategoria,$nomeProduto,$precoProduto,$descricaoProduto, $SourceImage);
		exibir("produto/formulario");
	}
?>