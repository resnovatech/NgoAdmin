
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $ins_name }}" />
	<meta property="og:title" content="{{ $ins_name }}" />
	<meta property="og:description" content="{{ $ins_name }}" />
	<meta property="og:image" content="{{ asset('/') }}{{ $logo }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/') }}{{ $icon }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('/') }}{{ $icon }}" type="image/x-icon">
    <title>@yield('title')</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/datatables.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/date-picker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/prism.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/vector-map.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/style.css">
    <link id="color" rel="stylesheet" href="{{ asset('/') }}public/new_admin/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}public/new_admin/assets/css/responsive.css">
    <style>

        .swal2-confirm{

            margin-left:10px;
        }

        </style>
        @yield('css')
</head>
<body>
<!-- Loader starts-->

@include('backend.include.loader')
<!-- Loader ends-->
<!-- page-wrapper Start       -->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->


    @include('backend.include.header')
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        @include('backend.include.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
           @yield('body')
        </div>
        <!-- footer start-->

        @include('backend.include.footer')

    </div>
</div>
<!-- latest jquery-->
<script src="{{ asset('/') }}public/new_admin/assets/js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="{{ asset('/') }}public/new_admin/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('/') }}public/new_admin/assets/js/sidebar-menu.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/config.js"></script>
<!-- Bootstrap js-->
<script src="{{ asset('/') }}public/new_admin/assets/js/bootstrap/popper.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
<script src="{{ asset('/') }}public/new_admin/assets/js/chart/chartist/chartist.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/chart/knob/knob.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/chart/knob/knob-chart.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/prism/prism.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/clipboard/clipboard.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/counter/jquery.waypoints.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/counter/jquery.counterup.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/counter/counter-custom.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/custom-card/custom-card.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/notify/bootstrap-notify.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/dashboard/default.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/notify/index.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
<!-- Plugins JS Ends-->
 <!-- Plugins JS start-->
 <script src="{{ asset('/') }}public/new_admin/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
 <script src="{{ asset('/') }}public/new_admin/assets/js/datatable/datatables/datatable.custom.js"></script>
 <script src="{{ asset('/') }}public/new_admin/assets/js/tooltip-init.js"></script>
 <!-- Plugins JS Ends-->


<!-- Theme js-->
<script src="{{ asset('/') }}public/new_admin/assets/js/script.js"></script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deleteTag(id) {
        swal({
            title: 'Are you sure?',
            text: "You will not be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>
@yield('script')
<!-- login js-->
<!-- Plugin used-->
</body>
</html>















