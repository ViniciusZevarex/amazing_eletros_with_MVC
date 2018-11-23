<div class="page-content">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="./produto/index/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                    <li><a href="./dashboard/produto/"><i class="glyphicon glyphicon-shopping-cart"></i>Produtos</a></li>
                    <li><a href="calendar.html"><i class="glyphicon glyphicon-indent-left">Estatística</i></a></li>
                    <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tabelas</a></li>
                    <li><a href="./dashboard/usuario/"><i class="glyphicon glyphicon-tasks"></i>Usuarios</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h2>Lista de Pedidos por Municipio</h2>
                                <form method="POST" action="">
                                    <input type="text" name="Municipio">
                                    <input type="submit" value="procurar">
                                </form>
                            </div>
                            <div class="panel-options">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <table class="table">
                                         <tr>
                                            <th>Nº do pedido</th>
                                            <th>Data do pedido</th>
                                            <th>Valor do pedido</th>
                                        </tr>
                                        <tr>
                                            <?php
                                            if(!empty($pedidosMunicipio)){
                                                foreach ($pedidosMunicipio as $pedidoMunicipio) {
                                                    ?>
                                                    <td><?=$pedidoMunicipio["CodPedido"] ?></td>
                                                    <td><?=$pedidoMunicipio["dtPedido"] ?></td>
                                                    <td><?=$pedidoMunicipio["ValorTotal"] . " R$" ?></td>
                                                </tr>
                                                <?php 
                                            }
                                        } 
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-header">
                            <div class="panel-title">
                                <h2>Lista de Pedidos em um intervalo de datas</h2>
                                <form method="POST" action="">
                                    <input name="dtInicio" type="date">
                                    <input type="date" name="dtFim">
                                    <input type="submit">
                                </form>
                            </div>

                            <div class="panel-options">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <table class="table">
                                         <tr>
                                            <th>Nº do pedido</th>
                                            <th>Data do pedido</th>
                                            <th>Valor do pedido</th>
                                        </tr>
                                        <tr>
                                            <?php
                                            if(!empty($pedidosPorData)){
                                                foreach ($pedidosPorData as $pedido) {
                                                    ?>
                                                    <td><?=$pedido["CodPedido"] ?></td>
                                                    <td><?=$pedido["dtPedido"] ?></td>
                                                    <td><?=$pedido["ValorTotal"] . " R$" ?></td>
                                                </tr>
                                                <?php } ?>
                                                <div class="panel panel-default">
                                                  <div class="panel-heading">
                                                      <h3>Faturamento do período: </h3>
                                                  </div>
                                                  <div class="panel-body">
                                                    <strong><?=$faturamento . " R$" ?></strong>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>