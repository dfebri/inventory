<!doctype html>
<html lang="en" dir="ltr">

@php
    use App\Models\Admin\WebModel;
    $web = WebModel::first();
@endphp

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="{{ $web->web_deskripsi ?? '' }}" />
    <meta name="author" content="{{ $web->web_nama ?? '' }}" />
    <meta name="keywords" content="" />

    @if(empty($web->web_logo) || $web->web_logo == 'default.png')
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('/assets/default/web/default.png') }}" />
    @else
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/web/' . $web->web_logo) }}" />
    @endif

    <title>Maintenance | {{ $web->web_nama ?? 'Website' }}</title>

    <link href="{{ url('/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/css/transparent-style.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/css/skin-modes.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/css/icons.css') }}" rel="stylesheet" />
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ url('/assets/colors/color1.css') }}" />
</head>

<body>

    <div class="login-img">
        <div id="global-loader">
            <img src="{{ url('/assets/images/loader.svg') }}" class="loader-img" alt="Loader" />
        </div>

        <div class="page">
            <div class="page-content error-page error2 text-white">
                <div class="container text-center">
                    <div class="error-template">
                        <h3>
                            🚧 Sorry, the system is currently under deploy. Please wait until maintenance is complete.
                        </h3>

                        <div class="text-center">
                            <a class="btn btn-primary mt-1 mb-3" href="mailto:dwifebrimurcahyo@gmail.com">
                                <i class="fa fa-long-arrow-right"></i> Contact Us
                            </a>
                        </div>

                        <h4>&mdash; E-ATK @2025</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('/assets/js/themeColors.js') }}"></script>
    <script src="{{ url('/assets/js/sticky.js') }}"></script>
    <script src="{{ url('/assets/js/custom.js') }}"></script>

</body>

</html>
