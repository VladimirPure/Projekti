<?php

namespace app\models;

use app\core\Application;
use app\core\DBModel;

class RegistrationModel extends DBModel
{
    public $username;
    public $user_password;
    public $email;
    public $first_name;
    public $last_name;
    public $phone_number;


    public function rules(): array
    {
        return [
            "email"=>[self::RULE_EMAIL,self::RULE_REQUIRED],
            "user_password"=>[self::RULE_REQUIRED,self::RULE_PASSWORD],
            "username"=>[self::RULE_REQUIRED, self::RULE_USERNAME],
            "first_name"=>[self::RULE_REQUIRED, self::RULE_NAME],
            "last_name"=>[self::RULE_REQUIRED, self::RULE_NAME],
            "phone_number"=>[self::RULE_REQUIRED, self::RULE_PHONE_NUMER]

        ];
    }

    public function register($model)
    {
        $model->user_password=password_hash($model->user_password, PASSWORD_DEFAULT);
        $newUser = $model->DBcreate();

        if(!$newUser)
        {
            Application::$app->session->setFlash("user_error", "Greska pri unosu u bazu podataka");
            Application::$app->router->view("registration","main");
            exit;
        }

        $newUser = $this->db->mysqli->query("SELECT user_id FROM `user` WHERE username='$model->username'");
        $newUser = $newUser->fetch_assoc();
        $newUser=$newUser['user_id'];
        $role_id = $this->db->mysqli->query("SELECT role_id FROM role WHERE role_name='user'");
        $role_id= $role_id->fetch_assoc();
        $role_id=$role_id['role_id'];

        $newUserRole = $this->db->mysqli->query("INSERT INTO user_role (user_id,role_id) VALUE ('$newUser','$role_id')");

        if(!$newUserRole)
        {
            $this->db->mysqli->query("DELETE FROM `user` WHERE user_id=$newUser");
            Application::$app->session->setFlash("user_error", "Greska pri unosu u bazu podataka");
            return Application::$app->router->view("registration","main");

        }

    }

    public function tableName()
    {
        return "`user`";
    }

    public function attributes(): array
    {
        return
        [
            "username",
            "user_password",
            "email",
            "first_name",
            "last_name",
            "phone_number",
        ];
    }

    public function fileRules(): array
    {
        // TODO: Implement fileRules() method.
    }
}