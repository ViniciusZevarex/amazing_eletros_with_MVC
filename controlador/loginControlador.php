<?php
require "modelo/produtoModelo.php";

/** anon */
function index() {
    if (ehPost()) {
        $login = $_POST["email"];
        $passwd = $_POST["senha"];

        if (authLogin($login, $passwd)) {
            alert("bem vindo" . $login,"success");
            redirecionar("produto");
        } else {
            alert("usuario ou senha invalidos!","danger");
        }
    }
    exibir("login/index");
}

/** anon */
function logout() {
    authLogout();
    alert("deslogado com sucesso!","success");
    redirecionar("produto");
}

?>