@extends('layouts.app')
@section('css')
<style>
   input, textarea{
      background-color: transparent; 
      border: 0px solid; 
   }
</style>
@endsection

@section('content')
  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-exclamation-triangle"></i>
        Form Registrasi Vicon
      </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> Mohon untuk diperhatian hal-hal sbb :</h5>
          1. Infokan ke E-Chanel (TSI) kegiatan Vicon minimal H-1 <br>
          2. Ruangan Yang Anda Booking Untuk Vicon {{ $vicon->r_meeting }} <br>
          3. Tentukan Meeting ID : ex. 573-989-1795 
      </div>
      
      <form role="form" id="quickForm" method="POST" action="/user/form/{{$vicon->id}}/vicon/save">
        @csrf
        <div class="card card-default">
          
          <div class="col-md-12">

            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email Anda" required>
            </div>

            <div class="form-group">
              <label>Meeting ID</label>
              <select class="form-control select2bs4" name="meeting_id" id="meeting_id" required onchange="meetingidOther(this.value);">
                @foreach ($meetids as $value) 
                  <option value="{{ $value->meeting_id }}">{{ $value->meeting_id }}</option>
                @endforeach
                <option value="others">Lainnya</option>
              </select>           
            </div>
            <div class="form-group">        
              <input type="text" name="meeting_idl" id="meeting_idl" class="form-control" placeholder="Meeting ID Anda" required>
            </div>
            <div class="form-group">
              <label>Vicon Dengan Siapa ? (Sebutkan Cabangnya) </label>
              <textarea name="peserta_cabang" id="peserta_cabang" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label>Pesertanya Siapa Saja ? (Sebutkan Jabatan) </label>
              <textarea name="peserta_orang" id="peserta_orang"  class="form-control" required></textarea>
            </div>

            <div class="form-group">
              <label>PIC Vicon (Bagian Yang Mengadakan)</label>
              <input type="text" name="pic" id="pic" class="form-control" placeholder="PIC Vicon" required>
            </div>

            <div class="form-group">
              <label>Nomer Surat/Nodin Kegiatan Vicon</label>
              <input type="text" name="no_surat" id="no_surat" class="form-control" placeholder="Nomor Surat" required>
            </div>

          </div>
         
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
           <button type="submit" class="btn btn-warning float-right"> Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
       
@endsection
@section('js')
<script>
  function meetingidOther(val){
   var element=document.getElementById('meeting_idl');
   if(val=='others')
     element.style.display='block';
   else  
     element.style.display='none';
  }
</script> 
@endsection