<?php 
	require "modelo/produtoModelo.php";
	require "modelo/categoriaModelo.php";
	require "servicos/uploadImagemServico.php";

	function index(){
		$dados["produtos"] = getAllProducts();
		exibir("produto/listar", $dados);
	}

	function visualizar($id) {
		$dados["produto"] = getOneProduct($id);
		exibir("produto/visualizar", $dados);
	}

	function adicionar(){
		if (ehPost()) {
			extract($_POST);
			$imagem_name 	= $_FILES["imagemProduto"]["name"];
			$imagem_tmp 	= $_FILES["imagemProduto"]["tmp_name"];

			$diretorio_imagem 	= uploadImagem($imagem_name, $imagem_tmp);
			$msgRetorno 		= insertProduct($codCategoria,$nomeProduto,$precoProduto,$descricaoProduto, $diretorio_imagem);

			redirecionar("produto/index");
		} else {
			$dados["categorias"] = getCategorias();
			exibir("produto/formulario",$dados);
		}
	}

	function editar($id) {
		if (ehPost()) {
			extract($_POST);
			//imagem produto
			$imagem_name 	= $_FILES["imagemProduto"]["name"];
			$imagem_tmp 	= $_FILES["imagemProduto"]["tmp_name"];

			$diretorio_imagem 	= uploadImagem($imagem_name, $imagem_tmp);
			//atualizar
			alert(updateDataProduct($id,$codCategoria,$nomeProduto,$precoProduto,$descricaoProduto, $diretorio_imagem));

			redirecionar("produto/index");
		} else {
			$dados['produto'] 		= getOneProduct($id);
			$dados["categorias"] 	= getCategorias();
			exibir("produto/formulario", $dados);
		}
	}

	function deletar($id){
		deleteProduct($id);
		redirecionar("produto/index");
	}
?>