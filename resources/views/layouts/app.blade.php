<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, accounts, Projects">
    <meta name="author" content="abbmresearch - hr Management System">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex, nofollow">
    <title>ABBM</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }} ">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }} ">
    <!-- Chart CSS -->
    @yield('style')
    
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">  

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
		<![endif]-->
        @livewireStyles
</head>
<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        @include('./shared/navBar')
        <!-- /Header -->
        
        <!-- Sidebar -->
       @include('./shared/sideBar')
        <!-- /Sidebar -->
        <!-- Main content -->
        <div class="page-wrapper">
            @yield('content')
           
        <!-- /Main content -->
        </div>

    </div>
    <!-- /Main Wrapper -->
    <form id="logout-form"  class="d-none" action="{{route('logout')}}" method="POST" >@csrf</form>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
         <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('assets/js/select2.min.js') }} "></script>

    <script src="{{ asset('assets/js/moment.min.js') }} "></script>

    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }} "></script>

    		<!-- Datatable JS -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }} "></script>

    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }} "></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  

    @yield('stripts')   


    
    <script src="{{ asset('assets/js/app.js')}}"></script>
    <script>
        window.addEventListener('notification',event =>{
            toastr.info(event.detail.message);
        });
    </script>
  
    @livewireScripts

    @yield('DateScript')

  
   
</body>
</html>