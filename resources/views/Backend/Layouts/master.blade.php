

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Vetican</title>


  <link rel="shortcut icon" href="{{asset('Backend/img')}}/{{$website_info->favicon}}" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Author -->
  <meta name="author" content="SSLCOMMERZ Team">


  <script src="{{asset('Backend/assets')}}/js/jquery.min.js"></script>

  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{asset('Backend/assets')}}/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('Backend/assets')}}/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('Backend/assets')}}/css/dataTables.bootstrap.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('Backend/assets')}}/css/daterangepicker-bs3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('Backend/assets')}}/css/all.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('Backend/assets')}}/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('Backend/assets')}}/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins -->
  <link rel="stylesheet" href="{{asset('Backend/assets')}}/css/skin-black-light.css">

  <link rel="stylesheet" href="{{asset('Backend/assets')}}/css/datepicker3.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/regular.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/svg-with-js.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/v4-font-face.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/v5-font-face.min.css">

  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

  <style>
    #modal-content{
     padding: 20px;

   }

   .button-extra-padding{
     padding-top: 25px;
   }


   .btn-danger{
    margin-right: 5px;
  }

</style>


</head>

<body  class="hold-transition skin-black-light sidebar-mini">
  <div id="myModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
      </div>
    </div>
  </div>

  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="{{url('/dashboard')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">VETICAN</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src='{{asset('Backend/img')}}/{{$website_info->logo}}' alt='SSLCOMMERZ' class="img-fluid" style="height:55px;"></span>
      </a>



      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Notifications: style can be found in dropdown.less -->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              @php
              $adminImage = base_path().'/Backend/img/AdminImage/'.Auth::user()->image;
              @endphp
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if(file_exists($adminImage))
                <img src="{{asset('Backend/img/AdminImage')}}/{{Auth::user()->image}}" class="user-image" alt="User Image">
                @else
                @endif
                <span class="hidden-xs">
                  {{Auth::user()->name}}
                </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  @if(file_exists($adminImage))
                  <img src="{{asset('Backend/img/AdminImage')}}/{{Auth::user()->image}}" class="img-circle" alt="User Image">
                  @else
                  @endif
                  <p>
                    {{Auth::user()->name}}<small>{{Auth::user()->user_type}}</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                {{-- <div class="pull-left">
                  <a href="https://merchant.sslcommerz.com/?request=dTFyQWljaGFuZ2VQYXNzd2Q6ZWRpdHUxckFp" class="btn btn-warning btn-flat">Change Password</a>
                </div> --}}


                <div class="pull-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger btn-flat">Sign out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>

              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if(file_exists($adminImage))
          <img src="{{asset('Backend/img/AdminImage')}}/{{Auth::user()->image}}" class="img-circle" alt="User Image" style="">
          @endif
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="{{url('/dashboard')}}"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class='{{request()->Is('dashboard') ? 'active' : ''}}'>
          <a href='{{url('/dashboard')}}' class='top_link'><i class="fa fa-dashboard"></i><span > Dashboard</span></a>
        </li>


        <li class='{{request()->Is('create_user') ? 'active' : ''}} {{request()->Is('create_user/create') ? 'active' : ''}}'>
          <a href='{{url('create_user')}}' class='top_link'><i class="fa fa-user"></i><span > Create User</span></a>
        </li>

        <li class='treeview {{request()->Is('website_information/1/edit') ? 'active' : ''}} {{request()->Is('about_us/1/edit') ? 'active' : ''}}'>
          <a href='#'><i class="fa fa-gear"></i><span > Software Settings</span><i class='fa fa-chevron-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li class='{{request()->Is('website_information/1/edit') ? 'active' : ''}}'>
              <a  href='{{url('website_information/1/edit')}}' ><i class="fa fa-check"></i> Website Information</a>
            </li>
            <li class='{{request()->Is('about_us/1/edit') ? 'active' : ''}}'>
              <a  href='{{url('about_us/1/edit')}}' ><i class="fa fa-check"></i> About Us</a>
            </li>

          </ul>
        </li>

        <li class='{{request()->Is('upload_photo') ? 'active' : ''}} {{request()->Is('upload_photo/create') ? 'active' : ''}}'>
          <a href='{{url('upload_photo')}}' class='top_link'><i class="fa fa-image"></i><span > Upload Photo</span></a>
        </li>

        <li class='{{request()->Is('testimonial') ? 'active' : ''}} {{request()->Is('testimonial/create') ? 'active' : ''}}'>
          <a href='{{url('testimonial')}}' class='top_link'><i class="fa fa-file"></i><span > Testimonial</span></a>
        </li>

        <li class='{{request()->Is('shop_info') ? 'active' : ''}} {{request()->Is('shop_info/create') ? 'active' : ''}}'>
          <a href='{{url('shop_info')}}' class='top_link'><i class="fa fa-shop"></i><span > Shop Information</span></a>
        </li>

        <li class='{{request()->Is('offer_info') ? 'active' : ''}} {{request()->Is('offer_info/create') ? 'active' : ''}}'>
          <a href='{{url('offer_info')}}' class='top_link'><i class="fa fa-gift"></i><span > Offer Information</span></a>
        </li>

        <li class='{{request()->Is('service_info') ? 'active' : ''}} {{request()->Is('service_info/create') ? 'active' : ''}}'>
          <a href='{{url('service_info')}}' class='top_link'><i class="fa fa-gears"></i><span > Service Information</span></a>
        </li>

        <li class='{{request()->Is('blog_info') ? 'active' : ''}} {{request()->Is('blog_info/create') ? 'active' : ''}}'>
          <a href='{{url('blog_info')}}' class='top_link'><i class="fa fa-bars"></i><span > Blog Information</span></a>
        </li>

        <li class='{{request()->Is('faq') ? 'active' : ''}} {{request()->Is('faq/create') ? 'active' : ''}}'>
          <a href='{{url('faq')}}' class='top_link'><i class="fa fa-comment"></i><span > FAQ</span></a>
        </li>

        <li class='{{request()->Is('partner_info') ? 'active' : ''}} {{request()->Is('partner_info/create') ? 'active' : ''}}'>
          <a href='{{url('partner_info')}}' class='top_link'><i class="fa fa-handshake"></i><span > Partner</span></a>
        </li>

        <li class='{{request()->Is('messages') ? 'active' : ''}}'>
          <a href='{{url('messages')}}' class='top_link'><i class="fa fa-envelope"></i><span > All Messages</span></a>
        </li>



        <li class='treeview'>
          <a href='#'><i class="fa fa-gear"></i><span > Booking</span><i class='fa fa-chevron-left pull-right'></i></a>
          <ul class='treeview-menu'>

           <li>
            <a  href='{{url('managebooking')}}' ><i class="fa fa-check"></i> Manage Booking</a>
          </li>


          <li>
            <a  href='{{url('addtime')}}' ><i class="fa fa-check"></i> Time</a>
          </li>


        </ul>
      </li>







    </ul></section>
    <!-- /.sidebar -->
  </aside>
  <style media="screen">

  </style>

  @yield('body')

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      {{-- <b>Version</b> 3.0.0 --}}
    </div>
  </footer>
</div>

<div id="myModalpdf" class="modal fade" >
  <div class="modal-dialog">
    <div class="modal-content">
      <object data="https://merchant.sslcommerz.com/app/webs/attdoc/UserManualV3.pdf" type="application/pdf" width="100%" height="850">
        <p>
          It appears your Web browser is not configured to display PDF files. No worries, just <a href="https://merchant.sslcommerz.com/app/webs/attdoc/UserManualV3.pdf" >click here to download the PDF file.</a>
        </p>
      </object>
    </div>
  </div>
</div>

<!-- Bootstrap 3.3.5 -->
<script src="{{asset('Backend/assets')}}/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="{{asset('Backend/assets')}}/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="{{asset('Backend/assets')}}/js/jquery.inputmask.js"></script>
<script src="{{asset('Backend/assets')}}/js/jquery.inputmask.date.extensions.js"></script>
<script src="{{asset('Backend/assets')}}/js/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="{{asset('Backend/assets')}}/js/moment.min.js"></script>
<script src="{{asset('Backend/assets')}}/js/daterangepicker.js"></script>
<!-- DataTables -->
<script src="{{asset('Backend/assets')}}/js/jquery.dataTables.min.js"></script>
<script src="{{asset('Backend/assets')}}/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{asset('Backend/assets')}}/js/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('Backend/assets')}}/js/app.min.js"></script>

<script src="{{asset('Backend/assets')}}/js/bootstrap-datepicker.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/brands.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/fontawesome.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/regular.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/solid.min.js" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/conflict-detection.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/v4-shims.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );

  $(document).ready(function() {
    $('#summernote').summernote();
  });
  $(document).ready(function() {
    $('#summernote1').summernote();
  });
</script>


<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });

    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>



<script>


  function displayNone(itemID) {

   var x = document.getElementById(itemID);

   if (x) {

    $( x ).hide('slow');
  }

		//x.style.display = 'none';

   return true;

 }

 function hide_read_mes(dis_id) {
  displayNone(dis_id);
}
</script>

<script>
  $('body').on('hidden.bs.modal', '.modal', function () {
    $(this).removeData('bs.modal');
  });
</script>

@if(Session::has('success'))
<script>
  swal('', '{{ session('success') }}', 'success');
</script>

@endif

@if(Session::has('error'))
<script>
  swal('', '{{ session('error') }}', 'error');
</script>

@endif

@if(Session::has('info'))
<script>
  swal('', '{{ session('info') }}', 'info');
</script>

@endif


</body>
</html>
