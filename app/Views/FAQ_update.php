<!doctype html>
<html lang="en">
<?php include 'include/Head.php' ?>
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
                        <div class="card-body"><h5 class="card-title"> EDIT FAQ</h5>    <p>       
                              
                          
                        <!---- form --->
<form  class="cmxform" id="FAQedit" method="POST" action="" autocomplete="off">

<div class="position-relative row form-group" hidden>
<label for="exampleEmail" class="col-sm-2 col-form-label"> Id </label>
<div class="col-sm-10">
<td><input name="Faq_id" value="<?php echo $singleProduct[0]['Faq_id']?>" id="Faq_id" placeholder="" class="form-control" required=""></td>
<small class="form-text text-muted"></small>
</div>
</div>

<div class="position-relative row form-group">
<label for="exampleEmail" class="col-sm-2 col-form-label"> Title </label>
<div class="col-sm-4">
<td><input name="Faq_title" value="<?php echo $singleProduct[0]['Faq_title']?>" id="Faq_title" placeholder="" class="form-control" required=""></td>
<small class="form-text text-muted"></small>
</div>

 <label for="exampleEmail" class="col-sm-2 col-form-label">Status</label>
<div class="col-sm-4">
<select class="form-control" value="<?php echo $singleProduct[0]['Status']?>" name="Status" id="Status" required="">
<option value=""><?php echo $singleProduct[0]['Status']?></option>
                            <option value="Active" >Active</option>
                            <option value="Inactive">Inactive</option>
                            </select>
</div> 
</div>


<div class="position-relative row form-group">
  <label for="exampleFile" class="col-sm-2 col-form-label">Contents</label>
                                                <div class="col-sm-10">
                                                <textarea id="Faq_contents" placeholder="Please Enter the Description" name="Faq_contents" value="<?php echo $singleProduct[0]['Faq_contents']?>"  class="form-control" type="text" rows="4" cols="50" required=""><?php echo $singleProduct[0]['Faq_contents']?></textarea>
                                                  
                                                </div>
                                            </div>
                                           

                                            <div class="position-relative row form-check" style="align:center">
                                                <div class="col-sm-10 offset-sm-2" >
                                                  <a href=""  ><button class="btn btn-primary">Submit</button></a>
                                                  <a href=""  ><button onclick="window.open('./FAQ','_self')" class="btn btn-primary">Close</button></a>

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


$("#FAQedit").on('submit',(function(e) {
  //alert('this is text');
//debugger;
   e.preventDefault();
   var data = new FormData(this);
   //add the content
 //data.append('Faq_contents', CKEDITOR.instances['Faq_contents'].FAQdetails());
  $('.preloader').show();
 
  $.ajax({
         url: "<?=base_url()?>/MyControl/FAQ_details",
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
               alert(obj.Msg);
              $('.preloader').hide();
              
               window.open('./FAQ', "_self");
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
