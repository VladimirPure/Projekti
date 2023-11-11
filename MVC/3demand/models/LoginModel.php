<?php

namespace app\models;

use app\core\Application;
use app\core\DBModel;
use app\core\Model;

class LoginModel extends DBModel
{
    public $username;
    public $user_password;

    public function rules(): array
    {
        return
        [
            "username"=>[self::RULE_REQUIRED,self::RULE_USERNAME],
            "user_password"=>[self::RULE_PASSWORD,self::RULE_REQUIRED]
        ];
    }

    public function tableName()
    {
        return "`user`";
    }

    public function attributes(): array
    {
        return  ['username','user_password'];
    }

    public function login($model)
    {
        $username = $model->username;
        $DBuser = $this->DBselectWhere("username = '$model->username'");
        $DBuser_password = $DBuser['user_password'] ?? false;
        $DBusername = $DBuser['username'] ?? false;
        if($DBuser)
        {
            if(password_verify($model->user_password,$DBuser_password))
            {
                return true;
            }
        }
        return false;
    }

    public function fileRules(): array
    {
        // TODO: Implement fileRules() method.
    }
}