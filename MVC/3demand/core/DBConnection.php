<?php

namespace app\core;

use mysqli;

class DBConnection
{
    public $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli("localhost","root","root","3demand",3307) or die(mysqli_error($this->mysqli));
    }

    public function conn()
    {
        $mysqli = new mysqli("localhost","root","root","3demand",3307) or die(mysqli_error($this->mysqli));
        return $mysqli;
    }
}