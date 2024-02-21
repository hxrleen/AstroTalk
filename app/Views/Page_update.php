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
                        <div class="card-body"><h5 class="card-title">ADD PAGE </h5>   <p>       
                              
                          
                           <!---- form --->
<form  class="cmxform" id="Page_update" method="POST" action="" autocomplete="off">


<div class="position-relative row form-group">
<label for="exampleEmail" class="col-sm-2 col-form-label">Page ID </label>
<div class="col-sm-10">
<td><input name="PG_ID" value="<?php echo $data[0]['PG_ID']?>" id="PG_ID" placeholder="" class="form-control" required=""></td>
<small class="form-text text-muted"></small>
</div>
</div>


<div class="position-relative row form-group">
<label for="exampleFile" class="col-sm-2 col-form-label">Choose Category</label>
             <div class="col-sm-10">
             <select class="form-control" name="PG_CAT_ID" id="PG_CAT_ID">
              
             <?php 
                if(isset($Cat['category']))
                  {
                     $count=0;
                     foreach ($Cat['category'] as $val) {  ?>
                     <option value="<?php echo $val['PG_CAT_ID'] ?>"><?php echo $val['CategoryName'] ?></option>
                     <?php $count = $count + 1; ?>  
                                                      
                     <?php } } ?>
             </select>

             </div>
             </div>

          <div class="position-relative row form-group">
<label for="exampleFile" class="col-sm-2 col-form-label">Choose Subcategory</label>
             <div class="col-sm-10">
             <select id="PG_Sub_CAT_ID" class="form-control" name="PG_Sub_CAT_ID" id="label" >
             <?php 
                if(isset($Cat['subcategory']))
                        {

                    $count=0;
                    foreach ($Cat['subcategory'] as $val) {  ?>
                    <option value="<?php echo $val['PG_Sub_CAT_ID'] ?>"><?php echo $val['SubCategoryName'] ?></option>
                     <?php $count = $count + 1; ?>  
                                                      
                            <?php } } ?>
               </select>

                </div>
                </div>                                    

<div class="position-relative row form-group">
<label for="exampleEmail" class="col-sm-2 col-form-label"> Title </label>
<div class="col-sm-10">
<td><input name="PageTitle" value="<?php echo $data[0]['PageTitle']?>" id="PageTitle" placeholder="" class="form-control" required=""></td>
<small class="form-text text-muted"></small>
</div>
</div>

<div class="position-relative row form-group">
 <label for="exampleEmail" class="col-sm-2 col-form-label">Description</label>
<div class="col-sm-10">
<td><input name="PageDescription" value="<?php echo $data[0]['PageDescription']?>" id="PageDescription" placeholder="" class="form-control" required=""></td>
<small class="form-text text-muted"></small>
</div>

</div>

<div class="position-relative row form-group">
 <label for="exampleEmail" class="col-sm-2 col-form-label">SLUG</label>
<div class="col-sm-10">
<td><input name="Page_SLUG" value="<?php echo $data[0]['Page_SLUG']?>" id="Page_SLUG" placeholder="" class="form-control" required=""></td>
<small class="form-text text-muted"></small>
</div>

</div>

<div class="position-relative row form-group">
 <label for="exampleEmail" class="col-sm-2 col-form-label">Content</label>
<div class="col-sm-10">
<td><textarea name="Page_Content" value="<?php echo $data[0]['Page_Content']?>" id="Page_Content" placeholder="" class="form-control ckeditor" type="text" rows="4" cols="50" required=""> </textarea></td>
<small class="form-text text-muted"></small>
</div>

</div>

                                            <div class="position-relative row form-check" style="align:center">
                                                <div class="col-sm-10 offset-sm-2" >
                                                  <a href=""  ><button  class="btn btn-primary">Submit</button></a>
                                                  <a href=""  ><button onclick="window.open('./Page','_self')" class="btn btn-primary">Close</button></a>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
$('#PG_Sub_CAT_ID, #label').hide();
$(document).ready(function(e){
   $('#Category').change(function(){
     var Cat_name =$('#Category').val();
     if(Cat_name != ''){
      var post_url="<?=base_url()?>/MyControl/Page_subcategory_add";
      $.ajax({
         type: "POST",
         url: post_url,
         success: function(Subcat_name) 
            {
                $('#Subcategory').empty();
                $('#Subcategory, #label').show();
                $.each(Subcat_name,function(id,Subcat)
                {
                  var opt = $('<option />'); // here we're creating a new select option for each group
                    opt.val(id);
                    opt.text(Subcat);
                    $('#Subcategory').append(opt);
                });
               }
      });
     } else{
            $('#Subcategory').empty();
        $('#Subcategory, #label').hide();

     }
   });
});

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


$("#Page_update").on('submit',(function(e) {
 // alert(CKEDITOR.instances['Faq_contents']);
//debugger;
   e.preventDefault();
   var data = new FormData(this);
   //add the content
 //data.append('Faq_contents', CKEDITOR.instances['Faq_contents'].FAQdetails());
  $('.preloader').show();
 
  $.ajax({
         url: "<?=base_url()?>/MyControl/Page_details",
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
              
             window.open('./Page', "_self");
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
