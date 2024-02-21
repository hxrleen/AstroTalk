<!doctype html>
<html lang="en">
<?php include 'include/Head.php' ?>
<style type="text/css">

</style>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       <?php include 'include/Header.php' ?>
                
            <div class="app-main">
                <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner">
                                    
                                   <?php if(isset($Msg['Msg'])){?>

                                  <div class="alert alert-dismissible alert-warning">
                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                   
                                    <p class="mb-0"><?php print_r($Msg['Msg']); ?></p>
                                  </div>
                                  <?php } ?>
                                   <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Notes Update</h5>
                                    <?php if(isset($Data['data'])){ 
                                         foreach ($Data['data'] as $val){
                                   
                                    ?>

                                   
                                    
                                         <form class=""  action="<?=base_url()?>/Admin/UpdateNotes_Submit" method="post" enctype="multipart/form-data">
                                           <input name="NotesID" value="<?php echo $val['NotesID'] ?>" id="Title" placeholder="Title" type="text" class="form-control" required  style="display: none;">
                                            <input type="text" name="Course_Id" style="display:none;" value="<?php echo($filtercourse) ?>">
                                           <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Course</label>
                                            <div class="col-sm-10">
                                                    <select class="form-control" name="Course_ID">
                                                     <option value="<?php echo $val['Course_ID'] ?>"><?php echo $val['Couse_Title'] ?></option>
                                                    <?php
                                                     if(isset($Course['data']))
                                                     {
                                                        $count=0;
                                                        foreach ($Course['data'] as $val1) {
                                                         if($val1['Course_Id']!=$val['Course_ID']){ ?>
                                                        <option value="<?php echo $val1['Course_Id'] ?>"><?php echo $val1['Couse_Title'] ?></option>

                                                       <?php } else { ?>
                                                       <?php }?>

                                                       <?php $count=$count+1; ?>
                                                    
                                                     <?php } } ?>

                                                        
                                                    </select>
                                            </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Title</label>
                                                <div class="col-sm-10">
                                                <input name="Title" maxlength="100" value="<?php echo $val['Title'] ?>" id="Title" placeholder="Please Enter Notes Title" type="text" class="form-control" required>
                                                 <span class="form-text text-muted">Please Enter Title Only 100 Characters</span>
                                              </div>
                                            </div>
                                           <!--  <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Date of Publish</label>
                                                <div class="col-sm-10">
                                                <input name="DateofPublish" value="<?php echo $val['DateofPublish'] ?>" id="Title" placeholder="Title" type="date" class="form-control" required></div>
                                            </div> -->

                                           <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Short Description</label>
                                            <div class="col-sm-10">
                                             <textarea id="short-description" name="Description"  placeholder="Please Enter the Short Description of Notes" maxlength="200" class="form-control" type="text" rows="4" cols="50"><?php echo $val['Description'] ?></textarea>
                                             <span id="rchars">200</span> Character(s) Remaining
                                             </div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Content</label>
                                            <div class="col-sm-10">
                                             <textarea name="Content" class="form-group ckeditor" type="text" rows="4" cols="50"><?php echo $val['Content'] ?></textarea>
                                             <small class="form-text text-muted"></small>
                                             </div>
                                            </div>  

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Attachment</label>
                                                <div class="col-sm-10">
                                            <input name="Attachment" id="Attachment" placeholder="" type="file" class="form-control"> 
                                            <p><?php echo $val['Attachment'] ?></p>  
                                             <small class="form-text text-muted">Please select only pdf,docs,excel,images</small>
                                            </div>
                                            </div> 

                                            <!-- <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                            <input name="Image" id="Image" placeholder="" type="file" class="form-control" >
                                            <img src="<?=base_url()?>/public/uploads/<?php echo $val['Image'] ?>" alt="Card image" style="width:50%;">    
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>  -->


                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Order</label>
                                            <div class="col-sm-10">
                                            <input name="Notes_Order" min="0" value="<?php echo $val['Notes_Order'] ?>" id="Notes_Order" placeholder="Plese Enter the Notes Order" type="number" class="form-control" required> <small class="form-text text-muted"></small>
                                            </div>
                                            </div>

                                          <!--   <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Type</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" name="Type">
                                            <option value="<?php echo $val['Type'] ?>"><?php echo $val['Type'] ?></option>
                                            <?php if($val['Type']=='Free'){?>
                                            <?php } else { ?>
                                              <option value="Free">Free</option>
                                            <?php } ?>
                                            <?php if($val['Type']=='Paid'){?>
                                            <?php } else { ?>
                                              <option value="Paid">Paid</option>
                                            <?php } ?>
                                            <?php if($val['Type']=='Both'){?>
                                            <?php } else { ?>
                                              <option value="Both">Both</option>
                                            <?php } ?>
                                          
                                            
                                                
                                            </select>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div> -->


                                            <!-- <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Language</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" name="Language">

                                            <option value="<?php echo $val['Language'] ?>"><?php echo $val['Language'] ?></option>
                                            <?php if($val['Language']=='English'){?>
                                            <?php } else { ?>
                                              <option value="English">English</option>
                                            <?php } ?>
                                            <?php if($val['Language']=='Hindi'){?>
                                            <?php } else { ?>
                                              <option value="Hindi">Hindi</option>
                                            <?php } ?>
                                           </select>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div> -->

                                           <!--  <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" name="Status">

                                            <option value="<?php echo $val['Status'] ?>"><?php echo $val['Status'] ?></option>
                                            <?php if($val['Status']=='Draft'){?>
                                            <?php } else { ?>
                                              <option value="Draft">Draft</option>
                                            <?php } ?>
                                            <?php if($val['Status']=='Publish'){?>
                                            <?php } else { ?>
                                              <option value="Publish">Publish</option>
                                            <?php } ?>
                                           </select>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div> -->





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
                                        <button style="margin-left: 27%;margin-top: -6%;" onclick="window.location.href='<?=base_url()?>/Admin/Notes'" class="btn btn-primary ">Close</button>
                                       <?php }?>
                                       
                                    </div>
                                </div>
                                 <form id="gobackform"  style="display:none;" action="<?=base_url()?>/Admin/SelectNotes" method="post">
                                <input type="text" value="<?php echo $Data['data'][0]['Course_Id'] ?>" name="Course_Id" class="form-control">    
                                </form>
                        
                    </div>
                   
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
<script>
function goback()
{
   $('#gobackform').submit();
}
 var maxLength = 200;
$('#short-description').keyup(function() {
  var textlen = maxLength - $(this).val().length;
  $('#rchars').text(textlen);
});
jQuery(document).ready(function($)
    {
      
       $("#Notes").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");
       var maxLength = 200;
       var old_char=$('#short-description').val().length;
       var textlen = maxLength - old_char;
        $('#rchars').text(textlen);

    });

</script>
</body>
</html>
