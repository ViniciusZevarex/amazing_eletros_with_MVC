<?php

require_once 'app.php'; //arquivo geral da aplicacao

$uri = explode("/", $_SERVER["REQUEST_URI"]); //explore a URL

$controllerName = $uri[2]; //coloca como padrao: nomeProjeto/controlador/acao/parametros

if(!$controllerName && CONTROLADOR_PADRAO) {
	$controllerName = CONTROLADOR_PADRAO;
}

$controllerFileName = "controlador/" . $controllerName . "Controlador.php";

if (!file_exists($controllerFileName)) 
    die("Nao foi encontrado o arquivo: '$controllerFileName' para enviar a solicitacao!"); 

require_once $controllerFileName;

$action = (isset($uri[3]) and ! empty($uri[3])) ?  $action = $uri[3] : 'index'; //pega a acao
$params = (count($uri) > 4) ? array_slice($uri, 4) : array(); //pega os parametros, se existir

try {
    if(is_callable($action)){ //a funcao existe?

        $released = true;

        if(defined('AUTENTICADOR')) {

            $role = getRoleOfControllerAction($action);
            $userRole = authGetUserRole();

            if(!empty($role) && $role !== $userRole) {
                    //regra nao eh igual a encontrada na action do controlador
                    $released = false;
                    $authMsg = "Nao tem permissao para acessar essa funcionalidade";
            }

            if(empty($role) && !authIsLoggedIn()) {
                    $released = false;
                    $authMsg = "Voce precisa autenticar-se para acessar!";
            }

            if(!empty($role) && $role == "anon") {
                    //acesso anonimo
                    $released = true;
            }

        }

        if($released) {
                call_user_func_array($action, $params); //chama a funcao passando parametros   
        } else {
                alert($authMsg, "warning");
                redirecionar("login"); die();
        }


    } else {
        die('Nao foi encontrado a funcao correspondente a acao "' . $action . '" do controlador "' . $controllerFileName . '"');
    }
} catch (ArgumentCountError $e) {
    echo "chama 404!";
}

function getRoleOfControllerAction($action) {
    $rc = new ReflectionFunction($action);
    $role = $rc->getDocComment();
    $role = trim(substr($role, 3, -2));
    return $role;
}