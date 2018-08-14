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

				<!-- pagina login ou dados do usuario -->
				<?php if (!isset($_SESSION["logado"]) || !$_SESSION["logado"]){ ?>
				<li><a href="./visao/usuario/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Entre ou Cadastre-se</a></li>
				<?php } else { ?>				
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<span class="glyphicon glyphicon-user" aria-hidden="true">
							<?php echo $_SESSION["dados_cliente"]["Nome"] ?>
						</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo "usuario.php?id=" . $_SESSION['dados_cliente']['CodCliente']  ?>">Meus Dados</a></li>
						<li><a href="biblioteca/logout.php">Logout</a></li>
					</ul>
				</li>
				<?php } ?>

				<!-- carrinho de compras -->
				<li><a href="carrinho.php"><span class="glyphicon glyphicon-shopping-cart"></span><span class="badge">
					<?php echo isset($_SESSION["carrinho"]) ? count($_SESSION["carrinho"]) : 0; ?>
				</span></a>
			</li>
		</ul>
	</div>

</div>
</nav>