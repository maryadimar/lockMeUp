@extends('layouts.app')
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

			    <h3 class="profile-username text-center">{{ Auth::User()->name }}</h3>

			    <p class="text-muted text-center">{{ Auth::User()->bagian }}</p>

			    <ul class="list-group list-group-unbordered mb-3">
			      <li class="list-group-item">
			        <b>Nohp</b> <a class="float-right">{{ Auth::user()->nohp }}</a>
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
			        <form class="form-horizontal" action="/admin/profile-changed" method="post">
			        	@csrf 

					     @foreach ($errors->all() as $error)
					        <p class="text-danger">{{ $error }}</p>
					     @endforeach
			          <div class="form-group row">
			            <label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
			            <div class="col-sm-10">
			              <input type="text" class="form-control" name="name" value="{{ Auth::User()->name }}">
			            </div>
			          </div>
			          <div class="form-group row">
			            <label for="inputEmail" class="col-sm-2 col-form-label">No HP</label>
			            <div class="col-sm-10">
			              <input type="text" class="form-control" name="nohp" value="{{ Auth::user()->nohp }}">
			            </div>
			          </div>
			          <div class="form-group row">
			            <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
			            <div class="col-sm-10">
			              <input type="email" class="form-control" name="email" value="{{ Auth::User()->email }}">
			            </div>
			          </div>
			         
			          <div class="form-group row">
			            <div class="offset-sm-2 col-sm-10">
			              <button type="submit" class="btn btn-danger">Ubah</button>
			            </div>
			          </div>
			        </form>
			      </div>
			      <!-- /.tab-pane -->

			      <div class="tab-pane" id="settings">
			        <form class="form-horizontal" action="/admin/password-changed" method="post">
			        	@csrf 

					     @foreach ($errors->all() as $error)
					        <p class="text-danger">{{ $error }}</p>
					     @endforeach
			          <div class="form-group row">
			            <label for="" class="col-sm-2 col-form-label">Password Sekarang</label>
			            <div class="col-sm-10">
			              <input type="password" class="form-control" name="current_password" autocomplete="current-password" placeholder="masukan password lama">
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