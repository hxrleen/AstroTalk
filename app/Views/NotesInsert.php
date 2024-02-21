                                            
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
                                    <div class="card-body"><h5 class="card-title">Notice Insert</h5>
                                        <form class=""  action="<?=base_url()?>/Admin/Notes_Submit" method="post" enctype="multipart/form-data">
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


                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Title</label>
                                                <div class="col-sm-10">
                                                <input name="Title" id="Title" placeholder="Please Enter Notes Title" maxlength="100" type="text" class="form-control" required>
                                                 <span class="form-text text-muted">Please Enter Title Only 100 Characters</span>
                                              </div>
                                            </div>
                                            <!-- <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Date of Publish </label>
                                                <div class="col-sm-10">
                                                <input name="DateofPublish" id="Title" placeholder="Title" type="date" class="form-control" required></div>
                                            </div> -->

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Short Description</label>
                                            <div class="col-sm-10">
                                            <textarea id="short-description" name="Description"  placeholder="Please Enter the Short Description of Notes" maxlength="200" class="form-control" type="text" rows="4" cols="50"></textarea>
                                            <span id="rchars">200</span> Character(s) Remaining
                                            
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Content</label>
                                            <div class="col-sm-10">
                                             <textarea name="Content" class="form-group ckeditor" type="text" rows="4" cols="50"></textarea>
                                             <small class="form-text text-muted"></small>
                                             </div>
                                            </div>  

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Attachment</label>
                                                <div class="col-sm-10">
                                            <input name="Attachment" accept="image/*,.pdf,.doc,.xlsx, .xls, .csv" id="Attachment" placeholder="" type="file" class="form-control">   
                                            <small class="form-text text-muted">Please select only pdf,docs,excel,images</small>
                                            </div>
                                            </div> 

                                            <!-- <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                            <input name="Image" accept="image/*" id="Image" placeholder="" type="file" class="form-control" required>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div> --> 

                                            

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Order</label>
                                                <div class="col-sm-10">
                                            <input name="Notes_Order" value="<?php print_r($CountID+1) ?>" min="0" id="Notes_Order" placeholder="Plese Enter the Notes Order" type="number" class="form-control" required>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>

                                            <!-- <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Type</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" name="Type">
                                            <option value="Free">Free</option>
                                            <option Value="Paid">Paid</option>
                                            <option value="Both">Both</option>
                                                
                                            </select>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>
 -->
                                           <!--  <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Language</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" name="Language">
                                            <option value="English">English</option>
                                            <option Value="Hindi">Hindi</option>
                                           
                                                
                                            </select>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div> -->
                                           <!--  <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" name="Status">
                                            <option value="Draft">Draft</option>
                                            <option Value="Publish">Publish</option>
                                           
                                                
                                            </select>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>
 -->


                                              
                                           
                                            
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button name="submit" type="submit" value="Submit" class="btn btn-primary">Submit</button>
                                                    <button name="publish" type="submit" value="Publish" class="btn btn-primary">Submit & Publish</button>
                                                    <?php if($count==1){?>
                                                    <button style="" onclick="goback()" class="btn btn-primary ">Close</button>
                                                   <?php } else {?>
                                                    <button style="" onclick="window.location.href='<?=base_url()?>/Admin/Notes'" class="btn btn-primary ">Close</button>
                                                   <?php }?>
                                                  
                                                </div>
                                            </div>
                                        </form>
                                        
                                       
                                    </div>
                                </div>
                            <form id="gobackform"  style="display:none;" action="<?=base_url()?>/Admin/SelectNotes" method="post">
                            <input type="text" value="<?php echo $Data['data'][0]['Course_Id'] ?>" name="Course_Id" class="form-control">   </form>

                          
                        
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
jQuery(document).ready(function($)
    {
      
       $("#Notes").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");

    });

 var maxLength = 200;
$('#short-description').keyup(function() {
  var textlen = maxLength - $(this).val().length;
  $('#rchars').text(textlen);
});
function clicksave()
{
    $('form').attr('action','');
}

</script>
</body>
</html>
