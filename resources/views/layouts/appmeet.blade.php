<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Meeting jakarta kanwil 3</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('css')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
  <!-- Select2 -->
  <link rel="stylesheet" href="/template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
  <style>
    table {
      overflow-x: auto;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini" style="background: #F1F4F5;">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0px; background-color: #63A8EB;">
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <h3><strong>Bri Kanwil Jakarta 3</strong></h3>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span id="request">Maximize</span> 
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="padding:0 5px 0 5px;">
            
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wranpper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @yield('titleheader')
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @yield('menuheader')
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="col-lg-12">
          @yield('content')          
        </div>
      </div>
    </section>  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    @include('footer')
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/template/plugins/jquery/jquery.min.js"></script>
@yield('js')
<!-- Bootstrap 4 -->
<script src="/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/dist/js/adminlte.min.js"></script>
<!-- Page Script -->
<!-- DataTables -->
<script src="/template/plugins/datatables/jquery.dataTables.js"></script>
<script src="/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/template/dist/js/demo.js"></script>
<!-- InputMask -->
<script src="/template/plugins/moment/moment.min.js"></script>
<script src="/template/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="/template/plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- sweetlaert-->
<!-- <script src="/js/sweetalert.min.js"></script> -->
<script src="/js/sweetalert2.all.js"></script> 
@include('sweet::alert')
<!-- Select2 -->
<script src="/template/plugins/select2/js/select2.full.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/js/screenfull.js"></script>
<script>
  $(function () {
    $('#supported').text('Supported/allowed: ' + !!screenfull.isEnabled);

    if (!screenfull.isEnabled) {
      return false;
    }

    $('#request').click(function () {
      screenfull.request($('#container')[0]).then(function () {
        console.log('Browser entered fullscreen mode')
      })
      // Does not require jQuery. Can be used like this too:
      // screenfull.request(document.getElementById('container'));
    });

    $('#exit').click(function () {
      screenfull.exit().then(function () {
        console.log('Browser exited fullscreen mode')
      });
    });

    function fullscreenchange() {
      var elem = screenfull.element;

      $('#status').text('Is fullscreen: ' + screenfull.isFullscreen);

      if (elem) {
        $('#element').text('Element: ' + elem.localName + (elem.id ? '#' + elem.id : ''));
      }

      if (!screenfull.isFullscreen) {
        $('#external-iframe').remove();
        document.body.style.overflow = 'auto';
      }
    }

    setTimeout(function(){
       screenfull.on('change', fullscreenchange);

    // Set the initial values
    fullscreenchange();    
    }, 5000);
   

  });
</script>
<!-- <script src="/js/valid.js"></script>
 -->
 <script src="/js/date.js"></script>
 {{ TawkTo::widgetCode() }}
</body>
</html>
