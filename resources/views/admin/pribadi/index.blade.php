@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="{{ asset('template/plugins/toastr/toastr.min.css') }}">
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
      
      <!-- modal -->
      <div class="modal fade" id="modall-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Booking Ruang Meeting</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" id="quickForm" method="POST" action="/admin/booking/save" name="myForm">
                @csrf
                <div class="card card-default">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                       <div class="form-group">
                          <label>PN</label>
                          <input type="text" name="pn" id="pn" class="form-control" placeholder="Input PN anda" data-inputmask='"mask": "99999999"' data-mask required>
                        </div>
                        <div class="form-group">
                          <label>No HP</label>
                          <input type="text" name="nohp" class="form-control" placeholder="Input NOHP anda" data-inputmask='"mask": "(999) 999-999999"' data-mask required>
                        </div>
                        <div class="form-group">
                          <label>Peserta (Internal / Eksternal Jumlah orang)</label>
                          <textarea name="peserta" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                          <label>Agenda</label>
                          <textarea name="agenda" class="form-control" required></textarea>
                        </div>
                        <div class="form-group ukur">
                          <label>Bagian</label>
                          <select class="form-control select2bs4" name="bagian" required>
                            <option selected="selected">TSI</option>
                            <option>ARK</option>
                            <option>HC</option>
                            <option>OJL</option>
                            <option>ADK</option>
                            <option>DJS</option>
                            <option>LOGISTIK</option>
                            <option>BRI LINK</option>
                            <option>RM</option>
                          </select>
                        </div>
                        <div class="form-group ukur">
                          <label>Ruangan Meeting</label>
                          <select class="form-control select2bs4" name="r_meeting" required>
                            <option value="Aula">Aula</option>
                            <option value="Lantai 2">Lantai 2</option>
                            <option value="Lantai 3">Lantai 3</option>
                            <option value="Lantai 4">Lantai 4</option>
                            <option value="Lantai 5">Lantai 5</option>
                            <option value="Lantai 8 (1)">Lantai 8 (1)</option>
                            <option value="Lantai 8 (2)">Lantai 8 (2)</option>
                            <option value="Lantai 9">Lantai 9</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Tanggal</label>
                          <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                            <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker4" required/>
                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Mulai Meeting</label>
                          <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                              <input type="text" name="mulai" class="form-control datetimepicker-input" data-target="#datetimepicker3" id="mulai" required />
                              <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="far fa-clock"></i></div>
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Selesai Meeting</label>
                          <div class="input-group date" id="datetimepickert" data-target-input="nearest">
                              <input type="text" name="selesai" class="form-control datetimepicker-input" data-target="#datetimepickert" id="selesai" required />
                              <div class="input-group-append" data-target="#datetimepickert" data-toggle="datetimepicker">
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
                  <button type="submit" class="btn btn-primary" onclick="validasi_input()">SIMPAN</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- end modal -->
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
      
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List Meeting</h3>
          <div class="float-right">
            <a href="/admin/booking/create-vicon-pribadi" class="btn btn-primary" >Create Booking</a>
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
                <th>Meeting ID</th>
                <th>PIC IT</th>
                <th>Aksi</th>
              </tr>
            </thead>  
            <tbody>
            @foreach ($data as $value)
              <tr>
                <td>{{ $value->bagian }}</td>
                <td>{{ $value->r_meeting }}</td>
                <td>{{ $value->tanggal }}</td>
                <td>{{ $value->mulai }}</td>
                <td>{{ $value->selesai }}</td>
                <td>
                  @if(!empty($value->meeting_id))
                    {{ $value->meeting_id }}
                  @else
                    {{ $value->meeting_idl }} (Join)
                  @endif
                </td>
                <td>{{ $value->pics }}</td>
                <td><a href="/admin/booking/{{ $value->id }}/detailvicon-pribadi" class="btn-action btn btn-primary"><i class=" fa fa-eye"></i></a> <a href="/admin/booking/{{ $value->id }}/delete-vicon-pribadi" class="btn-action btn btn-danger" Onclick="return ConfirmDelete();"><i class=" fa fa-trash"></i></a></td>
              </tr>
            @endforeach
            
           </tbody>
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
  $(document).ready(function() {
    setInterval(function() {
      cache_clear()
    }, 90000);
  });

  function cache_clear() {
    window.location.reload(true);
  }
</script>

<script>
    function ConfirmDelete()
    {
      var x = confirm("Yakin Hapus Item Ini?");
      if (x)
          return true;
      else
        return false;
    }
</script>

<script type="text/javascript">
  $(function() {
    var table = $('#example1').DataTable({
      "paging": true,
      "autoWidth": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "processing": true,
      "retrieve": true,
    });
  });

  function addForm(){
     save_method = "add";
     $('input[name=_method]').val('POST');
     $('#modal-form').modal('show');
     $('#modal-form form')[0].reset();            
     $('.modal-title').text('Tambah Kategori');
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

               text = "Booking Meeting";
               label = "primary";

              } if (name == 2){
               
               text = "Sedang Meeting";
               label = "warning";

              } if (name == 3){
               
               text = "Batal";
               label = "danger";

              } if (name == 11){
               
               text = "Booking Room & Vicon";
               label = "primary";

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