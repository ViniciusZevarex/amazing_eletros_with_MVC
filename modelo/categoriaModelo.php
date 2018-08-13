<?php

function getCategorias(){
	$comando 	= "SELECT * FROM tblcategoriaproduto";
	$consulta	= mysqli_query($cnx = conexao(),$comando);

	if (!$consulta) {
		echo "Erro " . mysqli_error($conexao);
		die();
	}

	$categorias = array();
	while ($linha = mysqli_fetch_assoc($consulta)){
		$categorias[] = $linha;
	}

	return $categorias;
}

?>