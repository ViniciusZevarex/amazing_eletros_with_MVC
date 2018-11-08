<?php
require_once "./servicos/CnxReadConf.php";
function conexao() {
	$dadosCnx = rootAcess();
    $cnx = mysqli_connect($dadosCnx[0],"root","",$dadosCnx[1]);
    if (!$cnx) die('Deu errado a conexao!');

    mysqli_set_charset($cnx,"utf8");
    return $cnx;
}