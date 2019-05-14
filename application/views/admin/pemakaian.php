  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Input | Pemakaian
        <small>Poli Gigi Puskesmas Ambulu</small>
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-8 col-md-offset-2">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Pemakaian</h3>
            </div>
						<?php $attributes = array('class' => 'form-horizontal','id' => 'formPenerimaan');
            echo form_open('pemakaian', $attributes); ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Pemakaian</label>
                  <div class="col-sm-10">
                    <input name="no_pemakaian" type="text" class="form-control" placeholder="Nomor" value="<?php echo $nextId ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input name="tgl_pemakaian" type="text" class="form-control" placeholder="Tgl, bln, thn Pemakaian" value="<?php echo date('Y-m-d') ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pilih Obat</label>
                  <div class="col-sm-10">
                    <select name ="no_obat" class="form-control select">
                      <?php foreach ($obat as $o) { ?>
                      <option value="<?php echo $o['no_obat']; ?>"><?php echo $o['nama_obat']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jumlah Pemakaian</label>
                  <div class="col-sm-10">
                    <input name="jumlah_pemakaian" type="text" class="form-control" placeholder="Jumlah Pemakaian">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
            <?php echo form_close() ?>
          </div>
        </div>
      </div>
    </section>
  </div>

  