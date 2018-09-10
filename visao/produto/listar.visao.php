<header class="container hidden-xs">

	<!-- carousel -->
	<div id="carousel-example-generic" class="carousel slide col-lg-12" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="publico/imgs/imgsEstilos/carousel/01.jpg">
			</div>
			<div class="item col-lg-12">
				<img src="publico/imgs/imgsEstilos/carousel/02.jpg">
			</div>
			<div class="item col-lg-12">
				<img src="./publico/imgs/imgsEstilos/carousel/03.jpg">
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</header>

<h1 class="text-center">CONFIRA ESTAS OFERTAS EXCLUSIVAS <span class="glyphicon glyphicon glyphicon-circle-arrow-down"></span></h1>

<?php foreach ($produtos as $produto) {?>
<div class="col-sm-3 col-md-4">
	<div class="thumbnail">
		<img class="imagem-produto" src="<?php echo $produto['Imagem'] ?>">
		<div class="caption">
			<h3><?php echo $produto['NomeProduto'] ?></h3>
			<ul class="list-group">
				<li class="list-group-item"><?php echo "À vista: " . $produto['Preco'] . " R$"; ?></li>
				<li class="list-group-item"><?php echo "À prazo: 12x de " . number_format($produto['Preco']/12, 2) . " R$"; ?></li>
			</ul>
			<a href="./produto/visualizar/<?php echo $produto['CodProduto'] ?>" class="btn btn-primary" role="button">Ver produto</a>
			<a href="./carrinho/adicionar/<?= $produto['CodProduto']?>" class="btn btn-default" role="button">
				Adicionar ao Carrinho
			</a>
			<?php if (isset($_SESSION["auth"])) {
				if ($_SESSION["auth"]["user"] == "admin") { ?>

				<a href="./produto/editar/<?php echo $produto['CodProduto'] ?>" class="btn btn-default" role="button">Editar</a>
				<a href="./produto/deletar/<?php echo $produto['CodProduto'] ?>" class="btn btn-default" role="button">Deletar</a>
				
			<?php }	
			} ?>
		</div>
	</div>
</div>
<?php } ?>