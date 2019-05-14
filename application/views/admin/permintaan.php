  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Input | Permintaan
        <small>Poli Gigi Puskesmas Ambulu</small>
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-8 col-md-offset-2">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Permintaan</h3>
            </div>
            <?php $attributes = array('class' => 'form-horizontal','id' => 'formPenerimaan');
            echo form_open('permintaan', $attributes); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nomor permintaan</label>
                  <div class="col-sm-10">
                    <input name="no_permintaan" type="text" class="form-control" value=<?php echo $nextId ?> readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input name="tgl_permintaan" type="date" class="form-control" placeholder="Tgl, bln, thn Pemakaian" value=<?php echo date('Y-m-d') ?>>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pilih Obat</label>
                  <div class="col-sm-10">
                    <select name ="nama_obat" class="form-control select">
                      <?php foreach ($obat as $o) { ?>
                      <option><?php echo $o['nama_obat']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jumlah Permintaan</label>
                  <div class="col-sm-10">
                    <input name="jumlah" type="text" class="form-control" placeholder="Jumlah Pemakaian">
                  </div>
                </div>
            
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
           <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
  </div>

  