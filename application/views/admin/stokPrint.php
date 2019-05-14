 <table id="example1" class="table table-bordered table-striped">
  <center><h3>Laporan Stok Obat</h3></center>
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