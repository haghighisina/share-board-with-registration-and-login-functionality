<?php
require_once __DIR__.'/config.php';

require_once __DIR__. '/classes/bootstrap.php';
require_once __DIR__. '/classes/Controller.php';

require_once __DIR__. '/controllers/home.php';
require_once __DIR__. '/controllers/shares.php';
require_once __DIR__. '/controllers/users.php';

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if ($controller){
    $controller->executeAction();
}
