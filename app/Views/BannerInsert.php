                                            
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
                                    <div class="card-body"><h5 class="card-title">Add Banner</h5>
                                        <form class=""  action="<?=base_url()?>/Admin/Banner_Submit" method="post" enctype="multipart/form-data">
                                            <input type="text" name="Course_Id" style="display:none;" value="<?php echo($filtercourse) ?>">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Course</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="Course_ID">
                                                    <?php
                                                     if(isset($Data['data']))
                                                     {

                                                        $count=0;
                                                        foreach ($Data['data'] as $val) {  ?>
                                                        <option value="<?php echo $val['Course_Id'] ?>"><?php echo $val['Couse_Title'] ?></option>
                                                        <?php $count = $count + 1; ?>
                                                       
                                                     <?php } } ?>

                                                        
                                                    </select>
                                               </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Banner Title</label>
                                                <div class="col-sm-10">
                                                <input name="Title" id="Title" placeholder="Please Enter the Banner Title" type="text" class="form-control" required></div>
                                            </div>
                                           

                                           <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Short Description</label>
                                            <div class="col-sm-10">
                                             <textarea id="short-description"  name="ShortDesc" placeholder="Please Enter the Description of Banner" class="form-control"maxlength="200" type="text" rows="4" cols="50" required></textarea> 
                                             <span id="rchars">200</span> Character(s) Remaining
                                             </div>
                                            </div>

                                            <div class="form-check">
                                            <label for="exampleFile" style="margin-left:-30px;" class="col-sm-2 col-form-label">Link?</label>
                                            <input style="margin-left: 16px;" id="Link?" onclick="showlink()" type="checkbox" name="Link?" value="1">
                                            <span class="label-text">Link</span>
                                            </label>
                                            </div>

                                            <div id="longdesc" class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Long Description</label>
                                            <div class="col-sm-10">
                                             <textarea  name="Long_Desc" placeholder="Please Enter the Description of Banner" class="ckeditor"  type="text" rows="4" cols="50"></textarea> 
                                              
                                             </div>
                                            </div>

                                            <div id="Linkdiv" style="display: none;" class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Link</label>
                                            <div class="col-sm-10">
                                            <input name="Link" id="Link" placeholder="Please Enter the Banner Link" type="text" class="form-control"></div>
                                            </div>
                                            
 


                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Banner Image</label>
                                                <div class="col-sm-10">
                                            <input name="image" style="height:44px;" accept="image/*" id="Image" placeholder="" type="file" class="form-control" required="">   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div> 

                                            <div class="position-relative row form-group">
                                             <label for="exampleFile" class="col-sm-2 col-form-label">Banner Status</label>
                                             <div class="col-sm-10">
                                              <select class="form-control" name="Status">
                                              
                                              <option value="Active">Active</option>
                                              <option Value="Inactive">Inactive</option>
                                              </select>
                                             <small class="form-text text-muted"></small>
                                             </div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Button Text </label>
                                                <div class="col-sm-10">
                                                <input name="button_text" id="Title" placeholder="Please Enter the Button Text" type="text" class="form-control" required></div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Background Colour</label>
                                            <div class="col-sm-10">
                                            <input name="back_color" id="Colour_Code" placeholder="Please Enter Background Colour Code for Banner" type="color"  required>   
                                            <small class="form-text text-muted"></small>
                                            </div>
                                            </div>



                                           

                                            
                                            



                                              
                                           
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary">Submit</button>
                                                  
                                                </div>
                                            </div>
                                        </form>
                                         <?php if($count==1){?>
                                        <button style="margin-left: 27%;margin-top: -6%;" onclick="goback()" class="btn btn-primary ">Close</button>
                                       <?php } else {?>
                                        <button style="margin-left: 27%;margin-top: -6%;" onclick="window.location.href='<?=base_url()?>/Admin/Bannerlist'" class="btn btn-primary ">Close</button>
                                       <?php }?>

                                    </div>
                                </div>
                               
                                <form id="gobackform"  style="display:none;" action="<?=base_url()?>/Admin/Coursebannerlist" method="post">
                                <input type="text" value="<?php echo $Data['data'][0]['Course_Id'] ?>" name="Course_Id" class="form-control">    
                                </form>

                          
                        
                    </div>
                   
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
<script>

jQuery(document).ready(function($)
 {
          
       $("#Bannerlist").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");
});
var maxLength = 200;
$('#short-description').keyup(function()
 {
 var textlen = maxLength - $(this).val().length;
 $('#rchars').text(textlen);
 });
function goback()
{
   $('#gobackform').submit();
}
function showlink()
{
     var checkedvalue=document.getElementById('Link?').checked ;
     if(checkedvalue==true)
     {
         $('#longdesc').hide();
         $('#Linkdiv').show();
     }
     else
     {
         $('#longdesc').show();
         $('#Linkdiv').hide();

     }
   
}
</script>
</body>
</html>
