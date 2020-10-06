@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="/template/plugins/toastr/toastr.min.css">
@endsection
@section('menuheader')
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Antrian Ku</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- The time line -->
    <div class="timeline">
      @if($antrianku->count() > 0)
        @foreach ($antrianku as $value)
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
              <h3 class="timeline-header"><a href="#">Dibuat Oleh : {{ Auth::User()->name }}</a> {{ $value->created_at->diffForHumans() }} - <strong>{{ $value->bagian }}</strong></h3>

              <div class="timeline-body">
                <strong class="text-danger">Peserta </strong> : <br> 
                  {!! nl2br($value->peserta) !!} <br>
                <strong class="text-danger">Agenda</strong> : <br> {!! nl2br($value->agenda) !!} <br>
                <strong class="text-danger">Lokasi</strong> : <br> {!! nl2br($value->r_meeting) !!} <br>
                <strong class="text-danger">Tanggal</strong>: <br> {{ $value->tanggal }}
              </div>
              <div class="timeline-footer">
                @if($value->status == 4)
                  <a class="btn btn-success btn-sm">Pending</a>
                @endif
                <a class="btn btn-danger btn-sm" href="/user/booking-delete/{{ $value->id }}/delete" onclick="return deleteConfirmation()">Delete</a>
                <button type="button" class="btn btn-danger btn-sm toastrDefaultError">
                  Batalkan Meeting
                </button>
              </div>
            </div>
          </div>
        @endforeach
      @else
          @include('member.layout.nihilI')
      @endif
      <div class="float-right">
        {{ $antrianku->links() }}   
      </div>
    </div>
  </div>
  <!-- /.col -->
</div>
@endsection

@section('js')
<script src="/template/plugins/toastr/toastr.min.js"></script>
<script>
  function deleteConfirmation(e) {
    var pilihan=confirm("Yakin Item ini ingin dihapus");

    if(pilihan){

      return true

    }else{

      return false

    }
    
  }
</script>
<script>
  $('.toastrDefaultError').click(function() {
    toastr.error('Harap hubungi Administator, untuk melakukan pembatalan meeting yang telah dibooking [logistik].')
  });
</script>
@endsection
