<?php
    require_once('../../../controller/JabatanController.php');
    $data = $JabatanController->ubah();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $JabatanController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $JabatanController->initial; ?></a></li>
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
              <h6 class="panel-title txt-dark">Ubah Data <?php echo $JabatanController->initial; ?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">
                    <form data-toggle="validator" role="form" action="<?php echo $JabatanController->path_controller; ?>" method="POST">

                      <input type="hidden" name="post_type" value="ubah">
                        <input type="hidden" name="<?php echo $JabatanController->table_primary; ?>" value="<?php echo $data[$JabatanController->table_data][0][$JabatanController->table_primary]; ?>">
                        <input type="hidden" name="func" value="save">

                      <div class="form-group">
                        <label for="jbtn_nama" class="control-label mb-10">Nama Jabatan</label>
                        <input type="text" class="form-control" name="jbtn_nama" data-error="Data nama jabatan harus diisi" required value="<?php echo $data[$JabatanController->table_data][0]['jbtn_nama']; ?>">
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
