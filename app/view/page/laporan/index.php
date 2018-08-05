    <?php
        require_once('../../../controller/LaporanController.php');
        require_once('../../../../helper/Helper.php');
        $data = $LaporanController->index();
        $dproyek = $LaporanController->dproyek[0];
        $page = $LaporanController->page;
    ?>
    <!-- Header -->
    <?php require_once('../../layouts/header.php');  ?>
    <!-- Header -->    

    <!-- Main Content -->
    <div class="container-fluid pt-10 pl-5">
        <!-- Row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default card-view pl-0 pr-0">
                    <div class="panel-heading" style="padding: 10px 15px;">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark pl-10">Proyek <?php echo $dproyek['pryk_nama']; ?> </h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        
                        <!-- menuproyek -->
                        <?php require_once('../../layouts/menuproyek.php');  ?>
                        <!-- menuproyek -->

                        <!-- Proyek Content -->
                        <div style="background-color: #ffffff;color: #ffffff;">
                            <div style="padding: 10px 10px;background-color: #282e3f;" class="mb-10">
                                <h5 style="color: #fff;">Laporan Proyek</h5>   
                            </div>
                            <div class="bodi" style="padding: 10px 20px;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="col-xs-3">
                                          <div style="background-color: #337ab7;height: 120px;">
                                          <a href="laporan_struktur_pekerjaan.php?id=<?php echo $dproyek['pryk_id']; ?>" target="_blank" rel="noopener noreferrer" style="color: #fff;">
                                            <p style="text-align: center;line-height: 14px;height: 120px;font-weight: 600;padding: 51px 10px 0px 10px;">Laporan Struktur Pekerjaan Proyek</p>
                                          </a>
                                          </div>
                                        </div>
                                        <div class="col-xs-3">
                                          <div style="background-color: #337ab7;height: 120px;">
                                          <a href="laporan_rab.php?id=<?php echo $dproyek['pryk_id']; ?>" target="_blank" rel="noopener noreferrer" style="color: #fff;">
                                            <p style="text-align: center;line-height: 14px;height: 120px;font-weight: 600;padding: 51px 10px 0px 10px;">Laporan Rencana Anggaran Biaya Proyek</p>
                                          </a>
                                          </div>
                                        </div>
                                        <div class="col-xs-3">
                                          <div style="background-color: #337ab7;height: 120px;">
                                          <a href="#" style="color: #fff;">
                                            <p style="text-align: center;line-height: 14px;height: 120px;font-weight: 600;padding: 51px 10px 0px 10px;">Laporan Pra-RK3K</p>
                                          </a>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Proyek Content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
    <!-- Main Content -->

    <!-- Footer -->
    <?php require_once('../../layouts/footer.php');  ?>
    
    <!-- Footer -->

    <!-- JavaScript -->
    <script type="text/javascript">
        $('.tultip').tooltip({
            trigger: 'hover',
            placement: 'top',
            animate: true,
            delay: 100,
            container: 'body'
        });

        $(document).ready(function() {
            "use strict";

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
