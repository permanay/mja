<?php
    require_once('../../../controller/AhspController.php');
    require_once('../../../../helper/Helper.php');
    $data = $AhspController->detail();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $AhspController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $AhspController->initial; ?></a></li>
            <li class="active"><span>Detail</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
      <div class="col-md-10">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Detail Data <?php echo $AhspController->initial; ?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">
                    <form action="<?php echo $AhspController->path_controller; ?>" method="POST">

                      <div class="form-group">
                        <label for="ahsp_nama" class="control-label mb-10">Nama Analisa</label>
                        <input type="text" class="form-control" name="ahsp_nama" disabled value="<?php echo $data['ahsp'][0]['ahsp_nama']; ?>">
                      </div>

                      <!-- bahan baku -->
                      <hr style="margin-top: 20px;margin-bottom: 10px;border-top: 2px solid #eeeeee;">
                      <h6>Bahan Baku</h6>
                      <div class="col-md-12" style="padding: 15px 0 0 0;">
                          <?php
                            $no =1 ;
                            foreach ($data['detail_bhnbku'] as $v) {
                              if ($no == 1) {
                          ?>
                                <!-- baris bahan baku -->
                                <div class="col-md-6" style="padding-left: 0; ">
                                  <div class="form-group">
                                    <label for="bhnbku_id1" class="control-label mb-10">Bahan Baku</label>
                                    <input type="text" class="form-control" disabled value="<?php echo $v['bhnbku_nama']; ?>">
                                  </div>
                                </div>
                                <div class="col-md-3" style="padding-left: 0; ">
                                  <div class="form-group">
                                    <label for="bhnbku_id1" class="control-label mb-10">Harga</label>
                                    <input type="text" class="form-control" disabled value="<?php echo $helper->convertAngkatoRp($v['bhnbku_harga']); ?>">
                                  </div>
                                </div>
                                <div class="col-md-3" style="padding-left: 0px; ">
                                  <div class="form-group">
                                    <label for="detahspbb_koeff1" class="control-label mb-10">Koeff</label>
                                    <input type="number" class="form-control" disabled value="<?php echo $v['detahspbb_koeff']; ?>">
                                    <div class="help-block with-errors"></div>
                                  </div>
                                </div>
                                <!-- baris bahan baku -->
                          <?php
                              }else{
                          ?>
                                <!-- baris bahan baku -->
                                <div class="col-md-6" style="padding-left: 0; ">
                                  <div class="form-group">
                                    <input type="text" class="form-control" disabled value="<?php echo $v['bhnbku_nama']; ?>">
                                  </div>
                                </div>
                                <div class="col-md-3" style="padding-left: 0; ">
                                  <div class="form-group">
                                    <input type="text" class="form-control" disabled value="<?php echo $helper->convertAngkatoRp($v['bhnbku_harga']); ?>">
                                  </div>
                                </div>
                                <div class="col-md-3" style="padding-left: 0px; ">
                                  <div class="form-group">
                                    <input type="number" class="form-control" disabled value="<?php echo $v['detahspbb_koeff']; ?>">
                                    <div class="help-block with-errors"></div>
                                  </div>
                                </div>
                                <!-- baris bahan baku -->
                          <?php
                              }
                          ?>
                              

                          <?php
                              $no++;
                            }
                          ?>
                      </div>
                      <!-- bahan baku -->

                      <!-- upah -->
                      <div class="col-md-12" style="padding:0; ">
                      <hr style="margin-top: 20px;margin-bottom: 10px;border-top: 2px solid #eeeeee;">
                      </div>
                      <h6>Upah</h6>
                      <div class="col-md-12" style="padding: 15px 0 0 0; ">
                          <?php
                            $no =1 ;
                            foreach ($data['detail_upah'] as $v) {
                              if ($no == 1) {
                          ?>
                                <!-- baris upah -->
                                <div id="input_upah">
                                  <div class="col-md-6" style="padding-left: 0; ">
                                    <div class="form-group">
                                      <label for="upah_id1" class="control-label mb-10">Tenaga Kerja</label>
                                      <input type="text" class="form-control" disabled value="<?php echo $v['jbtn_nama']; ?>">
                                      <div class="help-block with-errors"></div>
                                    </div>
                                  </div>
                                  <div class="col-md-3" style="padding-left: 0; ">
                                    <div class="form-group">
                                      <label for="upah_id1" class="control-label mb-10">Harga</label>
                                      <input type="text" class="form-control" disabled value="<?php echo $helper->convertAngkatoRp($v['upah_harga']); ?>">
                                      <div class="help-block with-errors"></div>
                                    </div>
                                  </div>
                                  <div class="col-md-3" style="padding-left: 0px; ">
                                    <div class="form-group">
                                      <label for="detahspupah_koeff1" class="control-label mb-10">Koeff</label>
                                      <input type="number" class="form-control" disabled value="<?php echo $v['detahspupah_koeff']; ?>">
                                      <div class="help-block with-errors"></div>
                                    </div>
                                  </div>
                                </div>
                                <!-- baris upah -->
                          <?php
                              }else{
                          ?>
                                <!-- baris upah -->
                                <div id="input_upah">
                                  <div class="col-md-6" style="padding-left: 0; ">
                                    <div class="form-group">
                                      <input type="text" class="form-control" disabled value="<?php echo $v['jbtn_nama']; ?>">
                                      <div class="help-block with-errors"></div>
                                    </div>
                                  </div>
                                  <div class="col-md-3" style="padding-left: 0; ">
                                    <div class="form-group">
                                      <input type="text" class="form-control" disabled value="<?php echo $helper->convertAngkatoRp($v['upah_harga']); ?>">
                                      <div class="help-block with-errors"></div>
                                    </div>
                                  </div>
                                  <div class="col-md-3" style="padding-left: 0px; ">
                                    <div class="form-group">
                                      <input type="number" class="form-control" disabled value="<?php echo $v['detahspupah_koeff']; ?>">
                                      <div class="help-block with-errors"></div>
                                    </div>
                                  </div>
                                </div>
                                <!-- baris upah -->
                          <?php
                              }
                          ?>
                              

                          <?php
                              $no++;
                            }
                          ?>
                      </div>
                      <div class="col-md-12" style="padding:0; ">
                      <hr style="margin-top: 0px;margin-bottom: 10px;border-top: 2px solid #eeeeee;">
                      </div>
                      <!-- upah -->

                      <div class="form-group mb-0" style="text-align: center;">
                        <a href="index.php" class="btn btn-primary">Kembali</a>
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
