<?php

namespace app\models;

use app\core\Application;
use app\core\DBModel;

class UserModel extends DBModel
{
    public $username;
    public $email;
    public $roles = [];

    public function rules(): array
    {
    }

    public function tableName()
    {
        return "`user`";
    }

    public function attributes(): array
    {
        return[
            "user_id",
            "username",
            "email"
        ];
    }

    public function getUser($username)
    {
        $result = $this->db->mysqli->query("
                                                    SELECT
                                                         u.username,
                                                         u.email,
                                                         r.role_name
                                                    FROM 
                                                        `user` as u
                                                        INNER JOIN user_role as ur ON u.user_id = ur.user_id
                                                        INNER JOIN `role` as r ON ur.role_id = r.role_id
                                                    WHERE u.username = '$username';
                                                    ");
        while($row=$result->fetch_assoc())
        {
            array_push($this->roles,$row['role_name']);
            $this->loadData($row);
        }

        return $this;
    }

    public function getUserId($username)
    {
        $sql = "SELECT user_id FROM `user` WHERE username = '$username'";
        $result = $this->db->mysqli->query($sql);
        return $result->fetch_assoc()['user_id'];
    }

    public function fileRules(): array
    {
        // TODO: Implement fileRules() method.
    }
}