  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Laporan
        <small>Poli Gigi Puskesmas Ambulu</small>
      </h1>
    </section>
    <section class="content">
      <div class="row">
      </div>
      <div class="col-md-4">
        <form action="<?php echo base_url("laporanKeseluruhanBulan") ?>">
          <p><input type="number" min="2000" max="2100" value="2018" class="form-control" name="tahun"></p>
          <p><select name="bulan" class="form-control">
            <option selected="" value="null" >--Pilih Bulan--</option>
            <option>January</option>
            <option>February</option>
            <option>March</option>
            <option>April</option>
            <option>May</option>
            <option>June</option>
            <option>July</option>
            <option>August</option>
            <option>September</option>
            <option>October</option>
            <option>November</option>
            <option>December</option>
          </select></p>
          <p><input class="btn btn-success" type="submit" value="Tampilkan"></p>
        </form>
      </div>
            <br><br>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
            <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tgl, bln, thn</th>
                  <th>Nama bahan/obat</th>
                  <th>Jumlah permintaan</th>
                  <th>Jumlah Terima</th>
                  <th>Jumlah Pakai</th>
                  <th>Total Stock</th>
                  <th >Kondisi</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $dateExp = date('Y-m-d', strtotime("+60 days"));
                  $today= date('Y-m-d');
                  foreach ($result as $r) { ?>
                <tr>
                  <td><?php echo $r['id_laporan'] ?></td>
                  <td><?php echo $r['tgl_laporan'] ?></td>
                  <td><?php echo $r['nama_obat'] ?></td>
                  <td><?php echo $r['jumlah_minta'] ?></td>
                  <td><?php echo $r['jumlah_terima'] ?></td>
                  <td><?php echo $r['jumlah_pakai'] ?></td>
                  <td><?php echo $r['stok_obat'] ?></td>
                  <td style="text-align: center"><span class="btn btn-success"><?php 
                    $expObat = $this->M_stok->tglExp($r['no_obat'])->exp_date;
                    $expStok = $this->M_stok->tglExp($r['no_obat'])->jumlah_stok;
                  if($today>$expObat){echo $expStok.' obat Kadaluarsa';}elseif ($dateExp>$expObat){echo $expStok.' obat Hampir Kadaluarsa';}else{echo'Baik';}?></span></td>
                </tr>
              <?php } ?>
                </tbody>
              </table>
              <?php 
                
              if(isset($_GET['bulan']) && !empty($_GET['bulan']) && isset($_GET['bulan']) && !empty($_GET['bulan']) ){
                  $bln = $_GET['bulan'];
                  $thn = $_GET['tahun'];
              } else {
                  $bln = "";
                  $thn = 0;
              }
                

               ?>
              <a href="<?php echo base_url('c_admin/print/keseluruhan/'.$bln.'/'.$thn) ?>" target="_blank" class="btn btn-success" ><span class="fa fa-print"></span> Print</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  