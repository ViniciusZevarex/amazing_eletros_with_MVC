<?php 

require_once "bibliotecas/mysqli.php";

function inserirPedido($codCliente, $CPF, $pais,$estado,$municipio,$endereco,$dt_pedido,$valorTotal){

	$comando = "INSERT INTO tblpedido(CodCliente,CPF,Pais,Estado,Municipio,endereco,dtPedido,ValorTotal) VALUES ('$codCliente', '$CPF', '$pais','$estado','$municipio','$endereco','$dt_pedido','$valorTotal')";

	$query = mysqli_query($cnx = conexao(), $comando);
	$id = mysqli_insert_id($cnx);

	if (!$query) {
		echo "Erro: " . mysqli_error($cnx);
		die();
	}

	return $id;
}

function inserirProdutosPedidoId($codPedido,$codProduto,$quantidade){
	$comando = "INSERT INTO tblProdutoPedido(CodPedido,CodProduto,Quantidade) VALUES ('$codPedido','$codProduto','$quantidade')";

	$query = mysqli_query($cnx = conexao(), $comando);
	$id = mysqli_insert_id($cnx);

	if (!$query) {
		echo "Erro: " . mysqli_error($cnx);
		die();
	}
}

function pegarPedidos($id){
	$comando = "SELECT * FROM tblpedido WHERE CodCliente = '$id'";

	$query = mysqli_query($cnx = conexao(), $comando);

	if (!$query) {
		echo "Erro: " . mysqli_error($cnx);
		die();
	}

	while ($row = mysqli_fetch_assoc($query)){
		$produtos["produtos"] = pegarProdutosPedidosPorId($id);
		$pedidos[] = array_merge_recursive($row, $produtos);
	}

	return $pedidos;
}

function pegarProdutosPedidosPorId($id){
	$comando = "SELECT p.Imagem, p.NomeProduto, p.Preco FROM 
	tblpedido as pe 
	INNER JOIN tblprodutopedido as pp
	ON (pe.CodPedido = pp.CodPedido)
	INNER JOIN tblproduto as p 
	ON (pp.CodProduto = p.CodProduto) 
	WHERE pe.CodCliente = '$id'";

	$query = mysqli_query($cnx = conexao(), $comando);

	if (!$query) {
		echo "Erro: " . mysqli_error($cnx);
		die();
	}

	while ($row = mysqli_fetch_assoc($query)){
		$produtos[] = $row;
	}

	return $produtos;
}