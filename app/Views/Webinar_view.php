<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.float{

  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#25D366;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}
</style>
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
              <table width="100%" border="0" cellspacing="2" cellpadding="5">
              <tbody>
              <tr>
              <td></td>
              <td><strong>Webinar Date</strong></td>
              <td>:</td>
              <td><?php echo (date(' jS F Y', strtotime($Webinar['data'][0]['Date'])))?></td>
               
              </tr>
              <tr>
              <td></td>
              <td><strong>Time Slot</strong></td>
              <td>:</td>
              <td><?php echo($Webinar['data'][0]['TimeSlot'])?></td>
               
              </tr>
              <tr>
              <td></td>
              <td><strong>Link Activate Time</strong></td>
              <td>:</td>
              <td><?php echo(date('h:i',strtotime($Webinar['data'][0]['LinkActiveTime'])))?></td>
              </tr>
              
              <tr>
              <td></td>
              <td><strong>Total Registration</strong></td>
              <td>:</td>
              <td><?php echo($Webinar['data'][0]['Total_Reg'])?></td>
               
              </tr>
              <tr>
              <td></td>
              <td><strong>Non Attendant</strong></td>
              <td>:</td>
              <td><?php echo($Webinar['data'][0]['NonAttendent'])?></td>
              </tr>

              <tr>
              <td></td>
              <td><strong>Attendant</strong></td>
              <td>:</td>
              <td><?php echo($Webinar['data'][0]['Total_Reg']-$Webinar['data'][0]['NonAttendent'])?></td>
               
              </tr>
              
             <!--  <tr>
              <td></td>
              <td><strong></strong></td>
              <td>:</td>
              <td><a href="#" class="topbutton"style="">
              <button type="button" class="btn btn-primary">Generate Attendence</button></a>
              </td>
              </tr> -->
              
              </tbody>
              </table> 
              <br>
              
              
                
              <button type="button" style="margin-left: 4%;" onclick="window.open('<?=CTRL?>Attendenceform.php?Webinar_Id=<?php echo $Webinar['data'][0]['Id'] ?>', '_blank')" class="btn btn-primary">Generate Attendence</button>
              <p id="p1" style="display:none;"><?=CTRL?>Attendenceform.php?Webinar_Id=<?php echo $Webinar['data'][0]['Id'] ?></p>
              <button class="btn btn-primary"  onclick="copyToClipboard('#p1')">Copy Attendence Link </button>
              <button type="button" onclick="window.open('<?=CTRL?>gl.php?Webinar_Id=<?php echo $Webinar['data'][0]['Id'] ?>','_blank')" class="btn btn-primary">Meeting Link</button>

            
           

              
              

              
            



             </div>
             </div>
              <div class="main-card mb-3 card">
              <div class="card-body"> 
            
            
             
            
            <?php $User_list = isset($_POST['Userlist'])?$_POST['Userlist']:'';
            ?>
            <h5 class="card-title">Registered List</h5> 
            <form style="float:right;margin-top: -3%;">
            <div class="position-relative form-check form-check-inline">
            <label class="form-check-label">
            <?php if($User_list=='all'){ ?>
            <input type="radio" id="All" checked="" value="All" onclick="checkradio()" name="Attendent" class="form-check-input">All
             <?php } else {?>
            <input type="radio" id="All" value="All" onclick="checkradio()" name="Attendent" class="form-check-input">All
            <?php } ?>
            </label>
            </div>
             <div class="position-relative form-check form-check-inline">
            <label class="form-check-label">
            <?php if($User_list=='attend'){ ?>
           
            <input type="radio" value="Attendent" checked="" onclick="checkradio()" name="Attendent" class="form-check-input">Attendant
            <?php } else {?>
            <input type="radio" value="Attendent" onclick="checkradio()" name="Attendent" class="form-check-input">Attendant
            <?php } ?>
           </label>
            </div>
            <div class="position-relative form-check form-check-inline">
            <label class="form-check-label">
            <?php if($User_list=='Non-attend'){ ?>
            <input type="radio" value="Non-Attendent" checked=""  onclick="checkradio()" name="Attendent" class="form-check-input">Non Attendant
            <?php } else {?>
             <input type="radio" value="Non-Attendent"  onclick="checkradio()" name="Attendent" class="form-check-input">Non Attendant
            <?php } ?>
            </label>
            </div>
            </form>
            <br>
            <br>



                                   
                                      <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                   
                                                    <th>Registration Id</th>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Source</th>
                                                    <th>Registration DateTime</th>
                                                    <th></th>

                                                    <!-- <th>Date</th>
                                                    <th>Time Slot</th> -->
                                                    <!-- <th>Action</th> -->
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($UserList['data'])){ 
                                                 foreach ($UserList['data'] as $val){?>


                                                  <tr>
                                                  <td><?php echo $val['RegistrationId'] ?></td>
                                                  <td><?php echo $val['Name'] ?></td>
                                                  <td><?php echo $val['Contact'] ?></td> 
                                                  <td><?php echo $val['Email'] ?></td>
                                                  <td><?php echo $val['Status'] ?></td>
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
                                          
                             
                                                  <td><?php echo $val['Registration_Date'] ?></td>
                                                  <td><a href="https://api.whatsapp.com/send?phone=<?php echo($val['Contact']) ?>&text=Hi&nbsp;<?php echo ($val['Name']) ?>" target="_blank"><i class="fa fa-whatsapp my-float"  style="font-size:22px;color:#25D366;"></i></a></td>

                                                  <!-- <td><?php echo $val['Date'] ?></td>
                                                  <td><?php echo $val['TimeSlot'] ?></td> --> 
                                                  </tr>



                                                <?php } } ?>

                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                </div>
                                <form  method="post" id="Attend_userlist" style="display:none" action="<?=base_url()?>/Admin/Attend_userlist">
                               
                                <input type="hidden" value="<?php echo($Webinar['data'][0]['Id']) ?>" name="Id">
                                 <input type="text" value="attend" name="Userlist">

                                </form>
                                 <form  method="post" id="All_userlist" style="display:none" action="<?=base_url()?>/Admin/Webinarview">
                               
                                  <input type="hidden" value="<?php echo($Webinar['data'][0]['Id']) ?>" name="Id">
                                   <input type="text" value="all" name="Userlist">

                                </form>

                                 <form  method="post" id="Nonattenden_userlist" style="display:none" action="<?=base_url()?>/Admin/NonAttend_userlist">
                               
                                  <input type="hidden" value="<?php echo($Webinar['data'][0]['Id']) ?>" name="Id">
                                  <input type="text" value="Non-attend" name="Userlist">

                                </form>
                                  


            









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
    function checkradio()
    {
       var Attendent =$("input[type='radio'][name='Attendent']:checked").val();
       //alert(Attendent);
       if(Attendent=='Attendent')
       {
          $('#Attend_userlist').submit();    
       }
       else if(Attendent=='All')
       {
           $('#All_userlist').submit();
       }
       else
       {
           $('#Nonattenden_userlist').submit();
       }
    }
    $(document).ready(function()
    {
        
      var newvalue='<?php print_r($User_list)?>';
      if(newvalue=='')
      {

        $('#All').prop('checked', true);
      
      } 
      // else
      // {
      //    $("#All").prop( "checked", false);
      // }

       $("#webinar-active").addClass("mm-active");
       $("#Web-list").addClass("mm-show");
       

    });
   
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}


    </script>
      




</body>
</html>
