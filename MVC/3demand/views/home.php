<?php
$printer_success = \app\core\Application::$app->session->getFlash("printer_success");

if($printer_success)
{
    $toastrScript = "";
    $toastrScript .= "<script>";

    $toastrScript .=
        "
            toastr.success('$printer_success');
        ";

    $toastrScript .= "</script>";

    echo $toastrScript;
}


?>


HOME PHP STRANICA