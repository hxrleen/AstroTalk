<!doctype html>
<html lang="en">
<?php include 'include/Head.php' ?>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       <?php include 'include/Header.php' ?>
                
            <div class="app-main">
                <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner">

                                   <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Webinar Insert</h5>
                                        <form class=""  action="<?=base_url()?>/Admin/webinar_Submit" method="post" enctype="multipart/form-data">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Webinar Date</label>
                                                <div class="col-sm-10">
                                                <input name="Date" id="Date" placeholder="Webinar Date" type="date" class="form-control" required></div>
                                            </div>
                                           
                                            
                                          
                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Time Slot</label>
                                                <div class="col-sm-10">
                                                <select name="TimeSlot" class="form-control">
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
                                            <input name="LinkActiveTime" id="Date" placeholder="Webinar Date" type="time" class="form-control" required></div>
                                            </div>
                                            <?php 
                                            $Meeting_Details='<p><span style="font-size:18pt"><strong><span style="color:#003399">Find below the Zoom meeting link for</span><br />
                                            <span style="background-color:#f1c40f"><span style="color:#003399">SuperBrain Intro webinar</span></span></strong></span></p>

                                            <p><span style="font-size:12pt"><strong><span style="font-size:13.5pt">Day</span></strong><span style="font-size:13.5pt">: Today, 23/06/21, Tuesday<br />
                                            <strong>Time</strong>: 2&nbsp;to 3&nbsp;pm<br />
                                            <strong>Meeting Link</strong>: &nbsp;</span><a href="http://tinyurl.com/SuperBrainIntro1" style="color:#0563c1; text-decoration:underline"><span style="font-size:13.5pt"><span style="background-color:#f1c40f"><span style="color:#003366">tinyurl.com/SuperBrainIntro</span></span></span></a></span></p>

                                            <p><span style="font-size:12pt"><strong><span style="font-size:13.5pt">Meeting ID</span></strong><span style="font-size:13.5pt">: 745 9815 4653<br />
                                            <strong>Passcode</strong>: intro</span></span></p>

                                            <p><span style="font-size:11.0pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;">Meeting link also mailed to your email id</span></span></p>

                                            <p><span style="font-size:12pt"><span style="font-size:13.5pt">See you in the webinar.</span></span></p>

                                            <p><span style="font-size:11.0pt"><img alt="https://docs.google.com/uc?export=download&amp;id=1tCG4H5WU-THAXqyJuIRtqXLgvBqbER3h&amp;revid=0B-yNOFAF2VOfTnZwUktDV1VncndCdGFGTk5PS1NEaHlBVGpzPQ" src="https://thewhiteforest.org/assets/images/SB_Logo.png" style="width:200px" /></span></p>


                                            ';
                                            ?>
                                            <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Meeting Details</label>
                                            <div class="col-sm-10">
                                            <textarea name="Meeting_Details" id="Date" class="form-control ckeditor ">
                                            <?php echo $Meeting_Details; ?>
                                            </textarea>
                                            </div>
                                            </div>
                                           
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary">Submit</button>
                                                  
                                                </div>
                                            </div>
                                        </form>
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

jQuery(document).ready(function($) {
    $("#webinar-active").addClass("mm-active");
    $("#Web-list").addClass("mm-show");
  });

</script>
</body>
</html>
