<?php
/**
 * Created by PhpStorm.
 * User: Razvan
 * Date: 6/2/2017
 * Time: 22:54
 */
session_start();

include ("PL/Controllers/WelcomeController.php");
$controller = new WelcomeController();
if(!isset($_GET['route']) || empty($_GET['route'])){
    echo $controller->index();
} else {
    $route = explode('/', $_GET['route']);
    $controllerName = isset($route[0])&&!empty($route[0])?$route[0]:"";

    if($controllerName == "") exit("Controller must not be empty!");
    $controllerName = ucfirst($controllerName)."Controller";
    if(!file_exists("PL/Controllers/{$controllerName}.php")) exit("Controller {$controllerName} not found!");

    include("PL/Controllers/{$controllerName}.php");
    $controller = new $controllerName();

    $method = isset($route[1])&&!empty($route[1])?$route[1]:"";
    if($method == "") {
        $controller->index();
    } else {
        if(!method_exists($controller, $method)) exit("Method {$method} doesn't exist!");
        $args = array();
        for($i=2; $i<count($route); $i++){
            array_push($args, $route[$i]);
        }

        call_user_func_array(array($controller, $method), $args);
    }

}
?>