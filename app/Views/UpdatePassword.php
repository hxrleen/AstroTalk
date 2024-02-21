<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include 'include/Header.php'  ?>
                    
         <div class="app-main">
         <?php include 'include/Sidebar.php' ?>       
                    <div class="app-main__outer">
                    <div class="app-main__inner">
                        
                   
<style>

form{
  background: #fff;
  height: 126%;
}
label {
    display: inline-block;
    margin-bottom: 0.5rem ;
    margin-top: 16px;
}
.form-container{
  border-radius: 10px;
  margin-top: -13%;
  padding: 30px;
}
  </style>
  <section class="container" style="padding: 102px 91px;
    position: relative;float: right;">
   
    <section class="row justify-content-center">
      <section class="col-md-6">
        <form class="form-container" method="post" action="<?= base_url()?>/Admin/changePassword">
        <input type="hidden" name="Id">  
        
        <?php if(isset($Msg['msg'])) {?>
         <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert">&times;</button>   
         <p><?php print_r($Msg['msg']) ?></p>
        </div>
          
        <?php } ?>
          
       
        <div class="form-group">
          <h4 class="text-center font-weight-bold " style="font-size:20px;"><strong>Change Password</strong></h4>
          <div class="form-group">
          <label><strong>Current Password<span style="color: red;">*</span></strong></label>
          <input type="password" name="currentPass" class="form-control" id="oPassword" placeholder="Current Password">
        </div>
          <label><strong>New Password<span style="color: red;">*</span></strong></label>
           <input type="Password" class="form-control" id="password" name="password" placeholder="Enter New Password">
        </div>
        <div class="form-group">
          <label><strong>Confirm New Password<span style="color: red;">*</span></strong></label>
          <input type="password" class="form-control" id="cPassword" name="confirmPass" placeholder="Confirm Password">
        </div>
           <button type="submit" class="btn" name="changePassword" value="changePassword" style="background-color: #11317d; color: white;">Update Password</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

        <div class="form-footer">  
        </div>
        </form>
      </section>
    </section>
  </section>

</body>
</html>
                     
                        
                    </div>
                    <?php include 'include/Footer.php' ?>
                    </div>
               
        </div>
    </div>
</body>
</html>
