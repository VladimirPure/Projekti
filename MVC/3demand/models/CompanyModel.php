<?php

namespace app\models;

use app\core\DBModel;

class companyModel extends DBModel
{
    public $name;

    public function rules(): array
    {
        return [
            "name"=>[self::RULE_REQUIRED,self::RULE_NAME]
        ];
    }

    public function tableName()
    {
        // TODO: Implement tableName() method.
    }

    public function attributes(): array
    {
        // TODO: Implement attributes() method.
    }

    public function fileRules(): array
    {
        // TODO: Implement fileRules() method.
    }
}