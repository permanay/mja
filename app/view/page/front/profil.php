    <?php
        require_once('../../../controller/PegawaiController.php');
        $data = $PegawaiController->ubah();
    ?>

    <!-- Header -->
    <?php require_once('../../layouts/header.php');  ?>
    <!-- Header -->    

    <!-- Main Content -->
    <div class="container-fluid pt-25">
        
        <!-- Row -->
        <div class="row">
            <div class="col-lg-3 col-xs-12">
                <div class="panel panel-default card-view  pa-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body  pa-0">
                            <div class="profile-box">
                                <div class="profile-cover-pic">
                                    <div class="profile-image-overlay" style="background-image: url(../../../../assets/img/background.jpg) !important;background-size: cover;background-repeat: no-repeat;background-position: center center;"></div>
                                </div>
                                <div class="profile-info text-center">
                                    <div class="profile-img-wrap">
                                        <img class="inline-block mb-10" src="../../../../assets/img/icon-peg.png" alt="user"/>
                                    </div>  
                                    <h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-primary"><?php echo $data[$PegawaiController->table_data][0]['peg_nama']; ?></h5>
                                    <h6 class="block capitalize-font pb-20"><?php echo $data[$PegawaiController->table_data][0]['jbtn_nama']; ?></h6>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-xs-12">
                <div class="panel panel-default card-view pa-0">
                    <div class="panel-wrapper collapse in">
                        <div  class="panel-body pb-0">
                            <div  class="tab-struct custom-tab-1">
                                <div class="tab-content" id="myTabContent_8">
                                    <div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
                                        <!-- Row -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="">
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body pa-0">
                                                            <div class="col-sm-12 col-xs-12">
                                                                <div class="form-wrap">
                                                                    <form data-toggle="validator" role="form" action="<?php echo $PegawaiController->path_controller; ?>" method="POST">

                                                                        <input type="hidden" name="<?php echo $PegawaiController->table_primary; ?>" value="<?php echo $data[$PegawaiController->table_data][0][$PegawaiController->table_primary]; ?>">
                                                                        <input type="hidden" name="func" value="profil">

                                                                        <div class="form-body overflow-hide">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="peg_nama">Nama Lengkap</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                                    <input type="text" class="form-control" name="peg_nama" data-error="Data nama lengkap harus diisi" required value="<?php echo $data[$PegawaiController->table_data][0]['peg_nama']; ?>">
                                                                                    <div class="help-block with-errors"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="exampleInputEmail_1">Email</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                                    <input type="email" class="form-control" name="peg_email" data-error="Data email salah" required value="<?php echo $data[$PegawaiController->table_data][0]['peg_email']; ?>">
                                                                                    <div class="help-block with-errors"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="exampleInputContact_1">No Telepon</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                                                    <input type="text" class="form-control" name="peg_no_tlp" data-error="Data no telepon harus diisi" required value="<?php echo $data[$PegawaiController->table_data][0]['peg_no_tlp']; ?>">
                                                                                    <div class="help-block with-errors"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="exampleInputuname_1">Domisili</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-home"></i></div>
                                                                                    <input type="text" class="form-control" name="peg_domisili" data-error="Data domisili harus diisi" required value="<?php echo $data[$PegawaiController->table_data][0]['peg_domisili']; ?>">
                                                                                    <div class="help-block with-errors"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="exampleInputuname_1">Username</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-user-following"></i></div>
                                                                                    <input type="text" class="form-control" name="pgna_username" id="pgna_username" data-error="Data username harus diisi" required value="<?php echo $data[$PegawaiController->table_data][0]['pgna_username']; ?>">
                                                                                    <div class="help-block with-errors"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="exampleInputpwd_1">Sandi</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                                    <input type="password" class="form-control" name="pgna_sandi" id="pgna_sandi" data-error="Data sandi harus diisi" required value="<?php echo $data[$PegawaiController->table_data][0]['pgna_sandi']; ?>">
                                                                                    <div class="help-block with-errors"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-actions mt-10">            
                                                                            <button type="submit" class="btn btn-primary mr-10 mb-30">Simpan</button>
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
         $(document).ready(function(){
            <?php 
                  if (isset($_SESSION["notification_message"]) && !empty($_SESSION["notification_message"])) {
              ?>
                      $.toast().reset('all');
                      $("body").removeAttr('class');

                      var itext = "<?php echo $_SESSION["notification_message"]; ?>";

                      <?php 
                          if ($_SESSION["notification_result"] != 'berhasil') {
                      ?>
                              var type = "error";
                      <?php 
                          }else{
                      ?>
                              var type = "success";
                      <?php 
                          }

                          unset($_SESSION["notification_result"]);
                          unset($_SESSION["notification_message"]);
                      ?>

                      $.toast({
                              heading: 'Pemberitahuan',
                              text: itext,
                              position: 'top-right',
                              loaderBg:'#fec107',
                              icon: type,
                              hideAfter: 3500, 
                              stack: 6
                            });
                      

                      return false;
                      
              <?php
                  }
              ?>

          });
    </script>
    <!-- JavaScript -->
 
</body>
</html>
