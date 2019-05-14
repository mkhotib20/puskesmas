  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Laporan Pemakaian
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
                  <th>Tgl, bln, thn</th>
                  <th>Nama bahan/obat</th>
                  <th>Jumlah Pakai</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($result as $r) { ?>
                <tr>
                  <td><?php echo $r['id'] ?></td>
                  <td><?php echo $r['tgl_pemakaian'] ?></td>
                  <td><?php echo $r['nama_obat'] ?></td>
                  <td><?php echo $r['jumlah_pemakaian'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
              <a href="<?php echo base_url('c_admin/print/pemakaian') ?>" target="_blank" class="btn btn-success" ><span class="fa fa-print"></span> Print</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  