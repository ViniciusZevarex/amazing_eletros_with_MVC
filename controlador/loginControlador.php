<?php

/** anon */
function index() {
    if (ehPost()) {
        $login = $_POST["email"];
        $passwd = $_POST["senha"];

        if (authLogin($login, $passwd)) {
            alert("bem vindo" . $login);
            redirecionar("produto");
        } else {
            alert("usuario ou senha invalidos!");
        }
    }
    exibir("login/index");
}

/** anon */
function logout() {
    authLogout();
    alert("deslogado com sucesso!");
    redirecionar("produto");
}

?>