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