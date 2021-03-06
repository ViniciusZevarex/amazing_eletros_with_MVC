<?php

require_once "bibliotecas/mysqli.php";

/**
 *
  Create
 *
 * */
function insertProduct($codCategoria, $nomeProduto, $precoProduto,$estoque, $descricaoProduto, $diretorio_imagem) {
    //imagem do produto
    $insert = "INSERT INTO tblproduto(CodCategoria,nomeProduto,Preco,Estoque,DescProduto,Imagem) VALUES ($codCategoria,'$nomeProduto','$precoProduto','$estoque','$descricaoProduto','$diretorio_imagem')";

    $consulta = mysqli_query($cnx = conexao(), $insert);


    if (!$consulta) {
        die('Erro ao cadastrar produto' . mysqli_error($cnx));
    }
    return 'Usuario cadastrado com sucesso!';
}

/**
 *
  Read
 *
 * */
function getAllProducts() {
    $command = "SELECT * FROM tblproduto";
    $query = mysqli_query(conexao(), $command);
    $products = array();

    while ($product = mysqli_fetch_assoc($query)) {
        $products[] = $product;
    }

    return $products;
}

function getOneProduct($filterID) {
    $command = "SELECT * FROM tblproduto WHERE CodProduto = $filterID";
    $query = mysqli_query($cnx = conexao(), $command);

    if (!$query) {
        die(mysqli_error($cnx));
    }

    $product = mysqli_fetch_assoc($query);

    return $product;
}

function searchForNomeProduto($nomeProduto) {
    $command = "SELECT * FROM tblproduto WHERE NomeProduto LIKE '%$nomeProduto%'";
    $query = mysqli_query(conexao(), $command);
    $products = array();

    while ($product = mysqli_fetch_assoc($query)) {
        $products[] = $product;
    }

    return $products;
}

function searchForCategoria($categoriaProduto) {
    $command = "SELECT * FROM tblproduto WHERE CodCategoria = " . $categoriaProduto;
    $query = mysqli_query($cnx = conexao(), $command);
    $products = array();

    if (!$query) {
        die(mysqli_error($cnx));
    }

    while ($product = mysqli_fetch_assoc($query)) {
        $products[] = $product;
    }

    return $products;
}

function pegarVariosProdutosPorId($carrinhoProdutos) {
    for ($i = 0; $i < count($carrinhoProdutos)-1; $i++) {
        $id = $carrinhoProdutos[$i]["id"];
        $comando = "SELECT * FROM tblproduto WHERE CodProduto = '$id'";
        $query = mysqli_query($cnx = conexao(), $comando);

        if (!$query) {
            die(mysqli_error($cnx));
        }

        $produto = mysqli_fetch_assoc($query);
        $produto["quantidade"] = $carrinhoProdutos[$i]["quantidade"];
        $produtos[] = $produto;
    }
    
    if (!empty($produtos)) {
        return $produtos;
    }
}

/**
 *
  Update
 *
 * */
function updateDataProduct($codProduto, $codCategoria, $nomeProduto, $precoProduto, $estoque,$descricaoProduto, $diretorio_imagem) {

    $update = "UPDATE tblproduto SET CodProduto = '$codProduto',CodCategoria = '$codCategoria',nomeProduto = '$nomeProduto',Preco = '$precoProduto',Estoque = '$estoque',DescProduto = '$descricaoProduto',Imagem = '$diretorio_imagem' WHERE CodProduto = $codProduto";

    $update = mysqli_query(conexao(), $update);

    if (!$update) {
        echo "Não deu certo " . mysqli_error(conexao());
    } else {
        header("Location: ../index.php");
    }
}

function updateEstoqueProduto($codProduto, $quantidade, $estoque_atual){
    print_r($estoque_atual);
    $estoque = $estoque_atual - $quantidade;

    $comando = "UPDATE tblproduto SET CodProduto = '$codProduto', Estoque = '$estoque' WHERE CodProduto = $codProduto";
    $update = mysqli_query(conexao(), $comando);

    if (!$update) {
        echo "Não deu certo " . mysqli_error(conexao());
    } else {
        header("Location: ../index.php");
    }
}

/**
 *
  Delete
 *
 * */
function deleteProduct($codProduto) {
    $comando2 = "SELECT Imagem FROM tblproduto WHERE CodProduto = '$codProduto'";
    $resultado = mysqli_query(conexao(), $comando2);
    $produto = mysqli_fetch_assoc($resultado);

    $comando = "DELETE FROM tblproduto WHERE CodProduto = '$codProduto'";
    $delete = mysqli_query(conexao(), $comando);

    if (!$comando) {
        echo "Erro: " . mysqli_error(conexao());
        // }else{			
        // 	$caminhoImagem = $produto["Imagem"];
        // 	unlink("./" . $caminhoImagem);
        // 
    }
}

?>