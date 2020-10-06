<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Meeting jakarta kanwil 3</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="/template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <style>
    table {
        overflow-x: auto;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/template/index3.html" class="brand-link">
      <span class="brand-text font-weight-light"> @ Jakarta Kanwil III</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @include('form')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2">
          <button class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modal-default">
            Create meeting
          </button>
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Meeting</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form role="form" id="quickForm" method="POST" action="/save">
                    @csrf
                    <div class="card card-default">
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Nama</label>
                              <input type="text" name="name" class="form-control" placeholder="Input nama anda">
                            </div>
                            <div class="form-group">
                              <label>No HP</label>
                              <input type="text" name="nohp" class="form-control" placeholder="Input NOHP anda" data-inputmask='"mask": "(999) 999-999999"' data-mask>
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="email" class="form-control" placeholder="Input email anda">
                            </div>
                            <div class="form-group">
                              <label>Bagian</label>
                              <select class="form-control select2bs4" style="width: 100%;" name="bagian">
                                <option selected="selected">TSI</option>
                                <option>ARK</option>
                                <option>HC</option>
                                <option>OJL</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Ruangan Meeting</label>
                              <input type="text" name="r_meeting" class="form-control" placeholder="Input ruangan meeting">
                            </div>
                            <div class="form-group">
                              <label>Tanggal</label>
                              <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker4"/>
                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Pukul</label>
                              <div class="input-group date" id="timepicker" data-target-input="nearest">
                                <input type="text" name="waktu" class="form-control datetimepicker-input" data-target="#timepicker"/>
                                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Folders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="#" class="nav-link">
                    <i class="fas fa-inbox"></i> Meeting
                    <span class="badge bg-primary float-right">12</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-envelope"></i> Batal
                    <span class="badge bg-danger float-right">8</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-file-alt"></i> Sedang Meeting
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-trash-alt"></i> Trash
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Label Meeting!</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-danger"></i>
                    Batal
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-warning"></i> Sedang Meeting
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle text-primary"></i>
                    Meeting
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-10">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Meeting</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>No HP</th>
                  <th>Email</th>
                  <th>Bagian</th>
                  <th>Ruang Meeting</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; {{ date("Y") }} <a href="#">apakata-do</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/template/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
var save_method;
$(function() {
  var table = $('#example1').DataTable({
      processing: true,
      serverSide: true,
      paging: true,
      retrieve: true,
      lengthChange: true,
      searching: true,
      ordering: true,
      info: true,
      autoWidth: true,
      scrollY: '30vh',
      ajax: 'view/json',
      columns: [
          { data: 'name', name: 'name' },
          { data: 'nohp', name: 'nohp' },
          { data: 'email', name: 'email' },
          { data: 'bagian', name: 'bagian' },
          { data: 'r_meeting', name: 'r_meeting' },
          { data: 'tanggal', name: 'tanggal' },
          { data: 'waktu', name: 'waktu' },
          {data:  'status', render: function ( data, type ) {
            var text = "";
            var label = "";
            if (data == 1){
             text = "Meeting";
             label = "primary";
            } else if (data == 2){
             text = "Sedang Meeting";
             label = "warning";
            }else{
              text = "Batal";
              label = "danger";              
            } 
              return "<span class='badge badge-" + label + "'>"+ text + "</span>";
            }
           },
          { data: 'action', name: 'action', orderable: false, searchable : false },
      ]
  });
  setInterval( function () {
    table.ajax.reload();
}, 60000 );


});

function addForm(){
   save_method = "add";
   $('input[name=_method]').val('POST');
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();            
   $('.modal-title').text('Tambah Kategori');
}

function editForm(id){
   save_method = "edit";
   $('input[name=_method]').val('PATCH');
   $('#modal-form form')[0].reset();
   $.ajax({
     url : "show/"+id+"/detail",
     type : "GET",
     dataType : "JSON",
     success : function(data){
       $('#modal-form').modal('show');
       $('.modal-title').text('Aksi');
       
       $('#id').val(data.id);
       $('#name').val(data.name);
       $('#nohp').val(data.nohp);
       $('#email').val(data.email);
       $('#waktu').val(data.waktu);
       $('#tanggal').val(data.tanggal);
       $('#bagian').val(data.bagian);
       $('#r_meeting').val(data.r_meeting);
       
     },
     error : function(){
       alert("Tidak dapat menampilkan data!");
     }
   });
}

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "kategori/"+id,
       type : "POST",
       data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
       success : function(data){
         table.ajax.reload();
       },
       error : function(){
         alert("Tidak dapat menghapus data!");
       }
     });
   }
}
</script>
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

<!-- <script>
$(function() {
  var table = $('#example1').DataTable({
      processing: true,
      serverSide: true,
      paging: true,
      retrieve: true,
      lengthChange: true,
      searching: true,
      ordering: true,
      info: true,
      autoWidth: true,
      scrollY: '30vh',
      ajax: 'view/json',
      columns: [
          { data: 'name', name: 'name' },
          { data: 'nohp', name: 'nohp' },
          { data: 'email', name: 'email' },
          { data: 'bagian', name: 'bagian' },
          { data: 'r_meeting', name: 'r_meeting' },
          { data: 'tanggal', name: 'tanggal' },
          { data: 'waktu', name: 'waktu' },
          {data:  'status', render: function ( data, type ) {
            var text = "";
            var label = "";
            if (data == 1){
             text = "Meeting";
             label = "primary";
            } else if (data == 2){
             text = "Sedang Meeting";
             label = "warning";
            }else{
              text = "Batal";
              label = "danger";              
            } 
              return "<span class='badge badge-" + label + "'>"+ text + "</span>";
            }
           },
          { data: 'action', name: 'action', orderable: false, searchable : false },
      ]
  });
  setInterval( function () {
    table.ajax.reload();
}, 60000 );


});


</script> -->

<!-- jquery-validation -->
<script src="/template/plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- sweetlaert-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@include('sweet::alert')
<!-- Select2 -->
<script src="/template/plugins/select2/js/select2.full.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="/js/valid.js"></script>
<script src="/js/date.js"></script>
</body>
</html>
