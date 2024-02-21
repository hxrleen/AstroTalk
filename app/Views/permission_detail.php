<!doctype html>
<html lang="en">
<?php 
include 'include/Head.php';
$grp_id=$_GET['Group_id'];

?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>


<style>
        .error_form{
            top: 12px;
	        color: rgb(216, 15, 15);
            font-size: 15px;
            font-family: Helvetica;
                    }
            
.form-control:focus {
       box-shadow: 0 0 0 0.2rem rgb(255 255 255)!important;
  }

  .form-control  
  {
     font-size: 14px!important;
     height: 34px!important;
  }

.btn, .btn-primary{
   width: 20%;
   height: 20%;
}
.col-form-label{
   font-size:15px;
}
    </style>
<body>


<div class="preloader"></div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
       <?php include 'include/Header.php' ?>
                
            <div class="app-main">
                <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner">

                        <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Permissions</h5>    <p>       
                              
                          
                        <!---- form --->
<form  class="cmxform" id="permission_detail" method="POST" action="" autocomplete="off">
   

<div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label ">Group Id</label>
                                            <div class="col-sm-10">
                                            <input name="Group_id" value="<?php echo $grp_id;?>" maxlength="30" id="Group_id" placeholder=""  type="text" readonly="true" class="form-control" >
                                            </div>
                                            </div>

<div class="position-relative row form-group">
<label for="exampleEmail" class="col-sm-2 col-form-label">Module Name </label>
<div class="col-sm-10">
<select class="form-control form-control-user" name="Module_name" id="Module_name" required="">
<option value=""> Choose any One </option>
<option value="Blogs" >  Blogs </option>
<option value="Customers"> Customers </option>
<option value="Astrologers"> Astrologers </option> 
<option value="Reviews"> Reviews </option> 
<option value="Orders"> Orders </option> 
<option value="Membership Plans"> Membership Plans </option> 
<option value="Refer and Earn"> Refer and Earn </option> 
<option value="Statements"> Statements </option> 
<option value="Coupons"> Coupons </option> 
<option value="General Settings"> General Settings </option> 
<option value="GST Settings"> GST Settings </option> 
<option value="Media Library"> Media Library </option> 
<option value="Promotions and Banners"> Promotions and Banners </option> 
<option value="FAQ" >  FAQs </option>
<option value="Users"> Users </option>
</select>
</div>
</div>

<div class="position-relative row form-group" style="flex-wrap" >
<label for="exampleEmail" class="col-sm-2 col-form-label"> Permissions </label>

<label for="exampleEmail" class="col-sm-1 col-form-label">Read</label>
<div class="col-sm-1" >
<input type="checkbox" class="form-control form-control-user" id="read" name="read" >
</div>

<label for="exampleEmail" class="col-sm-1 col-form-label">Write</label>
<div class="col-sm-1" >
<input type="checkbox" class="form-control form-control-user" id="add" name="add" >
</div>

<label for="exampleEmail" class="col-sm-1 col-form-label">Update</label>
<div class="col-sm-1" >
<input type="checkbox" class="form-control form-control-user" id="update" name="update" >
</div>

<label for="exampleEmail" class="col-sm-1 col-form-label">Delete</label>
<div class="col-sm-1" >
<input type="checkbox" class="form-control form-control-user" id="delete" name="delete" >
</div>

</div>


                                            <div class="position-relative row form-check" style="align:center">
                                                <div class="col-sm-10 offset-sm-2" >
                                                  <a href="./permission"  ><button class="btn btn-primary">Submit</button></a>
                                                  
                                                </div>
                                            </div>
                                        

</div>
</div>
</div>
</form>
                   <!--form ends-->
                      <?php include 'include/Footer.php' ?>
                   
                    </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 
<!--validation-->
  

<!--validation ends-->

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


$(document).ready(function(e){
 $('.preloader').hide();
});
function goback()
{
   $('#gobackform').submit();
}


$("#permission_detail").on('submit',(function(e) {
 // alert('this is text');
//debugger;
   e.preventDefault();
   var data = new FormData(this);
   //add the content
  //data.append('About', CKEDITOR.instances['About'].astrodetails());
  $('.preloader').show();
 
  $.ajax({
         url: "<?=base_url()?>/MyControl/permission_insert",
   type: "POST",
   data:data,
   contentType: false,
         cache: false,
   processData:false,
  
    success:function(response)
            {
             $('.preloader').hide();
          
        //  alert(response);
            var obj = JSON.parse(response);
          
            if(obj.Status==true)
            {
              alert(obj.Msg);
              $('.preloader').hide();
               window.open('./permission?Group_id=<?php echo $grp_id;?>', "_self");
             //$('#Slectlanguage').submit();
              
           }
           else
           {
               alert(obj.Msg);
               $('.preloader').hide();
              
           }
           
          
        }
      



    });


 }));


</script>
</body>
</html>
