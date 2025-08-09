<!doctype html>
<html lang="en" dir="ltr">

<?php
use App\Models\Admin\WebModel;

$web = WebModel::first();
?>

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{$web->web_deskripsi}}">
    <meta name="author" content="{{$web->web_nama}}">
    <meta name="keywords" content="">

    <!-- FAVICON -->
    @if($web->web_logo == '' || $web->web_logo == 'default.png')
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/assets/default/web/default.png')}}" />
    @else
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/web/' . $web->web_logo)}}" />
    @endif

    <!-- TITLE -->
    <title>Maintenance | {{$web->web_nama}}</title>

   <!-- STYLE CSS -->
   <link href="{{url('/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{url('/assets/css/dark-style.css')}}" rel="stylesheet" />
    <link href="{{url('/assets/css/transparent-style.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{url('/assets/css/icons.css')}}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{url('/assets/colors/color1.css')}}" />

</head>

<body class="">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="{{url('/assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <!-- End GLOBAL-LOADER -->

        <!-- PAGE -->
        <div class="page">
            <!-- PAGE-CONTENT OPEN -->
            <div class="page-content error-page error2 text-white">
                <div class="container text-center">
                    <div class="error-template">
                        <h3>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a href="mailto:dwifebrimurcahyo@gmail.com">contact us</a>, otherwise we&rsquo;ll be back online shortly!</h4>
                          <div class="text-center">
                            <a class="btn btn-primary mt-1 mb-3" href="mailto:febri.murcahyo@mgmaritim.com"> <i class="fa fa-long-arrow-right"></i> Contact Us</a>
                          </div>
                        <h4>&mdash; E-ATK @2025</h4>
                    </div>
                </div>
            </div>
            <!-- PAGE-CONTENT OPEN CLOSED -->
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE -->

    <!-- JQUERY JS -->
    <script src="{{url('/assets/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{url('/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{url('/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{url('/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{url('/assets/js/themeColors.js')}}"></script>

    <!-- Sticky js -->
    <script src="{{url('/assets/js/sticky.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{url('/assets/js/custom.js')}}"></script>

</body>

</html>

Dear team, 


untuk courtesy visit rondo direschedule jam 2pm ~ 3pm, 

Sore, Febri.

Access time untuk karyawan sbb:
Yang hanya punya access ke floor kerjanya sendiri: 8AM - 8PM
Yang punya access ke semua floors: 24 hours

Mohon bisa dibuatkan seperti ini ya. Terima kasih.

Febri, maaf ganggu. Saya revisi yah:
Dari 8AM - 8 PM
Menjadi 7AM - 8 PM

Selamat sore bu, izin info untuk access time karyawan sudah diupdate ya bu, berikut updatenya : 

1. user dengan rule all access 24 jam 
2. user dengan rule access terbatas untuk masing-masing lantai dari jam 07.00AM ~ 08.00PM
3. user dengan rule access lantai 2 ke mushola lantai 1 dari jam 11.40AM ~ 04.30PM
4. user dengan rule access finger (teknisi) ke mushola lantai 1 dari jam 11.40AM ~ 04.30PM

terima kasih bu 
