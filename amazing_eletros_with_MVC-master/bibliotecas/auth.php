<?php
require_once 'modelo/usuarioModelo.php';
define('AUTENTICADOR', true);

function authLogin($login, $passwd) {
    $user = pegarUsuarioLogin($login, $passwd);

    if (!empty($user)) {
            $_SESSION["auth"] = array(
                "user" => $user["tipoUsuario"], 
                "role" => $user["tipoUsuario"],
                "nome" => $user["Nome"],
                "codCliente" => $user["CodCliente"]);
            return true;    
    }else{
        return false;
    }
}

function authIsLoggedIn() {
    return isset($_SESSION["auth"]);
}

function authLogout() {
    if (isset($_SESSION["auth"])) {
        $_SESSION["auth"] = null;
        unset($_SESSION["auth"]);
    }
}

function authGetUserRole() {
    if (authIsLoggedIn()) {
        return $_SESSION["auth"]["role"];
    }
}

function pegarUsuarioLogado() {
    if(isset($_SESSION["auth"])) {
        return $_SESSION["auth"];    
    }
}
