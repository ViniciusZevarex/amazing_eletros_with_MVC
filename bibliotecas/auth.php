<?php

define('AUTENTICADOR', true);

function authLogin($login, $passwd) {
    if ($login === "admin" && $passwd == "123") {
        $_SESSION["auth"] = array("user" => "admin", "role" => "admin");
        return true;
    }
    if ($login === "user" && $passwd == "123") {
        $_SESSION["auth"] = array("user" => "user", "role" => "user");
        return true;
    }
    return false;
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
