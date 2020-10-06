@extends('layouts.appmeet')
@section('css')
<style>
	table {
	  height: 120px;
	  display: block;
	}
</style>
@endsection
@section('content')
<body onload="startTime();">
<div class="col-lg-10 offset-lg-1">
	<div class="row">
		<div class="col-md-9">
			<div class="card">
			  <div class="card-header border-1" style="padding-top: 30px; padding-bottom: 30px;">
			    <h1 class="card-title">Antrian</h1> <span class="float-right badge bg-info">{{ date('d/m/yy')}}</span>
			    <div class="card-tools">
			    </div>
			  </div>
			  <div class="card-body table-responsive p-0">
			  	<ul class="products-list product-list-in-card pl-5 pr-2" style="padding-top: 100px; padding-bottom: 115px;">
			  		@if (!empty($aula))
			      		@foreach ($aula as $value)
			      		<li class="item mySlides1">
							<div class="product-img">
								{{ $value->bagian }}
							</div>
							<div class="product-info">
							  <a href="#" class="product-title">{{ $value->nohp }}
							  	@if ($value->status == 1)
				        			<span class="badge bg-primary float-right">Booking</span>
				        		@endif
				        		@if($value->status == 2)
				        			<span class="badge bg-warning float-right">Sedang Meeting</span>
				        		@endif
				        		@if($value->status == 3)
				        			<span class="badge bg-danger float-right">Batal</span>
				        		@endif
							  </a>
							  <span class="product-description">
							    {{ $value->tanggal }} - <strong>{{ $value->mulai }}</strong>
							  </span>
							</div>
						</li>
						@endforeach
					@else
						<td>Tidak Ada Booking</td>
			      	@endif
				</ul>
			  </div>	  
			</div>
		</div>
		

		<div class="col-md-3">
			<div class="info-box mb-3 bg-info">
				<div class="info-box-content">
					<center>
						<span class="info-box-text">Info Hari Ini : {{ date('d/m/yy') }}</span>
						<h5>
							<span id="txt"></span>
						</h5>
					</center>
				</div>
			</div>
		<!-- Info Boxes Style 2 -->
			<div class="info-box mb-3 bg-warning">
				<span class="info-box-icon"><i class="fas fa-tag"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Sedang Meeting</span>
					<span class="info-box-number">{{ $sedangmeeting }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
		<!-- /.info-box -->
			<div class="info-box mb-3 bg-info">
				<span class="info-box-icon"><i class="far fa-heart"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Booking Meeting</span>
					<span class="info-box-number">{{ $bookingmeeting }}</span>
				</div>
				<!-- /.info-box-content -->
			</div>
		<!-- /.info-box -->
			<div class="info-box mb-3 bg-danger">
				<span class="info-box-icon"><i class="fas fa-ban"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Batal</span>
					<span class="info-box-number">{{ $batalmeeting }}</span>
				</div>
			<!-- /.info-box-content -->
			</div>
		</div>
		<a href="/" class="btn btn-info">Kembali</a>
	</div>
</div>
@endsection
@section('js')
<script>
var myIndex = 0;
carousel();

	function carousel() {
	  var i;
	  var x = document.getElementsByClassName("mySlides1");
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
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
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
	}
</script>
@endsection