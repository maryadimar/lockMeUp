@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="/template/plugins/toastr/toastr.min.css">
@endsection
@section('menuheader')
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Search No Result</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- The time line -->
    <div class="timeline">
      <div>
          <div class="timeline-item">
            <div class="col-md-4 offset-4">
              <img src="/img/cari.png" class="img-fluid center">
              <center>
                <h4>
                    (<span class="text-info">{{ $q }}</span>) Tidak ditemukan!  
                </h4>
              </center>
            </div>
          </div>
        </div>
      <div class="float-right">
        <a href="/user/booking-search">Kembali</a>
      </div>
    </div>
  </div>
  <!-- /.col -->
</div>
@endsection
@section('js')

@endsection