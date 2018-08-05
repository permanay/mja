<?php
    require_once('../../../controller/UpahController.php');
    $data = $UpahController->ubah();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $UpahController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $UpahController->initial; ?></a></li>
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
              <h6 class="panel-title txt-dark">Ubah Data <?php echo $UpahController->initial; ?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">
                    <form data-toggle="validator" role="form" action="<?php echo $UpahController->path_controller; ?>" method="POST">

                      <input type="hidden" name="post_type" value="ubah">
                      <input type="hidden" name="<?php echo $UpahController->table_primary; ?>" value="<?php echo $data[$UpahController->table_data][0][$UpahController->table_primary]; ?>">
                      <input type="hidden" name="func" value="save">

                      <div class="form-group">
                        <label for="jbtn_id" class="control-label mb-10">Jabatan</label>
                        <select class="select2" data-style="form-control btn-default btn-outline" name="jbtn_id" data-error="Data jabatan harus diisi" required>
                          <?php
                            foreach ($data['jabatan'] as $v) {
                              if ($data[$UpahController->table_data][0]['jbtn_id'] == $v['jbtn_id']) {
                                echo '<option value="'.$v['jbtn_id'].'" selected>'.ucfirst($v['jbtn_nama']).'</option>';
                              }else{
                                echo '<option value="'.$v['jbtn_id'].'">'.ucfirst($v['jbtn_nama']).'</option>';
                              }
                              
                            }
                          ?>
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="upah_satuan" class="control-label mb-10">Satuan</label>
                        <input type="text" class="form-control" name="upah_satuan" data-error="Data satuan upah harus diisi" required value="<?php echo $data[$UpahController->table_data][0]['upah_satuan']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="upah_harga" class="control-label mb-10">Harga</label>
                        <div class="input-group"> <span class="input-group-addon">Rp</span>
                          <input type="number" class="form-control" name="upah_harga" data-error="Data harga upah harus diisi" required value="<?php echo $data[$UpahController->table_data][0]['upah_harga']; ?>">
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
