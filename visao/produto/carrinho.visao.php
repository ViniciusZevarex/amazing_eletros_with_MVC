<section class="container">
		<div class="row">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="text-center">CARRINHO DE COMPRAS <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h1>
				</div>
				<div class="panel-body">
					<table class="table">
						<tr>
							<th>IMAGEM</th>
							<th>PRODUTO</th>
							<th>QUANTIDADE</th>
							<th>PREÇO</th>
							<th>Excluir</th>
						</tr>	
						<!-- products date -->
						<?php 
							for ($i=0; $i < count($_SESSION["carrinho"]); $i++) {
								$Idproduto = $_SESSION["carrinho"][$i];
								$dados = searchForCategoria($Idproduto);
						?>
							<tr>
								<td><img class="imagem-produto" src="<?php echo $dados['Imagem'] ?>"></td>
								<td><?php echo $dados['NomeProduto'] ?></td>
								<td></td>
								<td><?php echo $dados["Preco"] . " R$"; ?></td>
								<td><a href="<?php echo 'biblioteca/delete_produto_carrinho.php?produto=' . $i ?>">excluir</a></td>
							</tr>
						<?php } ?>

					</table>
				</div>

				<div class="panel-footer">
					<div class="col-lg-10">
						<div class="row">
							<form action="carrinho.php" method="post">
								<div class="input-group col-lg-4">
									<input type="text" name="cep" class="form-control" placeholder="Calcule o prazo pelo CEP">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Calcular</button>
									</span>
								</div>
							</form>
						</div>
					</div>
					<a href="#" class="btn btn-primary" role="button">COMPRAR</a>
				</div>

			</div>
		</div>
	</section>