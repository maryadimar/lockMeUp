<style>
   input, textarea{
      background-color: transparent; 
      border: 0px solid; 
   }
</style>

<div class="modal fade" id="modal-form">
 <div class="modal-dialog modal-lg">
   <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title"></h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="timeline">
          <!-- timeline time label -->
            <div class="time-label">
              <span class="bg-red">
                <span id="tanggal"></span>                
              </span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>

              <i class="fas fa-clock bg-gray"></i>

              <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 
                  <span id="mulai"></span> - <span id="selesai"></span>
                </span>
                <h3 class="timeline-header"><a href="#">Dibuat Oleh : <span id="name"></span></a> <span id="created_at"></span></h3>

                <div class="timeline-body">
                  <div class="row">
                      Pn :
                      <span id="pn"></span>
                  </div>
                  <div class="row">
                      Nohp :
                      <span id="nohp"></span>
                  </div>
                  <div class="row">
                      Bagian :
                      <span id="bagian"></span>
                  </div>
                  <div class="row">
                      Ruang Meeting :
                      <span id="r_meeting"></span>
                  </div>
                  <div class="row">
                      Agenda :
                      <textarea id="agenda" rows="2" cols="100" readonly=""></textarea>
                  </div>
                  <div class="row">
                      Peserta :
                      <textarea id="peserta" rows="3" cols="100" readonly=""></textarea>
                  </div>
                  
                <div class="card card-default collapsed-card">
                  <div class="card-header">
                    <h3 class="card-title" data-card-widget="collapse">View Vicon</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table>
                      <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><span id="email"></span></td>
                      </tr>
                      <tr>
                        <td>Meeting ID</td>
                        <td>:</td>
                        <td><span id="meeting_id"></span></td>
                      </tr>
                      <tr>
                        <td>Vicon Dengan Siapa ? (Sebutkan Cabangnya)</td>
                        <td>:</td>
                        <td>
                          <textarea id="peserta_cabang" rows="2" cols="100" readonly=""></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td>Peserta Pesertanya Siapa Saja ? (Sebutkan Jabatan  )</td>
                        <td>:</td>
                        <td>
                          <textarea id="peserta_orang" rows="2" cols="100" readonly=""></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td>PIC Vicon</td>
                        <td>:</td>
                        <td><span id="pic"></span></td>
                      </tr>
                      <tr>
                        <td>Surat</td>
                        <td>:</td>
                        <td><span id="no_surat"></span></td>
                      </tr>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                </div>
                <div class="timeline-footer">
                </div>
              </div>
            </div>
      </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="button" class="btn btn-warning float-right" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Tutup</button>
         </div>
     </div>
   </div>
   <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
</div>