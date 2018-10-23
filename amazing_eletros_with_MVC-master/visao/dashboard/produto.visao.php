<div class="page-content"> 
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="./produto/index/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-shopping-cart"></i> Produtos</a></li>
                    <li><a href="calendar.html"><i class="glyphicon glyphicon-indent-left">Estatística</i></a></li>
                    <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tabelas</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Usuarios</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="text-center">Produtos Cadastrados <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cadastrar">Cadastrar Produto</button>
                        </h1>
                    </div>
                    <div class="panel-body panel-listar-produtos">
                        <?php if (isset($produtos)) { ?>
                            <table class="table">
                                <tr>
                                    <th>Imagem</th>
                                    <th>PRODUTO</th>
                                    <th>PREÇO</th>
                                    <th>Descricao</th>
                                    <th>Estoque</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>	
                                <!-- products date -->
                                <?php foreach ($produtos as $produto) { ?>
                                    <tr>
                                        <td><img class="imagem-produto" src="<?= $produto['Imagem'] ?>"></td>
                                        <td><?= $produto['NomeProduto'] ?></td>
                                        <td><?= $produto["Preco"] . " R$"; ?></td>
                                        <td><?= $produto["DescProduto"]; ?></td>
                                        <td></td>
                                        <td><a href="./produto/editar/<?= $produto['CodProduto'] ?>" class="btn btn-default" role="button">Editar</a></td>
                                        <td><a href="./produto/deletar/<?= $produto['CodProduto'] ?>" class="btn btn-default" role="button">Deletar</a></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<h1 class='text-center'>Não há produtos cadastrados!</h1>";
                            }
                            ?>

                        </table>
                    </div>
                </div>

                <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="cadastrar">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Formulário</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="codCategoria" class="col-sm-2 control-label">CODIGO CATEGORIA</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="codCategoria" id="codCategoria">
                                                <?php foreach ($categorias as $categoria) { ?>
                                                    <option value="<?php echo $categoria['CodCategoria'] ?>"><?php echo $categoria["DescCategoria"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nomeProduto" class="col-sm-2 control-label">NOME DO PRODUTO</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="NOME DO PRODUTO">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="precoProduto" class="col-sm-2 control-label">PREÇO</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="precoProduto" id="precoProduto" placeholder="PREÇO DO PRODUTO">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="estoque" class="col-sm-2 control-label">Estoque</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="estoque" id="estoque" placeholder="Estoque">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="descricaoProduto" class="col-sm-2 control-label">DESCRIÇÃO</label>
                                        <div class="col-sm-10 ">
                                            <textarea class="form-control" rows="3" name="descricaoProduto" id="descricaoProduto" placeholder="DESCRIÇÃO DO PRODUTO"></textarea>
                                        </div>
                                    </div>
                                    <!-- Imagens-->
                                    <div class="form-group">
                                        <label for="exampleInputFile" class="col-sm-2 control-label">File input</label>
                                        <input type="file" id="exampleInputFile" class="form" name="imagemProduto">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-default">CADASTRAR PRODUTO</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>