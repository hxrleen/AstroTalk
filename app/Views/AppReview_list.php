<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<style type="text/css">
body
{
   padding:0px!important;
}
.custom-clickable-row
{

   cursor: pointer;

}
.avatar img {
    width: 70px;
    height: 70px;
    float: left;
   
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
}
.switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ca2222;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before
 {
   border-radius: 50%;
 }
tr.highlighted td {
    background: #e8f4ff;
}
</style>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <?php include 'include/Header.php' ?> 
                <div class="app-main">
                  <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="row">
                            
                           
                            
                            
                            
                            <div class="col-lg-12">
                              <?php if(isset($Msg['Msg'])){?>

                              <div class="alert alert-dismissible alert-warning">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                               
                                <p class="mb-0"><?php print_r($Msg['Msg']); ?></p>
                              </div>
                              <?php } ?>
                                <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Review User</h5>
                                 <form class="form-inline" action="<?=base_url()?>/Admin/AppCourseReviewlist" method="post" 
                                         onchange="selectlanguage()" id="selectlanguage" style="float: right;margin-right:0px;margin-top: -4%;margin-bottom: 10px;" >
                                         <div class="form-group mb-2">
                                         <?php  $Course_Id = isset($_POST['Course_Id'])?$_POST['Course_Id']:'';?>
                                         <select  name="Course_Id" class="form-control maxwidth" >
                                         <option value="" disabled="" selected="">Select Course</option>
                                          <?php if (isset($Course['data']))
                                           {foreach($Course['data'] as $row)
                                                                          {?>
                                         <option value="<?php echo $row['Course_Id']?>" 
                                         <?php echo($Course_Id==$row['Course_Id'])?'selected':''; ?> >
                                         <?php echo $row['Couse_Title']?></option>
                                         <?PHP }} ?>
                                         </select>
                                  </div>
                                </form>
                                        <div class="table-responsive">
                                            <table id="examples" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>

                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Rating</th>
                                                    <th>Course</th>
                                                    <th>Date of Review</th>
                                                    <th>Message</th>
                                                    <th>Status</th>
                                                    
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>


                                                  <tr id="<?php echo $val['Review_ID'] ?>" data-href="<?php echo $val['Review_ID'] ?>" class="custom-clickable-row">
                                                  <?php if($val['Profile_Picture']!==''){?>
                                                  <td class="avatar"><img src="<?=base_url()?>/public/uploads/<?php echo $val['Profile_Picture'] ?>" alt="<?php echo $val['Profile_Picture'] ?>" style="width:90%;"></td>
                                                   <?php } else { ?>
                                                  <td class="avatar" ><img src="<?=base_url()?>/public/uploads/AvtarImage.png" style="width:90%;"  alt="AvtarImage.png"></td>
                                                    
                                                   <?php } ?>
                                                  
                                                  <td><?php echo $val['Name'] ?></a></td>
                                                          <?php $star = $val['Star_Rating'];

                                                   switch ($star) {
                                                    case 1:
                                                    echo'<td><span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star"></span>
                                                       <span class="fa fa2 fa-star"></span>
                                                       <span class="fa fa2 fa-star"></span></td>'
                                                     ;
                                                     break;
                                                    case 2:
                                                     echo'<td><span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star"></span>
                                                       <span class="fa fa2 fa-star"></span>
                                                       <span class="fa fa2 fa-star"></span></td>'
                                                     ;
                                                     
                                                      break;
                                                    case 3:
                                                     echo '<td><span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star"></span>
                                                       <span class="fa fa2 fa-star "></span></td>
                                                      ';
                                                      break;
                                                   case 4:
                                                      echo '<td><span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star"></span></td>
                                                      ';
                                                      break;
                                                    case 5:
                                                      echo '<td><span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star checked"></span>
                                                       <span class="fa fa2 fa-star checked"></span></td>
                                                      ';
                                                      break;
                                                    default:
                                                      echo '<td><span class="fa fa2 fa-star "></span>
                                                       <span class="fa fa2 fa-star "></span>
                                                       <span class="fa fa2 fa-star "></span>
                                                       <span class="fa fa2 fa-star "></span>
                                                       <span class="fa fa2 fa-star "></span></td>
                                                      ';
                                                   }

                                                  ?>
                                                  <td><?php echo $val['Course_Title'] ?></td>
                                                  <td><?php echo $val['Date_Review'] ?></td>

                                                  <td  data-toggle="modal" data-target=".bd-example-modal<?php echo $val['Review_ID'] ?>" title="<?php echo substr($val['Message'],0,40) ?>"><?php echo substr($val['Message'],0,40) ?>...</td>
                                                  
    
                                                  <?php if($val['Status']=='Active'){ ?>
                                                   <td><label class="switch"><input type="checkbox" class="<?php echo 
                                                    $val['Review_ID']; ?>" checked ><div class="slider round"><!--ADDED HTML --><span class="on">Active</span><span class="off">Inactive</span><!--END--></div></label></td>
                                                  <?php } else { ?>
                                                   <td><label class="switch"><input type="checkbox" class="<?php echo $val['Review_ID']; ?>" ><div class="slider round"><!--ADDED HTML --><span class="on">Active</span><span class="off">Inactive</span><!--END--></div></label></td>
                                                  <?php } ?>
                                                 
                                                

                                                   
                                                  </tr>



                                                <?php } } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                         
                        </div>
                    </div>
                    <?php include 'include/Footer.php' ?> 
                  </div>
        </div>
    </div>
      <?php if(isset($Data['data'])){ 
      foreach ($Data['data'] as $val){?>
    <div class="modal fade bd-example-modal<?php echo $val['Review_ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="margin-top: 24%;">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size:13px; font-weight:600;" id="exampleModalLongTitle">Message from  <?php echo $val['Name'] ?></h5>
              
            </div>
            <div class="modal-body">
           
             <?php echo $val['Message'] ?>
            
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
             
            </div>
        
        </div>
    </div>
</div>
<?php } } ?>
    <script src="<?=THEME?>/assets/js/datatables.min.js"></script>
    <script src="<?=THEME?>/assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=THEME?>/assets/js/dataTables.buttons.min.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.bootstrap.min.js"></script>
    <script src="<?=THEME?>/assets/js/jszip.min.js"></script>
    <script src="<?=THEME?>/assets/js/vfs_fonts.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.html5.min.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.print.min.js"></script>
    <script src="<?=THEME?>/assets/js/buttons.colVis.min.js"></script>
    <script src="<?=THEME?>/assets/js/datatables-init.js"></script>
    <script type="text/javascript">
  
    $(document).ready(function(){
     
     $('input[type="checkbox"]').click(function(){
      var id = ($(this).attr('class'));
     // alert(id);
          
 
  
      
            if($(this).prop("checked") == true){
             
       
        var formData ='Active';
        
        $.post('<?=base_url()?>/Admin/Review_status',{"Status":formData,"Review_ID":id},function(response){
    
    // alert(response);
     var obj = JSON.parse(response);
     var Msg=obj.Msg;
      alert(Msg);
    
     
       
     
    
    
        });
        
            }
      
      
            else if($(this).prop("checked") == false){
               
     
        var formData ='Inactive';
        
        $.post('<?=base_url()?>/Admin/Review_status',{"Status":formData,"Review_ID":id},function(response){
      
  //alert(response);
       var obj = JSON.parse(response);
       var Msg=obj.Msg;
       alert(Msg);
     
     
       
     
    
    
        });
        
            }
        });

     $("#Reviewlist").addClass("mm-active");
     $("#App-active").addClass("mm-show");
     $('#Dashboard-active').removeClass("mm-active");
    $('#examples').dataTable( {
       "columns": [
      null,
      null,
    
      null,
      null,
        null,
      null,
      null
    ]



   } );
    // $(document).on('click','.custom-clickable-row',function(e)
    // {
       
    //   var url=$(this).data('href');

    //   // alert(url);
    //   // $(this).toggleClass("highlight");
    //   // // $('#AddId'+url).css('background-color','#e8f4ff');
    //   //  var selected = $(this).hasClass("highlight");
    // $("#examples tr").removeClass("highlight");
    // if(!selected)
    //         $(this).addClass("highlight");

    // });

    $("#examples tr").click(function() {
       $('#examples tr').removeClass('highlighted');
        $(this).addClass('highlighted');
   });



    });
    function selectlanguage()
      {
         $('#selectlanguage').submit();
      }
    </script>
</body>
</html>
