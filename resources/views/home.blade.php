<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Login - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('adminTheme/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('adminTheme/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('adminTheme/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminTheme/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('adminTheme/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('adminTheme/assets/css/style.css') }}" rel="stylesheet">

    <style type="text/css">
        .box{
            background-color: #ffff;
            border: 1px solid black;
            height: 100px;
            text-align: center;
            padding-top: 30px;
            font-size: 20px;
        }
        .box:hover{
            height: 120px;
        }
        .row{
            margin-top:250px ;
        }
    </style>

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Nov 17 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body style="background: lightblue;">

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('gst.page.manage',['kd']) }}">
                        <div class="box">
                            KD
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('gst.page.manage',['kvd']) }}">
                        <div class="box">
                            KVD
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('gst.page.manage',['kda']) }}">
                        <div class="box">
                            KDA
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main><!-- End #main -->

</body>

</html>