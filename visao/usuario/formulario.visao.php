<div class="container-form col-md-7 col-md-offset-2" id="form_cadastro">
	<h2 class="text-center title-section">INSIRA SEUS DADOS PARA CONTINUAR</h2>

	<form class="form-horizontal center-block" action="" method="post">

		<div class="form-group">
			<label for="nome" class="col-sm-2 control-label">Nome completo:</label>
			<div class="col-sm-10">
				<input name="nome_cadastro" type="text" id="nome" class="form-control" placeholder="Insira aqui seu nome completo" aria-describedby="basic-addon2" value="<?=@ $usuario['Nome'] ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="CPF_cadastro" class="col-sm-2 control-label">CPF:</label>
			<div class="col-sm-10">
				<input name="CPF_cadastro" type="text" id="CPF_cadastro" class="form-control" data-mask="000.000.000-00" placeholder="999.999.999-99" aria-describedby="basic-addon2"  value="<?=@ $usuario['CPF'] ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="email_cadastro" class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-10">
				<input name="email_cadastro" type="email" id="email_cadastro" class="form-control" placeholder="Insira aqui seu email" aria-describedby="basic-addon2"  value="<?=@ $usuario['Email'] ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="senha_cadas" class="col-sm-2 control-label">Senha:</label>
			<div class="col-sm-10">
				<input name="senha_cadastro" type="password" id="senha_cadas" class="form-control" placeholder="Insira aqui uma senha" aria-describedby="basic-addon2">
			</div>
		</div>

		<div class="form-group">
			<label for="confirmar_senha" class="col-sm-2 control-label">Confirmar Senha:</label>
			<div class="col-sm-10">
				<input name="confirmar_senha" type="password" id="confirmar_senha" class="form-control" placeholder="Confirme sua senha" aria-describedby="basic-addon2">
			</div>
		</div>
	

		<div class="form-group">
			<label for="data_nascimento" class="col-sm-2 control-label">Data de nascimento:</label>
			<div class="col-sm-10">
				<input name="data_nascimento" type="text" id="data_nascimento" class="form-control" data-mask="00/00/0000" placeholder="DD/MM/AAAA" aria-describedby="basic-addon2"
				 value="<?=@ tratarData($usuario['dtNasc']) ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="pais" class="col-sm-2 control-label">País:</label>
			<div class="col-sm-10">
				<?php include("./bibliotecas/listaPaises.php") ?>
			</div>
		</div>
		<div class="form-group">
			<label for="endereco" class="col-sm-2 control-label">Endereço:</label>
			<div class="col-sm-10">
				<input name="endereco" type="text" id="endereco" class="form-control" placeholder="Endereco" aria-describedby="basic-addon2" value="<?=@ $usuario['endereco'] ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="sexo" class="col-sm-2 control-label">Sexo:</label>
			<div class="radio-inline">
				<label>
					<input type="radio" value="masculino" name="sexo"> Masculino
				</label>
				<br>
				<label>
					<input type="radio" value="feminino" name="sexo"> Feminino
				</label>
			</div>
		</div>

		<div class="form-group">
			<input class="btn btn-primary btn-submit-form col-sm-offset-4 col-sm-5" type="submit" name="button_cadastro">
		</div>
	</form>
</div>