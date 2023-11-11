<?php

namespace app\core;

use app\core\Router;
use app\core\DBConnection;
use app\core\DBModel;

abstract class Controller
{
    public Router $router;
    public DBConnection $db;

    public function __construct()
    {
        $this->router=new Router();
        $this->db = new DBConnection();
        $roles = $this->authorize();
        $user = Application::$app->session->get('logged_in_user');
        $this->checkAccess($roles, $user);
    }


    public function checkAccess($roles,$user)
    {
        $roleAccess = false;
        $guestAccess = false;
        foreach ($roles as $role)
        {
            if($user)
            {
                foreach ($user->roles as $userRole)
                {
                    if($userRole == $role)
                    {
                        $roleAccess = true;
                    }
                }
            }
            else
            {
                if($role == "guest")
                    $guestAccess=true;
            }
        }

        if(!$roleAccess and !$guestAccess)
        {
            $this->router->request->redirect("accessDenied");
        }

    }


    abstract public function authorize():array;
}