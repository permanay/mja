    <?php
        require_once('../../../controller/RabController.php');
        require_once('../../../../helper/Helper.php');
        $data = $RabController->index();
        $dproyek = $RabController->dproyek[0];
        $page = $RabController->page;
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
                                <h5 style="color: #fff;">Rencana Anggaran Biaya</h5>   
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
                                                    <th>Volume</th>
                                                    <th>Satuan</th>
                                                    <th>AHSP</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Jumlah Harga</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                      $total = 0;
                                                      foreach ($data['rab'] as $d) {
                                                        if ($d['strkpek_status'] == 'top') {
                                                          $d['strkpek_volume'] = "";
                                                          $d['strkpek_satuan'] = "";
                                                        }else{
                                                          $total = $total + $d['jumlah'];
                                                        }

                                                        echo '<tr>';
                                                          echo '<td>'.$d['strkpek_no'].'</td>';
                                                          if ($d['strkpek_status'] == 'top') {
                                                            echo '<td style="font-weight: bold;">'.ucfirst($d['pek_nama']).'</td>';
                                                          }else{
                                                            echo '<td>'.ucfirst($d['pek_nama']).'</td>';
                                                          }
                                                          echo '<td>'.$d['strkpek_volume'].'</td>';
                                                          echo '<td>'.$d['pek_satuan'].'</td>';

                                                          if ($d['strkpek_status'] == 'sub') {
                                                    ?>
                                                          <td><a href="#" id="ahsp<?php echo $d['strkpek_id']; ?>" data-type="select" data-pk="1" data-value="<?php echo $d['rab_id'].".".$d['ahsp_id']; ?>" data-title="Pilih Analisa"></a></td>
                                                    <?php
                                                          }else{
                                                            echo '<td></td>';                                                            
                                                          }
                                                          if ($d['harga_satuan'] != 0) {
                                                            echo '<td>'.$helper->convertAngkatoRp($d['harga_satuan']).'</td>';
                                                          }else{
                                                            echo '<td></td>';
                                                          }
                                                          
                                                          if ($d['strkpek_status'] == 'top') {
                                                            echo '<td style="font-weight: bold;">'.$helper->convertAngkatoRp($d['jumlah']).'</td>';  
                                                          }else{
                                                            echo '<td>'.$helper->convertAngkatoRp($d['jumlah']).'</td>';  
                                                          }  
                                                          
                                                          
                                                        echo '</tr>';    
                                                      }
                                                    ?>    

                                                    <tr>
                                                      <td colspan="6" style="font-weight: 700 !important;text-align: right;">JUMLAH TOTAL</td>
                                                      <td style="font-weight: 700 !important;"><?php echo $helper->convertAngkatoRp($total); ?></td>
                                                    </tr>  
                                                    <tr>
                                                      <td colspan="6" style="font-weight: 700 !important;text-align: right;">PPN 10%</td>
                                                      <td style="font-weight: 700 !important;"><?php echo $helper->convertAngkatoRp($total*(10/100)); ?></td>
                                                    </tr> 
                                                    <tr>
                                                      <td colspan="6" style="font-weight: 700 !important;text-align: right;">JUMLAH TOTAL + PPN 10%</td>
                                                      <td style="font-weight: 700 !important;"><?php echo $helper->convertAngkatoRp($total + ($total*(10/100))); ?></td>
                                                    </tr> 
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
              foreach ($data['rab'] as $d) {
                if ($d['strkpek_status'] == 'sub') {
            ?>
                $('#ahsp<?php echo $d['strkpek_id']; ?>').editable({
                  source: [
                    <?php 
                      foreach ($data['ahsp'] as $a) {      
                        echo "{value: ".$d['rab_id'].".".$a['ahsp_id'].", text: '".$a['ahsp_nama']."'},";
                      }
                    ?>
                  ],
                  display: function(value, sourceData) {
                    var colors = {"": "#000", 1: "#000", 2: "#000"},
                    elem = $.grep(sourceData, function(o){return o.value == value;});

                    if(elem.length) {
                      $(this).text(elem[0].text).css("color", colors[value]);
                    } else {
                      $(this).empty();
                    }
                  },
                  success: function(response, newValue) {
                      var data = newValue.split('.');

                      var form_data = {            
                          rab_id:data[0],
                          ahsp_id:data[1],
                      };
                      $.ajax({
                          type: "POST",
                          url: "<?php echo $RabController->path_controller; ?>?func=save",
                          data: form_data,
                          success: function(response)
                          {
                              setTimeout(' window.location.href = "index.php?id=<?php echo $_GET['id']; ?>"; ',1000);      
                          } 
                      });
                  }
                });
            <?php
                }
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
