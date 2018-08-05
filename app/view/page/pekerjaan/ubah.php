<?php
    require_once('../../../controller/PekerjaanController.php');
    $data = $PekerjaanController->ubah();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $PekerjaanController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $PekerjaanController->initial; ?></a></li>
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
              <h6 class="panel-title txt-dark">Ubah Data <?php echo $PekerjaanController->initial; ?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">
                    <form data-toggle="validator" role="form" action="<?php echo $PekerjaanController->path_controller; ?>" method="POST">

                      <input type="hidden" name="post_type" value="ubah">
                        <input type="hidden" name="<?php echo $PekerjaanController->table_primary; ?>" value="<?php echo $data[$PekerjaanController->table_data][0][$PekerjaanController->table_primary]; ?>">
                        <input type="hidden" name="func" value="save">

                      <div class="form-group">
                        <label for="pek_nama" class="control-label mb-10">Nama Pekerjaan</label>
                        <input type="text" class="form-control" name="pek_nama" data-error="Data nama pekerjaan harus diisi" required value="<?php echo $data[$PekerjaanController->table_data][0]['pek_nama']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="pek_satuan" class="control-label mb-10">Satuan Pekerjaan</label>
                        <input type="text" class="form-control" name="pek_satuan" value="<?php echo $data[$PekerjaanController->table_data][0]['pek_satuan']; ?>">
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
