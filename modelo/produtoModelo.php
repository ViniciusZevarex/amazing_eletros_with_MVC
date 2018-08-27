<?php 
require_once "bibliotecas/mysqli.php";

	/**
	 *
	 	Create 
	 *
	 **/

	 	function insertProduct($codCategoria,$nomeProduto,$precoProduto,$descricaoProduto, $diretorio_imagem){
		//imagem do produto
	 		$insert = "INSERT INTO tblproduto(CodCategoria,nomeProduto,Preco,DescricaoProduto,Imagem) VALUES ($codCategoria,'$nomeProduto','$precoProduto','$descricaoProduto','$diretorio_imagem')";

	 		$consulta = mysqli_query($cnx = conexao(),$insert);


 		    if(!$consulta) { die('Erro ao cadastrar produto' . mysqli_error($cnx)); }
    		return 'Usuario cadastrado com sucesso!';
	 	}

	/**
	 *
		Read 
	 *
	 **/

		function getAllProducts(){
			$command 	= "SELECT * FROM tblproduto";
			$query 		= mysqli_query(conexao(), $command);
			$products 	= array(); 

			while ($product = mysqli_fetch_assoc($query)) {
				$products[] = $product;
			}

			return $products;
		}

		function getOneProduct($filterID){
			$command 	= "SELECT * FROM tblproduto WHERE CodProduto = $filterID";
			$query 		= mysqli_query($cnx = conexao(), $command);

			if(!$query) {
				die(mysqli_error($cnx));
			}

			$product 	= mysqli_fetch_assoc($query);

			return $product;
		}

		function searchForNomeProduto($nomeProduto) {
			$command 	= "SELECT * FROM tblproduto WHERE NomeProduto LIKE '%{$_GET["pesquisa"]}%'";
			$query 		= mysqli_query(conexao(), $command);
			$product 	= mysqli_fetch_assoc($query);

			return $products;
		}

		function searchForCategoria($categoriaProduto){
			$command 	= "SELECT * FROM tblproduto WHERE CodCategoria = " . $categoriaProduto;
			$query 		= mysqli_query(conexao(), $command);
			$products 	= array();

			while ($product = mysqli_fetch_assoc($query)) {
				$products[] = $product;
			}

			return $products; 
		}
	/**
	 *
		Update 
	 *
	 **/


		function updateDataProduct($codProduto,$codCategoria,$nomeProduto,$precoProduto,$descricaoProduto, $diretorio_imagem){

			$update = "UPDATE tblproduto SET CodProduto = '$codProduto',CodCategoria = '$codCategoria',nomeProduto = '$nomeProduto',Preco = '$precoProduto',DescricaoProduto = '$descricaoProduto',Imagem = '$diretorio_imagem' WHERE CodProduto = $codProduto";

			$update = mysqli_query(conexao(),$update);

			if (!$update) {
				echo "Não deu certo " . mysqli_error(conexao());
			}else{
				header("Location: ../index.php");
			}
		}

	/**
	 *
	 	Delete 
	 *
	 **/

	 	function deleteProduct($codProduto){
	 		$comando2 	= "SELECT Imagem FROM tblproduto WHERE CodProduto = '$codProduto'";
	 		$resultado 	= mysqli_query(conexao(), $comando2);
	 		$produto 	= mysqli_fetch_assoc($resultado);

	 		$comando 	= "DELETE FROM tblproduto WHERE CodProduto = '$codProduto'";
	 		$delete     = mysqli_query(conexao(),$comando);

	 		if (!$comando) {
	 			echo "Erro: " . mysqli_error(conexao());
	 		}else{			
	 			$caminhoImagem = $produto["Imagem"];
	 			unlink("../../" . $caminhoImagem);
	 		}
	 	}
	 	?>