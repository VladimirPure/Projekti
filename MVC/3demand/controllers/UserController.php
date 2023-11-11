<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\DBConnection;
use app\core\Router;
use app\models\UserModel;

class UserController extends Controller
{

    public function create()
    {
        return $this->router->view("registration", "main");
    }

    public function authorize(): array
    {
        return [
            "Administrator",
            "Guest"
        ];
    }
}