<?php 
require "./modelo/produtoModelo.php";
require "modelo/categoriaModelo.php";
require "servicos/uploadImagemServico.php";
require "./modelo/pedidoModelo.php";

/** anon */
function index() {
    //lista de pedidos por municipio
    if (!empty($_POST["Municipio"])) {
        extract($_POST);  
        $dados["pedidosMunicipio"] = pegarPedidoPorMunicipio($Municipio); 
    }else{
        $dados["pedidosMunicipio"] = "";
    }

    if (!empty($_POST["dtInicio"]) && !empty($_POST["dtFim"])) {
        extract($_POST);  
        $dados["pedidosPorData"] = pegarPedidoPorIntervaloData($dtInicio,$dtFim); 
    }else{
        $dados["pedidosMunicipio"] = "";
    }

    exibir("dashboard/index",$dados);
}

/** anon */
function produto() {
    if (ehPost()) {
        extract($_POST);

        $dados["produtos"] = searchForCategoria($categoria);
        $dados["categorias"] = getCategorias();
    } else {
        $dados["produtos"] = getAllProducts();
        $dados["categorias"] = getCategorias();
    }
    exibir("dashboard/produto", $dados);
}

/** anon */
function usuario(){
   if (ehPost()) {
        extract($_POST);
        $msgRetorno = adicionarUsuario($nome, $CPF, $email, $senha, $data_nascimento, $pais, $estado, $municipio, $endereco, $sexo);

        redirecionar("dashboard/usuario");
    } else {
        $dados["usuarios"] = pegarTodosUsuarios();
    }
    exibir("dashboard/usuario", $dados);
}




?>