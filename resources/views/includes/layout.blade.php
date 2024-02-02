<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title> JoeyCo | @yield('title') </title>

    <meta name="description" content="@yield('description')"/>
    <meta name="title" content="@yield('metaTitle')">
    <meta name="keywords" content="@yield('keywords')">

    <meta name="description" content="" />
    <!-- InstanceEndEditable -->
    <meta charset="UTF-8" />
    <meta content='IE=edge' http-equiv=X-UA-Compatible>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @yield('meta_tags')
    <link rel="stylesheet" href="{{asset('/css/libs/owlcarousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('/')}}favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('/')}}favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('/')}}favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/')}}favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('/')}}favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('/')}}favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('/')}}favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('/')}}favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/')}}favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('/')}}favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/')}}favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('/')}}favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}favicon/favicon-16x16.png">
    <link rel="manifest" href="{{asset('/')}}favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('/')}}favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#e36d29">

    <script src="{{asset('/')}}js/jquery-3.6.0.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Ads -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-978525504"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-978525504');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136528693-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-136528693-1');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '3019922118249735');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=3019922118249735&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    <meta name="facebook-domain-verification" content="k9ift2orp7z90psgzkx2179093rdzb" />

    <!-- Start of HubSpot Embed Code -->
     <script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/21828245.js"></script>
    <!-- End of HubSpot Embed Code -->

</head>
<style>
.form-group label.error {
    color:white;
}
</style>

<body>




            @yield('content')






</body>
{{-- <script src="{{asset('/')}}assets/js/jquery-3.6.0.min.js"></script> --}}

<script src="{{asset('/')}}js/jquery-migrate-3.3.2.js"></script>

<script src="{{asset('/')}}js/bootstrap.js"></script>
<script src="{{asset('/')}}js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}js/ion.rangeSlider.min.js"></script>
<script src="{{asset('/')}}js/main.js"></script>
<script src="{{asset('/')}}js/jquery.validate.min.js"></script>
<script src="{{asset('/')}}js/socket.io.js"></script>
<script src="{{asset('/')}}js/chat.js"></script>
<script>
    $(document).ready(function () {

    $('#track_order_form').validate({ // initialize the plugin
        rules: {
            // field1: {
            //     required: true,
            //     email: true
            // },
            trackingId: {
                // minlength: 5,
                required: true

            }
        }
    });

    });
    </script>

</html>
