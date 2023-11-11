<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\LoginModel;
use app\models\RegistrationModel;
use app\models\UserModel;

class AuthController extends Controller
{
    public function accessDenied()
    {
        http_response_code(403);
        return $this->router->view("accessDenied","error");
    }

    public function notFound()
    {
        http_response_code(404);
        return $this->router->view("notFound","error");
    }

    public function registration()
    {
        $model = new RegistrationModel();
        $model ->loadData($this->router->request->getAll());
        $model->validate();

        if($model->errors != null)
        {
            return Application::$app->router->viewWithParams("registration", "main", $model);
        }

        $model -> register($model);

        Application::$app->session->setFlash("user_success", "Uspesno kreiran korisnik!");

        return $this->router->view("registration","main");
    }

    public function login()
    {
        $model = new LoginModel();
        $model->loadData($this->router->request->getAll());
        $model->validate();
        if($model->errors!=null)
        {
            Application::$app->session->setFlash("login_denied","Pogresan unos!");
            return $this->router->viewWithParams("login","main",$model);
        }

        if(!$model->login($model))
        {
            Application::$app->session->setFlash("login_denied","Pogresan unos!");
            return $this->router->viewWithParams("login","main",$model);
        }
        Application::$app->session->setFlash("login_success","Uspesno ste se ulogovali");

        $user_model = new UserModel();

        Application::$app->session->set("logged_in_user",$user_model->getUser($model->username));
        $this->router->request->redirect("home");
    }

    public function logout()
    {
        if(Application::$app->session->get("logged_in_user"))
        {
           Application::$app->session->remove("logged_in_user");
           Application::$app->router->request->redirect("home");
        }

    }

    public function registrationPage()
    {
        return $this->router->view("registration","main");
    }

    public function loginPage()
    {
        return $this->router->view("login","main");
    }

    public function authorize():array
    {
        return[
            "administrator",
            "guest"
        ];
    }

}