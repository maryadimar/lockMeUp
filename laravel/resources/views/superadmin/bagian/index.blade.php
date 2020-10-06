@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="{{ asset('template/plugins/toastr/toastr.min.css') }}">
@endsection
@section('menuheader')
	<li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item active">Master Bagian</li>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-2">
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data bagian</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" id="quickForm" method="POST" action="/sa/bagian/save">
                @csrf
                <div class="card card-default">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Bagian</label>
                          <input type="text" name="nama_bagian" class="form-control">
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
     
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Master Bagian</h3>
          <div class="float-right">
            <button class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modal-default">
              Add Bagian
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nama Bagian</th>
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
<script src="{{ asset('template/plugins/toastr/toastr.min.js') }}"></script>
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
      ajax: '/sa/bagian/json',
      columns: [
          { data: 'nama_bagian', name: 'nama_bagian' },
         
          { data: 'action', name: 'action', orderable: false, searchable : false, sWidth:'20%' },
      ]
	  });
	  setInterval( function () {
	    table.ajax.reload();
	}, 30000 );
	});

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
      ajax: '/sa/bagian/json',
      columns: [
          { data: 'nama_bagian', name: 'nama_bagian' },
         
          { data: 'action', name: 'action', orderable: false, searchable : false, sWidth:'20%' },
      ]
    });
    $('#example1').DataTable().ajax.reload();
    location.reload();
  }

  function deleteConfirmation(e) {
    var id = e.id;
    
    swal({
      title: 'Hapus Item?',
      text: "Anda Yakin Ingin Menghapus Item Ini?",
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
              url : "/sa/bagian/"+id+"/delete",
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
</script>
@endsection