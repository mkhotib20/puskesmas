  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Laporan Stok Obat
        <small>Poli Gigi Puskesmas Ambulu</small>
      </h1>
    </section>
    <section class="content">
        
      <br>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Batch</th>
                  <th>Nama bahan/obat</th>
                  <th>Jumlah Stok</th>
                  <th>Tanggal Kadaluarsa</th>
                  <th>Kondisi</th>
                </tr>
                </thead>
                <tbody>
                <?php  $dateExp = date('Y-m-d', strtotime("+60 days")); $today= date('Y-m-d'); foreach ($result as $r) { ?>
                <tr>
                  <td><?php echo $r['id'] ?></td>
                  <td><?php echo $r['batch_no'] ?></td>
                  <td><?php echo $r['nama_obat'] ?></td>
                  <td><?php echo $r['jumlah_stok'] ?></td>
                  <td><?php echo $r['exp_date'] ?></td>
                  <td><?php if($today>$r['exp_date']){echo 'Kadaluarsa';}elseif ($dateExp>$r['exp_date']){echo 'Hampir Kadaluarsa';}else{echo'Baik';}?></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
              <a href="<?php echo base_url('c_admin/print/stock') ?>" target="_blank" class="btn btn-success" ><span class="fa fa-print"></span> Print</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  