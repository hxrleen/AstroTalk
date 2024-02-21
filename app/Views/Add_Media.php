                                            
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
                    <div class="card-body"><h5 class="card-title">Add Media</h5>
                        <form class="" id="image"  action="<?=base_url()?>/Admin/AddmediaPost" method="post" enctype="multipart/form-data">
                            
                           
                           <!--
                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                <input name="Title"   id="Title" placeholder="Please Enter Title" type="text" class="form-control" required>
                                    <span class="form-text text-muted"></span>
                            </div>
                            </div>
                           -->
                           
                           <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Image 1</label>
                            <div class="col-sm-10">
                            <input name="Media_Img" style="height:44px;" onchange="check(this.id)"   accept="image/*" id="Media_id" placeholder="" type="file" class="form-control" required="">   
                            <span class="form-text text-muted"></span>
                            <span>Please select an image of maximum size 200kb and dimension 800</span><br><br>
                            </div>
                            </div> 
                            
                            
                           <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Image 2</label>
                            <div class="col-sm-10">
                            <input name="Media_Img2" style="height:44px;" onchange="check(this.id)"   accept="image/*" id="Media_id2" placeholder="" type="file" class="form-control">   
                            <span class="form-text text-muted"></span>
                            <span>Please select an image of maximum size 200kb and dimension 800</span><br><br>
                            </div>
                            </div> 
                            
                             
                           <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Image 3</label>
                            <div class="col-sm-10">
                            <input name="Media_Img3" style="height:44px;" onchange="check(this.id)"   accept="image/*" id="Media_id3" placeholder="" type="file" class="form-control">   
                            <span class="form-text text-muted"></span>
                            <span>Please select an image of maximum size 200kb and dimension 800</span><br><br>
                            </div>
                            </div> 
                            
                             
                           <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Image 4</label>
                            <div class="col-sm-10">
                            <input name="Media_Img4" style="height:44px;" onchange="check(this.id)"   accept="image/*" id="Media_id4" placeholder="" type="file" class="form-control">   
                            <span class="form-text text-muted"></span>
                            <span>Please select an image of maximum size 200kb and dimension 800</span><br><br>
                            </div>
                            </div> 
                            
                             
                           <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Image 5</label>
                            <div class="col-sm-10">
                            <input name="Media_Img5" style="height:44px;" onchange="check(this.id)"   accept="image/*" id="Media_id5" placeholder="" type="file" class="form-control">   
                            <span class="form-text text-muted"></span>
                            <span>Please select an image of maximum size 200kb and dimension 800</span><br><br>
                            </div>
                            </div> 
                            
                            
                            
                            
                            
                            <div class="position-relative row form-check">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-primary">Submit</button>
                                
                            </div>
                        </div>
                    </form>
                            
                            
                            <button style="margin-left: 27%;margin-top: -60px;" onclick="history.back()" class="btn btn-primary ">Close</button>
                            
                            
                            

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
          
      
       $("#App-active").removeClass("mm-show");
       $('#Dashboard-active').removeClass("mm-active");
        $("#media_library").addClass("mm-active");
});

function goback()
{
   $('#gobackform').submit();
}
</script>

<script>

function check(IMageID)
{
    var img = document.getElementById(IMageID);
    

    var width = this.width;
    
    
    if(img.files[0].size <=200000)
    {
        var url= URL.createObjectURL(img.files[0]);
        
        ////$('#image').submit();
    }
    else 
    {
        alert('File size is large ');
        img.value='';
    }
    
}
    </script>
</body>
</html>
