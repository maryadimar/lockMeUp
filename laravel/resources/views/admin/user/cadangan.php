@extends('layouts.app')
@section('menuheader')
	<li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item active">User</li>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-2">
      <button class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modal-default">
        Create User
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
                          <label>Nama</label>
                          <input type="text" name="name" class="form-control" placeholder="Input nama anda">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Input email anda">
                        </div>
                        <div class="form-group">
                          <label>Bagian</label>
                          <select class="form-control select2bs4" style="width: 100%;" name="bagian">
                            <option value="TSI">TSI</option>
                            <option value="ARK">ARK</option>
                            <option value="HC">HC</option>
                            <option value="OJL">OJL</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" id='p' name="password" class="form-control" placeholder="Input password anda">
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
	      ajax: '/admin/user/data',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'nohp', name: 'nohp' },
            { data: 'email', name: 'email' },
            { data: 'bagian', name: 'bagian' },
            { data: 'r_meeting', name: 'r_meeting' },
            { data: 'tanggal', name: 'tanggal' },
            { data: 'waktu', name: 'waktu' },
            { data:  'status', render: function ( data, type ) {
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
	});

	function addForm(){
	   save_method = "add";
	   $('input[name=_method]').val('POST');
	   $('#modal-form').modal('show');
	   $('#modal-form form')[0].reset();            
	   $('.modal-title').text('Tambah User');
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
	       $('.modal-title').text('Aksi');
	       
	       $('#id').val(data.id);
	       $('#name').val(data.name);
	       $('#nohp').val(data.nohp);
	       $('#email').val(data.email);
	     },
	     error : function(){
	       swal("Error!", "Data Tidak Tampil", "error");
	     }
	   });
	}

  function deleteData(id) {
      swal({
          title: "Delete?",
          text: "Please ensure and then confirm!",
          type: "warning",
          showCancelButton: !0,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          reverseButtons: !0
      }).then(function (e) {

          if (e.value === true) {
              var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

              $.ajax({
                  type: 'POST',
                  url: "{{url('/delete')}}/" + id,
                  data: {_token: CSRF_TOKEN},
                  dataType: 'JSON',
                  success: function (results) {

                      if (results.success === true) {
                          swal("Done!", results.message, "success");
                      } else {
                          swal("Error!", results.message, "error");
                      }
                  }
              });

          } else {
              e.dismiss;
          }

      }, function (dismiss) {
          return false;
      })
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