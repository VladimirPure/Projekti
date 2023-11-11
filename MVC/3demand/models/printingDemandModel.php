<?php

namespace app\models;

use app\core\DBModel;

class printingDemandModel extends DBModel
{
    public $printingDemandCategory;
    public $printingDemandId;
    public $title;
    public $description;
    public $files;

    public function rules(): array
    {
        return [
            "printingDemandCategory"=>[self::RULE_REQUIRED],
            "title"=>[self::RULE_REQUIRED],
            "description"=>[self::RULE_REQUIRED],
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