<?php

/** @var $params \app\models\UserModel */

$error_message = \app\core\Application::$app->session->getFlash("printer_error");
$warning_message = \app\core\Application::$app->session->getFlash("printer_model");

if($error_message)
{
    $toastrScript = "";
    $toastrScript .= "<script>";

    $toastrScript .=
        "
            toastr.error('$error_message');
        ";

    $toastrScript .= "</script>";

    echo $toastrScript;
}


if($warning_message)
{
    $toastrScript = "";
    $toastrScript .= "<script>";

    $toastrScript .=
        "
            toastr.warning('$warning_message');
        ";

    $toastrScript .= "</script>";

    echo $toastrScript;
}


?>


<div class="col-md-auto">
    <div class="card card-block safelight-item">
        <div class="title-block">
            <h3 class="title"> Add printer </h3>
        </div>
        <form role="form" action="addPrinterProcess" method="post" enctype="multipart/form-data">
            <?php
                $printer = new \app\models\PrinterAddModel();
            ?>
            <label class="control-label">
                Choose your printer company:
            </label>

            <div class="form-group">

                <select class="form-control form-control-lg" name="printer_company">
                    <?php
                    $companies = $printer->getPrinterCompanies();
                    $htmlOPTION = "";
                    foreach($companies as $company)
                    {
                        $htmlOPTION.="<option>";
                        $htmlOPTION.="$company";
                        $htmlOPTION.="</option>";
                    }
                    echo $htmlOPTION;
                    ?>
                </select>
            </div>

            <label class="control-label">
                Choose your printer model:
            </label>

            <div class="form-group">

                <select class="form-control form-control-lg" name="model_name">
                    <?php
                    $models = $printer->getPrinterModels();
                    $htmlOPTION = "";
                    foreach($models as $model)
                    {
                        $htmlOPTION.="<option>";
                        $htmlOPTION.="$model";
                        $htmlOPTION.="</option>";
                    }
                    echo $htmlOPTION;
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label class="control-label">Minimal printing resolution</label>
                <input type="text" class="form-control underlined" name="minimal_resolution" placeholder="Enter layer height in microns"
                    <?php
                    $value = $params->minimal_resolution ?? null;
                    if($value)
                    {
                        echo "value='".$value."'";
                    }
                    ?>
                >
                <?php

                $active = $params->errors['minimal_resolution'] ?? null;
                if($active)
                    echo "<span class='has-error' style='color: red'>".$active.".</span>";

                ?>
            </div>

            <div class="form-group">
                <label class="control-label">Maximal printing resolution</label>
                <input type="text" class="form-control underlined" name="maximal_resolution" placeholder="Enter layer height in microns"
                    <?php
                    $value = $params->maximal_resolution ?? null;
                    if($value)
                    {
                        echo "value='".$value."'";
                    }
                    ?>
                >
                <?php

                $active = $params->errors['maximal_resolution'] ?? null;
                if($active)
                    echo "<span class='has-error' style='color: red'>".$active.".</span>";

                ?>
            </div>

            <div class="form-group">
                <label class="control-label">Printing speed</label>
                <input type="text" class="form-control underlined" name="printing_speed" value="0"
                    <?php
                    $value = $params->printing_speed ?? null;
                    if($value)
                    {
                        echo "value='".$value."'";
                    }
                    ?>
                >
                <?php

                $active = $params->errors['printing_speed'] ?? null;
                if($active)
                    echo "<span class='has-error' style='color: red'>".$active.".</span>";

                ?>
            </div>


            <div class="form-group">
                <label class="control-label">Working hour price</label>
                <input type="text" class="form-control underlined" name="working_hour_price" placeholder="Enter price in $"
                    <?php
                    $value = $params->working_hour_price ?? null;
                    if($value)
                    {
                        echo "value='".$value."'";
                    }
                    ?>
                >
                <?php

                $active = $params->errors['working_hour_price'] ?? null;
                if($active)
                    echo "<span class='has-error' style='color: red'>".$active.".</span>";

                ?>
            </div>

            <div class="form-group">
                <label class="control-label">Add picture of your printer</label>
                <input type="file"  name="image"/>
            </div>






            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>