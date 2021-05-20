<?php

declare(strict_types=1);

namespace App;
use PDO;
use Exception;
use mysqli;
session_start();
try {
require_once("src/utils/debug.php");
require_once("src/controller.php");

$configuration = require_once("config/config.php");


$request = [ 
    'get'  => $_GET,
    'post' => $_POST
];

controller::initConfiguration($configuration);
(new Controller($request))->run();

// ControllerUser::initConfiguration($configuration);
// (new ControllerUser($request))->run();

} catch (Exception $e) {
    dump($e->getMessage());
    dump($e->getTraceAsString());
    
};