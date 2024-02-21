<!doctype html>
<html lang="en">
<?php include 'include/Head.php' ?>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       <?php include 'include/Header.php' ?>
                Data
            <div class="app-main">
                <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner">

                                   <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Registration Update</h5>
                                        <?php if(isset($Data['data'])){ 
                                         foreach ($Data['data'] as $val){?>
                                        <form class=""  action="<?=base_url()?>/Admin/updateRegistration" method="post" enctype="multipart/form-data">
                                            <input name="ID" id="Id" value="<?php echo $val['ID']?>" type="text" class="form-control" style="display:none;">
                                            <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                            <input name="Name" id="name" value="<?php echo $val['Name']?>" type="text" class="form-control"></div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Contact</label>
                                            <div class="col-sm-10">
                                            <input name="Contact" id="Contact" value="<?php echo $val['Contact']?>" type="text" class="form-control">
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                            <input name="Email" id="Email" value="<?php echo $val['Email']?>" type="Email" class="form-control">
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Webinar Date</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="Webinar_date">
                                                    <option value="<?php echo $val['webinarID'] ?>,<?php echo $val['Webinar_date'] ?>"><?php echo $val['Webinar_date'] ?></option>
                                                    <?php
                                                     if(isset($Webinar['data']))
                                                     {
                                                        foreach ($Webinar['data'] as $val1) {
                                                        date_default_timezone_set("Asia/Kolkata");
                                                        $Currentdate= date("Y-m");
                                                        $date2= date("Y-m", strtotime($val1['Date']));
                                                        if($date2 >=$Currentdate)
                                                        {


              
                                                         ?>
                                                        
                                                        <option value="<?php echo $val1['Id'] ?>,<?php echo $val1['Date'] ?>"><?php echo $val1['Date'] ?></option>

                                                       
                                                     

                                                       
                                                    
                                                     <?php } else {} } }?>
                                                   

                                                        
                                                    </select>
                                               </div>
                                        </div>
                                           
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary">Submit</button>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                     <?php }} ?>
                                      <button style="margin-left: 27%;margin-top: -6%;" onclick="window.location.href='<?=base_url()?>/Admin/AllRegistration'" class="btn btn-primary ">Close</button>
                                    </div>
                                </div>
                          
                        
                    </div>
                   
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
<script>
function goBack() {
  window.history.back();
}
$(document).ready(function(){
   
    $("#registration_active").addClass("mm-active");
    $("#Web-list").addClass("mm-show");
  
  
    });
</script>
</body>
</html>
