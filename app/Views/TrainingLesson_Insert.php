<!doctype html>
<html lang="en">
<?php include 'include/Head.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<body>
<div class="preloader"></div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       <?php include 'include/Header.php' ?>
                
            <div class="app-main">
                <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner">

                                   <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Add New Blog</h5>
                                        <form class="" id="TopicInsert" method="post" enctype="multipart/form-data">
                                         <input type="text" style="display:none;" name="LanguageId"  value="<?php echo($filterLanguage) ?>">
                                            <!-- <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Chapter</label>
                                            <div class="col-sm-10">

                                                <select class="form-control" name="Chapter_ID" readonly>
                                                	<?php
                                                     if(isset($Data['data']))
                                                     {
                                                        foreach ($Data['data'] as $val) {  ?>
                                                       <option value="<?php echo $val['Chapter_ID'] ?>"><?php echo $val['Chapter_Title'] ?></option>
                                                	
                                                	 <?php } } ?>

                                                		
                                                </select>
                                               </div>
                                            </div> -->

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                            <input name="Title" maxlength="100" id="Topic_Name" placeholder="Please Enter Blog Title"  type="text" class="form-control" >
                                            <span class="form-text text-muted">Please Enter Title 100 characters only </span>
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Slug</label>
                                            <div class="col-sm-10">
                                            <input name="Slug" maxlength="100" id="Slug" placeholder="Please Enter Slug"  type="text" class="form-control" value=''>
                                            
                                            </div>
                                            </div>
                                            
                                           
                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Blog Summary</label>
                                                <div class="col-sm-10">
                                                <textarea id="short-description" placeholder="Please Enter the Summary of blog" name="Title_Short_Desc" maxlength="500" class="form-control" type="text" rows="4" cols="50"></textarea>
                                                    <span id="rchars">100</span> Character(s) Remaining
                                                </div>
                                            </div> 

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Blog Content</label>
                                                <div class="col-sm-10">
                                                <textarea id="Topic_Text" placeholder="Please Enter the Description of Topic" name="Topic_Text"  class="form-control ckeditor" type="text" rows="4" cols="50"></textarea>
                                                  
                                                </div>
                                            </div>
                                           


                                         

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                            <input name="Topic_Img" accept="image/*" id="Image" placeholder="" type="file" class="form-control" required>   
                                            <span class="form-text text-muted">Please select image ******</span>
                                                </div>
                                            </div> 
                                            
                                           





                                              <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Category</label>
                                               
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="Language">
                                                    <?php
                                                     if(isset($Language['data']))
                                                     {

                                                      $count=0;
                                                      foreach ($Language['data'] as $val) {  ?>
                                                      <option value="<?php echo $val['CategoriesID'] ?>"><?php echo $val['Cat_Name'] ?></option>
                                                      <?php $count = $count + 1; ?>  
                                                       
                                                     <?php } } ?>
                                  
                                                        
                                                    </select>
                                               </div>
                                            </div>



                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                            <input name="Topic_Order" value=''  id="Training_Order" placeholder="Enter Blog Status" type="number" min="0" class="form-control" required>   
                                            <small class="form-text text-muted"></small>
                                            </div>
                                            </div>
                                            
                                            
                                            
                                            <!-- Publisher -->
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Publisher</label>
                                            <div class="col-sm-10">
                                            <input name="Publisher" maxlength="100" id="Publisher" placeholder="Publisher Name"  type="text" class="form-control" value=''>
                                            <span class="form-text text-muted">Please Enter Publishers seperated by comma(,) </span>
                                            </div>
                                            </div>
                                        
                                             <!-- TAGS
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">TAGS</label>
                                            <div class="col-sm-10">
                                            <input name="TAGS" maxlength="100" id="TAGS" placeholder="TAGS"  type="text" class="form-control" value=''>
                                            <span class="form-text text-muted">Please Enter Tags seperated by comma(,) </span>
                                            </div>
                                            </div>
                                            
                                            <br>
                                            <br>-->
                                            
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">TAGS</label>
                    
                                                <div class="col-sm-10">
                                                    <select id="TAGS" class="js-example-basic-multiple form-control" multiple required="" name="TAGS[]" >
                                                    <?php
                                                     if(isset($Chapterlist['data']))
                                                     {

                                                    
                                                    foreach ($Chapterlist['data'] as $val_chapter) {  ?>
                                                    <option value="<?php echo $val_chapter['Tag_Name'] ?>"><?php echo $val_chapter['Tag_Name'] ?>
                                                    </option>
                                                      
                                                       
                                                     <?php } } ?>
                                  
                                                        
                                                    </select>
                                                    <span class="form-text text-muted">Multiple Tags can be selected using CTRL </span>
                                               </div>
                                            </div>
                                            
                                            <br>
                                            <br>
                                   
                                            <div class="position-relative row form-group"><H3 class="col-sm-2">SEO</h3>
                                           
                                            </div>
                                            <hr> </hr>
                                            
                                             <!-- Page Tittle -->
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Page Title</label>
                                            <div class="col-sm-10">
                                            <input name="Meta_Title" maxlength="100" id="Meta_Title" placeholder="Meta_Title"  type="text" class="form-control" value=''>
                                           
                                            </div>
                                            </div>
                                            
                                            
                                              <!-- Meta_Desc -->
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Meta Description</label>
                                            <div class="col-sm-10">
                                             <textarea id="Meta_Desc" placeholder="Please Enter Meta_Desc" name="Meta_Desc" maxlength="500" class="form-control" type="text" rows="3" cols="50"></textarea>
                                            
                                            </div>
                                            </div>
                                            
                                              <!-- Meta_Keywords -->
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Meta Keywords</label>
                                            <div class="col-sm-10">
                                             <textarea id="Meta_Keywords" placeholder="Please Enter Meta_Keywords" name="Meta_Keywords" maxlength="200" class="form-control" type="text" rows="3" cols="50"></textarea>
                                            
                                            </div>
                                            </div>
                                          



                                              
                                           
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary">Submit</button>
                                                  
                                                </div>
                                            </div>
                                        </form>
                                        
                                       <!--  <button style="margin-left: 27%;margin-top: -58px;" onclick="window.location.href='<?=base_url()?>/Admin/ChapterView/<?php //echo $Chapter_ID ?>'" class="btn btn-primary ">Close</button> -->
                                        <?php if($count==1){?>
                                        <button style="margin-left: 27%;margin-top: -60px;" onclick="goback()" class="btn btn-primary ">Close</button>
                                       <?php } else {?>
                                        <button style="margin-left: 27%;margin-top: -60px;" onclick="window.location.href='<?=base_url()?>/Admin/Chapter'" class="btn btn-primary ">Close</button>
                                       <?php }?>

                                        

                                    </div>
                                </div>
                                 <form id="gobackform"  style="display:none;" action="<?=base_url()?>/Admin/SelectLanguage_chapter" method="post">
                                <input type="text" value="<?php echo $Language['data'][0]['CategoriesID'] ?>" name="LanguageId" class="form-control">    
                                </form>

                                <form id="Slectlanguage" style="display:none;"  method="post" action="<?=base_url()?>/Admin/Chapter">
                                  <input type="text" name="LanguageId"  value="<?php echo($filterLanguage) ?>"> 
                                </form>
                          
                        
                    </div>
                   
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js">
 </script>
    
<script>
function goBack() {
  $('#gobackform').submit();
}
var maxLength = 100;
$('#short-description').keyup(function()
 {
 var textlen = maxLength - $(this).val().length;
 $('#rchars').text(textlen);
 });
 jQuery(document).ready(function($)
 {
        $(".js-example-basic-multiple").select2();     
       $("#chapters").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#TAGS').html(formoption);
       
});

//Function for SLUG
$('#Topic_Name').on('input',function()
 {
    $('#Slug').val(convertToSlug($(this).val()));
 });
 
 function convertToSlug(Text) {
  return Text.toLowerCase()
             .replace(/ /g, '-')
             .replace(/[^\w-]+/g, '');
}



$("#TopicInsert").on('submit',(function(e) {
  // alert('this is text');
//debugger;
   e.preventDefault();
   var data = new FormData(this);
   //add the content
   data.append('Topic_Text', CKEDITOR.instances['Topic_Text'].getData());
  $('.preloader').show();
  $.ajax({
         url: "<?=base_url()?>/Admin/Lesson_Submit",
   type: "POST",
   data:data,
   contentType: false,
         cache: false,
   processData:false,
  
    success:function(response)
            {
             $('.preloader').hide();
          
           alert(response);
            var obj = JSON.parse(response);
          
            if(obj.Status==true)
            {
             
              $('.preloader').hide();
              alert(obj.Msg);
             $('#Slectlanguage').submit();
              
           }
           else
           {
               alert(obj.Msg);
               $('.preloader').hide();
              
           }
           
          
        }
      



    });


 }));

$(document).ready(function(e){
 $('.preloader').hide();
});
function goback()
{
   $('#gobackform').submit();
}

</script>
</body>
</html>
