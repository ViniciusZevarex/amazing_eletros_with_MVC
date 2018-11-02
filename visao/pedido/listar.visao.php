<section class="container">
    <div class="row">
        <h2 class="text-center"> <strong>Meus pedidos</strong></h2>

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">

                <?php 
                foreach ($pedidos as $pedido) {
                    ?>

                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                +
                            </a>
                            <table class="table">
                                <tr>
                                    <th>Nº do pedido</th>
                                    <th>Data do pedido</th>
                                    <th>Valor do pedido</th>
                                    <th>Status</th>
                                </tr>
                                <tr>

                                </tr>
                            </table>
                        </h4>
                    </div>
                    <?php 
                    foreach ($pedidos["produtos"] as $produtos) {
                        ?>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <table class="table col-lg-12">
                                    <tr>
                                        <th>Imagem</th>
                                        <th>Produto</th>
                                        <th>preço</th>
                                    </tr>	
                                    <tr>
                                        <td><img class="imagem-produto" src="<?= $produto['Imagem'] ?>"></td>
                                        <td><?= $produto['NomeProduto'] ?></td>
                                        <td><?= $produto["Preco"] . " R$"; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <?php } 
                    }
                    ?>
                </div>
            </div>

        </div>
    </section>