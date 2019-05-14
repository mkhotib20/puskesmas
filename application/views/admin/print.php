<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    @page { size: landscape; }
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Document</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">
</head>
<body>
<div>

  <div>
    <section class="content-header">
      <h1>
        Cetak Laporan <?php echo $jenisLaporan ?>
        <small>Poli Gigi Puskesmas Ambulu</small>
      </h1>
    </section>
    <section class="content">
      <br>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <?php 
                  switch ($jenisLaporan) {
                    case "stok":
                        include 'stokPrint.php';
                        break;
                    case "pemakaian":
                        include 'pemakaianPrint.php';
                        break;
                    case "penerimaan":
                        include 'penerimaanPrint.php';
                        break;
                    case "permintaan":
                        include 'permintaanPrint.php';
                        break;
                    case "keseluruhan":
                        include 'keseluruhanPrint.php';
                        break;
                    default:
                       break;
                }
                 
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>

</body>
</html>
<script type="text/javascript">
  print();
  focus();
  close();
</script>

  