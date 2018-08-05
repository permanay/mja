    <?php
        require_once('../../../controller/RealisasiController.php');
        require_once('../../../../helper/Helper.php');
        $data = $RealisasiController->index();
        $dproyek = $RealisasiController->dproyek[0];
        $page = $RealisasiController->page;
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
                                <h5 style="color: #fff;">Realisasi Pelaksanaan Proyek</h5>   
                            </div>
                            <div class="bodi" style="padding: 10px 20px;">
                                <div class="row">
                                    <div class="col-xs-12">

                                        <!-- master jadwal -->
                                        <?php require_once('realisasi_pekerjaan.php');  ?>
                                        <!-- master jadwal -->

                                        <!-- jadwal sdm -->
                                        <?php require_once('realisasi_biaya.php');  ?>
                                        <!-- jadwal sdm -->
                                        
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
            
            $( "#realisasi_minggu" ).change(function() {
              var realisasi_minggu = $( "#realisasi_minggu" ).val();

              setTimeout(' window.location.href = "index.php?id=<?php echo $_GET['id']; ?>&m='+ realisasi_minggu +'"; ',10);      

            });

            <?php 
              foreach ($data['realisasi'] as $d) {
            ?>
                $('#volrea<?php echo $d['strkpek_id']; ?>').editable({
                  type: 'text',
                  name: 'volrea',
                  title: 'Masukan Volume Kemajuan Pekerjaan',
                  success: function(response, newValue) {
                      var volrea = $(this).data('pk');
                      var arr = volrea.split(",");
                      var realisasi_id = arr[0];
                      var strkpek_id = arr[1];
                      var pryk_id = arr[2];
                      var realisasi_minggu = $( "#realisasi_minggu" ).val();
                      
                      var form_data = {            
                          type_insert:'volrea',
                          pryk_id:pryk_id,
                          realisasi_id:realisasi_id,
                          strkpek_id:strkpek_id,
                          realisasi_minggu:realisasi_minggu,
                          reapek_volume:newValue,
                      };
                      $.ajax({
                          type: "POST",
                          url: "<?php echo $RealisasiController->path_controller; ?>?func=save",
                          data: form_data,
                          success: function(response)
                          {
                            setTimeout(' window.location.href = "index.php?id=<?php echo $_GET['id']; ?>&m='+ response +'"; ',10);      
                          } 
                      });
                      
                  }
                });
            <?php
              }
            ?>

            <?php 
              foreach ($data['realisasi_biaya'] as $d) {
            ?>
                $('#biaktu<?php echo $d['realisasi_id']; ?>').editable({
                  type: 'text',
                  name: 'biaktu',
                  success: function(response, newValue) {
                      var biaktu = $(this).data('pk');
                      var arr = biaktu.split(",");
                      var realisasi_id = arr[0];
                      var pryk_id = arr[1];
                      var realisasi_minggu = $( "#realisasi_minggu" ).val();

                      var form_data = {            
                          type_insert:'biaktu',
                          pryk_id:pryk_id,
                          realisasi_id:realisasi_id,
                          realisasi_biaya_aktual:newValue,
                          realisasi_minggu:realisasi_minggu,
                      };
                      $.ajax({
                          type: "POST",
                          url: "<?php echo $RealisasiController->path_controller; ?>?func=save",
                          data: form_data,
                          success: function(response)
                          {
                            setTimeout(' window.location.href = "index.php?id=<?php echo $_GET['id']; ?>&m='+ response +'"; ',10);      
                          } 
                      });
                      
                  }
                });
            <?php
              }
            ?>

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
