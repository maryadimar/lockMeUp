@extends('layouts.appmeet')
@section('css')
  <link rel="stylesheet" href="/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<div class="col-lg-10 offset-lg-1">
	<center>
		<h2><b>DAFTAR BOOKING</b></h2>
	</center>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List Meeting</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
        </button>
      </div>
    </div>
        <!-- /.card-header style="height: 300px; overflow: auto; overflow-x:auto;"-->
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No hp</th>
                <th>Bagian</th>
                <th>Ruangan</th>
                <th>Tanggal</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>PIC</th>
                <th>Meeting ID</th>
              </tr>
            </thead>
            <tbody>
              @if(count($pribadi) > 0)
                @foreach($pribadi as $val)
                  <tr>
                    <td>{{ $val->nohp }}</td>
                    <td>{{ $val->bagian }}</td>
                    <td>{{ $val->r_meeting }}</td>
                    <td>{{ $val->tanggal }}</td>
                    <td>{{ $val->mulai }}</td>
                    <td>{{ $val->selesai }}</td>
                    <td>{{ $val->pic }}</td>
                    <td>
                      @if (!empty($val->meeting_id))
                        {{ $val->meeting_id }} (Host)
                      @else
                        {{ $val->meeting_idl }} (Join)
                      @endif
                    </td>
                  </tr>
                @endforeach
              @else
                <td colspan="8">
                  <center>Data Kosong</center>
                </td>    
              @endif
            </tbody>
          </table>
          </div>  
          {{ $pribadi->links() }}         
        </div>
      </div>
      <a href="/" class="float-right">Kembali</a>
    </div>
  </div>
  
@endsection
@section('js')
<!-- DataTables -->
<script src="/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script>
  $(function () {
    $('#example1x').DataTable({
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
</script>

<script type="text/javascript">
	$(document).ready(function() {
	  setInterval(function() {
	    cache_clear()
	  }, 90000);
	});

	function cache_clear() {
	  window.location.reload(true);
	  //$("#divToReload").load(location.href+" #divToReload>*","");
	  // window.location.reload(); use this if you do not remove cache
	}
</script>

@endsection