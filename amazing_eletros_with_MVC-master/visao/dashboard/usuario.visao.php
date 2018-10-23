<div class="page-content">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="./produto/index/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-shopping-cart"></i>Estatística</a></li>
                    <li><a href="calendar.html"><i class="glyphicon glyphicon-indent-left">Calendario</i></a></li>
                    <li><a href="tables.html"><i class="glyphicon glyphicon-list"></i> Tabelas</a></li>
                    <li><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Usuarios</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="text-center">Usuarios Cadastrados <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </h1>
                    </div>
                    <div class="panel-body panel-listar-usuario">
                        <?php if (isset($usuarios)) { ?>
                            <table class="table">
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>CPF</th>
                                    <th>Pais</th>
                                    <th>Municipio</th>
                                    <th>Data de nascimento</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>	
                                <!-- user date -->
                                <?php foreach ($usuarios as $usuario) { ?>
                                    <tr>
                                        <td><?= $usuario['Nome'] ?></td>
                                        <td><?= $usuario['Email'] ?></td>
                                        <td><?= $usuario["CPF"] ?></td>
                                        <td><?= $usuario["Pais"] ?></td>
                                        <td><?= $usuario["Municipio"]; ?></td>
                                        <td><?= $usuario["dtNascimento"]; ?></td>
                                        <td><a href="./usuario/editar/<?= $usuario['CodCliente'] ?>" class="btn btn-default" role="button">Editar</a></td>
                                        <td><a href="./usuario/deletar/<?= $usuario['CodCliente'] ?>" class="btn btn-default" role="button">Deletar</a></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<h1 class='text-center'>Não há usuarios cadastrados!</h1>";
                            }
                            ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>