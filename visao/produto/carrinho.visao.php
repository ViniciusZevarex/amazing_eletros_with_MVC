<section class="container">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="text-center">CARRINHO DE COMPRAS <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h1>
            </div>
            <div class="panel-body">
                <?php if (isset($produtos)) { ?>
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
                        $i = 0;
                        foreach ($produtos as $produto) {
                            ?>
                            <tr>
                                <td><img class="imagem-produto" src="<?= $produto['Imagem'] ?>"></td>
                                <td><?= $produto['NomeProduto'] ?></td>
                                <td>
                                    <form method="POST" action="">
                                        <input type="hidden" name="index_produto" value="<?=$i ?>">
                                        <input class="quantidade-carrinho" name="quantidade" type="number" value="<?=$produto['quantidade'] ?>" max="<?=$produto['Estoque'] ?>" data-mask="00">
                                        <input type="submit" value="ALTERAR">
                                    </form>
                                </td>
                                <td><?= $produto["Preco"] . " R$"; ?></td>
                                <td><a href="<?= 'carrinho/deletar/' . $i . '/' . $produto['Preco']?>">excluir</a></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    } else {
                        echo "<h1 class='text-center'>Não há produtos existentes no seu carrinho!</h1>";
                    }
                    ?>

                </table>
            </div>

            <div class="panel-footer">
                <div class="col-lg-10">
                    <div class="row">
                        <?php if(!empty($_SESSION["carrinho"]["total"])){ ?>
                            <h4 class="col-lg-9">Total: <?=$_SESSION["carrinho"]["total"]?></h4>
                        <?php } ?>
                        <form action="carrinho.php" method="post">
                            <div class="input-group col-lg-3">
                                <input type="text" name="cep" class="form-control" placeholder="Calcule o prazo pelo CEP">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Calcular</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="./pedido/index" class="btn btn-primary" role="button">COMPRAR</a>
            </div>

        </div>
    </div>
</section>