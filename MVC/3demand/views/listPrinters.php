<?php
    $isLoggedIn = $_SESSION['logged_in_user'] ?? false;

    if($isLoggedIn)
    {
        echo '<a href="addPrinter">
         <button type="button" class="btn btn-oval btn-primary"><i class="fa fa-plus"></i>  Add printer</button>
        </a>';
    }

?>


<?php

    $printerClass = new \app\models\PrinterAddModel();
    $printers = $printerClass->getPrinterCards();
    $break = "<div id='class' style='margin-bottom: 80px '></div>";

    echo $break;

    $htmlElements="<div class='row'>";
    $i=0;

    foreach ($printers as $printer)
    {
        $htmlElements.=$printerClass->generateCard($printer);
        $i+=1;
        if($i>2)
        {
            $htmlElements.="</div>";
            $i=0;
            echo $htmlElements;
            echo $break;
            $htmlElements="<div class='row'>";
        }
    }

    if($i!=0)
    {
        $htmlElements.="</div>";
        echo $htmlElements;
    }

?>






