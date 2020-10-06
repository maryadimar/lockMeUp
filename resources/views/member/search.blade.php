@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="/template/plugins/toastr/toastr.min.css">
@endsection
@section('menuheader')
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Search</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- The time line -->
    <div class="timeline">
      <div>

        <div class="timeline-item">
          <h3 class="timeline-header"><a href="#">Search Meeting : </a> </h3>

          <div class="timeline-body">
              <div class="card card-default">
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-11 col-md-10">
                      <center>
                        <form class="form-inline" method="get" action="{{url('/user/booking-search-found')}}">
                          <div class="col-md-10 offset-1">
                            <div class="input-group date" id="datetimepicker9" data-target-input="nearest">
                              <input type="text" id="tanggal" class="typeahead form-control datetimepicker-input" data-target="#datetimepicker9" name="q" required/>
                              <div class="input-group-append" data-target="#datetimepicker9" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div> 
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                      </center>
                    </div>
                  </div>
                  <!-- /.row -->
                  <div class="col-md-10 offset-1">
                    <div class="row">
                      <div id="tanggal_list"></div>
                      <div class="col-md-4 mx-auto text-center">
                        <img src="/img/cari.png" class="img img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col -->
</div>
@endsection
@section('js')

@endsection