<?php

function conexao() {
    $cnx = mysqli_connect();
    if (!$cnx) die('Deu errado a conexao!');
    return $cnx;
}