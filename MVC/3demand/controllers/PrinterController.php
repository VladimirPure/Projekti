<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\PrinterAddModel;
use app\models\PrinterModel;
use app\models\UserModel;

class PrinterController extends Controller
{
    public function addPrinterPage()
    {
        $this->router->view("addPrinter", "main");
    }

    public function addPrinter()
    {
        $printer = new PrinterAddModel();
        $printer->loadData($this->router->request->getAll());
        $printer->validate();
        if($printer->errors != false )
        {
            Application::$app->session->setFlash("printer_error","Pogresni podaci");
            return $this->router->viewWithParams("addPrinter", "main",  $printer);
        }

        $user = new UserModel();
        $printer->user_id = $user->getUserId($_SESSION['logged_in_user']->username);
        $sql = "
                SELECT 
                       model_id 
                FROM 
                     model
                INNER JOIN company ON model.company_id = company.company_id
                WHERE 
	                model_name = '$printer->model_name'
                AND 
                    `name` = '$printer->printer_company'
            ";
        $printer->model_id = false;
        $printer->model_id=$printer->db->mysqli->query($sql)->fetch_assoc()['model_id']??false;

        if(!$printer->model_id)
        {
            Application::$app->session->setFlash("printer_model", "Model se ne poklapa sa proizvodjacem");
            return $this->router->viewWithParams("addPrinter","main", $printer);
        }

        $printer->image_path=$printer->loadFiles($this->router->request->getFiles('image'),"addPrinter");

        if(!$printer->DBcreate())
        {
            Application::$app->session->setFlash("printer_error", "Greska u komunikaciji sa bazom podataka");
            return $this->router->viewWithParams("addPrinter","main",$printer);
        }
        Application::$app->session->setFlash("printer_success","Uspesno dodat stampac!");
        return $this->router->view("home", "main");
    }

    public function authorize(): array
    {
       return ["user"];
    }
}