<style type="text/css">
  label{
    font-size: 20px;
  }
  .ukur{
    font-size: 15px;
  }
</style>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Booking Ruang Meeting</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="quickForm" method="POST" action="/admin/booking/save" name="myForm">
          @csrf
          <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                 <div class="form-group">
                    <label>PN</label>
                    <input type="text" name="pn" id="pn" class="form-control" placeholder="PN anda" data-inputmask='"mask": "99999999"' data-mask required>
                    
                  </div>
                  <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="nohp" class="form-control" placeholder="Input NOHP anda" data-inputmask='"mask": "(999) 999-999999"' data-mask required>
                  </div>
                  <div class="form-group">
                    <label>Peserta (Internal / Eksternal Jumlah orang)</label>
                    <textarea name="peserta" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Agenda</label>
                    <textarea name="agenda" class="form-control" required></textarea>
                  </div>
                  <div class="form-group ukur">
                    <label>Bagian</label>
                    <select class="form-control select2bs4" name="bagian" required>
                      <option selected="selected">TSI</option>
                      <option>ARK</option>
                      <option>HC</option>
                      <option>OJL</option>
                      <option>ADK</option>
                      <option>DJS</option>
                      <option>LOGISTIK</option>
                      <option>BRI LINK</option>
                      <option>RM</option>
                    </select>
                  </div>
                  <div class="form-group ukur">
                    <label>Ruangan Meeting</label>
                    <select class="form-control select2bs4" name="r_meeting" required>
                      <option value="Aula">Aula</option>
                      <option value="Lantai 2">Lantai 2</option>
                      <option value="Lantai 3">Lantai 3</option>
                      <option value="Lantai 4">Lantai 4</option>
                      <option value="Lantai 5">Lantai 5</option>
                      <option value="Lantai 8 (1)">Lantai 8 (1)</option>
                      <option value="Lantai 8 (2)">Lantai 8 (2)</option>
                      <option value="Lantai 9">Lantai 9</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                      <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker4" required/>
                      <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Mulai Meeting</label>
                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                        <input type="text" name="mulai" class="form-control datetimepicker-input" data-target="#datetimepicker3" id="mulai" required />
                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Selesai Meeting</label>
                    <div class="input-group date" id="datetimepickert" data-target-input="nearest">
                        <input type="text" name="selesai" class="form-control datetimepicker-input" data-target="#datetimepickert" id="selesai" required />
                        <div class="input-group-append" data-target="#datetimepickert" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" onclick="return validasi_input()">SIMPAN</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
