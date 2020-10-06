
@extends('layouts.app')
@section('menuheader')
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Booking</li>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-2">
      <button class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modal-default">
        Tambah User
      </button>
      @include('admin.user.detail')
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" id="quickForm" method="POST" action="/admin/add/user">
                @csrf
                <div class="card card-default">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>PN</label>
                          <input type="text" name="pn" class="form-control" placeholder="Input PN" data-inputmask='"mask": "99999999"' data-mask required>
                        </div>
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="name" class="form-control" placeholder="Input nama anda" required>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Input email anda" required>
                        </div>
                        <div class="form-group">
                          <label>Bagian</label>
                          <select class="form-control select2bs4" style="width: 100%;" name="bagian" required>
                            @foreach ($bagian as $value)
                              <option value="{{ $value->nama_bagian }}">{{ $value->nama_bagian }}</option>
                            @endforeach 
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" id='p' name="password" class="form-control" placeholder="Input password anda" required>
                          <input type='button' value ='generate' class="float-right" onclick='document.getElementById("p").value = Password.generate(10)'>
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
    </div>
    <!-- /.col -->
    <div class="col-md-12">
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
              <th>Email</th>
              <th>Bagian</th>
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
 @endsection

@section('js')
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
        ajax: '/admin/user/json',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'bagian', name: 'bagian' },
            { data:  'actived', render: function ( data, type ) {
              var text = "";
              var label = "";
              if (data == 1){
               text = "Active";
               label = "primary";
              }else{
                text = "Suspend";
                label = "danger";              
              } 
                return "<span class='badge badge-" + label + "'>"+ text + "</span>";
              }
             },
            { data: 'action', name: 'action', orderable: false, searchable : false },
        ]
    });
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
         url : "/admin/user/"+id+"/detail",
         type : "GET",
         dataType : "JSON",
         success : function(data){
           $('#modal-form').modal('show');
           $('.modal-title').text('Detail');
           
           $('#id').val(data.id);
           $('#pn').val(data.pn);
           $('#name').val(data.name);
           $('#email').val(data.email);
           $('#bagian').val(data.bagian);
           $('#actived').val(data.actived);
         },
         error : function(){
           alert("Tidak dapat menampilkan data!");
         }
       });
    }

    function changepassword(id){
      console.log(name);
       save_method = "changepassword";
       $('input[name=_method]').val('PATCH');
       $('#modal-formpwd form')[0].reset();
       $.ajax({
         url : "/admin/user/"+id+"/detailpwd",
         type : "GET",
         dataType : "JSON",
         success : function(data){
           $('#modal-formpwd').modal('show');
           $('.modal-title').text('Change Password');
           
           $('#id').val(data.id);
           $('#password').val(data.password);
         },
         error : function(){
           alert("Tidak dapat menampilkan data!");
         }
       });
    }
  
  function active(e){
    var id = e.id;
    //console.log(id);
    swal({
      title: 'Aktifkan User!',
      text: "Anda Yakin Mengaktikan User Ini?",
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
              url : "/admin/user/"+id+"/active",
              contentType: false,       
              cache: false,             
              processData:false,
          })
          .done(function(data){
              if(data.status == 'success'){
                  swal('User Berhasil Di Aktifkan ', data.message, 'success');
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

  function nonactive(e) {
    var id = e.id;
    //console.log(id);
    swal({
      title: 'Non Aktifkan User!',
      text: "Anda Yakin Menonaktikan User Ini?",
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
              url : "/admin/user/"+id+"/nonactive",
              contentType: false,       
              cache: false,             
              processData:false,
          })
          .done(function(data){
              if(data.status == 'success'){
                  swal('User Berhasil Di Non Aktifkan ', data.message, 'success');
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
        ajax: '/admin/user/json',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'bagian', name: 'bagian' },
            { data: 'actived', render: function ( data, type ) {
              var text = "";
              var label = "";
              if (data == 1){
               text = "Active";
               label = "primary";
              }else{
                text = "Suspend";
                label = "danger";              
              } 
                return "<span class='badge badge-" + label + "'>"+ text + "</span>";
              }
             },
            { data: 'action', name: 'action', orderable: false, searchable : false },
        ]
    });
      $('#example1').DataTable().ajax.reload();
  }
</script>
<script type="text/javascript">
  var Password = {
 
  _pattern : /[a-zA-Z0-9_\-\+\.]/,
  
  
  _getRandomByte : function()
  {
    // http://caniuse.com/#feat=getrandomvalues
    if(window.crypto && window.crypto.getRandomValues) 
    {
      var result = new Uint8Array(1);
      window.crypto.getRandomValues(result);
      return result[0];
    }
    else if(window.msCrypto && window.msCrypto.getRandomValues) 
    {
      var result = new Uint8Array(1);
      window.msCrypto.getRandomValues(result);
      return result[0];
    }
    else
    {
      return Math.floor(Math.random() * 256);
    }
  },
  
  generate : function(length)
  {
    return Array.apply(null, {'length': length})
      .map(function()
      {
        var result;
        while(true) 
        {
          result = String.fromCharCode(this._getRandomByte());
          if(this._pattern.test(result))
          {
            return result;
          }
        }        
      }, this)
      .join('');  
  }    
    
};
</script>
@endsection