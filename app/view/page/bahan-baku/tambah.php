<?php
    require_once('../../../controller/BahanBakuController.php');
    $data = $BahanBakuController->index();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $BahanBakuController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $BahanBakuController->initial; ?></a></li>
            <li class="active"><span>Tambah</span></li>
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
              <h6 class="panel-title txt-dark">Tambah Data <?php echo $BahanBakuController->initial; ?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">
                    <form data-toggle="validator" role="form" action="<?php echo $BahanBakuController->path_controller; ?>" method="POST">

                      <input type="hidden" name="post_type" value="tambah">
                      <input type="hidden" name="id" value="0">
                      <input type="hidden" name="func" value="save">

                      <div class="form-group">
                        <label for="bhnbku_nama" class="control-label mb-10">Nama</label>
                        <input type="text" class="form-control" name="bhnbku_nama" data-error="Data nama bahan baku harus diisi" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="bhnbku_satuan" class="control-label mb-10">Satuan</label>
                        <input type="text" class="form-control" name="bhnbku_satuan" data-error="Data satuan bahan baku harus diisi" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="bhnbku_harga" class="control-label mb-10">Harga</label>
                        <div class="input-group"> <span class="input-group-addon">Rp</span>
                          <input type="number" class="form-control" name="bhnbku_harga" data-error="Data harga bahan baku harus diisi" required>
                          <span class="input-group-addon">.00</span> 
                        </div>
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
