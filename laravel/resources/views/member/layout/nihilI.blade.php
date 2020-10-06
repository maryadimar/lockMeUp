@extends('layouts.app')
@section('menuheader')
  <li class="breadcrumb-item"><a href="#">Home</a></li>
@endsection
@section('content')
<div class="error-page">
    <h2 class="headline text-danger">NIHIL</h2>

    <div class="error-content">
      <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Belum Ada Antrian Meeting :-(.</h3>

      <p>
        Jika data antrian masih belum ada, silahkan cek kembali tanggal booking Anda ;-)
      </p>
      
    </div>
</div>
@endsection