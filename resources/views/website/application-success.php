<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>Account | JoeyCo</title>
    <meta name="description" content="" />
    <!-- InstanceEndEditable -->
    <meta charset="UTF-8" />
    <meta content='IE=edge' http-equiv=X-UA-Compatible>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./assets/css/main.css">

    <link rel="apple-touch-icon" sizes="57x57" href="./favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="./favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="manifest" href="./favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#e36d29">
</head>

<body>
    <main id="main-backend" class="page-account" data-page="account">
        <div class="pg-container">
            <?php include('./includes/header.php') ?>

            <!-- Content Area - [Start] -->
            <div id="main_content_area">
                <div class="signup_header success_header section-padding">
                    <div class="icon">
                        <img src="./assets/images/success_icon.png" alt="">
                    </div>
                    <div class="signup_msg">
                        <h2 class="h4 nomargin">All done</h2>
                        <p><span>Congratulations!</span> You’ve successfully completed your profile to become <strong class="basecolor1">Joey</strong>. </span>
                    </div>
                </div>

                <div class="section-steps section-padding-xs bg-white">
                    <div class="container xs">
                        <h4 class="bf-color">Your application is under review</h4>
                        <p>Our support team will send you an email once your request get approved or you may check the status by logging in to your account.</p>
                        <div class="button-group">
                            <a href="#" class="btn btn-basecolor1 btn-xs mr-5 mb-fullw">Download Joey App</a>
                            <a href="#" class="btn btn-bc1lightest btn-xs mb-fullw">Visit My Account</a>
                        </div>
                        <div class="steps_list">
                            <ul class="no-list">
                                <li class="row_success">
                                    <div class="status"><i class="icofont-check"></i></div>
                                    <div class="step_info">
                                        <span class="title">Create Account</span>
                                    </div>
                                </li>
                                <li class="row_success">
                                    <div class="status"><i class="icofont-check"></i></div>
                                    <div class="step_info">
                                        <span class="title">Address Information</span>
                                    </div>
                                </li>
                                <li class="row_success">
                                    <div class="status"><i class="icofont-check"></i></div>
                                    <div class="step_info">
                                        <span class="title">Vehicle Information</span>
                                    </div>
                                </li>
                                <li class="row_success">
                                    <div class="status"><i class="icofont-check"></i></div>
                                    <div class="step_info">
                                        <span class="title">Work Preferences</span>
                                    </div>
                                </li>
                                <li class="row_success">
                                    <div class="status"><i class="icofont-check"></i></div>
                                    <div class="step_info">
                                        <span class="title">Additional Information</span>
                                    </div>
                                </li>
                                <li class="row_success">
                                    <div class="status"><i class="icofont-check"></i></div>
                                    <div class="step_info">
                                        <span class="title">All Done</span>
                                        <div class="btn-wrap">
                                            <a href="signup-step1.php" class="btn btn-bc1lightest btn-xs">Review Information</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Area - [/end] -->

            <?php include('./includes/footer.php') ?>
        </div>
    </main>
</body>

<script src="./assets/js/jquery-3.0.0.js"></script>
<script src="./assets/js/jquery-migrate-3.3.2.js"></script>
<script src="./assets/js/bootstrap.js"></script>
<script src="./assets/js/main.js"></script>
</html>