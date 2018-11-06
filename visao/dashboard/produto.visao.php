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
                        <div class="row">
                            <h1 class="text-center col-lg-9">Produtos Cadastrados <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                <a class="btn btn-primary btn-lg" href="./produto/adicionar">Cadastrar Produto</a>
                            </h1>

                            <h4 class="col-lg-3">
                                <form method="post" action="">
                                    <label for="search-for-category">Organizar por:</label>
                                    <select name="categoria" id="search-for-category">
                                        <?php foreach ($categorias as $categoria) { ?>
                                        <option value= "<?= $categoria['CodCategoria']?>"><?=$categoria['DescCategoria']?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="submit" value="search">
                                </form>
                            </h4>
                        </div>
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
                                <td><?= $produto["Estoque"]; ?></td>
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
    </div>
</div>