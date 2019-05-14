  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Input | Obat
        <small>Poli Gigi Puskesmas Ambulu</small>
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-8 col-md-offset-2">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Obat</h3>
            </div>
            
            <?php $attributes = array('class' => 'form-horizontal','id' => 'formObat');
            echo form_open('obat', $attributes); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="no_obat" class="col-sm-2 control-label">No. Obat</label>
                  <div class="col-sm-10">
                    <?php 
                    $att1 = array(
                      "name" => "no_obat",
                      "class" => "form-control",
                      "placeholder" => "nomor",
                      'value' => $nextId,
                      'readOnly' => 'true'
                    );
                    echo form_input($att1); 
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Obat</label>
                  <div class="col-sm-10">

                    <?php 
                    $att2 = array(
                      "name" => "nama_obat",
                      "class" => "form-control",
                      "placeholder" => "nama"
                    );
                    echo form_input($att2); 
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tipe</label>
                  <div class="col-sm-10">
                  <?php 
                  $att3 = array(
                    "name" => "tipe",
                    "class" => "form-control",
                    "placeholder" => "Tipe Obat",
                  );
                  echo form_input( $att3);
                  ?>
                    
                  </div>
                </div>

              </div>
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-info pull-right">Simpan</button> -->
                <?php echo form_submit("submit", "Simpan", array("class" => "btn btn-info pull-right")) ?>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
  </div> 