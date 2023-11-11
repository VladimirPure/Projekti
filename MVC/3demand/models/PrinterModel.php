<?php

namespace app\models;

use app\core\DBModel;

class PrinterModel extends DBModel
{
    public $model_id;
    public $company;
    public $model_name;
    public $type;

    public function rules(): array
    {
        return [
            "name"=>[self::RULE_REQUIRED],
            "type"=>[self::RULE_REQUIRED],
            "company"=>[self::RULE_REQUIRED]
        ];
    }

    public function tableName()
    {
        return 'model';
    }

    public function attributes(): array
    {
        return
        [
            'model_id',
            'company_id',
            'model_name',
            'type'
        ];
    }

    public function getModelId($name)
    {
        $sql = "SELECT model_id FROM model WHERE model_name = '$name'";
        $result = $this->db->mysqli->query($sql);
        return $result->fetch_assoc()['model_id'];
    }

    public function fileRules(): array
    {
        // TODO: Implement fileRules() method.
    }
}