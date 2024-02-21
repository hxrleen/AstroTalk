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
                                    <div class="card-body"><h5 class="card-title">Course</h5>
                                        <?php if(isset($Course['data'])){ 
                                         foreach ($Course['data'] as $val){?>
                                    <form class=""  action="<?=base_url()?>/Admin/update_Course" method="post" enctype="multipart/form-data">
                                            <input name="Course_Id" id="Id" value="<?php echo $val['Course_Id']?>" type="text" class="form-control" style="display:none;">
                                            <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Course Title</label>
                                            <div class="col-sm-10">
                                            <input name="Couse_Title" maxlength="100" id="Date" placeholder="Please Enter the Course Title" value="<?php echo $val['Couse_Title']?>" type="text" class="form-control">
                                             <span class="form-text text-muted">Please Enter Course Title only 100 characters</span>
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Course Short Desc</label>
                                            <div class="col-sm-10">
                                            <textarea name="Course_Short_Desc" id="short-description" placeholder="Please Enter the Short Description of Course" type="text" maxlength="200" rows="4" cols="50" class="form-control"><?php echo $val['Course_Short_Desc']?>
                                            </textarea>
                                            <span id="rchars">200</span> Character(s) Remaining
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Course Description</label>
                                            <div class="col-sm-10">
                                            <textarea name="Course_Description" id="Date" class="form-control ckeditor ">
                                             <?php echo $val['Course_Description']?> 
                                            </textarea>
                                            </div>
                                            </div>

                                             <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Course Benefits</label>
                                            <div class="col-sm-10">
                                            <textarea name="Benefits" id="Benefits" class="form-control ckeditor ">
                                             <?php echo $val['Benefits']?> 
                                            </textarea>
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Course Duration</label>
                                            <div class="col-sm-10">
                                            <input name="Course_Duration" placeholder="Please Enter the Duration of Course in Minute" id="Course_Duration" value="<?php echo $val['Course_Duration']?>" type="text" class="form-control"></div>
                                            </div>

                                            <div class="position-relative row form-group">
                                             <label for="exampleFile" class="col-sm-2 col-form-label">Course Status</label>
                                             <div class="col-sm-10">
                                              <select class="form-control" name="Course_Status">
                                              <option value="<?php echo $val['Course_Status']?>">
                                                <?php echo $val['Course_Status']?></option>
                                              <option value="Active">Active</option>
                                              <option Value="Inactive">Inactive</option>
                                              </select>
                                             <small class="form-text text-muted"></small>
                                             </div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Course Image</label>
                                            <div class="col-sm-10">
                                            <input name="Course_Image" onchange="imagecheck()" accept="image/*" id="Image" placeholder="" type="file" class="form-control" >
                                            <img src="<?=base_url()?>/public/uploads/<?php echo $val['Course_Image'] ?>" alt="Card image" style="width:30%;">       
                                            <span class="form-text text-muted">Please select image 70*70</span>
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Course Fees INR</label>
                                            <div class="col-sm-10">
                                            <input name="Course_Fees" id="Course_Fees" value="<?php echo $val['Course_Fees']?>" placeholder="Please Enter the Course Fees in INR" type="number" class="form-control" required>   
                                            <small class="form-text text-muted"></small>
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Course Fees USD</label>
                                            <div class="col-sm-10">
                                            <input name="Course_Fee_USD" value="<?php echo $val['Course_Fee_USD']?>" id="Course_Fee_USD" placeholder="Please Enter the Course Fees in USD" type="number" class="form-control" required>   
                                            <small class="form-text text-muted"></small>
                                            </div>
                                            </div>

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Colour Code</label>
                                            <div class="col-sm-10">
                                            <input name="Colour_Code" value="<?php echo $val['Colour_Code']?>" id="Colour_Code" placeholder="Please Enter Color Code" type="color"  required>   
                                            <small class="form-text text-muted"></small>
                                            </div>
                                            </div>

                                             <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Order</label>
                                                <div class="col-sm-10">
                                            <input name="Course_Order" id="Chapter_Order" value="<?php echo $val['Course_Order'] ?>" placeholder="" type="number" min="0" class="form-control" required>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>

                                           
                                            
                                          
                                            
                                         <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                         <button style="margin-left: 27%;margin-top: -60px;" onclick="window.location.href='<?=base_url()?>/Admin/Courseslist'" class="btn btn-primary ">Close</button>
                                     <?php }} ?>
                                    </div>
                                </div>
                          
                        
                    </div>
                   
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
<script type="text/javascript">
  /*  function count_title() {
    debugger;
   var el_t = document.getElementById('short-description');
   var length = 200;
   var el_c = document.getElementById('rchars');
   el_c.innerHTML = length;
   el_t.oninput = function() {
     document.getElementById('rchars').innerHTML = (length - this.value.length);
   };
 }*/
   jQuery(document).ready(function($)
     {
        
        // debugger;
       $("#courses").addClass("mm-active");
       $("#App-active").addClass("mm-show");
       var maxLength = 200;
       var old_char=$('#short-description').val().length;
      
       var textlen = maxLength - old_char;
       $('#rchars').text(textlen);

    });
 var maxLength = 200;
 $('#short-description').on('input',function()
 {
  
 var textlen = maxLength - $(this).val().length;
 $('#rchars').text(textlen);
 });
//   function imagecheck()
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
