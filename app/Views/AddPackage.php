                                            
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
                                    <div class="card-body"><h5 class="card-title">Add Category</h5>
                                        <form class=""  action="<?=base_url()?>/Admin/Package_Submit" method="post" enctype="multipart/form-data">
                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Category Name </label>
                                                <div class="col-sm-10">
                                                <input name="CategoryName" id="Title" placeholder="Please Enter the Category Name" maxlength="100" type="text" class="form-control" required>
                                                 <span class="form-text text-muted">Please Enter Category name only 100 characters</span>
                                               </div>
                                            </div>
                                            
                                            

                                        


                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Category Hindi Name</label>
                                            <div class="col-sm-10">
                                            <input name="HindiName" id="HindiName" placeholder="Please Enter Hindi name of Category" type="text" maxlength="100" class="form-control" required>   
                                            <small class="form-text text-muted"></small>
                                            </div>
                                            </div>

                                        

                                            

                                            

                                            <div class="position-relative row form-group">
                                            <label for="exampleFile" class="col-sm-2 col-form-label">Order</label>
                                            <div class="col-sm-10">
                                            <input name="Category_Order" min="0" value="<?php print_r($CountID+1) ?>"  id="Category_Order" placeholder="Please Enter Category Order" type="number" class="form-control" required>   
                                                    <small class="form-text text-muted"></small>
                                                </div>
                                            </div>

                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                 <button class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <button style="margin-left: 27%;margin-top: -58px;" onclick="window.location.href='<?=base_url()?>/Admin/Packages'" class="btn btn-primary ">Close</button>
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

</script>
</body>
</html>
