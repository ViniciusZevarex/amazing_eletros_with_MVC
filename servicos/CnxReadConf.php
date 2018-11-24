<?php
	function rootAcess(){
		$linha = array();
		$arq = fopen("C:/xampp/htdocs/amazing_eletros_with_MVC/servicos/confCnx.txt", "r");
		while (!feof($arq)) {
			$linha[] = trim(fgets($arq));
		}
		return $linha;
	}

?>