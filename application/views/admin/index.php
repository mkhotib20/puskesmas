
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Poli Gigi Puskesmas Ambulu</small>
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $jumlahObat[0]['jumlahStok'] ?></h3> <!--jumlah stock  obat-->
              <p>Stock Obat</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('stock'); ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $exp ?></h3> <!--jumlah obat mendekati expired-->
              <p>Obat mendekati expired</p>
            </div>
            <div class="icon">
              <i class="ion ion-calendar"></i>
            </div>
            <a href="<?php echo base_url('expired'); ?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <?php 
                if ($var=="stock") {
                  include 'stockObat.php';
                }
                elseif ($var=="expired") {
                  include 'expired.php';
                }
                else{
                  echo '<table id="example1" class="table table-bordered table-striped">
                
              </table>';
                }
               ?>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  
  