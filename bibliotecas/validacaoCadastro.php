<?php
function validacaoCadastro($nome, $CPF, $email, $senha, $confirmar_senha,$dia,$mes,$ano, $pais, $endereco, $sexo, $data){
		$errors 		= array();
		$email			= strip_tags($email);
		$nome 			= strip_tags($nome);
		$senha 			= strip_tags($senha);
		$confirmaSenha	= strip_tags($confirmar_senha);
		$CPF_cadastro   = strip_tags($CPF);
		$Pais 			= strip_tags($pais);
		$endereco 		= strip_tags($endereco);

			//nome
		if (strlen(trim($nome)) == 0) {
			$errors[] = "Insira um nome";
		}elseif(!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª' ']+$/", $nome)) {
			$errors[] = "Insira um nome valido!!!";
		}

			//CPF

		if (!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $CPF_cadastro) || strlen(trim($CPF_cadastro)) == 0) {
			$errors[] = "CPF não valido.";
		}

			//E-mail
		$emailValido 	= filter_input(INPUT_POST, 'email_cadastro', FILTER_VALIDATE_EMAIL);

		if (!$emailValido || strlen(trim($email)) == 0) {
			$errors[] = "E-mail não valido.";
		}

			//senha
		if(strlen(trim($senha)) == 0){
			$errors[] = "Insira uma senha"; 
		} else if(strlen($senha) > 16){
			$errors[] = "Insira uma senha menor."; 
		} else if(strlen($senha) < 8){
			$errors[] = "Insira uma senha maior."; 
		} 

		    //confirmar senha
		if($confirmaSenha == ""){
			$errors[] = "Insira a confirmação da senha"; 
		} else if(!($senha == $confirmaSenha)){
			$errors[] = "Confirme a senha";
		}

		 //Nascimento
		if (count($data) == 3) {
			$dia = $data[0]; 
			$mes = $data[1];
			$ano = $data[2];

			if (strlen(trim($ano)) == 0) {
				$errors[] = "Ano não inserido.";
			} elseif ($ano >=2017 || $ano < 1917){
				$errors[] = "Ano invalido.";
			}
			
			if (strlen(trim($mes)) == 0) {
				$errors[] = "Mês não inserido.";
			} elseif (($mes >=12 || $mes < 1)){
				$errors[] = "Mês invalido.";
			}

			if (strlen(trim($dia)) == 0) {
				$errors[] = "Dia não inserido.";
			} elseif (($dia >=31 || $dia <=1)||($dia >= 28 && $mes == "fevereiro")){
				$errors[] = "Dia invalido.";
			}

			
		}
			//endereco
		if (strlen(trim($endereco)) == 0) {
			$errors[] = "Insira um endereco";
		}

			//Sexo
		if (strlen(trim($sexo)) == 0) {
			$errors[] = "Sexo não selecionado.";
		}
		return $errors;
	}
?>