<section class="container">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="text-center">Finalizar Pedido<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h1>
            </div>
            <div class="panel-body">
                <div class="row"> 
                    <div class="col-lg-8 border-right-divisao">
                        <table class="table">
                            <tr>
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
                                    <td><?= $produto['NomeProduto'] ?></td>
                                    <td>
                                        <form method="POST" action="">
                                            <input name="quantidade" type="number" value="<?= $produto['quantidade'] ?>"</td>
                                        </form>
                                    </td>
                                    <td><?= $produto["Preco"] . " R$"; ?></td>
                                    <td><a href="<?= 'carrinho/deletar/' . $i ?>">excluir</a></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </table>
                    </div>
                    
                    <div class="col-lg-4">
                        <h3>Endereço</h3>
                        <span><?=$cliente['endereco']?><br></span>
                        <span><?=$cliente['Municipio']."-".$cliente['Estado']?><br></span>
                        <span><?=$cliente['Pais']?></span>
                    </div>
                    
                    <div class="col-lg-12 border-top">
                        <h3 class="text-center">Possui Cupom?</h3>
                        
                        <form action="" method="post">
                            <div class="input-group col-lg-4">
                                <input type="text" name="cupom" class="form-control" placeholder="XXXXXXXXX-XX">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Aplicar</button>
                                </span>
                            </div>
                        </form>
                    </div> 
                </div>
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

