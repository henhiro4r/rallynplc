<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Page - Rally NPLC</title>
    <link rel="icon" href="{{asset('assets/img/logo.png')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/datatables/dataTables.bootstrap4.min.css')}}">
</head>

<body id="page-top">
    <div id="wrapper">
        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
            @include('nav.admin_side_nav')
        @endif
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                    @include('nav.top_nav')
                    @yield('content')
                @endif
            </div>
        </div>
            <a class="border rounded scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    @include('inc.modal.logout_modal')
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/chart.min.js')}}"></script>
    <script src="{{asset('assets/js/bs-charts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <script src="{{asset('assets/js/jquery.blImageCenter.js')}}"></script>
    <script src="{{asset('assets/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#qrcode').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#qrs").change(function() {
            readURL(this);
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#qrcode2').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#qrs2").change(function() {
            readURL2(this);
        });

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#photos').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#ppt").change(function() {
            readURL3(this);
        });

        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#photos2').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#ppt2").change(function() {
            readURL4(this);
        });

        $(function(){
            $("select#role").change(function(){
                $(this).find("option:selected").each(function(){
                    if ($(this).attr("value") === '3') {
                        $("#sch").show();
                        $("#cty").show();
                        $("#address").show();
                        $("#coach").show();
                        document.getElementById("schid").required = true;
                        document.getElementById("ctyid").required = true;
                        document.getElementById("addressid").required = true;
                        document.getElementById("coachid").required = true;
                    } else {
                        $("#sch").hide();
                        $("#cty").hide();
                        $("#address").hide();
                        $("#coach").hide();
                        document.getElementById("schid").required = false;
                        document.getElementById("ctyid").required = false;
                        document.getElementById("addressid").required = false;
                        document.getElementById("coachid").required = false;
                    }
                })
            }).change();
        });
    </script>
</body>

</html>