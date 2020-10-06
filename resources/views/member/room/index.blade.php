@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="/template/plugins/toastr/toastr.min.css">
@endsection
@section('titleheader')
  <h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
      Booking Room
    </button>   
    @include('member.booking')
    
  </h1>
@endsection
@section('menuheader')
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Timeline</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    @foreach ($errors->all() as $error)
      <center>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> {{ $error }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </center>
    @endforeach
    <!-- The time line -->
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
              <h3 class="timeline-header"><a href="#">Dibuat Oleh : {{ Auth::User()->name }}</a> {{ $value->created_at->diffForHumans() }} - <strong>{{ $value->bagian }}</strong></h3>

              <div class="timeline-body">
                <strong class="text-danger">Peserta </strong> : <br> 
                  {!! nl2br($value->peserta) !!} <br>
                <strong class="text-danger">Agenda</strong> : <br> {!! nl2br($value->agenda) !!} <br>
                <strong class="text-danger">Lokasi</strong> : <br> {!! nl2br($value->r_meeting) !!} <br>
                <strong class="text-danger">Tanggal</strong>: <br> {{ $value->tanggal }}
              </div>
             
              <div class="timeline-footer">
                @if($value->status == 1)
                  <a class="btn btn-primary btn-sm">Booking Room Meeting</a>
                @elseif($value->status == 2)
                  <a class="btn btn-success btn-sm">Sedang Meeting</a>
                @elseif($value->status == 3)
                  <a class="btn btn-danger btn-sm">Batal</a>
                @elseif($value->status == 4)
                  <a class="btn btn-danger btn-sm">Selesai</a>
                @elseif($value->status == 11)
                  <a class="btn btn-primary btn-sm">Booking Room & Vicon</a>
                @else
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
          @include('member.layout.nihil')
      @endif
      <div class="float-right">
        {{ $meets->links() }}   
      </div>
    </div>
  </div>
  <!-- /.col -->
</div>
@endsection
@section('js')
  
  <script src="/template/plugins/toastr/toastr.min.js"></script>
  <script>
    $(document).ready(function(){
      
      $('#quickForm').submit(function(e){
      e.preventDefault();
      // var formData = new FormData(this);
      var mulai   = $('#quickForm').find('#mulai').val();
      var selesai = $('#quickForm').find('#selesai').val();

      if(selesai < mulai){
        
        toastr.error('Jam selesai meeting lebih kecil dari jam mulai meeting.')
        return (false);
        //sweetAlert("jam selesai lebih kecil dari jam mulai");
      }else{
         $.ajax({
            type: 'POST',
            url: '/user/booking/save',
            data: {
                "_token": "{{ csrf_token() }}",
                "nohp": $('#quickForm').find('#nohp').val(),
                "agenda": $('#quickForm').find('#agenda').val(),
                "bagian": $('#quickForm').find('#bagian').val(),
                "r_meeting": $('#quickForm').find('#r_meeting').val(),
                "tanggal": $('#quickForm').find('#tanggal').val(),
                "mulai": $('#quickForm').find('#mulai').val(),
                "selesai": $('#quickForm').find('#selesai').val(),
                "peserta": $('#quickForm').find('#peserta').val()
            }, 
            success: function (data) {
              if(data.status == 'sukses'){
                Swal.fire({
                  icon: 'success',
                  title: data.title,
                  text: data.message,
                  showConfirmButton: false,
                  timer: 5000
                }).then(function(){ 
                   location.reload();
                })
              }else if(data.status == 'gagal'){
                Swal.fire({
                  icon: 'Success',
                  title: data.title,
                  text: data.message,
                  timer: 3000 
                }).then(function(){ 
                   location.reload();
                })
              }else{
                Swal.fire({
                  icon: 'failed',
                  title: 'Gagal',
                  text: data.message,
                  timer: 3000
                }).then(function(){ 
                   location.reload();
                })
              }
              
            }
          });  
        }
      });
    });
  </script>
  
  <script>
    function show(id){
      
     save_method = "detail";
     $('input[name=_method]').val('PATCH');
     $('#modal-formvicon form')[0].reset();
     $.ajax({
       url : "/user/form/"+id+"/vicon",
       type : "GET",
       dataType : "JSON",
       success : function(data){
        //console.log(data.id);
         $('#modal-formvicon').modal('show');
         $('.modal-title').text('Form Vicon');
         
         $('#id').val(data.id);
       },
       error : function(){
         alert("Tidak dapat menampilkan data!");
       }
     });
    }

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
  <script>
    $('.toastrDefaultError').click(function() {
      toastr.error('Harap hubungi Administator, untuk melakukan pembatalan meeting yang telah dibooking [logistik].')
    });
  </script>
  <script>
    // angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
      $(document).ready(function() {
        setTimeout(function(){
          $('#global-modal').modal('show');
        }, 5000);

        setTimeout(function(){
          $('#global-modal').modal('hide');
        }, 3000);
      });
    // angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
    
  </script>
@endsection