<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <?php include 'include/Header.php' ?> 
                <div class="app-main">
                  <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                   <div class="app-main__inner">
                   <div class="row">

                   <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                   <div class="card-body">
                   <div  style="float:left;">
                   <img src="<?=base_url()?>/public/assets/images/avtar.png" title="<?php echo($Registration['data'][0]['Name'])?>" class="rounded-circle" style="width: 29%;margin-top: 6%;margin-left: 14%;">
                   </div>
                  
                   <table width="100%" border="0" cellspacing="2" cellpadding="5">
                    <tbody>
                  
                    <tr>
                    <td></td>
                    <td><strong>Name</strong></td>
                    <td>:</td>
                    <td><?php echo($Registration['data'][0]['Name'])?></td>
                     
                    </tr>
                    <tr>
                    <td></td>
                    <td><strong>Contact</strong></td>
                    <td>:</td>
                    <td><?php echo($Registration['data'][0]['Contact'])?></td>
                     
                    </tr>
                    <tr>
                    <td></td>
                    <td><strong>Email</strong></td>
                    <td>:</td>
                    <td><?php echo($Registration['data'][0]['Email'])?></td>
                     
                    </tr>

                    <tr>
                    <td></td>
                    <td><strong>Registration Date</strong></td>
                    <td>:</td>
                    <td><?php echo($Registration['data'][0]['Registration_Date'])?></td>
                     
                    </tr>

                    <tr>
                    <td></td>
                    <td><strong>Webinar Date</strong></td>
                    <td>:</td>
                    <td><?php echo($Registration['data'][0]['Webinar_date'])?></td>
                     
                    </tr>

                    <tr>
                    <td></td>
                    <td><strong>Registered Webinar</strong></td>
                    <td>:</td>
                    <td><?php echo($Count_user['count'][0]['count'])?></td>
                     
                    </tr>

                    <tr>
                    <td></td>
                    <td><strong>Attend Webinar</strong></td>
                    <td>:</td>
                    <td><?php echo($Attend['data'][0]['Attend_webinar'])?></td>
                     
                    </tr>
                   </tbody>
                   </table>
                  </div>
                 </div>

                  <div class="main-card mb-3 card">
              <div class="card-body"> 
              <h5 class="card-title">Webinar Attendant</h5>
              <br>



                                   
                                      <div class="table-responsive">
                                            <table id="bootstrap-data-table1" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Time Slot</th>
                                                    <th>Source</th>
                                                    <!-- <th>Action</th> -->
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Attend_list['data'])){ 
                                                 foreach ($Attend_list['data'] as $val){?>


                                                  <tr>
                                                  <td><?php echo $val['Name'] ?></td>
                                                  <td><?php echo $val['Contact'] ?></td> 
                                                  <td><?php echo $val['Email'] ?></td> 
                                                  <td><?php echo $val['Webinar_date'] ?></td>
                                                  <td><?php echo $val['Timeslot'] ?></td> 
                                                  <?php $Source = $val['Source'];

                                          switch ($Source) {
                                            case 1:
                                            echo '<td>Web</td>';
                                              break;
                                            case 2:
                                             echo '<td>Facebook</td>';
                                            break;
                                            case 3:
                                            echo '<td>Whatsapp</td>';
                                              break;
                                            case 4:
                                            echo '<td>RKVM</td>';
                                            break;
                                            case 5:
                                            echo '<td>Google</td>';
                                            break;
                                            case 6:
                                            echo '<td>Youtube</td>';
                                            break;
                                            default:
                                            echo '<td>No Source</td>';
                                          }?>
                                                  </tr>



                                                <?php } } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                      <div class="main-card mb-3 card">
                      <div class="card-body"> 
                      <h5 class="card-title">Registered Webinar</h5>
                      <br>



                                   
                                      <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Time Slot</th>
                                                    <th>Source</th>
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Registered_Webinar['data'])){ 
                                                 foreach ($Registered_Webinar['data'] as $val){?>


                                                  <tr>
                                                  <td><?php echo $val['Name'] ?></td>
                                                  <td><?php echo $val['Contact'] ?></td> 
                                                  <td><?php echo $val['Email'] ?></td> 
                                                  <td><?php echo $val['Webinar_date'] ?></td>
                                                  <td><?php echo $val['Timeslot'] ?></td> 
                                                       <?php $Source = $val['Source'];

                                          switch ($Source) {
                                            case 1:
                                            echo '<td>Web</td>';
                                              break;
                                            case 2:
                                             echo '<td>Facebook</td>';
                                            break;
                                            case 3:
                                            echo '<td>Whatsapp</td>';
                                              break;
                                            case 4:
                                            echo '<td>RKVM</td>';
                                            break;
                                            case 5:
                                            echo '<td>Google</td>';
                                            break;
                                            case 6:
                                            echo '<td>Youtube</td>';
                                            break;
                                            default:
                                            echo '<td>No Source</td>';
                                          }?>
                                                  </tr>



                                                <?php } } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                  


                   </div>
                   </div>     
                  </div>
                  </div>
                    <?php include 'include/Footer.php' ?> 
                  </div>
        </div>
    </div>
    <script src="<?=THEME?>/assets/js/datatables.min.js"></script>
    <script src="<?=THEME?>/assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=THEME?>/assets/js/dataTables.buttons.min.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.bootstrap.min.js"></script>
    <script src="<?=THEME?>/assets/js/jszip.min.js"></script>
    <script src="<?=THEME?>/assets/js/vfs_fonts.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.html5.min.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.print.min.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.colVis.min.js"></script>
    <script src="<?=THEME?>/assets/js/datatables-init.js"></script>
    <script type="text/javascript">
    $("#registration_active").addClass("mm-active");
    $("#Web-list").addClass("mm-show");
    </script>
</body>
</html>
