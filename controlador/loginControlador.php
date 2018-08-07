<?php

/** anon */
function index() {
    if (ehPost()) {
        $login = $_POST["login"];
        $passwd = $_POST["passwd"];

        if (authLogin($login, $passwd)) {
            alert("bem vindo" . $login);
            redirect("usuario");
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
    redirecionar("usuario");
}

?>