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
                     <!-- Add the bg color to the header using any of the bg-* classes -->
                     <div class="widget-user-header bg-warning">
                       <div class="row">
                          <div class="col-md-2">
                            <h3 class="widget-user-username">
                               <input type="text" id="name" name="name" class="float-left" readonly="">
                            </h3>
                          </div>
                          <div class="col-md-10">
                            <h3 class="widget-user-desc">
                               <input type="text" id="nohp" name="nohp" readonly="">
                            </h3>
                          </div>
                       </div>
                     </div>
                     <div class="card-footer p-0">
                       <ul class="nav flex-column">
                         <li class="nav-item">
                           <a href="#" class="nav-link">
                             Bagian <span class="float-right"><input type="text" id="bagian" name="bagian" readonly="" class="float-right" style="width: 80px;"></span>
                           </a>
                         </li>
                         <li class="nav-item">
                           <a href="#" class="nav-link">
                             Ruangan Meeting 
                             <span class="float-right">
                                <input type="text" readonly="" class="float-right" id="r_meeting" name="r_meeting" style="width: 80px;">
                             </span>
                           </a>
                         </li>
                         <li class="nav-item">
                           <a href="#" class="nav-link">
                             Tanggal 
                             <span class="float-right">
                                <input class="float-right" readonly="" type="text" name="tanggal" id="tanggal" style="width: 80px;">
                             </span>
                           </a>
                         </li>
                         <li class="nav-item">
                           <a href="#" class="nav-link">
                             Pukul 
                             <span class="float-right">
                               <input type="text" id="waktu" readonly="" name="waktu" style="width: 80px;">
                             </span>
                           </a>
                         </li>
                       </ul>
                     </div>
                   </div>
                   <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">Alexander Pierce</h3>
                <h5 class="widget-user-desc">Founder & CEO</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="/img/index.png" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
                   <div class="form-group">
                      <div class="custom-control custom-switch">
                         <input type="checkbox" class="custom-control-input" id="customSwitch1">
                         <label class="custom-control-label" for="customSwitch1">Ajukan Pembatalan Meeting</label>
                      </div>
                   </div>
                 </div>
             </div>
             <!-- /.row -->
           </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Ajukan </button>
             <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
         </div>
       </form>
     </div>
   </div>
   <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
</div>