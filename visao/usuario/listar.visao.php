<?php print_r($user) ?>
<div class="panel panel-default">

  <div class="panel-heading"><h1 class="text-center">Dados do Cliente</h1></div>
  <div class="panel-body">
      <table class="table">
        <thead> 
            <tr> 
                <th>Descrição</th> 
                <th>Valor</th> 
            </tr> 
        </thead>

        <tbody> 
            <tr> 
                <th scope="row">Nome</th> 
                <td><?php echo $user["Nome"]; ?></td> 
            </tr> 
            <tr> 
                <th scope="row">Email</th> 
                <td><?php echo $user["Email"]; ?></td> 
            </tr> 
            <tr> 
                <th scope="row">Endereço</th> 
                <td><?php echo $user["endereco"]; ?></td> 
            </tr>
            <tr> 
                <th scope="row">Pais</th> 
                <td><?php echo $user["Pais"]; ?></td> 
            </tr>  
            <tr> 
                <th scope="row">Data Nascimento</th> 
                <td><?php echo $user["dtNasc"]; ?></td> 
            </tr> 

        </tbody>
    </table>
    <a href="./usuario/deletar/<?php echo $user['CodCliente'] ?>" class="btn btn-danger" role="button" data-toggle="tooltip" data-placement="top" title="Não tem volta hein!!!">Deletar</a>
    <a href="./usuario/editar/<?php echo $user['CodCliente'] ?>" class="btn btn-primary" role="button">Editar</a>
</div>