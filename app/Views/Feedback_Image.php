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
                                    <div class="card-body"><h5 class="card-title">Image Upload</h5>
                                     <?php if(isset($Data['data'])){ 
                                         foreach ($Data['data'] as $val){?>
                                         <form class=""  action="<?=base_url()?>/Admin/Update_feedback" method="post" enctype="multipart/form-data">
                                           <input name="ID" value="<?php echo $val['ID'] ?>" id="Title" placeholder="Title" type="text" class="form-control" required  style="display: none;">
                                            

                                            <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                            <input name="Image" id="Image" placeholder="" type="file" class="form-control" >
                                            <img src="<?=base_url()?>/public/uploads/<?php echo $val['Image'] ?>" alt="Card image" style="width:10%;">    
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
                                        <button style="margin-left: 27%;margin-top: -6%;" onclick="window.location.href='<?=base_url()?>/Admin/Feedbacklist'" class="btn btn-primary ">Close</button>
                                    </div>
                                </div>
                          
                        
                    </div>
                   
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function goBack() {
  window.history.back();
}
jQuery(document).ready(function($) {
    $("#feedback-active").addClass("mm-active");
     $("#Web-list").addClass("mm-show");
  });
</script>
</body>
</html>
