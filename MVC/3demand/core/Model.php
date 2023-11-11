<?php

namespace app\core;

abstract class Model
{
    public $errors;
    public $db;

    public const RULE_EMAIL="email";
    public const RULE_REQUIRED="required";
    public const RULE_PHONE_NUMER = "phone_nuber";
    public const RULE_USERNAME = "username";
    public const RULE_NAME = "name";
    public const RULE_PASSWORD = "password";
    public const RULE_NUMBERS = "numbers";

    public const FILE_RULE_JPEG = 'image/jpeg';
    public const FILE_RULE_PNG = 'image/png';

    abstract public function rules():array;
    abstract public function fileRules():array;

    public function __construct()
    {
        $this->db= new DBConnection();
    }

    public function loadData($data)
    {
        if($data!=null)
        {
            foreach ($data as $key => $value)
                if(property_exists($this,$key))
                {
                    $this->{$key} = $value;
                }
        }
    }

    public function checkFormat($format)
    {
        $isSupported = false;
        $supportedFormats = $this->fileRules();
        $supportedFormats = $supportedFormats['supported_types'];
        foreach ($supportedFormats as $supportedFormat)
        {
            if($supportedFormat == $format)
                $isSupported=true;
        }

        return
            $isSupported;
    }

    public function loadFiles($data, $lastPage)
    {
        $fileName = $data['name'];
        $tempName = $data['tmp_name'];
        $targetDir = "C:\\xampp\\htdocs\\3demand\\public\\uploads\\";
        $fileType = $data['type'];
        $isSupported = $this->checkFormat($fileType);
        if(!$isSupported)
        {
            Application::$app->session->setFlash("file_not_supporter","Nije podrzan tip fajla!");
            Application::$app->router->viewWithParams($lastPage,"main",$this);
        }
        $targetFile = $targetDir . $fileName;
        $isUploaded = move_uploaded_file($tempName,$targetFile);
        if(!$isUploaded)
        {
            Application::$app->session->setFlash("file_error","Greska u upload-u fajla!");
            Application::$app->router->viewWithParams($lastPage,"main",$this);
        }
        return $fileName;
    }



    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules)
        {
            $valueForAttribute = $this->{$attribute};
            foreach ($rules as $rule)
            {
                if($rule === self::RULE_REQUIRED && !$valueForAttribute){
                    $this->errors[$attribute]="Polje $attribute je obavezno";
                }

                if ($rule === self::RULE_EMAIL && !filter_var($valueForAttribute, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$attribute]="Polje $attribute mora biti u email formatu";
                }
                if($rule===self::RULE_PHONE_NUMER && !filter_var($valueForAttribute, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(\+[0-9]{3}|[0-9])[0-9]{8,9}$/")))){
                    $this->errors[$attribute]="Polje $attribute mora biti formatu za broj telefona";
                }
                if($rule===self::RULE_USERNAME && !filter_var($valueForAttribute, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-z]|[A-Z])([a-z]|[A-Z]|[0-9]|\_)+$/")))){
                    $this->errors[$attribute]="Polje $attribute mora da ima minimum 3 karaktera, moze sadrzati slova, brojeve i da pocinje slovom";
                }
                if($rule===self::RULE_NAME && !filter_var($valueForAttribute, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[A-Z][a-z]{2}[a-z]{0,32}+$/")))){
                    $this->errors[$attribute]="Polje $attribute mora da pocinje velikim slovom, da ima minimum 3 karaktera, moze sadrzati samo slova";
                }
                if($rule===self::RULE_PASSWORD && !filter_var($valueForAttribute, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([A-Z]|[a-z]|[0-9]){5}([A-Z]|[a-z]|[0-9]){0,10}$/")))){
                    $this->errors[$attribute]="Polje $attribute moze da sadrzi samo slova i brojeve i mora imati minimum 5, a maksimum 15 karaktera";
                }
                if($rule===self::RULE_NUMBERS && !filter_var($valueForAttribute, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]*$/"))))
                {
                    $this->errors[$attribute]="Polje $attribute sme sadrzati iskljucivo brojeve";
                }
            }
        }
    }
}