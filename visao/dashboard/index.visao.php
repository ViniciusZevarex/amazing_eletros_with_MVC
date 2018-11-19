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
                                                foreach ($pedidosMunicipio as $pedido) {
                                                    ?>
                                                    <td><?=$pedido["CodPedido"] ?></td>
                                                    <td><?=$pedido["dtPedido"] ?></td>
                                                    <td><?=$pedido["ValorTotal"] . " R$" ?></td>
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
                                                <?php 
                                            }
                                        } 
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-box-large box-with-header">

                        <br /><br />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box-header">
                        <div class="panel-title"><h2>Faturamento mensal, semanal e anual</h2></div>

                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                        </div>
                    </div>
                    <div class="content-box-large box-with-header">

                        Pellentesque luctus quam quis consequat vulputate. Sed sit amet diam ipsum. Praesent in pellentesque diam, sit amet dignissim erat. Aliquam erat volutpat. Aenean laoreet metus leo, laoreet feugiat enim suscipit quis. Praesent mauris mauris, ornare vitae tincidunt sed, hendrerit eget augue. Nam nec vestibulum nisi, eu dignissim nulla.
                        <br /><br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>