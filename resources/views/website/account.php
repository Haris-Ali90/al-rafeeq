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
    <main id="main" class="page-account" data-page="account">
        <div class="pg-container container-fluid">
            <?php include('./includes/header.php') ?>

            <!-- Content Area - [Start] -->
            <div id="main_content_area">
                <div class="row no-gutters">
                    <?php include('./includes/sidebar.php') ?>
                    <aside id="right_content" class="col-12 col-lg-9">
                        <div class="inner">
                            <div class="content_header_wrap">
                                <!-- Row -->
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-8">
                                        <div class="hgroup divider-after left">
                                            <h1 class="lh-10"><span class="bfsize bf-color regular dp-block">Welcome</span> Steven J. Taylor</h1>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 align-right mb-align-left">
                                        <div class="status-wrap">
                                            <button type="button" class="btn btn-outline-danger cursor-default">Pending Approval</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row - Upload profile photo & Subscribe -->
                            <form action="" id="account-form"  class="needs-validation" novalidate>
                                <section class="form-section">
                                    <div class="section-inner">
                                        <div class="row">
                                            <div class="col-12 col-md-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="thumb circle-radius">
                                                        <img src="./assets/images/thumb-1.jpg" alt="">
                                                    </div>
                                                    <div class="info pl-15">
                                                        <h5 class="nomargin">Upload Profile Photo</h5>
                                                        <p class="mb-10">You can upload a JPG, GIF or PNG file (file size limit is 3MB)</p>
                                                        <button class="btn btn-primary btn-border btn-xs">Upload Profile Photo</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="subscribe-box base-radius">
                                                    <span class="sprite-35-subscribe"></span>
                                                    <h5 class="nomargin">News & Updates</h5>
                                                    <p class="mb-5 f14">Sign up for news & updates by email.</p>
                                                    <button class="btn btn-primary btn-xs" type="button">Subscribe</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Display name as</label>
                                            <div class="custom-radio form-radio custom-control-inline">
                                                <input class="form-radio-input" type="radio" name="displayNameAs" id="displayNameOpt1" value="option1" checked>
                                                <label class="form-radio-label" for="displayNameOpt1">Steven J.</label>
                                            </div>
                                            <div class="custom-radio form-radio custom-control-inline">
                                                <input class="form-radio-input" type="radio" name="displayNameAs" id="displayNameOpt2" value="option1">
                                                <label class="form-radio-label" for="displayNameOpt2">Steven J. Taylor</label>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="form-section">
                                    <div class="section-inner">
                                        <h4><i class="icofont-user-alt-5"></i> Personal Information</h4>
                                        <div class="form-row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="Nickname">Nickname</label>
                                                    <input type="text" class="form-control form-control-lg" placeholder="e.g: John" name="nickname" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="number">Phone number</label>
                                                    <input type="text" class="form-control form-control-lg" placeholder="e.g: 905-281-4440" name="phoneNumber" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="Address">About you</label>
                                                    <textarea rows="5" class="form-control form-control-lg" placeholder="Tell us a little bit about yourself." name="overview" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row address-col">
                                            <div class="form-group col-md-6 col-12">
                                                <label for="Address">Address</label>
                                                <input type="text" class="form-control form-control-lg" placeholder="Address" name="Address" required>
                                            </div>
                                            <div class="form-group col-md-3 col-12">
                                                <label for="Apt">Suit/Apt.</label>
                                                <input type="text" class="form-control form-control-lg" placeholder="Apt" name="Apt" required>
                                            </div>
                                            <div class="form-group col-md-3 col-12">
                                                <label for="code">Postal code</label>
                                                <input type="text" class="form-control form-control-lg" placeholder="code" name="code" required>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="form-section">
                                    <div class="section-inner">
                                        <h4><i class="icofont-money"></i> Joey Deposit Information</h4>
                                        <div class="form-row">
                                            <div class="form-group col-12 col-md-4">
                                                <label for="Address">Institution number</label>
                                                <input type="text" class="form-control form-control-lg" placeholder="ABC001234" name="institutionNumber" required>
                                            </div>
                                            <div class="form-group col-12 col-md-4">
                                                <label for="Apt">Branch number</label>
                                                <input type="text" class="form-control form-control-lg" placeholder="Apt" name="branchNumber" required>
                                            </div>
                                            <div class="form-group col-12 col-md-4">
                                                <label for="code">Account number</label>
                                                <input type="text" class="form-control form-control-lg" placeholder="code" name="accountNumber" required>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="form-section">
                                    <div class="section-inner">
                                        <h4><i class="icofont-vehicle-delivery-van"></i> Vehicle Information</h4>
                                        <div class="form-group">
                                            <label>Select your vehicle type</label>
                                            <div class="custom-control-inline-wrap">
                                                <div class="custom-radio form-radio custom-control-inline mb-6">
                                                    <input class="form-radio-input" type="radio" name="vehicleType" id="bicycle" value="bicycle">
                                                    <label class="form-radio-label" for="bicycle"><i class="icofont-bicycle-alt-1"></i>Bicycle</label>
                                                </div>
                                                <div class="custom-radio form-radio custom-control-inline mb-6">
                                                    <input class="form-radio-input" type="radio" name="vehicleType" id="car" value="car" checked>
                                                    <label class="form-radio-label" for="car"><i class="icofont-car-alt-3"></i>Car</label>
                                                </div>
                                                <div class="custom-radio form-radio custom-control-inline mb-6">
                                                    <input class="form-radio-input" type="radio" name="vehicleType" id="scooter" value="scooter">
                                                    <label class="form-radio-label" for="scooter"><i class="icofont-scooter"></i>Scooter</label>
                                                </div>
                                                <div class="custom-radio form-radio custom-control-inline mb-6">
                                                    <input class="form-radio-input" type="radio" name="vehicleType" id="suv" value="suv">
                                                    <label class="form-radio-label" for="suv"><i class="icofont-van-alt"></i>SUV</label>
                                                </div>
                                                <div class="custom-radio form-radio custom-control-inline mb-6">
                                                    <input class="form-radio-input" type="radio" name="vehicleType" id="truck" value="truck">
                                                    <label class="form-radio-label" for="truck"><i class="icofont-truck-loaded"></i>Truck</label>
                                                </div>
                                                <div class="custom-radio form-radio custom-control-inline mb-6">
                                                    <input class="form-radio-input" type="radio" name="vehicleType" id="van" value="van">
                                                    <label class="form-radio-label" for="van"><i class="icofont-van"></i>VAN</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-6 col-md-3">
                                                <label for="make">Make</label>
                                                <input type="text" class="form-control form-control-lg" placeholder="Forde" name="make" required>
                                            </div>
                                            <div class="form-group col-6 col-md-3">
                                                <label for="model">Model</label>
                                                <input type="text" class="form-control form-control-lg" placeholder="Edge" name="model" required>
                                            </div>
                                            <div class="form-group col-6 col-md-3">
                                                <label for="color">Color</label>
                                                <input type="text" class="form-control form-control-lg" placeholder="Blue" name="color" required>
                                            </div>
                                            <div class="form-group col-6 col-md-3">
                                                <label for="license">License plate</label>
                                                <input type="text" class="form-control form-control-lg" placeholder="ASD-12321" name="license" required>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="form-section">
                                    <div class="section-inner">
                                        <div class="form-row">
                                            <div class="col-12 col-md-6">
                                                <h4><i class="icofont-clock-time"></i> Shift Store Type</h4>
                                                <div class="form-group">
                                                    <label>Select your shift store type</label>
                                                    <div class="custom-radio form-radio custom-control-inline">
                                                        <input class="form-radio-input" type="radio" name="shiftStoreType" id="grocery" value="grocery" checked>
                                                        <label class="form-radio-label" for="grocery">Grocery</label>
                                                    </div>
                                                    <div class="custom-radio form-radio custom-control-inline">
                                                        <input class="form-radio-input" type="radio" name="shiftStoreType" id="ecommerce" value="ecommerce">
                                                        <label class="form-radio-label" for="ecommerce">Ecommerce</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <h4><i class="icofont-notification"></i> Notification Type</h4>
                                                <div class="form-group">
                                                    <label>How would you like to receive notifications?</label>
                                                    <div class="custom-control-inline-wrap">
                                                        <div class="custom-radio form-radio custom-control-inline mb-4">
                                                            <input class="form-radio-input" name="notificationType" type="radio" id="email" value="email">
                                                            <label class="form-radio-label" for="email">Email</label>
                                                        </div>
                                                        <div class="custom-radio form-radio custom-control-inline mb-4">
                                                            <input class="form-radio-input" name="notificationType" type="radio" id="sms" value="sms">
                                                            <label class="form-radio-label" for="sms">SMS</label>
                                                        </div>
                                                        <div class="custom-radio form-radio custom-control-inline mb-4">
                                                            <input class="form-radio-input" name="notificationType" type="radio" id="both" value="both" checked>
                                                            <label class="form-radio-label" for="both">Both</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="content_footer_wrap">
                                    <button type="submit" class="btn btn-primary submitButton">Update</button>
                                </div>
                            </form>
                        </div>
                    </aside>
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