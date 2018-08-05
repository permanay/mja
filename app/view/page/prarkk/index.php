    <?php
        require_once('../../../controller/PrarkkController.php');
        require_once('../../../../helper/Helper.php');
        $data = $PrarkkController->index();
        $dproyek = $PrarkkController->dproyek[0];
        $page = $PrarkkController->page;
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
                                <h5 style="color: #fff;">Pra-RK3K Proyek</h5>   
                            </div>
                            <div class="bodi" style="padding: 10px 20px;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="table-wrap mb-20">
                                            <div class="table-responsive">
                                              <table class="table table-hover table-bordered mb-0 custab">
                                                <thead>
                                                  <tr>
                                                    <th>No</th>
                                                    <th>Nama Pekerjaan</th>
                                                    <th>Identifikasi Risiko</th>
                                                    <th>Tingkat Kepentingan Risiko</th>
                                                    <th>Tindakan Pengendalian Risiko</th>
                                                    <th>Penanggung Jawab</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                      $no = 1;
                                                      foreach ($data['prarkk'] as $d) {

                                                        echo '<tr>';
                                                        echo '<td>'.$no.'</td>';
                                                        echo '<td>'.ucfirst($d['pek_nama']).'</td>';
                                                        echo '<td>'.$d['rsko_nama'].'</td>';
                                                        echo '<td>'.$d['rsko_tingkat'].'</td>';
                                                        echo '<td>'.$d['rsko_pengendalian'].'</td>';
                                                        echo '<td>'.ucfirst($d['jbtn_nama']).'</td>';
                                                        echo '</tr>';

                                                        $no++;
 
                                                      }
                                                    ?>    
                                                </tbody>
                                              </table>
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
