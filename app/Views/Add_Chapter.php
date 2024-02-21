                                            
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
                                    <div class="card-body"><h5 class="card-title">Add Chapter</h5>
                                        <form class=""  action="<?=base_url()?>/Admin/Chapter_Submit" method="post" enctype="multipart/form-data">
                                             <input type="text" name="LanguageId" style="display:none;" value="<?php echo($filterLanguage) ?>">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Course</label>
                                                <div class="col-sm-10">
                                                <input name="Course_Name"  maxlength="50" id="Title" placeholder="Please Enter the Course Title" type="text" class="form-control" required>
                                               </div>
                                            </div> 
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Chapter Title</label>
                                                <div class="col-sm-10">
                                                <input name="Chapter_Title"  maxlength="50" id="Title" placeholder="Please Enter the Chapter Title" type="text" class="form-control" required>
                                                 <span class="form-text text-muted">Please Enter Chapter Title only 50 characters</span>
                                            </div>
                                            </div>
                                          

                                           <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                             <textarea id="short-description"  name="Chapter_desc" placeholder="Please Enter the Description of Chapter" class="form-control"maxlength="100" type="text" rows="4" cols="50" required></textarea> 
                                             <span id="rchars">100</span> Character(s) Remaining
                                             </div>
                                            </div>
 


                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                            <input name="Chpater_Icon" style="height:44px;" onchange="imagecheck()" accept="image/*" id="Image" placeholder="" type="file" class="form-control" required="">   
                                            <span class="form-text text-muted">Please select image 70*70</span>
                                            </div>
                                            </div> 

                                            

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Order</label>
                                            <div class="col-sm-10">
                                            <input name="Chapter_Order" min="0" value="<?php print_r($CountID+1) ?>"  id="Chapter_Order" placeholder="Please Enter Chapter Order" type="number" class="form-control" required>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>

                                             <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Language</label>
                                               
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="Language">
                                                    <?php
                                                     if(isset($Language['data']))
                                                     {

                                                      $count=0;
                                                      foreach ($Language['data'] as $val) {  ?>
                                                      <option value="<?php echo $val['LanguageId'] ?>"><?php echo $val['LanguageName'] ?></option>
                                                      <?php $count = $count + 1; ?>  
                                                       
                                                     <?php } } ?>
                                  
                                                        
                                                    </select>
                                               </div>
                                            </div>
                                           

                                            
                                            



                                              
                                           
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary">Submit</button>
                                                  
                                                </div>
                                            </div>
                                        </form>
                                        
                                        <?php if($count==1){?>
                                        <button style="margin-left: 27%;margin-top: -60px;" onclick="goback()" class="btn btn-primary ">Close</button>
                                       <?php } else {?>
                                        <button style="margin-left: 27%;margin-top: -60px;" onclick="window.location.href='<?=base_url()?>/Admin/Chapter'" class="btn btn-primary ">Close</button>
                                       <?php }?>
                                       
                                       

                                    </div>
                                </div>
                               
                                <form id="gobackform"  style="display:none;" action="<?=base_url()?>/Admin/SelectLanguage_chapter" method="post">
                                <input type="text" value="<?php echo $Language['data'][0]['LanguageId'] ?>" name="LanguageId" class="form-control">    
                                </form>
                                

                          
                        
                    </div>
                   
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
<script>

jQuery(document).ready(function($)
 {
          
       $("#chapters").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");
});
var maxLength = 100;
$('#short-description').keyup(function()
 {
 var textlen = maxLength - $(this).val().length;
 $('#rchars').text(textlen);
 });
function goback()
{
   $('#gobackform').submit();
}
</script>
</body>
</html>
