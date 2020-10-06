<style>
   textarea{
      background-color: transparent; 
      border: 0px solid; 
      width: 900px;
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
                   <div class="card card-widget widget-user-2">
                     <div class="card-footer p-0">
                       <ul class="nav flex-column">
                         <li class="nav-item">
                            <label>Peserta :</label>
							<textarea id="peserta" readonly=""></textarea>
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
         </div>
       </form>
     </div>
   </div>
   <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
</div>
