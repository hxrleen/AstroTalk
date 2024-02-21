
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
                                    <div class="card-body"><h5 class="card-title">Chapter Edit</h5>
                                     <?php if(isset($Data['data'])){ 
                                         foreach ($Data['data'] as $val){?>
                                        <form class=""  action="<?=base_url()?>/Admin/UpdateChapter_Submit" method="post" enctype="multipart/form-data">
                                            
                                             <input name="Chapter_ID" value="<?php echo $val['Chapter_ID'] ?>" id="Title" placeholder="Title" type="text" class="form-control" required  style="display: none;">
                                            <input type="text" name="LanguageId" style="display:none;" value="<?php echo($filterLanguage) ?>">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Course</label>
                                                <div class="col-sm-10">
                                                 <input name="Course_Name"  maxlength="50" id="Title"  value="<?php echo $val['Course_Name'] ?>"placeholder="Please Enter the Course Title" type="text" class="form-control" required>   
                                               </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Chapter Title</label>
                                                <div class="col-sm-10">
                                                <input name="Chapter_Title"  maxlength="50" value="<?php echo $val['Chapter_Title'] ?>" id="Title" placeholder="Please enter the chapter title" type="text" class="form-control" required>
                                                <span class="form-text text-muted">Please Enter Chapter Title only 50 characters</span> 
                                               </div>
                                                 
                                            </div>
                                          
                                            

                                           

                                           <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                            <textarea id="short-description" placeholder="Please enter the description of Chapter"  name="Chapter_desc" class="form-control" type="text" maxlength="100" rows="4" cols="50"><?php echo $val['Chapter_desc'] ?>
                                             </textarea>
                                             <?php if (strlen($val['Chapter_desc']==100) ){?>
                                             <span>100</span>Character(s) Remaining   
                                             <?php } else{?>
                                             <span id="rchars">100</span> Character(s) Remaining
                                            <?php } ?>
                                             </div>
                                            </div>
 


                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                            <input name="Chpater_Icon" id="Image" placeholder="" type="file" class="form-control" > 
                                             <span class="form-text text-muted">Please select image 70*70</span> 
                                            <img src="<?=base_url()?>/public/uploads/<?php echo $val['Chpater_Icon'] ?>" alt="Card image" style="width:23%;"> 
                                           
                                                </div>
                                            </div> 

                                             <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Language</label>
                                               
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="Language">
                                                <option value="<?php echo $val['Language'] ?>"><?php echo $val['LanguageName'] ?></option>
                                                    <?php
                                                     if(isset($Language['data']))
                                                     {
                                                         $count=0;
                                                        foreach ($Language['data'] as $val1) { 
                                                         if($val1['LanguageId']!=$val['Language']){ ?>
                                                      <option value="<?php echo $val1['LanguageId'] ?>"><?php echo $val1['LanguageName'] ?></option>
                                                       <?php } else { ?>
                                                       <?php }?>
                                                       
                                                       <?php $count = $count + 1; ?>
                                                     <?php } } ?>

                                                        
                                                    </select>
                                               </div>
                                            </div>
                                            

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Order</label>
                                                <div class="col-sm-10">
                                            <input name="Chapter_Order" id="Chapter_Order" value="<?php echo $val['Chapter_Order'] ?>" placeholder="" type="number" min="0" class="form-control" required>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>

                                           
                                           



                                              
                                           
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary">Submit</button>
                                                  
                                                </div>
                                            </div>
                                        </form>
                                         <?php }} ?>
                                        <?php if($count==1){?>
                                         <button style="margin-left: 27%;margin-top: -60px;" onclick="goback()" class="btn btn-primary ">Close</button>
                                         <?php } else {?>
                                         <button style="margin-left: 27%;margin-top: -60px;" onclick="window.location.href='<?=base_url()?>/Admin/Chapter'" class="btn btn-primary">Close</button>
                                         <?php }?>
                                        
                                     <form id="gobackform"  style="display:none;" action="<?=base_url()?>/Admin/SelectLanguage_chapter" method="post">
                                     <input type="text" value="<?php echo $Language['data'][0]['LanguageId'] ?>" name="LanguageId" class="form-control">  </form>
                                        
                                    </div>
                                </div>
                     
                          
                        
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
        // var maxLength = 100;
        // var old_char=$('#short-description').val().length;
        // alert(old_char)
        // // var newchar=old_char.replace(/\s/g, "").length;
        // var textlen = maxLength - old_char;
        // $('#rchars').text(textlen);
      
});
function goBack() {
  window.history.back();
}
var maxLength = 100;
$('#short-description').on('input',function()
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
