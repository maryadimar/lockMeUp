<style>
   input{
      background-color: transparent; 
      border: 0px solid; 
   }
</style>
<div class="modal fade" id="modal-form">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title"></h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form role="form" id="quickForm" method="POST" action="/save">
         @csrf
         <div class="card card-default">
           <!-- /.card-header -->
           <div class="card-body">
             <div class="row">
                <div class="col-md-12">
                   <!-- Widget: user widget style 2 -->
                   <div class="card card-widget widget-user-2">
                     <div class="card-footer p-0">
                       <ul class="nav flex-column">
                         
                         <li class="nav-item">
                           <a href="#" class="nav-link">
                             Nama <span class="float-right"><input type="text" id="name" name="name" readonly="" class="float-right" style="width: 100%;"></span>
                           </a>
                         </li>
                         
                         <li class="nav-item">
                           <a href="#" class="nav-link">
                             Email <span class="float-right"><input type="text" id="email" name="email" readonly="" class="float-right" style="width: 100%;"></span>
                           </a>
                         </li>
                         
                       </ul>
                     </div>
                   </div>
                 </div>
             </div>
             <!-- /.row -->
           </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="button" class="btn btn-warning float-right" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Tutup</button>
         </div>
       </form>
     </div>
   </div>
   <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
</div>
