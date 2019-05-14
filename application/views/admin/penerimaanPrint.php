<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tgl, bln, thn</th>
                  <th>Nama bahan/obat</th>
                  <th>Jumlah Terima</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($result as $r) { ?>
                <tr>
                  <td><?php echo $r['id'] ?></td>
                  <td><?php echo $r['tgl_penerimaan'] ?></td>
                  <td><?php echo $r['nama_obat'] ?></td>
                  <td><?php echo $r['jumlah'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>