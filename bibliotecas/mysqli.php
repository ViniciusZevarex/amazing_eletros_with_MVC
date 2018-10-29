<?php

function conexao() {
    $cnx = mysqli_connect("localhost","root","","AMAZING_ELETROS");
    if (!$cnx) die('Deu errado a conexao!');

    mysqli_set_charset($cnx,"utf8");
    return $cnx;
}