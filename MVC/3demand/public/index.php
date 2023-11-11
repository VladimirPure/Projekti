<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;
use app\controllers\UserController;

$app = new Application();


$app->router->get("","home");
$app->router->get("home","home");
$app->router->post("register",[\app\controllers\AuthController::class,"registration"]);
$app->router->get("accessDenied",[\app\controllers\AuthController::class,"accessDenied"]);
$app->router->get("notFound",[\app\controllers\AuthController::class,"notFound"]);
$app->router->get("listPrinters","listPrinters");
$app->router->get("listDemands","listDemands");
$app->router->get("registration",[\app\controllers\AuthController::class,"registrationPage"]);
$app->router->get("login",[\app\controllers\AuthController::class,"loginPage"]);
$app->router->post("log",[\app\controllers\AuthController::class,"login"]);
$app->router->get("logout",[\app\controllers\AuthController::class,"logout"]);
$app->router->get("addPrinter",[\app\controllers\PrinterController::class,"addPrinterPage"]);
$app->router->post("addPrinterProcess",[\app\controllers\PrinterController::class,"addPrinter"]);

$app->run();

exit;