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