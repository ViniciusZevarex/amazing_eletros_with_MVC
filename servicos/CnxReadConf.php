<?php
	function rootAcess(){
		$linha = array();
		$arq = fopen("C:/wamp64/www/amazing_eletros_with_MVC/servicos/confCnx.txt", "r");
		while (!feof($arq)) {
			$linha[] = trim(fgets($arq));
		}
		return $linha;
	}

?>