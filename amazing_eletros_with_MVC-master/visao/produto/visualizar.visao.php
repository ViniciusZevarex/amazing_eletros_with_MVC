	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-xs-12 col-md-5 col-lg-4">
					<a href="#" class="thumbnail">
						<img src="<?php echo $produto["Imagem"] ?>">
					</a>
				</div>
				<div class="col-xs-12 col-md-7 col-lg-8">
					<h1 class="product-name"><?php echo $produto['NomeProduto']; ?> <span class="label label-primary">Promoção</span></h1>
					<div class="panel panel-default">
						<div class="panel-body">
							<?php echo $produto["DescricaoProduto"]; ?>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<h4 class="text-center">Preços</h4>
							<div class="col-lg-6 col-md-6">
								<ul class="list-group">
									<li class="list-group-item"><?php echo "À vista: " . $produto['Preco'] . " R$"; ?></li>
									<li class="list-group-item"><?php echo "À prazo: 12x de " . number_format($produto['Preco']/12, 2) . " R$"; ?></li>
								</ul>
							</div>
							<div class="col-lg-6 col-md-6">
								<form action="produtos.php" method="post">
									<div class="input-group">
										<input type="text" name="cep" class="form-control" placeholder="Calcule o prazo pelo CEP">
										<span class="input-group-btn">
											<button class="btn btn-default" type="button">Calcular</button>
										</span>
									</div>
								</form>
								<a href="#" class="btn btn-primary col-lg-12" role="button">COMPRAR</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>