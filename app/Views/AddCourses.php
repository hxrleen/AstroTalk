                                            
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
                                    <div class="card-body"><h5 class="card-title">Add Course</h5>
                                        <form class=""  action="<?=base_url()?>/Admin/Course_Submit" method="post" enctype="multipart/form-data">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Couse Title</label>
                                                <div class="col-sm-10">
                                                <input name="Couse_Title" id="Title" placeholder="Please Enter the Course Title" maxlength="100" type="text" class="form-control" required>
                                                 <span class="form-text text-muted">Please Enter Course Title only 100 characters</span>
                                               </div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Course Short Desc</label>
                                            <div class="col-sm-10">
                                            <textarea name="Course_Short_Desc" id="short-description" placeholder="Please Enter the Short Description of Course" type="text" rows="4" cols="50" maxlength="200" class="form-control" required></textarea>
                                             <span id="rchars">200</span> Character(s) Remaining
                                            </div>
                                            </div>
                                            
                                           <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Course Description</label>
                                            <div class="col-sm-10">
                                             <textarea  name="Course_Description" placeholder="Please Enter the Description of Course" class="ckeditor"  type="text" rows="4" cols="50"></textarea> 
                                              
                                             </div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Course Benefits</label>
                                            <div class="col-sm-10">
                                             <textarea  name="Benefits" placeholder="Please Enter the Benefits of Course" class="ckeditor"  type="text" rows="4" cols="50"></textarea> 
                                              
                                             </div>
                                            </div>

                                          
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Course Duration</label>
                                            <div class="col-sm-10">
                                            <input name="Course_Duration" id="Course_Duration" placeholder="Please Enter the Duration of Course in Minute" type="number" min="0" class="form-control" required>
                                            </div>
                                            </div>


                                             <div class="position-relative row form-group">
                                             <label for="exampleFile" class="col-sm-2 col-form-label">Course Status</label>
                                             <div class="col-sm-10">
                                              <select class="form-control" name="Course_Status">
                                              <option value="Active">Active</option>
                                              <option Value="Inactive">Inactive</option>
                                              </select>
                                             <small class="form-text text-muted"></small>
                                             </div>
                                            </div>
 


                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Course Image</label>
                                            <div class="col-sm-10">
                                            <input name="Course_Image" accept="image/*" id="Image" onchange="imagecheck()" placeholder="" type="file" class="form-control" required>   
                                            <span class="form-text text-muted">Please select image 70*70</span>

                                            </div>
                                            </div> 

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Course Fees INR</label>
                                            <div class="col-sm-10">
                                            <input name="Course_Fees" id="Course_Fees" placeholder="Please Enter the Course Fees in INR" type="number" min="0" class="form-control" required>   
                                            <small class="form-text text-muted"></small>
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Course Fees USD</label>
                                            <div class="col-sm-10">
                                            <input name="Course_Fee_USD" id="Course_Fee_USD" placeholder="Please Enter the Course Fees in USD" type="number" min="0" class="form-control" required>   
                                            <small class="form-text text-muted"></small>
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Colour Code</label>
                                            <div class="col-sm-10">
                                            <input name="Colour_Code" id="Colour_Code" placeholder="Please Enter Colour Code" type="color"  required>   
                                            <small class="form-text text-muted"></small>
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Order</label>
                                            <div class="col-sm-10">
                                            <input name="Course_Order" min="0" value="<?php print_r($CountID+1) ?>"  id="Chapter_Order" placeholder="Please Enter Course Order" type="number" class="form-control" required>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>

                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                 <button class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <button style="margin-left: 27%;margin-top: -58px;" onclick="window.location.href='<?=base_url()?>/Admin/Courseslist'" class="btn btn-primary ">Close</button>
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
 
    jQuery(document).ready(function($)
     {
          
       $("#courses").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");
       
    });
 var maxLength = 200;
 $('#short-description').keyup(function()
 {
 var textlen = maxLength - $(this).val().length;
 $('#rchars').text(textlen);
 });
//  function imagecheck()
// {

//     var img = document.getElementById('Image'); 
// //or however you get a handle to the IMG
//     var width = img.clientWidth;
//     var height = img.clientHeight;
//     if(width==70 & height==70)
//     {
//         return true;
//     }
//     else
//     {
//         alert('Please select image 70* 70');
//         return false;
//     }

// }
</script>
</body>
</html>
