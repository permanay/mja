<?php
    require_once('../../../controller/KlienController.php');
    $data = $KlienController->ubah();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $KlienController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $KlienController->initial; ?></a></li>
            <li class="active"><span>Ubah</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Ubah Data <?php echo $KlienController->initial; ?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">
                    <form data-toggle="validator" role="form" action="<?php echo $KlienController->path_controller; ?>" method="POST">

                      <input type="hidden" name="post_type" value="ubah">
                      <input type="hidden" name="<?php echo $KlienController->table_primary; ?>" value="<?php echo $data[$KlienController->table_data][0][$KlienController->table_primary]; ?>">
                      <input type="hidden" name="func" value="save">

                      <div class="form-group">
                        <label for="klien_nama" class="control-label mb-10">Nama</label>
                        <input type="text" class="form-control" name="klien_nama" data-error="Data nama harus diisi" required value="<?php echo $data[$KlienController->table_data][0]['klien_nama']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="klien_email" class="control-label mb-10">Email</label>
                        <input type="email" class="form-control" name="klien_email" data-error="Data email harus diisi" required value="<?php echo $data[$KlienController->table_data][0]['klien_email']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="klien_no_tlp" class="control-label mb-10">No Telepon</label>
                        <input type="text" class="form-control" name="klien_no_tlp" data-error="Data no telepon harus diisi" required value="<?php echo $data[$KlienController->table_data][0]['klien_no_tlp']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="klien_alamat" class="control-label mb-10">Alamat</label>
                        <input type="text" class="form-control" name="klien_alamat" data-error="Data alamat harus diisi" required value="<?php echo $data[$KlienController->table_data][0]['klien_alamat']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>

                      <div class="form-group mb-0">
                        <a href="index.php" class="btn btn-primary">Batal</a>
                        <button type="submit" class="btn btn-success btn-anim" id="btnTambah"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Row -->
    
</div>
<!-- Main Content -->

<!-- Footer -->
<?php require_once('../../layouts/footer.php');  ?>
<!-- Footer -->

<!-- JavaScript -->
<script type="text/javascript">

</script>
<!-- JavaScript -->
 
</body>
</html>
