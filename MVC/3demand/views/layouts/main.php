<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> 3Demand </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/screenful/logo.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="css/vendor.css">
    <!-- Theme initialization -->
    <link rel="stylesheet" href="toastr/toastr.min.css">
    <script>
        var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
        var themeName = themeSettings.themeName || '';
        if (themeName)
        {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
        }
        else
        {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
        }
    </script>
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script src="toastr/toastr.min.js"></script>
</head>
<body>
<div class="main-wrapper">
    <div class="app" id="app">
        <header class="header">
            <div class="header-block header-block-collapse d-lg-none d-xl-none">
                <button class="collapse-btn" id="sidebar-collapse-btn">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="header-block header-block-search">
                <form role="search">
                    <div class="input-container">
                        <i class="fa fa-search"></i>
                        <input type="search" placeholder="Search">
                        <div class="underline"></div>
                    </div>
                </form>
            </div>

            <div class="header-block header-block-nav">
                <ul class='nav-profile'>
                <?php

                    $htmlElements =
                        "
                            <li>
                                <a href='login'>Login</a>
                            </li>
        
                            <li>
                                <a href='registration'>Register</a>
                            </li>";

                    $logOutElement =
                        "
                        <li>
                            <a href='logout'>Log out</a>
                        </li>
                        ";

                    $isLoggedIn=$_SESSION['logged_in_user'] ?? false;

                    if(!$isLoggedIn)
                    {
                        echo $htmlElements;
                    }
                    else
                    {
                        echo $logOutElement;
                    }


                ?>



                </ul>
            </div>
        </header>
        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <a href="home" style="text-decoration: none">
                        <div class="brand">
                            <div class="logo">
                                <span class="l l1"></span>
                                <span class="l l2"></span>
                                <span class="l l3"></span>
                                <span class="l l4"></span>
                                <span class="l l5"></span>
                            </div> 3Demand
                        </div>
                    </a>
                </div>
                <nav class="menu">
                    <ul class="sidebar-menu metismenu" id="sidebar-menu">
                        <li>
                            <a href="home">
                                <i class="fa fa-home"></i> Home </a>
                        </li>
                        <li>
                            <a href="listPrinters">
                                <i class="fa fa-gears"></i> Printer ads </a>
                        </li>
                        <li>
                            <a href="listDemands">
                                <i class="fa fa-cubes"></i> Printing demands </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <article class="content dashboard-page">
            {{ renderBody }}
        </article>



        <footer class="footer">

        </footer>

        <script>
            (function(i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function()
                {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-80463319-4', 'auto');
            ga('send', 'pageview');
        </script>

        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>

</body>
</html>