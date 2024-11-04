<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Estimate Management System - @yield('title')</title>


    <!-- Include other styles -->
    @include('adminTheme.style')
    @yield('style')
    <!-- Include Toastr.css -->

    <!-- Bootstrap and other libraries -->
    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Nov 17 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style type="text/css">
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0px !important;
        }
    </style>
</head>
<body>
    <!-- Include header -->
    @include('adminTheme.header')

    <!-- Include sidebar -->
    @include('adminTheme.sidebar')

    <!-- Include content -->
    @yield('content')

    <!-- Include footer -->
    @include('adminTheme.footer')

    <!-- Back to top button -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Include scripts -->
    @include('adminTheme.script')

    @yield('script')

    <!-- Include custom alerts -->
    @include('adminTheme.alert')
</body>
</html>
