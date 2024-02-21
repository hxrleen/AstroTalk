                                            
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
                                    <div class="card-body"><h5 class="card-title">Banner Update</h5>
                                     <?php if(isset($Data['data'])){ 
                                         foreach ($Data['data'] as $val){?>
                                        <form class=""  action="<?=base_url()?>/Admin/Bannerupdate_Submit" method="post" enctype="multipart/form-data">
                                         <input type="text" name="Course_Id" style="display:none;" value="<?php echo($filtercourse) ?>">
                                        <input name="BannerID" value="<?php echo $val['BannerID'] ?>" id="Title" placeholder="Title" type="text" class="form-control" style="display: none;">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Course</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="Course_ID">
                                                    <option value="<?php echo $val['CourseID'] ?>"><?php echo $val['Couse_Title'] ?></option>
                                                    <?php
                                                     if(isset($Course['data']))
                                                     {  
                                                        $count=0;
                                                        foreach ($Course['data'] as $val1) {
                                                         if($val1['Course_Id']!=$val['CourseID']){ ?>
                                                        <option value="<?php echo $val1['Course_Id'] ?>"><?php echo $val1['Couse_Title'] ?></option>
                                                        
                                                       <?php } else { ?>
                                                       <?php }?>

                                                       <?php $count = $count + 1; ?>
                                                    
                                                     <?php } } ?>

                                                        
                                                    </select>
                                               </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Banner Title</label>
                                                <div class="col-sm-10">
                                                <input name="Title" value="<?php echo $val['Title'] ?>" id="Title" placeholder="Please Enter the Banner Title" type="text" class="form-control" ></div>
                                            </div>
                                           

                                           <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Short Description</label>
                                            <div class="col-sm-10">
                                             <textarea id="short-description"  name="ShortDesc" placeholder="Please Enter the Description of Banner" class="form-control"maxlength="200" type="text" rows="4" cols="50" required><?php echo $val['ShortDesc'] ?></textarea> 
                                             <span id="rchars">200</span> Character(s) Remaining
                                             </div>
                                            </div>

                                            <div class="form-check">
                                            <label for="exampleFile" style="margin-left:-30px;" class="col-sm-2 col-form-label">Link?</label>
                                            <?php
                                            if($val['Link?']==1){
                                     
                                              ?>
                                            <input style="margin-left: 20px;" onclick="showlink()" type="checkbox" id="Link?" name="Link?" value="1" checked>
                                            <label for="Link">Link</label><br>
                                           
                                            <?php } else{?>
                                             <input style="margin-left: 20px;" onclick="showlink()" type="checkbox" id="Link?" name="Link?" value="1" >
                                            <label for="Link">Link</label><br>
                                            <?php }?>
                                            
                                            </label>
                                            </div>
                                           

                                            <div id="longdesc" class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Long Description</label>
                                            <div class="col-sm-10">
                                             <textarea  name="Long_Desc" placeholder="Please Enter the Description of Banner" class="ckeditor"  type="text" rows="4" cols="50"><?php echo $val['Long_Desc'] ?></textarea> 
                                              
                                             </div>
                                            </div>

                                            <div id="Linkdiv" style="display: none;" class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Link</label>
                                            <div class="col-sm-10">

                                            <input name="Link" value="<?php echo $val['Link'] ?>" id="Link" placeholder="Please Enter the Banner Link" type="text" class="form-control"></div>
                                            </div>
                                            
 


                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Banner Image</label>
                                                <div class="col-sm-10">
                                            <input name="image" style="height:44px;" accept="image/*" id="Image" placeholder="" type="file" class="form-control" >  
                                             <img src="<?=base_url()?>/public/uploads/<?php echo $val['image'] ?>" alt="Card image" style="width:23%;">  
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div> 

                                            <div class="position-relative row form-group">
                                             <label for="exampleFile" class="col-sm-2 col-form-label">Banner Status</label>
                                             <div class="col-sm-10">
                                              <select class="form-control" name="Status">
                                              <option value="<?php echo $val['Status']?>">
                                              <?php echo $val['Status']?></option>
                                              <option value="Active">Active</option>
                                              <option Value="Inactive">Inactive</option>
                                              </select>
                                             <small class="form-text text-muted"></small>
                                             </div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Button Text </label>
                                            <div class="col-sm-10">
                                            <input value="<?php echo $val['button_text']?>" name="button_text" id="Title" placeholder="Please Enter the Button Text" type="text" class="form-control" required></div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Background Colour</label>
                                            <div class="col-sm-10">
                                            <input name="back_color" value="<?php echo $val['back_color']?>" id="Colour_Code" placeholder="Please Enter Background Colour Code for Banner" type="color" >   
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
       // debugger;    
       $("#Bannerlist").addClass("mm-active");
       $('#Dashboard-active').removeClass("mm-active");
        var checkedvalue=document.getElementById('Link?').checked ;
        // alert(checkedvalue); 
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
       $("#App-active").addClass("mm-show");
        var maxLength = 200;
        var old_char=$('#short-description').val().length;
        var textlen = maxLength - old_char;
      
        // // alert(old_char);
        // if(old_char==maxLength || old_char>=maxLength )
        // {
            
        //    var textlen=0;
        // }
        // else
        // {
        //     var textlen = maxLength - old_char;
            
        // }
        
        $('#rchars').text(textlen);

});
var maxLength = 200;
$('#short-description').on('input',function()
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
