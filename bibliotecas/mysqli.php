<?php

function conexao() {
    $cnx = mysqli_connect("localhost", "root", "", "AMAZING_ELETROS");
    if (!$cnx) die('Deu errado a conexao!');
    return $cnx;
}