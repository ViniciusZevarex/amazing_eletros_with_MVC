<nav class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="produto/"><img src="publico/imgs/imgsEstilos/brandLogo.png" width="150px"></a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-collapse">
			<form class="navbar-form navbar-left" action="./produto/search/" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="pesquisa" placeholder="Procura algo em especial?">
				</div>
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION["auth"])) {?>
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<?= $_SESSION["auth"]["nome"] ?>
							<span class="glyphicon glyphicon-user" aria-hidden="true">
							</span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="./usuario/listar/">Meus Dados</a></li>
							<li><a href="./pedido/listar">Meus pedidos</a></li>
							<?php 
								if($_SESSION["auth"]["role"] == "admin"){
							?>
								<li><a href="./dashboard/">Dashboard</a></li>
							<?php } ?>
							<li><a href="./login/logout">Logout</a></li>
						</ul>
					</li>
					<?php }else{ ?>
					<li><a href="./login/">Entre</a></li>
					<li><a href="./usuario/adicionar/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Cadastre-se</a></li>
					<?php } ?>
					<!-- carrinho de compras -->
					<li>
						<a href="./carrinho/index"  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-shopping-cart"></span>
							<span class="badge">
								<?php echo isset($_SESSION["carrinho"]) ? count($_SESSION["carrinho"])-1 : 0; ?>
							</span> 
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu dropdown-carrinho">
							<?php 
								if (isset($_SESSION["carrinho"][0])) {
									$carrinhoProdutos = $_SESSION["carrinho"];
									$carrinho = pegarVariosProdutosPorId($carrinhoProdutos);
							?>
							<?php foreach($carrinho as $produtoCarrinho){ ?>
								<li>
									<img class="icon-dropdown" src="<?=$produtoCarrinho['Imagem']?>">
									<?=$produtoCarrinho['NomeProduto']?>
									<span><a class="btn btn-primary" href="./produto/visualizar/<?=$produtoCarrinho['CodProduto']?>">visualizar</a></span>
								</li>
							<?php } ?>
							<?php }else{?>
								<li>Seu carrinho está vazio!</li>
							<?php } ?>
							<li><span><a class="btn btn-primary" href="./carrinho/" style="margin:2%;">ir para o carrinho</a></span></li>
						</ul>
					</li>
			</ul>
		</div>

	</div>
</nav>