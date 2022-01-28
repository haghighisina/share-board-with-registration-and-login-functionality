<?php
require_once __DIR__.'/includes.php';

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if ($controller){
    $controller->executeAction();
}
