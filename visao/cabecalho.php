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
			<form class="navbar-form navbar-left" action="index.php" method="get">
				<div class="form-group">
					<input type="text" class="form-control" name="pesquisa" placeholder="Procura algo em especial?">
				</div>
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="./login/">Entre</a></li>
				<li><a href="./usuario/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Cadastre-se</a></li>
				<!-- carrinho de compras -->
				<li><a href="carrinho.php"><span class="glyphicon glyphicon-shopping-cart"></span><span class="badge">
					<?php echo isset($_SESSION["carrinho"]) ? count($_SESSION["carrinho"]) : 0; ?>
				</span></a>
			</li>
		</ul>
	</div>

</div>
</nav>