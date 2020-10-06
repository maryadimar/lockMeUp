@extends('member.layout.appvicon')
@section('titleheader')
	<h1>Profile</h1>
@endsection
@section('menuheader')
	<li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item active">User Profile</li>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-3">
			<div class="card card-primary card-outline">
			  <div class="card-body box-profile">
			    <div class="text-center">
			      <img class="profile-user-img img-fluid img-circle"
			           src="/img/index.png"
			           alt="User profile picture">
			    </div>

			    <h3 class="profile-username text-center">{{ (empty('Auth::User()->name') ? '-' : Auth::User()->name) }}</h3>

			    <p class="text-muted text-center">{{ Auth::User()->bagian }}</p>

			    <ul class="list-group list-group-unbordered mb-3">
			      <li class="list-group-item">
			        <b>PN</b> 
			        <a class="float-right">
			        	<span class="text-success">{{ Auth::user()->pn }}</span>
			        </a>
			      </li>
			      <li class="list-group-item">
			        <b>Last Login</b> 
			        <a class="float-right">
			        	<span class="text-success">{{ date('d-M-yy H:i', strtotime(Auth::user()->last_login_at)) }} WIB</span>
			        </a>
			      </li>
			      <li class="list-group-item">
			        <b>Ip Address</b> <a class="float-right">{{ Auth::user()->last_login_ip }}</a>
			      </li>
			    </ul>

			    <a href="#" class="btn btn-primary btn-block"><b>@if(Auth::User()->actived == 1) Active @endif</b></a>
			  </div>
			  <!-- /.card-body -->
			</div>
			
		</div>
		<!-- /.col -->
		<div class="col-md-9">
			<div class="card">
			  <div class="card-header p-2">
			    <ul class="nav nav-pills">
			      <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
			      <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
			    </ul>
			  </div><!-- /.card-header -->
			  <div class="card-body">
			    <div class="tab-content">
			      <!-- /.tab-pane -->
			      <div class="active tab-pane" id="timeline">
			        <!-- The timeline -->
			        @if(count($showTimeline) > 0)
    					@foreach($showTimeline as $val)
				        	<div class="timeline timeline-inverse">
					          	<div class="time-label">
									<span class="bg-danger">
										{{ $val->tanggal }}
									</span>
								</div>
					          <!-- /.timeline-label -->
					          <!-- timeline item -->
								<div>
									<i class="fas fa-envelope bg-primary"></i>
									<div class="timeline-item">
										<span class="time"><i class="far fa-clock"></i> {{ $val->mulai }} - {{ $val->selesai }}</span>
										<a href="#">Dibuat Oleh : {{ $val->users->name }}</a> {{ $val->created_at->diffForHumans() }}</h3>

										<div class="timeline-body">
											<strong class="text-danger">Peserta </strong> : <br> 
											{!! nl2br($val->peserta) !!} <br>
											<strong class="text-danger">Agenda</strong> : <br> {!! nl2br($val->agenda) !!} <br>
											<strong class="text-danger">Lokasi</strong> : <br> {!! nl2br($val->r_meeting) !!}
										</div>
										<div class="timeline-footer">
											@if($val->status == 1)
							                  <a class="btn btn-primary btn-sm">Booking Meeting</a>
							                @elseif($val->status == 2)
							                  <a class="btn btn-success btn-sm">Sedang Meeting</a>
							                @elseif($val->status == 3)
							                  <a class="btn btn-danger btn-sm">Selesai</a>
							                @else
							                  <a class="btn btn-success btn-sm">Pending</a>
							                @endif	
										</div>				
									</div>
								</div>
					          	<div>
									<i class="far fa-clock bg-gray"></i>
								</div>
					        </div>
				        @endforeach
    				@else
    					<div class="timeline timeline-inverse">
				          	<div class="time-label">
								<span class="bg-danger">
									##/##/##
								</span>
							</div>
				          <!-- /.timeline-label -->
				          <!-- timeline item -->
							<div>
								<i class="fas fa-envelope bg-primary"></i>
								<div class="timeline-item">
									Data Masih Kosong
								</div>
							</div>
							
				          	<div>
								<i class="far fa-clock bg-gray"></i>
							</div>
				        </div>
    				@endif
			        {{ $showTimeline->links() }}
			      </div>
			      <!-- /.tab-pane -->

			      <div class="tab-pane" id="settings">
			        <form class="form-horizontal" action="/user/password-changed" method="post">
			        	@csrf 

					     @foreach ($errors->all() as $error)
					        <p class="text-danger">{{ $error }}</p>
					     @endforeach
			          <div class="form-group row">
			            <label for="" class="col-sm-2 col-form-label">Password Sekarang</label>
			            <div class="col-sm-10">
			              <input type="password" class="form-control" name="current_password" autocomplete="current-password">
			            </div>
			          </div>
			          <div class="form-group row">
			            <label for="inputEmail" class="col-sm-2 col-form-label">Password Baru</label>
			            <div class="col-sm-10">
			              <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" placeholder="password baru">
			            </div>
			          </div>
			          <div class="form-group row">
			            <label for="inputName2" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
			            <div class="col-sm-10">
			              <input type="password" class="form-control" name="new_confirm_password" autocomplete="current-password" placeholder="konfirmasi password baru">
			            </div>
			          </div>
			         
			          <div class="form-group row">
			            <div class="offset-sm-2 col-sm-10">
			              <button type="submit" class="btn btn-danger">Submit</button>
			            </div>
			          </div>
			        </form>
			      </div>
			      <!-- /.tab-pane -->
			    </div>
			    <!-- /.tab-content -->
			  </div><!-- /.card-body -->
			</div>
		</div>
		<!-- /.col -->
	</div>
@endsection