<?php session_start();
require_once __DIR__.'/includes.php';
$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
isset ($controller) ?  $controller->executeAction():'';

