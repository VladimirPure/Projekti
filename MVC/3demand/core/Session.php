<?php

namespace app\core;

class Session
{
    protected const FLASH_KEY = "flash_message";

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;

    }

    public function get($key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function __construct()
    {
        session_start();

        $messages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($messages as $key => &$message)
        {
            $message['remove']=true;
        }

        $_SESSION[self::FLASH_KEY] = $messages;
    }

    public function setFlash($key,$message){
        $_SESSION[self::FLASH_KEY][$key]=
            [
                'remove'=>false,
                'value'=>$message
            ];
    }

    public function getFlash($key)
    {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }

    public function __destruct()
    {
        $messages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($messages as $key => &$message )
        {
            if($message['remove'])
            {
                unset($messages[$key]);
            }
        }

        $_SESSION[self::FLASH_KEY] = $messages;
    }
}
