@extends('layouts.app')
@section('content')
<div class="col-12 col-sm-12">
	<h3><center>Booking vicon Pribadi</center></h3>
	<div class="card card-primary card-outline card-tabs">

		<div class="card-header p-0 pt-1 border-bottom-0">
			<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Host</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Join</a>
				</li>
			</ul>
		</div>
	    <div class="card-body">
			<div class="tab-content" id="custom-tabs-three-tabContent">
				<div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
				<form role="form" id="quickForm" method="post" action="/admin/booking/save-vicon-pribadi">
				@csrf
					<div class="card card-default">
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">

								<div class="form-group">
									<label>No HP</label>
									<input type="text" name="nohp" id="nohp" class="form-control" placeholder="Input NOHP anda" data-inputmask='"mask": "(999) 999-999999"' data-mask required>
								</div>

								<div class="form-group">
									<label>Agenda</label>
									<textarea name="agenda" id="agenda" class="form-control" required></textarea>
								</div>

								<div class="form-group ukur">
									<label>Bagian</label>
									<select class="form-control select2bs4" name="bagian" id="bagian" required>
										@foreach($bagians as $value)
									    	<option value="{{ $value->nama_bagian }}">{{ $value->nama_bagian }}</option>
									    @endforeach 
									</select>
								</div>

								<div class="form-group">
									<label>Ruangan Meeting</label>
									<input type="text" name="r_meeting" id="r_meeting" class="form-control" placeholder="Input Ruang Meeting Anda" required>
								</div>

								<div class="form-group">
									<label>Tanggal</label>
									<div class="input-group date" id="datetimepicker11" data-target-input="nearest">
										<input type="text" name="tanggal" id="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker11" required/>
									<div class="input-group-append" data-target="#datetimepicker11" data-toggle="datetimepicker">
										<div class="input-group-text">
											<i class="fa fa-calendar"></i>
										</div>
									</div>
									</div>
								</div>

								<div class="form-group">
									<label>Mulai Meeting</label>
									<div class="input-group date" id="timepicker" data-target-input="nearest">
										<input type="text" name="mulai" class="form-control datetimepicker-input" data-target="#timepicker" id="mulai" required />
									<div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
										<div class="input-group-text">
											<i class="far fa-clock"></i>
										</div>
									</div>
									</div>
								</div>

								<div class="form-group">
									<label>Selesai Meeting</label>
									<div class="input-group date" id="timepicker2" data-target-input="nearest">
										<input type="text" name="selesai" class="form-control datetimepicker-input" data-target="#timepicker2" id="selesai" required />
									<div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
										<div class="input-group-text">
											<i class="far fa-clock"></i>
										</div>
									</div>
									</div>
								</div>

								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" id="email" class="form-control" required>
								</div>

								<div class="form-group ukur">
									<label>Meeting ID</label>
									<select class="form-control select2bs4" name="meeting_id" id="meeting_id" required>
									<option value="0">- Pilih Meeting ID -</option>
										@foreach($meeting_id as $value)
											<option value="{{ $value->meeting_id }}">{{ $value->meeting_id }}</option>
										@endforeach
									</select>
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
					<!-- /.row -->
					</div>
					</div>
				<!-- /.card-body -->
				<button type="submit" class="btn btn-primary">SIMPAN</button>

				</form>
			</div>
			<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
				<form role="form" id="quickForm" method="post" action="/admin/booking/save-vicon-pribadi2">
				@csrf
					<div class="card card-default">
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">

								<div class="form-group">
									<label>No HP</label>
									<input type="text" name="nohp" id="nohp" class="form-control" placeholder="Input NOHP anda" data-inputmask='"mask": "(999) 999-999999"' data-mask required>
								</div>

								<div class="form-group">
									<label>Agenda</label>
									<textarea name="agenda" id="agenda" class="form-control" required></textarea>
								</div>

								<div class="form-group ukur">
									<label>Bagian</label>
									<select class="form-control select2bs4" name="bagian" id="bagian" required>
										@foreach($bagians as $value)
									    	<option value="{{ $value->nama_bagian }}">{{ $value->nama_bagian }}</option>
									    @endforeach
									</select>
								</div>

								<div class="form-group">
									<label>Ruangan Meeting</label>
									<input type="text" name="r_meeting" id="r_meeting" class="form-control" placeholder="Input Ruang Meeting Anda" required>
								</div>

								<div class="form-group">
									<label>Tanggal</label>
									<div class="input-group date" id="datetimepicker10" data-target-input="nearest">
										<input type="text" name="tanggal" id="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker10" required/>
									<div class="input-group-append" data-target="#datetimepicker10" data-toggle="datetimepicker">
										<div class="input-group-text">
											<i class="fa fa-calendar"></i>
										</div>
									</div>
									</div>
								</div>

								<div class="form-group">
									<label>Mulai Meeting</label>
									<div class="input-group date" id="timepicker3" data-target-input="nearest">
										<input type="text" name="mulai" class="form-control datetimepicker-input" data-target="#timepicker3" id="mulai" required />
									<div class="input-group-append" data-target="#timepicker3" data-toggle="datetimepicker">
										<div class="input-group-text">
											<i class="far fa-clock"></i>
										</div>
									</div>
									</div>
								</div>

								<div class="form-group">
									<label>Selesai Meeting</label>
									<div class="input-group date" id="timepicker4" data-target-input="nearest">
										<input type="text" name="selesai" class="form-control datetimepicker-input" data-target="#timepicker4" id="selesai" required />
									<div class="input-group-append" data-target="#timepicker4" data-toggle="datetimepicker">
										<div class="input-group-text">
											<i class="far fa-clock"></i>
										</div>
									</div>
									</div>
								</div>

								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" id="email" class="form-control" required>
								</div>

								<div class="form-group ukur">
									<label>Meeting ID</label>
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
					<!-- /.row -->
					</div>
					</div>
				<!-- /.card-body -->
				<button type="submit" class="btn btn-primary">SIMPAN</button>

				</form>
			</div>

			</div>
	    </div>
	</div>
</div>
@endsection