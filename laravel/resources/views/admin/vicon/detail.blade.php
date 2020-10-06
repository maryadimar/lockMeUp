@extends('layouts.app')
@section('content')
<div class="timeline">

  <div class="time-label">
    <span class="bg-red">{{ $meet->tanggal }} </span>
  </div>
  <!-- /.timeline-label -->
  <!-- timeline item -->
  <div>

    <i class="fas fa-clock bg-gray"></i>

    <div class="timeline-item">

      <span class="time"><i class="fas fa-clock"></i> {{ $meet->mulai }} - {{ $meet->selesai }}</span>
      <h3 class="timeline-header"><a href="#">Dibuat Oleh : </a> {{ $meet->created_at->diffForHumans() }} - <strong>{{ $meet->bagian }}</strong></h3>
      <form action="/admin/booking/{{ $meet->id }}/detailvicon/save-pic" method="POST">
      @csrf
      <div class="timeline-body">
        <div class="col-md-8">
          <strong class="text-danger"> Peserta Cabang </strong> :
          <textarea class="form-control" cols="2" name="peserta_cabang">{!! nl2br($meet->peserta_cabang) !!}</textarea>
        </div> 
        <br>
        
        <div class="col-md-8">
          <strong class="text-danger"> Peserta Orang </strong> :
          <textarea class="form-control" cols="2" name="peserta_orang">{!! nl2br($meet->peserta_orang) !!}</textarea>
        </div> 
        <br>
        <div class="col-md-8"> 
          <strong class="text-danger">Agenda</strong> :
          <textarea class="form-control" rows="2" name="agenda">{!! nl2br($meet->agenda) !!}</textarea>
        </div>
        <hr>

        <div class="row invoice-info">
        
        <!-- /.col -->
        <div class="col-md-4 invoice-col">
          <address>
            <div class="col-md-12">
              <strong class="text-danger">Email</strong> : <br> 
              <input type="email" name="email" value="{{ $meet->email }}" class="form-control"> 
              <br>
              <strong class="text-danger">Meeting ID</strong> : <br> 
              @if(!empty($meet->meeting_id))

                <select class="form-control select2bs4" name="meeting_id" required>
                  <option>{{ $meet->meeting_id }}</option>
                  <hr>
                  @foreach($meetingId as $value)
                    <option value="{{ $value->meeting_id }}">{{ $value->meeting_id }}</option>
                  @endforeach
                </select>
                
              @else
                <input type="text" name="meeting_idl" value="{{ $meet->meeting_idl }}" class="form-control"> 
              @endif
             <br>
             <strong class="text-danger">Kontak</strong> : <br>
             <input type="text" name="nohp" value="{{ $meet->nohp }}" data-inputmask='"mask": "(999) 999-999999"' data-mask class="form-control">
             <br>

              <strong class="text-danger">Bagian</strong> : <br>
              <select class="form-control select2bs4" name="bagian" id="bagian" required>
              <option value="{{ $meet->bagian }}">{{ $meet->bagian }}</option>
              @foreach($bagian as $value)
                <option value="{{ $value->nama_bagian }}">{{ $value->nama_bagian }}</option>
              @endforeach
              </select>
            </div>
           </address>
        </div>

        <!-- /.col -->
        <div class="col-md-4 invoice-col">
          
          <div class="col-md-12">
            <strong class="text-danger">PIC</strong> :
            <input type="text" name="pic" value="{{ $meet->pic }}" class="form-control">
            <br>
            
            <strong class="text-danger">No Surat</strong> : <br> 
            <input type="text" name="no_surat" value="{{ $meet->no_surat }}" class="form-control">
            <br>
            <strong class="text-danger">PIC IT</strong> : <br> 
            <input type="text" name="pics" value="{{ $meet->pics }}" class="form-control"> 
            <br>
            <strong class="text-danger">Ruangan</strong> : <br> 
            <select class="form-control select2bs4" name="r_meeting" id="r_meeting" required>
              <option value="{{ $meet->r_meeting }}">{{ $meet->r_meeting }}</option>
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
        </div>

        <div class="col-md-4 invoice-col">
          <div class="col-md-12">
            <strong class="text-danger">Mulai</strong> : <br>
            <div class="input-group date" id="timepicker" data-target-input="nearest">
              <input type="text" name="mulai" value="{{ $meet->mulai }}" class="form-control datetimepicker-input" data-target="#timepicker" id="mulai1" required />
              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="far fa-clock"></i></div>
              </div>
            </div>
            <br>
            <strong class="text-danger">Selesai</strong> : <br> 
            <div class="input-group date" id="timepicker2" data-target-input="nearest">
              <input type="text" name="selesai" class="form-control datetimepicker-input" data-target="#timepicker2" id="selesai1" value="{{ $meet->selesai }}" required />
              <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="far fa-clock"></i></div>
              </div>
            </div>
            <br>
            <strong class="text-danger">Tanggal</strong> :
            <div class="input-group date" id="datetimepicker10" data-target-input="nearest">
              <input type="text" name="tanggal" id="tanggal" value="{{ $meet->tanggal }}" class="form-control datetimepicker-input" data-target="#datetimepicker10" required/>
              <div class="input-group-append" data-target="#datetimepicker10" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      </div>
      <hr>
      <div class="timeline-footer">
          <div class="col-md-4">
            <button type="submit" class="btn btn-danger btn-sm">
              Submit
            </button>
            <a href="/admin/booking/vicon">Kembali</a>
          </div>
        </form>
        <br>  
      </div>
    </div>
  </div>
</div>
@endsection