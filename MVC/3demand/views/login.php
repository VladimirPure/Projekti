<?php
/** @var $params \app\models\RegistrationModel */

$error_message = \app\core\Application::$app->session->getFlash('login_denied') ?? null;

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


<div class="auth-container">
    <div class="card">
        <header class="auth-header">
            <h1 class="auth-title">
                <div class="logo">
                    <span class="l l1"></span>
                    <span class="l l2"></span>
                    <span class="l l3"></span>
                    <span class="l l4"></span>
                    <span class="l l5"></span>
                </div> 3Demand
            </h1>
        </header>
        <div class="auth-content">
            <p class="text-center">LOGIN TO CONTINUE</p>
            <form action="log" method="POST" novalidate="novalidate">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control underlined" name="username" id="username" placeholder="Your username"
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
                        echo "<span class='has-error' style='color: red'>".$active.".</span>";

                    ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control underlined" name="user_password" id="user_password" placeholder="Your password"
                        <?php
                    $value = $params->user_password ?? null;
                    if($value)
                    {
                        echo "value='".$value."'";
                    }
                    ?>
                    >
                    <?php

                    $active = $params->errors['user_pasword'] ?? null;
                    if($active)
                        echo "<span class='has-error' style='color: red'>".$active.".</span>";

                    ?>
                </div>
                <div class="form-group">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                </div>
                <div class="form-group">
                    <p class="text-muted text-center">Do not have an account? <a href="registration">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center">
        <a href="home" class="btn btn-secondary btn-sm">
            <i class="fa fa-arrow-left"></i> Back to home
        </a>
    </div>
</div>