<?php
/** @var $params \app\models\UserModel */

$success_message = \app\core\Application::$app->session->getFlash('user_success') ?? null;
$error_message = \app\core\Application::$app->session->getFlash('user_error') ?? null;

if($success_message)
{
    $toastrScript = "";
    $toastrScript .= "<script>";

    $toastrScript .=
        "
            toastr.success('$success_message');
        ";

    $toastrScript .= "</script>";

    echo $toastrScript;
}

if($error_message)
{
    $toastrScript = "";
    $toastrScript .= "<script>";

    $toastrScript .=
        "
            toastr.warning('$error_message');
        ";

    $toastrScript .= "</script>";

    echo $toastrScript;
}

?>

<div class="col-md-auto">
    <div class="card card-block safelight-item">
        <div class="title-block">
            <h3 class="title"> REGISTER </h3>
        </div>
        <form role="form" action="register" method="post">

            <div class="form-group">
                <label class="control-label">First name</label>
                <input type="text" class="form-control underlined" name="first_name" placeholder="Enter your first name"
                    <?php
                    $value = $params->first_name ?? null;
                    if($value)
                    {
                        echo "value='".$value."'";
                    }
                    ?>
                >
                <?php

                $active = $params->errors['first_name'] ?? null;
                if($active)
                    echo "<span class='has-error' style='color: red'>".$active.".</span>";

                ?>
            </div>

            <div class="form-group">
                <label class="control-label">Last name</label>
                <input type="text" class="form-control underlined" name="last_name" placeholder="Enter your last name"
                    <?php
                    $value = $params->last_name ?? null;
                    if($value)
                    {
                        echo "value='".$value."'";
                    }
                    ?>
                >
                <?php

                $active = $params->errors['last_name'] ?? null;
                if($active)
                    echo "<span class='has-error' style='color: red'>".$active.".</span>";

                ?>
            </div>

            <div class="form-group">
                <label class="control-label">Phone number</label>
                <input type="text" class="form-control underlined" name="phone_number" placeholder="Enter your phone nuber"
                    <?php
                    $value = $params->phone_number ?? null;
                    if($value)
                    {
                        echo "value='".$value."'";
                    }
                    ?>
                >
                <?php

                $active = $params->errors['phone_number'] ?? null;
                if($active)
                    echo "<span class='has-error' style='color: red'>".$active.".</span>";

                ?>
            </div>

            <div class="form-group">
                <label class="control-label">Username</label>
                <input type="text" class="form-control underlined" name="username" placeholder="Enter your username"
                    <?php
                    $value = $params->username ?? null;
                    if($value)
                    {
                        echo "value='".$value."'";
                    }
                    ?>
                >
                <?php
                $active = $params->errors['username'] ?? null;
                if($active)
                    echo "<span class='has-error' style='color: red'>".$params->errors['username'].".</span>";

                ?>
            </div>

            <div class="form-group">
                <label class="control-label">Email</label>
                <input type="text" class="form-control underlined" name="email" placeholder="Enter your email"
                    <?php
                    $value = $params->email ?? null;
                    if($value)
                    {
                        echo "value='".$value."'";
                    }
                    ?>
                >
                <?php
                $active = $params->errors['email'] ?? null;
                if($active)
                    echo "<span class='has-error' style='color: red'>".$params->errors['email'].".</span>";

                ?>
            </div>



            <div class="form-group">
                <label class="control-label">Password</label>
                <input type="password" class="form-control underlined" name="user_password" placeholder="Enter your password"
                    <?php
                    $value = $params->user_password ?? null;
                    if($value)
                    {
                        echo "value='".$value."'";
                    }
                    ?>
                >
                <?php

                $active = $params->errors['user_password'] ?? null;
                if($active)
                    echo "<span class='has-error' style='color: red'>".$params->errors['user_password'].".</span>";

                ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>