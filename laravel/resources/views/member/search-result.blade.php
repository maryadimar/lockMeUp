@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="/template/plugins/toastr/toastr.min.css">
@endsection
@section('menuheader')
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Search Result</li>
  <li class="breadcrumb-item active"><a href="/user/booking-search">Kembali</a></li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- The time line -->
    <div class="timeline">
      @foreach ($search as $value)
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
            <h3 class="timeline-header"><a href="#">Dibuat Oleh : {{ Auth::User()->name }}</a> {{ $value->created_at->diffForHumans() }}</h3>

            <div class="timeline-body">
              <strong class="text-danger">Peserta </strong> : <br> 
                {!! nl2br($value->peserta) !!} <br>
              <strong class="text-danger">Agenda</strong> : <br> {!! nl2br($value->agenda) !!} <br>
              <strong class="text-danger">Lokasi</strong> : <br> {!! nl2br($value->r_meeting) !!}
            </div>
            <div class="timeline-footer">
              {{-- @if($value->status == 1)
                <a class="btn btn-primary btn-sm">Meeting</a>
              @elseif($value->status == 2)
                <a class="btn btn-success btn-sm">Sedang Meeting</a>
              @else
                <a class="btn btn-danger btn-sm">Selesai</a>
                  @endif --}}
            </div>
          </div>
        </div>
      @endforeach
      
      <div class="float-right">
        <div class="row">
          {{ $search->links() }}
        </div>
      </div>
    </div> 
  </div>
  <!-- /.col -->
</div>
@endsection
@section('js')

@endsection