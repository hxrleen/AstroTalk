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
                                    <div class="card-body"><h5 class="card-title">Webinar Update</h5>
                                        <?php if(isset($Data['data'])){ 
                                         foreach ($Data['data'] as $val){?>
                                        <form class=""  action="<?=base_url()?>/Admin/webinarupdate" method="post" enctype="multipart/form-data">
                                             <input name="Id" id="Id" value="<?php echo $val['Id']?>" type="text" class="form-control" style="display:none;">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Date</label>
                                                <div class="col-sm-10">
                                                <input name="Date" id="Date" value="<?php echo $val['Date']?>" type="date" class="form-control"></div>
                                            </div>
                                           
                                            
                                          
                                             <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Time Slot</label>
                                                <div class="col-sm-10">
                                                <select name="TimeSlot" class="form-control">
                                                 <option value="<?php echo $val['TimeSlot']?>"><?php echo $val['TimeSlot']?></option>
                                                <option value="10AM to 11AM">10AM to 11AM</option>
                                                <option value="11AM to 12PM">11AM to 12PM</option>
                                                <option value="12PM to 1PM">12PM to 1PM</option>
                                                <option value="1PM to 2PM">1PM to 2PM</option>
                                                <option value="2PM to 3PM">2PM to 3PM</option>
                                                <option value="3PM to 4PM">3PM to 4PM</option>
                                                <option value="4PM to 5PM">4PM to 5PM</option>
                                                <option value="5PM to 6PM">5PM to 6PM</option>
                                                <option value="6PM to 7PM">6PM to 7PM</option>
                                                <option value="7PM to 8PM">7PM to 8PM</option>
                                                <option value="8PM to 9PM">8PM to 9PM</option>
                                                </select>
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>

                                             <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Link Active Time</label>
                                            <div class="col-sm-10">
                                            <input name="LinkActiveTime" value="<?php echo $val['LinkActiveTime']?>"  id="Date" placeholder="Webinar Date" type="time" class="form-control" required></div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Meeting Details</label>
                                            <div class="col-sm-10">
                                            <textarea name="Meeting_Details" id="Date" class="form-control ckeditor ">
                                             <?php echo $val['Meeting_Details']?>   
                                            </textarea>
                                            </div>
                                            </div>
                                           
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary">Submit</button>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                     <?php }} ?>
                                      <button style="margin-left: 27%;margin-top: -6%;" onclick="window.location.href='<?=base_url()?>/Admin/Allwebinar'" class="btn btn-primary ">Close</button>
                                    </div>
                                </div>
                          
                        
                    </div>
                   
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function goBack() {
  window.history.back();
}
$(document).ready(function()
 {
    
    $("#webinar-active").addClass("mm-active");
    $("#Web-list").addClass("mm-show");

 });
</script>
</body>
</html>
