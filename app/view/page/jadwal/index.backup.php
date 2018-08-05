    <?php
        require_once('../../../controller/JadwalController.php');
        require_once('../../../../helper/Helper.php');
        $data = $JadwalController->index();
        $dproyek = $JadwalController->dproyek[0];
        $page = $JadwalController->page;
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
                                <h5 style="color: #fff;">Penjadwalan Proyek</h5>   
                            </div>
                            <div class="bodi" style="padding: 10px 20px;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- master jadwal -->
                                        <?php require_once('jadwal_proyek.php');  ?>
                                        <!-- master jadwal -->

                                        <!-- jadwal sdm -->
                                        <?php require_once('jadwal_sdm.php');  ?>
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

    <!-- Modal -->
    <div id="responsive-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="modal-judul">Ubah Pendahulu Pekerjaan</h5>
                </div>
                <form data-toggle="validator" role="form" action="<?php echo $JadwalController->path_controller; ?>" method="POST">
                <div class="modal-body">
                    
                        <input type="hidden" name="type_insert" id="type_insert" value="pendahulu">
                        <input type="hidden" name="jdwl_id_penpek" id="jdwl_id_penpek">
                        <input type="hidden" name="pryk_id" value="<?php echo $dproyek['pryk_id']; ?>">
                        <input type="hidden" name="func" value="save">

                        <div class="form-group">
                            <label for="pek_id_pendahulu" class="control-label mb-10">Pekerjaan Pendahulu:</label>
                            <select class="form-control select2" multiple="multiple" name="pek_id_pendahulu[]" id="pek_id_pendahulu">
                                <?php 
                                    foreach ($data['struktur_pekerjaan'] as $d) {
                                        echo '<option value="'.$d['strkpek_id'].'">'.$d['strkpek_no'].' '.ucfirst($d['pek_nama']).'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-anim" id="btnTambah"><i class="icon-rocket"></i><span class="btn-text">Simpan</span></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Modal -->
    <div id="responsive-modal3" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="modal-judul">Ubah Jadwal Alokasi Tenaga Kerja</h5>
                </div>
                <form data-toggle="validator" role="form" action="<?php echo $JadwalController->path_controller; ?>" method="POST">
                <div class="modal-body">
                    
                        <input type="hidden" name="type_insert" id="type_insert" value="perataan">
                        <input type="hidden" name="pryk_id" value="<?php echo $dproyek['pryk_id']; ?>">
                        <input type="hidden" name="func" value="save">

                        <div class="form-group">
                            <label for="jdwl_id_perataan" class="control-label mb-10">Nama Pekerjaan:</label>
                            <select class="form-control select2" name="jdwl_id_perataan" id="jdwl_id_perataan">
                                <?php 
                                    foreach ($data['jadwal'] as $d) {
                                        echo '<option value="'.$d['jdwl_id'].'">'.ucfirst($d['pek_nama']).'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harker" class="control-label mb-10">Hari Kerja:</label>
                            <select class="form-control select2" name="harker" id="harker">
                                <?php
                                  $awal = 1;
                                  $akhir = 0;
                                  $no =1;
                                  foreach ($data['durasiProyek'] as $v) {
                                    $akhir = $awal + 6;
                                    echo '<option value="'.$no.'">'.$awal.' - '.$akhir.' (Minggu ke '.$no.')'.'</option>';
                                    echo '<th>'.$awal.'<br>-<br>'.$akhir.'</th>';
                                    $awal = $akhir +1;
                                    $no++;
                                  }
                                ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-anim" id="btnTambah"><i class="icon-rocket"></i><span class="btn-text">Simpan</span></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Modal -->
    <div id="responsive-modal2" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="modal-judul">Ubah Tenaga Kerja Proyek</h5>
                </div>
                <form data-toggle="validator" id="form_id" role="form" action="<?php echo $JadwalController->path_controller; ?>" method="POST">
                <div class="modal-body">
                    
                        <input type="hidden" name="type_insert" id="type_insert" value="tenker">
                        <input type="hidden" name="jdwl_id_tenker" id="jdwl_id_tenker">
                        <input type="hidden" name="pryk_id" value="<?php echo $dproyek['pryk_id']; ?>">
                        <input type="hidden" name="func" value="save">

                        <div id="input_tenker">
                          <div id="ipt_tenker1">
                            <div class="col-md-7" style="padding-left: 0px;">
                              <div class="form-group">
                                  <label for="jbtn_tenker1" class="control-label mb-10">Jabatan:</label>
                                  <select class="form-control select2" name="jbtn_tenker[]" id="jbtn_tenker1" data-error="Data jabatan harus diisi" required>
                                      <?php 
                                          foreach ($data['jabatan'] as $d) {
                                              echo '<option value="'.$d['jbtn_id'].'">'.ucfirst($d['jbtn_nama']).'</option>';
                                          }
                                      ?>
                                  </select>
                                  <div class="help-block with-errors"></div>
                              </div>
                            </div>
                            <div class="col-md-4" style="padding-left: 0px;">
                              <div class="form-group">
                                  <label for="jum_tenker1" class="control-label mb-10">Jumlah:</label>
                                  <input type="number" class="form-control" name="jum_tenker[]" id="jum_tenker1" data-error="Data jumlah harus diisi" required>
                                  <div class="help-block with-errors"></div>
                              </div>
                            </div>
                            <div class="col-md-1" style="padding-right: 0; padding-left: 0px;margin-top: 32px;">
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 0px;">
                            <button class="btn btn-info btn-outline btn-icon right-icon" id="tambah_tenker"> <i class="fa fa-plus"></i><span>Tenaga Kerja</span></button>
                        </div>
                        
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-anim" id="btnTambah"><i class="icon-rocket"></i><span class="btn-text">Simpan</span></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

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
              foreach ($data['jadwal'] as $d) {
            ?>
                $('#tglmulai<?php echo $d['jdwl_id']; ?>').editable({
                  type: 'combodate',
                  combodate: { maxYear: 2019, minYear: 2015 },
                  pk: <?php echo $d['jdwl_id']; ?>,
                  name: 'Tanggal Mulai',
                  title: 'Masukan Tanggal Mulai',
                  success: function(response, newValue) {
                      var jdwl_id = $(this).data('pk');
                      var form_data = {            
                          type_insert:'tanggal',
                          jdwl_id:jdwl_id,
                          jdwl_tgl_mulai:newValue.format("YYYY-MM-DD"),
                      };
                      $.ajax({
                          type: "POST",
                          url: "<?php echo $JadwalController->path_controller; ?>?func=save",
                          data: form_data,
                          success: function(response)
                          {
                              setTimeout(' window.location.href = "index.php?id=<?php echo $_GET['id']; ?>"; ',100);      
                          } 
                      });
                  }
                });

                $('#durasi<?php echo $d['jdwl_id']; ?>').editable({
                  type: 'text',
                  pk: <?php echo $d['jdwl_id']; ?>,
                  name: 'durasi',
                  title: 'Masukan Durasi',
                  success: function(response, newValue) {
                      var jdwl_id = $(this).data('pk');
                      var form_data = {            
                          type_insert:'durasi',
                          jdwl_id:jdwl_id,
                          jdwl_durasi:newValue,
                      };
                      $.ajax({
                          type: "POST",
                          url: "<?php echo $JadwalController->path_controller; ?>?func=save",
                          data: form_data,
                          success: function(response)
                          {
                              setTimeout(' window.location.href = "index.php?id=<?php echo $_GET['id']; ?>"; ',100);      
                          } 
                      });
                  }
                });
            <?php
              }
            ?>

            $.fn.penpek = function(id) {   
                
                $('#jdwl_id_penpek').val(id);
                var form_data = {            
                  id:id
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo $JadwalController->path_controller; ?>?func=cariPendahulu",
                    data: form_data,
                    success: function(response)
                    {
                        var pendahulu = response.split(",");
                        $("#pek_id_pendahulu").val(pendahulu).trigger('change');
                        
                    } 
                });

            }

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

        (function () {
          gantt.config.show_slack = false;
          gantt.addTaskLayer(function addSlack(task) {
            if (!task.slack || !gantt.config.show_slack)
              return null;

            var state = gantt.getState().drag_mode;
            if (state == 'resize' || state == 'move') {
              return null;
            }

            var slackStart = new Date(task.end_date);
            var slackEnd = gantt.calculateEndDate(slackStart, task.slack);
            var sizes = gantt.getTaskPosition(task, slackStart, slackEnd);
            var el = document.createElement('div');
            el.className = 'slack';
            el.style.left = sizes.left + 'px';
            el.style.top = sizes.top + 2 + 'px';
            el.style.width = sizes.width + 'px';
            el.style.height = sizes.height + 'px';

            return el;

          });

          function calculateTaskSlack(taskId) {
            if (!gantt.isTaskExists(taskId)) return 0;
            var slack;

            var task = gantt.getTask(taskId);
            if (task.$source && task.$source.length) {
              slack = calculateRelationSlack(task);
            } else {
              slack = calculateHierarchySlack(task);
            }

            return slack;
          }

          function calculateRelationSlack(task) {
            var minSlack = 0,
              slack,
              links = task.$source;

            for (var i = 0; i < links.length; i++) {
              slack = calculateLinkSlack(links[i]);
              if (minSlack > slack || i === 0) {
                minSlack = slack;
              }
            }

            return minSlack;
          }

          function calculateLinkSlack(linkId) {
            var link = gantt.getLink(linkId);
            var slack = 0;
            if (gantt.isTaskExists(link.source) && gantt.isTaskExists(link.target)) {
              slack = gantt.getSlack(gantt.getTask(link.source), gantt.getTask(link.target));
            }
            return slack;
          }

          function calculateHierarchySlack(task) {
            var slack = 0;
            if (gantt.isTaskExists(task.parent)) {
              var parent = gantt.getTask(task.parent);
              var from = gantt.getSubtaskDates(task.id).end_date || task.end_date;
              var to = gantt.getSubtaskDates(parent.id).end_date || parent.end_date;
              slack = Math.max(gantt.calculateDuration(from, to), 0);
            }

            return slack;
          }

          function updateSlack() {
            var changedTasks = {},
              changed = false;

            gantt.eachTask(function (task) {
              var newSlack = calculateTaskSlack(task.id);
              if (newSlack != task.slack) {
                task.slack = calculateTaskSlack(task.id);
                changedTasks[task.id] = true;
                changed = true;
              }
            });

            if (changed) {
              gantt.batchUpdate(function () {
                for (var i in changedTasks) {
                  if (changedTasks[i] === true) {
                    gantt.updateTask(i);
                  }
                }
              });
            }
          }

          gantt.attachEvent("onParse", function () {
            gantt.eachTask(function (task) {
              task.slack = calculateTaskSlack(task.id);
            });
          });

          // bulk update all tasks slack when anything changes
          gantt.attachEvent("onAfterTaskAdd", updateSlack);
          gantt.attachEvent("onAfterTaskDelete", updateSlack);
          gantt.attachEvent("onAfterLinkAdd", updateSlack);
          gantt.attachEvent("onAfterLinkDelete", updateSlack);
          gantt.attachEvent("onAfterTaskUpdate", updateSlack);

        })();
        /* end show slack */

        function getMonday(d) {
          d = new Date(d);
          var day = d.getDay(),
              diff = d.getDate() - day + (day == 0 ? -6:1); // adjust when day is sunday
          return new Date(d.setDate(diff));
        }

        function getWeekNumber(date){
          var minDate = gantt.getState().min_date;
          if( minDate.getDay() != 1)
            minDate = getMonday(minDate);
          
          var weekNum = 1;
          while(gantt.date.add(minDate, 1, "week") <= date){      
            minDate = gantt.date.add(minDate, 1, "week");
            weekNum++
          }
          return weekNum;
        }

        var weekScaleTemplate = function (date) {  
          return "Minggu Ke-" + getWeekNumber(date);
        };

        var demo_tasks = {
          data: [
            <?php
              foreach ($data['gantt'][0] as $v) {
            ?>
                {"id": <?php echo $v['jdwl_id']; ?>, "text": "<?php echo $v['pek_nama']; ?>", "start_date": "<?php echo $v['jdwl_tgl_mulai']; ?>", "duration": "<?php echo $v['jdwl_durasi']; ?>"},
            <?php
              }
            ?>
          ],
          links: [
            <?php
              $no = 1;
              foreach ($data['gantt'][1] as $v) {
            ?>
                {id: "<?php echo $no; ?>", source: "<?php echo $v['source']; ?>", target: "<?php echo $v['target']; ?>", type: "0"},
            <?php
                $no++;
              }
            ?>
          ]
        };

        gantt.config.work_time = true;
        gantt.config.details_on_create = false;
        gantt.config.scale_unit = "day";
        gantt.config.duration_unit = "week";
        gantt.config.subscales = [
            { unit: "week", step: 1, template: weekScaleTemplate }
        ];
        gantt.config.scale_height = 54;

        gantt.config.row_height = 30;
        gantt.config.min_column_width = 50;
        gantt.config.show_slack = true;
        gantt.config.highlight_critical_path = true;
        gantt.init("gantt_here");
        gantt.templates.task_cell_class = function (task, date) {
          if (!gantt.isWorkTime(date))
            return "week_end";
          return "";
        };
        gantt.templates.task_class = function(start, end, task){
          var css = [];
          css.push("no_drag_progress");
          return css.join(" ");
        }

        gantt.config.columns = [
          {name: "text", label: "Pekerjaan", width: "*", width: 80},
          {
            name: "start_time", label: "Tanggal Mulai", template: function (obj) {
              return gantt.templates.date_grid(obj.start_date);
            }, align: "center", width: 80
          },
          {name: "duration", label: "Durasi (Minggu)", align: "center", width: 60},
        ];

        gantt.parse(demo_tasks);

        $( "#tab_gantt_chart" ).click(function() {
            window.dispatchEvent(new Event('resize'));

            gantt.render();
        });

        // tenker tambah
        num_input = 2;

        $.fn.tenker = function(id) {   
                
            $('#jdwl_id_tenker').val(id);

            if (num_input > 2) {
              for (var i = 2; i < num_input; i++) {
                $( "#ipt_tenker" + i ).remove();  
              }
              $("#form_id").validator('update');               
            }

            var form_data = {            
              id:id
            };

            $.ajax({
                type: "POST",
                url: "<?php echo $JadwalController->path_controller; ?>?func=cariTenagaKerja",
                data: form_data,
                success: function(response)
                {
                    var obj = response;
                    var stringify = JSON.parse(obj);
                    if (stringify.length > 0) {

                      $('#jbtn_tenker1').val(stringify[0]['jbtn_id']).trigger('change');
                      $('#jum_tenker1').val(stringify[0]['jdwltenker_jumlah']);

                      if (stringify.length > 1) {

                        for (var i = 1; i < stringify.length; i++) {
                          inisialisasiTenker(num_input);

                          $('#jbtn_tenker'+num_input).val(stringify[i]['jbtn_id']).trigger('change');
                          $('#jum_tenker'+num_input).val(stringify[i]['jdwltenker_jumlah']);

                          num_input = num_input +1;

                        }

                      }else{
                        num_input = 2;
                      }
                    }else{
                      num_input = 2;
                    }
                    
                } 
            });

        }

        function inisialisasiTenker(no) {
            html = '';
            html = html + '<div id="ipt_tenker'+ no +'">';
              html = html + '<div class="col-md-7" style="padding-left: 0px;">';
                html = html + '<div class="form-group">';
                    html = html + '<select class="form-control select2" name="jbtn_tenker[]" id="jbtn_tenker'+ no +'" data-error="Data jabatan harus diisi" required>';
                        <?php 
                            foreach ($data['jabatan'] as $d) {
                                echo 'html = html + \'<option value="'.$d['jbtn_id'].'">'.ucfirst($d['jbtn_nama']).'</option>\';';
                            }
                        ?>
                    html = html + '</select>';
                    html = html + '<div class="help-block with-errors"></div>';
                html = html + '</div>';
              html = html + '</div>';
              html = html + '<div class="col-md-4" style="padding-left: 0px;">';
                html = html + '<div class="form-group">';
                    html = html + '<input type="number" class="form-control" name="jum_tenker[]" id="jum_tenker'+ no +'" data-error="Data jumlah harus diisi" required>';
                    html = html + '<div class="help-block with-errors"></div>';
                html = html + '</div>';
              html = html + '</div>';
              html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
                html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInput(\''+ no +'\');"><i class="icon-close"></i></button>';
              html = html + '</div>';
            html = html + '</div>';

            $( "#input_tenker" ).append(html);

            $(".select2").select2();
            $("#form_id").validator('update'); 
        }

        $( "#tambah_tenker" ).click(function() {
            
            html = '';
            html = html + '<div id="ipt_tenker'+ num_input +'">';
              html = html + '<div class="col-md-7" style="padding-left: 0px;">';
                html = html + '<div class="form-group">';
                    html = html + '<select class="form-control select2" name="jbtn_tenker[]" id="jbtn_tenker'+ num_input +'" data-error="Data jabatan harus diisi" required>';
                        <?php 
                            foreach ($data['jabatan'] as $d) {
                                echo 'html = html + \'<option value="'.$d['jbtn_id'].'">'.ucfirst($d['jbtn_nama']).'</option>\';';
                            }
                        ?>
                    html = html + '</select>';
                    html = html + '<div class="help-block with-errors"></div>';
                html = html + '</div>';
              html = html + '</div>';
              html = html + '<div class="col-md-4" style="padding-left: 0px;">';
                html = html + '<div class="form-group">';
                    html = html + '<input type="number" class="form-control" name="jum_tenker[]" id="jum_tenker'+ num_input +'" data-error="Data jumlah harus diisi" required>';
                    html = html + '<div class="help-block with-errors"></div>';
                html = html + '</div>';
              html = html + '</div>';
              html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
                html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInput(\''+ num_input +'\');"><i class="icon-close"></i></button>';
              html = html + '</div>';
            html = html + '</div>';

            $( "#input_tenker" ).append(html);

            num_input = num_input +1;

            $(".select2").select2();
            $("#form_id").validator('update'); 

            return false;
        });

        $.fn.deleteInput = function(id) {    
            $( "#ipt_tenker" + id ).remove();
            $("#form_id").validator('update');  
            return false;
        }
        function drawNetwork() {
          var nodes = [
            {id: 1, shape: 'dot', color:{background:'#ffffff', border:'black'}},
            {id: 2, shape: 'dot', color:{background:'#ffffff', border:'black'}},
            {id: 3, shape: 'dot', color:{background:'#ffffff', border:'black'}},
            {id: 4, shape: 'dot', color:{background:'#ffffff', border:'black'}},
            {id: 5, shape: 'dot', color:{background:'#ffffff', border:'black'}},
            {id: 6, shape: 'dot', color:{background:'#ffffff', border:'black'}},
            {id: 7, shape: 'dot', color:{background:'#ffffff', border:'black'}},
            {id: 8, shape: 'dot', color:{background:'#ffffff', border:'black'}},
            {id: 9, shape: 'dot', color:{background:'#ffffff', border:'black'}}
          ];

          var edges = [
            {from: 1, to: 2, label: 'A', arrows:'to', color:{color:'red'}},
            {from: 2, to: 3, label: 'B', arrows:'to', color:{color:'red'}},
            {from: 3, to: 4, label: 'C', arrows:'to', color:{color:'black'}},
            {from: 3, to: 7, label: 'D', arrows:'to', color:{color:'black'}},
            {from: 3, to: 5, label: 'E', arrows:'to', color:{color:'red'}},
            {from: 4, to: 6, label: 'F', arrows:'to', color:{color:'black'}},
            {from: 5, to: 7, label: 'G', arrows:'to', color:{color:'red'}},
            {from: 6, to: 7, label: 'H', arrows:'to', color:{color:'black'}},
            {from: 7, to: 8, label: 'I', arrows:'to', color:{color:'red'}},
            {from: 8, to: 9, label: 'J', arrows:'to', color:{color:'red'}},
          ]

          var container = document.getElementById('mynetwork');

          var data = {
            nodes: nodes,
            edges: edges
          };
          var width = 700;
          var height = 400;
          var options = {
            manipulation: false,
            edges: {
              smooth: false
            },

            physics: false,
            interaction: {
              dragNodes: true,// do not allow dragging nodes
              zoomView: false, // do not allow zooming
              dragView: true  // do not allow dragging
            },
            layout: {
                    improvedLayout:true,
                    hierarchical: {
                        enabled:true,
                        levelSeparation: 150,
                        nodeSpacing: 150,
                        treeSpacing: 10,
                        blockShifting: true,
                        edgeMinimization: true,
                        parentCentralization: true,
                        direction: 'LR',        // UD, DU, LR, RL
                        }
                }
          };
          var network = new vis.Network(container, data, options); 
        }

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
          drawNetwork();
        });

    </script>
    <!-- JavaScript -->
 
</body>
</html>
