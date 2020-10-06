@extends('layouts.appmeet')

@section('content')
<div class="col-lg-10 offset-lg-1">
	<center>
		<h2>Ruang Meeting Lantai 8 (2)</h2>
	</center>
	<div class="timeline">
		@if($meets->count() > 0)
	        @foreach ($meets as $value)
	        <!-- timeline time label -->
	          <div class="time-label">
	            <span class="bg-red">{{ $value->tanggal }} </span>
	          </div>
	          <!-- /.timeline-label -->
	          <!-- timeline item -->
	          <div>

	            <i class="fas fa-clock bg-gray"></i>

	            <div class="timeline-item">
	              <span class="time"><i class="fas fa-clock"></i> {{ $value->mulai }} - {{ $value->selesai }}</span>
	              <h3 class="timeline-header">{{ $value->created_at->diffForHumans() }} - <strong>{{ $value->bagian }}</h3>

	              <div class="timeline-body">
	                <strong class="text-danger">Peserta </strong> : <br> 
	                  {!! nl2br($value->peserta) !!} <br>
	                <strong class="text-danger">Agenda</strong> : <br> {!! nl2br($value->agenda) !!} <br>
	                <strong class="text-danger">Lokasi</strong> : <br> {!! nl2br($value->r_meeting) !!}
	              </div>
	              <div class="timeline-footer">
	                @if($value->status == 1)
	                  <a class="btn btn-primary btn-sm">Meeting</a>
	                @elseif($value->status == 2)
	                  <a class="btn btn-success btn-sm">Sedang Meeting</a>
	                @else
	                  <a class="btn btn-danger btn-sm">Selesai</a>
	                @endif
	                
	              </div>
	            </div>
	          </div>
	        @endforeach
	      @else
	      		<div class="timeline">
	      			<div class="time-label">
	      				<span class="bg-red">Belum Ada Meeting</span>
	      			</div>
	      			<div>
		      			<i class="fas fa-clock bg-gray"></i>
		      			<div class="timeline-item">
				          	<center>
				          		<img src="/img/cari.png" class="profle-user-img" height="300" width="400">
				          	</center>
				        </div>	
				    </div>
	      		</div>	
	      @endif
	</div>

	<div class="timeline">
	  <!-- timeline time label -->
	  <div class="time-label">
	    <span class="bg-red">Antrian :</span>
	  </div>

	  <div>

	  	@if (count($meetlt82))
			@foreach ($meetlt82 as $valuee)
		   		<i class="fas fa-user bg-green"></i>
			    <div class="timeline-item mySlides">
			      	<span class="time"><i class="fas fa-clock"></i> {{ $valuee->created_at->diffForHumans() }}</span>
			      <h3>	
			      	<span class="timeline-header no-border"><a href="#">{{ $valuee->r_meeting }}</a> {{ $valuee->tanggal }} - {{ $valuee->bagian }} - ({{ $valuee->mulai }} - {{ $valuee->selesai }})</span>
			      </h3>
			    </div>
			@endforeach
		@else
			<i class="fas fa-user bg-green"></i>
		    <div class="timeline-item">
		      <h1 class="timeline-header no-border"><a href="#">Kosong</a> Belum ada antrian meeting</h1>
		    </div>
	   	@endif
	  </div>
	</div>
	<a href="/" class="float-right">Kembali</a>
</div>
@endsection
@section('js')
<script>
var myIndex = 0;
carousel();

	function carousel() {
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  for (i = 0; i < x.length; i++) {
	    x[i].style.display = "none";  
	  }
	  myIndex++;
	  if (myIndex > x.length) {myIndex = 1}    
	  x[myIndex-1].style.display = "block";  
	  setTimeout(carousel, 5000); // Change image every 2 seconds
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
	  setInterval(function() {
	    cache_clear()
	  }, 60000);
	});

	function cache_clear() {
	  window.location.reload(true);
	  //$("#divToReload").load(location.href+" #divToReload>*","");
	  // window.location.reload(); use this if you do not remove cache
	}
</script>
@endsection