@extends('layouts.app')
@section('css')
<style>
   input{
      background-color: transparent; 
      border: 0px solid; 
   }
</style>
@endsection
@section('menuheader')
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">change password</li>
@endsection
@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Password</h3>
      </div>
      <form role="form" id="quickForm" method="POST" action="/admin/user/{{ $edit->id }}/change-pwd-ac">
        @csrf
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>New Password</label>
                  <input type="text" id='p' name="password" class="form-control" placeholder="Input password anda" required>
                  <input type='button' value ='generate' class="float-right" onclick='document.getElementById("p").value = Password.generate(10)'>
                </div>
              </div>
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
      </form>
    </div>
  </div>

@endsection
@section('js')
<script type="text/javascript">
  var Password = {
 
  _pattern : /[a-zA-Z0-9_\-\+\.]/,
  
  
  _getRandomByte : function()
  {
    // http://caniuse.com/#feat=getrandomvalues
    if(window.crypto && window.crypto.getRandomValues) 
    {
      var result = new Uint8Array(1);
      window.crypto.getRandomValues(result);
      return result[0];
    }
    else if(window.msCrypto && window.msCrypto.getRandomValues) 
    {
      var result = new Uint8Array(1);
      window.msCrypto.getRandomValues(result);
      return result[0];
    }
    else
    {
      return Math.floor(Math.random() * 256);
    }
  },
  
  generate : function(length)
  {
    return Array.apply(null, {'length': length})
      .map(function()
      {
        var result;
        while(true) 
        {
          result = String.fromCharCode(this._getRandomByte());
          if(this._pattern.test(result))
          {
            return result;
          }
        }        
      }, this)
      .join('');  
  }    
    
};
</script>
@endsection