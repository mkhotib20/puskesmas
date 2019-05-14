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