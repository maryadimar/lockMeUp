@extends('layouts.appmeet')

@section('content')
<div class="col-lg-10 offset-lg-1">
	<center>
		<h2>
      <b>
        DAFTAR BOOKING
      </b>
    </h2>
	</center>
	<div class="card">
        <div class="card-header">
          <h3 class="card-title">Lantai 4</h3>
        </div>
        <!-- /.card-header -->
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
              </tr>
            </thead>
            <tbody>
              @if(count($lantai4) > 0)
                @foreach($lantai4 as $val)
                  <tr>
                    <td>{{ $val->nohp }}</td>
                    <td>{{ $val->bagian }}</td>
                    <td>{{ $val->r_meeting }}</td>
                    <td>{{ $val->tanggal }}</td>
                    <td>{{ $val->mulai }}</td>
                    <td>{{ $val->selesai }}</td>
                    <td>{{ $val->users->name }}</td>
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
        {{ $lantai4->links() }} 
     </div>
	<a href="/" class="float-right">Kembali</a>
</div>
@endsection
@section('js')

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