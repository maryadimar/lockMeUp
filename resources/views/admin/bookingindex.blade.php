@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="/template/plugins/toastr/toastr.min.css">
@endsection
@section('menuheader')
	<li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item active">Booking</li>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-2">
      <!-- <button class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modal-default">
        share link meeting
      </button> -->
      @include('admin.booking.detail')
      @include('admin.bookingcreate')
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
              <form role="form" id="quickForm" method="POST" action="#">
                
                <div class="card card-default">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>link create booking meeting</label>
                          <input type="text" name="name" id="myInput" class="form-control" value="">
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
                <span class="badge bg-primary float-right">{{ $countMeeting }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-envelope"></i> Batal
                <span class="badge bg-danger float-right">{{ $countBM }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-file-alt"></i> Sedang Meeting
                <span class="badge bg-warning float-right">{{ $countSM }}</span>
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
          <div class="float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Create Booking</button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Bagian</th>
                <th>Ruangan</th>
                <th>Tanggal</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
 @endsection

@section('js')
<script>
	$('#pn').on('keyup',function(){
    
    var nopn = document.getElementById('pn').value;
    
    if(nopn.length != 8)
    {
      $('#msgpn').text("minimal 8 digit");
      /*toastr.error('PN Minimal 8 Digit.')
      return (false);*/
    }
       // $('#msgpn').text("minimal 8 digit");
    });
</script>
<script src="/template/plugins/toastr/toastr.min.js"></script>
<script>
  function validasi_input(){
    var mulai   = document.getElementById('mulai').value;
    var selesai = document.getElementById('selesai').value;
    var nopn    = document.getElementById('pn').value;
    
    if(nopn.length != 8)
    {
      toastr.error('PN Minimal 8 Digit.')
      return (false);
    }
    if(selesai <= mulai){
      
      toastr.error('Jam selesai meeting lebih kecil dari jam mulai meeting.')
      return (false);
      
    }else{
       $.ajax({
          url: '/admin/booking/save',
          type: 'POST',
          data: {
              "_token": "{{ csrf_token() }}",
              "pn": $('input[name=pn]').val(),
              "nohp": $('input[name=nohp]').val(),
              "peserta": $('input[name=peserta]').val(),
              "agenda": $('input[name=agenda]').val(),
              "bagian": $('input[name=bagian]').val(),
              "r_meeting": $('input[name=r_meeting]').val(),
              "tanggal": $('input[name=tanggal]').val(),
              "mulai": $('input[name=mulai]').val(),
              "selesai": $('input[name=selesai]').val()
          }, 
          success: function (result) {
            console.log(result);
          }
      });  
    }
    document.getElementById('quickForm').submit(); 
  }  
</script>
<script type="text/javascript">
	var save_method;
	$(function() {
	  var table = $('#example1').DataTable({
      info: true,
      paging: true,
      ordering: true,
      retrieve: true,
      scrollY: '30vh',
      searching: true,
      autoWidth: true,
      processing: true,
      serverSide: true,
      lengthChange: true,
      ajax: '/admin/booking/json',
      columns: [
          { data: 'bagian', name: 'bagian' },
          { data: 'r_meeting', name: 'r_meeting' },
          { data: 'tanggal', name: 'tanggal' },
          { data: 'mulai', name: 'mulai' },
          { data: 'selesai', name: 'selesai' },
          { data:  'status', 
            render: function ( name, type ) {
              var text = "";
              var label = "";
              
              if (name == 1){
               text = "Meeting";
               label = "primary";
              } if (name == 2){
               text = "Sedang Meeting";
               label = "warning";
              } if (name == 3){
               text = "Batal";
               label = "danger";
              }
              return "<span class='badge badge-" + label + "'>"+ text + "</span>";
            }
          },
          { data: 'action', name: 'action', orderable: false, searchable : false, sWidth:'20%' },
      ]
	  });
	  setInterval( function () {
	    table.ajax.reload();
	}, 30000 );
	});

	function addForm(){
	   save_method = "add";
	   $('input[name=_method]').val('POST');
	   $('#modal-form').modal('show');
	   $('#modal-form form')[0].reset();            
	   $('.modal-title').text('Tambah Kategori');
	}

	function show(id){
	   save_method = "detail";
	   $('input[name=_method]').val('PATCH');
	   $('#modal-form form')[0].reset();
	   $.ajax({
	     url : "/admin/show/"+id+"/detail",
	     type : "GET",
	     dataType : "JSON",
	     success : function(data){
        //console.log(data.users.name);
	       $('#modal-form').modal('show');
	       $('.modal-title').text('Detail');
	       
	       $('#id').val(data.id);
         //$('#email').text($(this).data('email'));
	       $('#name').text((data.users.name));
	       $('#nohp').text((data.nohp));
	       $('#mulai').text((data.mulai));
         $('#selesai').text((data.selesai));
	       $('#tanggal').text((data.tanggal));
	       $('#bagian').text((data.bagian));
	       $('#r_meeting').text((data.r_meeting));
         $('#agenda').text((data.agenda));
         $('#peserta').text((data.peserta));
         $('#status').text((data.status));
         $('#created_at').text(moment(data.created_at).fromNow());
	       
	     },
	     error : function(){
	       alert("Tidak dapat menampilkan data!");
	     }
	   });
	}

  function deleteConfirmation(e) {
    var id = e.id;
    
    swal({
      title: 'Hapus Item?',
      text: "Anda YakinInin Menghapus Item Ini?",
      type: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya, lanjutkan..',
      showLoaderOnConfirm: true,
      preConfirm: function() {
      return new Promise(function(resolve) {
          $.ajax({
              type: 'GET',
              url : "/admin/booking-delete/"+id+"/delete",
              contentType: false,       
              cache: false,             
              processData:false,
          })
          .done(function(data){
              if(data.status == 'success'){
                  swal('Data Berhasil Dihapus ', data.message, 'success');
                  reloadtable();
              }else if(data.status == 'failed'){
                  swal('Info', 'Gagal', 'info');
              }
          })
          .fail(function(){
          swal('Oops...', 'Masalah pada jaringan, ulangi lagi !', 'error');
          });
      });
      },
      allowOutsideClick: false     
    });
    
  }

  function cancelm(e) {
    var id = e.id;
    //console.log(id);
    swal({
      title: 'Batal Meeting?',
      text: "Anda Yakin Membatalkan Meeting Ini?",
      type: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya, lanjutkan..',
      showLoaderOnConfirm: true,
      preConfirm: function() {
      return new Promise(function(resolve) {
          $.ajax({
              type: 'GET',
              url : "/admin/booking-batal/"+id+"/batal",
              contentType: false,       
              cache: false,             
              processData:false,
          })
          .done(function(data){
              if(data.status == 'success'){
                  swal('Meeting dibatalkan', data.message, 'success');
                  reloadtable();
              }else if(data.status == 'failed'){
                  swal('Info', 'Gagal', 'info');
              }
          })
          .fail(function(){
          swal('Oops...', 'Masalah pada jaringan, ulangi lagi !', 'error');
          });
      });
      },
      allowOutsideClick: false     
    });
    
  }

  function bmeeting(e) {
    var id = e.id;
    //console.log(id);
    swal({
      title: 'Undo Meeting?',
      text: "Kembalikan status meeting?",
      type: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya, lanjutkan..',
      showLoaderOnConfirm: true,
      preConfirm: function() {
      return new Promise(function(resolve) {
          $.ajax({
              type: 'GET',
              url : "/admin/booking-undo/"+id+"/undo",
              contentType: false,       
              cache: false,             
              processData:false,
          })
          .done(function(data){
              if(data.status == 'success'){
                  swal('Status meeting dikembalikan', data.message, 'success');
                  reloadtable();
              }else if(data.status == 'failed'){
                  swal('Info', 'Gagal', 'info');
              }
          })
          .fail(function(){
          swal('Oops...', 'Masalah pada jaringan, ulangi lagi !', 'error');
          });
      });
      },
      allowOutsideClick: false     
    });
    
  }
  
  function reloadtable(){
    $('#example1').DataTable().destroy();
      var table = $('#example1').DataTable({
      info: true,
      paging: true,
      ordering: true,
      retrieve: true,
      scrollY: '30vh',
      searching: true,
      autoWidth: true,
      processing: true,
      serverSide: true,
      lengthChange: true,
      ajax: '/admin/booking/json',
      columns: [
          { data: 'bagian', name: 'bagian' },
          { data: 'r_meeting', name: 'r_meeting' },
          { data: 'tanggal', name: 'tanggal' },
          { data: 'mulai', name: 'mulai' },
          { data: 'selesai', name: 'selesai' },
          { data:  'status',  
            render: function ( name, type ) {
              var text = "";
              var label = "";
              
              if (name == 1){
               text = "Meeting";
               label = "primary";
              } if (name == 2){
               text = "Sedang Meeting";
               label = "warning";
              } if (name == 3){
               text = "Batal";
               label = "danger";
              }
              return "<span class='badge badge-" + label + "'>"+ text + "</span>";
            }
          },
          { data: 'action', name: 'action', orderable: false, searchable : false, sWidth:'20%' },
      ]
    });
    $('#example1').DataTable().ajax.reload();
    location.reload();
  }
</script>

<script>
    $(function () {
      $('#datetimepicker3').datetimepicker({
          //format: 'HH:mm',  
          format: 'LT',  
          //use24hours: true
      });
      $('#datetimepickert').datetimepicker({
          //format: 'HH:mm',
          format: 'LT',
          //use24hours: true
      });
    });
  </script>
@endsection