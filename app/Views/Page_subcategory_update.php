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
                        <div class="card-body"><h5 class="card-title">ADD PAGE SUBCATEGORY </h5>   <p>       
                              
                          
                           <!---- form --->
<form  class="cmxform" id="Page_subcategory_update" method="POST" action="" autocomplete="off">

<div class="position-relative row form-group">
<label for="exampleEmail" class="col-sm-2 col-form-label"> Subcategory ID </label>
<div class="col-sm-10">
<td><input name="PG_Sub_CAT_ID" value="<?php// echo $Subcategory[0]['PG_Sub_CAT_ID'] ; ?>" id="PG_Sub_CAT_ID" placeholder="" class="form-control" required=""></td>
<small class="form-text text-muted"></small>
</div>
</div>

<div class="position-relative row form-group" readonly>
<label for="exampleFile" class="col-sm-2 col-form-label"> Category</label>
             <div class="col-sm-10">
             <select class="form-control" name="PG_CAT_ID" >
             <?php
                                                    if(isset($Cat['category'][0]))
                                                    {

                                                     $count=0;
                                                     foreach ($Cat['category'][0] as $val) {  ?>
                                                     <option value="<?php echo $val['PG_CAT_ID'] ?>"><?php echo $val['CategoryName'] ?></option>
                                                     <?php $count = $count + 1; ?>  
                                                      
                                                    <?php } } ?>
            </select>

                </div>
                </div>

<div class="position-relative row form-group">
<label for="exampleEmail" class="col-sm-2 col-form-label"> Subcategory Name </label>
<div class="col-sm-10">
<td><input name="SubCategoryName" value="<?php echo $Subcategory[0]['SubCategoryName']?>" id="SubCategoryName" placeholder="" class="form-control" required=""></td>
<small class="form-text text-muted"></small>
</div>
</div>


                                            <div class="position-relative row form-check" style="align:center">
                                                <div class="col-sm-10 offset-sm-2" >
                                                  <a href=""  ><button  class="btn btn-primary">Submit</button></a>
                                                  <a href=""  ><button onclick="window.open('./Page_subcategory','_self')" class="btn btn-primary">Close</button></a>

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


$("#Page_subcategory_update").on('submit',(function(e) {
 // alert(CKEDITOR.instances['Faq_contents']);
//debugger;
   e.preventDefault();
   var data = new FormData(this);
   //add the content
 //data.append('Faq_contents', CKEDITOR.instances['Faq_contents'].FAQdetails());
  $('.preloader').show();
 
  $.ajax({
         url: "<?=base_url()?>/MyControl/Page_subcategory_details",
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
              
             window.open('./Page_subcategory', "_self");
             //$('#Slectlanguage').submit();
              
           }
           else
           {
              // alert(obj.Msg);
               $('.preloader').hide();
           }
        }
    });


 }));


</script>
</body>
</html>
