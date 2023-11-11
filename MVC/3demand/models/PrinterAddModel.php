<?php

namespace app\models;

use app\core\DBModel;

class PrinterAddModel extends DBModel
{
    public $model_name;
    public $model_id;
    public $printer_company;
    public $minimal_resolution;
    public $maximal_resolution;
    public $printing_speed;
    public $working_hour_price;
    public $user_id;
    public $image_path;
    public $type;

    public function rules(): array
    {
        return [
            "minimal_resolution"=>[self::RULE_NUMBERS,self::RULE_REQUIRED],
            "maximal_resolution"=>[self::RULE_NUMBERS,self::RULE_REQUIRED],
            "printing_speed"=>[self::RULE_NUMBERS],
            "working_hour_price"=>[self::RULE_REQUIRED,self::RULE_NUMBERS]
        ];
    }

    public function fileRules():array
    {
        return [
            'supported_types'=>[self::FILE_RULE_JPEG, self::FILE_RULE_PNG],
        ];
    }

    public function tableName()
    {
        return "printer_ad";
    }

    public function attributes(): array
    {
        return [
            "model_id",
            "minimal_resolution",
            "maximal_resolution",
            "printing_speed",
            "working_hour_price",
            "user_id",
            "image_path"
        ];
    }

    public function getPrinterCompanies()
    {
        $sql = "SELECT name FROM company";
        $result=$this->db->mysqli->query($sql);
        $companies = [];
        while ($company = $result->fetch_assoc())
        {
            array_push($companies,$company['name']);
        }

        return $companies ?? false;
    }

    public function getPrinterModels()
    {
        $sql = "SELECT model_name FROM model";
        $result=$this->db->mysqli->query($sql);
        $models = [];
        while ($model = $result->fetch_assoc())
        {
            array_push($models,$model['model_name']);
        }
        return $models ?? false;
    }

    public function getPrinterCards()
    {
        $cards = [];
        $result = $this->db->mysqli->query("SELECT * FROM view__printer_card");
        while ($row = $result->fetch_assoc())
        {
            array_push($cards,$row);
        }
        return $cards;
    }

    public function generateCard($cardInfo)
    {
        $card = "
        
        <div class='col-xl-4'>
            <div class='card card-primary'>
                <div class='card-header'>
                    <div class='header-block'>
                        <p class='title'> ".$cardInfo['company']." - ".$cardInfo['model_name']." </p>
                    </div>
                </div>
                <div class='card-block'>
                    
                        <p>
                        Owner: <a href='userProfile?userame=".$cardInfo['username']."'>".$cardInfo['username']."</a>
                        </p>
                    <p>
                        Minimal printing resolution: ".$cardInfo['minimal_resolution']."
                    </p>
                    <p>
                        Maximal printing resolution: ".$cardInfo['maximal_resolution']."
                    </p>
                    <p>
                        Printing speed: ".$cardInfo['printing_speed']."
                    </p>
                   ";


            if(!empty($cardInfo['image_path']))
            {
                $card.="<img src='uploads\\".$cardInfo['image_path']."' height='50'/>";
            }

            $card.="
                </div>
                <div class='card-footer'>
                    Working hour price:".$cardInfo['working_hour_price']."$
                    <a href='askForPrinter'>
                        <button type='button' class='btn btn-oval btn-primary'><i class='fa fa-plus'></i>  Ask</button>
                    </a>
                </div>
                </div>
                </div>";
            return $card;
    }


}