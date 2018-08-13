<?php


function uploadImagem($SourceImage, $imagem_tmp) {
	$imagem				= basename($SourceImage);
	$diretorio_mover	= "../imgs/produtos/";
	$diretorio   		= "../../publico/imgs/produtos/";

	$resultado = move_uploaded_file($imagem_tmp, $diretorio_mover. $imagem);
	$diretorio_imagem = $diretorio. $imagem;

	if(!$resultado) {
		die("Nao deu certo o upload!");
	}

	return $diretorio_imagem;
}