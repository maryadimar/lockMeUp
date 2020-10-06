@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="{{ asset('template/plugins/toastr/toastr.min.css') }}">
@endsection
@section('menuheader')
	<li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item active">Booking Ruang Meeting</li>
@endsection
@section('content')
  <div class="row">
    <div class="col-md-12">
      <form role="form" id="quickForm" method="POST" action="/admin/booking/save" name="myForm">
        @csrf
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>No HP</label>
                  <input type="text" name="nohp" class="form-control" placeholder="Input NOHP anda" data-inputmask='"mask": "(999) 999-999999"' data-mask required>
                </div>
                
                <div class="form-group">
                  <label>Agenda</label>
                  <textarea name="agenda" class="form-control" required></textarea>
                </div>
                <div class="form-group ukur">
                  <label>Bagian</label>
                  <select class="form-control select2bs4" name="bagian" required>
                    @foreach ($bagian as $value)
                      <option>{{ $value->nama_bagian }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group ukur">
                  <label>Ruangan Meeting</label>
                  <select class="form-control select2bs4" name="r_meeting" required>
                    <option value="Aula">Aula Dasar</option>
                    <option value="Lantai 2">R. Rapat LT 2</option>
                    <option value="Lantai 3">R. Rapat LT 3</option>
                    <option value="Lantai 4">R. Rapat LT 4</option>
                    <option value="R. Wawancara I">R. Wawancara I</option>
                    <option value="R. Wawancara II">R. Wawancara II</option>
                    <option value="Lantai 8 A">R. Rapat LT 8 A</option>
                    <option value="Lantai 8 B">R. Rapat LT 8 B</option>
                    <option value="Lantai 8 CLF">R. Rapat LT 8 CLF</option>
                    <option value="Aula LT 9">Aula Lantai 9</option>
                    <option value="Lantai 10 A">R. Rapat LT 10 A</option>
                    <option value="Lantai 10 B">R. Rapat LT 10 B</option>
                    <option value="Lantai 10 C">R. Rapat LT 10 C</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <div class="input-group date" id="datetimepicker10" data-target-input="nearest">
                    <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker10" required/>
                    <div class="input-group-append" data-target="#datetimepicker10" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Mulai Meeting</label>
                  <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" name="mulai" class="form-control datetimepicker-input" data-target="#timepicker" id="mulai" required />
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Selesai Meeting</label>
                  <div class="input-group date" id="timepicker2" data-target-input="nearest">
                      <input type="text" name="selesai" class="form-control datetimepicker-input" data-target="#timepicker2" id="selesai" required />
                      <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Peserta (Internal / Eksternal Jumlah orang)</label>
                  <textarea name="peserta" class="form-control" required></textarea>
                </div>
              </div>
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary" onclick="return validasi_input()">SIMPAN</button>
        </div>
      </form>
    </div>
  </div>
 @endsection

@section('js')
<script src="{{ asset('template/plugins/toastr/toastr.min.js') }}"></script>
<script type="text/javascript">

  function validasi_input(){
    var mulai   = document.getElementById('mulai').value;
    var selesai = document.getElementById('selesai').value;
    var number  = /^[0-9]+$/;

    if(selesai <= mulai){
      
      toastr.error('Jam selesai meeting lebih kecil dari jam mulai meeting.')
      return (false);
      
    }else{
       $.ajax({
          url: '/admin/booking/save',
          type: 'POST',
          data: {
              "_token": "{{ csrf_token() }}",
              "pn": $('input[name=pn]').val(),
              "nohp": $('input[name=nohp]').val(),
              "peserta": $('input[name=peserta]').val(),
              "agenda": $('input[name=agenda]').val(),
              "bagian": $('input[name=bagian]').val(),
              "r_meeting": $('input[name=r_meeting]').val(),
              "tanggal": $('input[name=tanggal]').val(),
              "mulai": $('input[name=mulai]').val(),
              "selesai": $('input[name=selesai]').val()
          }, 
          success: function (result) {
            console.log(result);
          }
      });  
    }
    document.getElementById('quickForm').submit(); 
  }

</script>
@endsection