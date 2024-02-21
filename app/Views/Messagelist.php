<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<style type="text/css">

/*.container{max-width:1170px; margin:auto;}*/
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span
{
  font-size:13px;
  float:right;
  font-weight:600;
}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 4%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  /*padding: 18px 16px 10px;*/
  background-color: #d6d6d68c;
  margin-top: 10px;
  padding: 9px 16px 15px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
.unread
{
   color:blue;
}
.avatar img {
    width: 50px;
    height: 50px;
    float: left;
   
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
}
.main_inneer
{
  background-color: #fff;
}
.message-desc
{
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  width: 300px;
}
.main-div
{
      margin: 16px 0px 16px 0px;
}
.heading-name
{
  color:#478ef8;
  vertical-align: middle;
  margin-top: 4%;
}
.chat_date
{
    font-size: 13px;
    font-weight: 700;
    float:right;
}
.span-read
{
   cursor: pointer;
}
.form-control:focus {
       box-shadow: 0 0 0 0.2rem rgb(255 255 255)!important;
  }
  .form-control 
  {
     font-size: 14px!important;
     height: 34px!important;
  }
 /* .thead-hide
  {
    display: none;
  }*/
<?php if($list_msg=='Read'){?>
#read
{
  color: blue;
}
<?php } else{?>
 #unread
 {
   color: blue;
 } 
<?php } ?>
.cursor-pointer
{
   cursor:pointer;
}

</style>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
      <?php include 'include/Header.php' ?> 
                <div class="app-main">
                  <?php include 'include/Sidebar.php' ?> 
                   <div class="app-main__outer">
                    <div class="app-main__inner main_inneer">
                    <div class="container">
                    <!--  <h3 class=" text-center"><span id="unread" style="color: blue;" onclick="AppUserlist()" class="span-read">Unread</span> | <span id="read" class="span-read" onclick="Readlist()">Read</span></h3> -->
                   
                    <div class="form-row">

                    <div class="col-md-12">
                     <h3 class=" text-center"><span id="unread" style="" onclick="AppUserlist()" class="span-read">Unread</span> |<span id="read" class="span-read" onclick="Readlist()">Read</span></h3>
                    </div>
                  </div>
                      
                    <!--  <form class="form-inline" action="<?=base_url()?>/Admin/ListUser" method="post" 
                      onchange="selectmembership()" id="selectmembership" style="float: right;margin-top: -4%;" >
                                      
                      <?php  $Membership = isset($_POST['Membership'])?$_POST['Membership']:'';?>
                      <select  name="Membership" class="form-control" >
                      <option value="Paid" 
                      <?php echo($Membership=='Paid')?'selected':''; ?> >
                      Paid</option><option value="Free" 
                      <?php echo($Membership=='Free')?'selected':''; ?> >
                      Free</option>
                                         
                                      
                                        
                                         
                                        </select>
                                         </form>
                <form class="form-inline" action="<?=base_url()?>/Admin/ListUserCourse" method="post" 
                                         onchange="selectlanguage()" id="selectlanguage" style="float: right;margin-top: -4%;margin-right: 88px;" >
                                      
                                         <?php  $Course_Id = isset($_POST['Course_Id'])?$_POST['Course_Id']:'';?>
                                         <select  name="Course_Id" class="form-control" >
                                         <option value="" disabled="" selected="">Select Course</option>
                                          <?php if (isset($Course['data']))
                                           {foreach($Course['data'] as $row)
                                                                          {?>
                                         <option value="<?php echo $row['Course_Id']?>" 
                                         <?php echo($Course_Id==$row['Course_Id'])?'selected':''; ?> >
                                         <?php echo $row['Couse_Title']?></option>
                                         <?PHP }} ?>
                                         
                                          
                                        </select>
                                         </form> -->
                                         <br>
                                          <div class="main-card mb-3 card">
                                          <div class="card-body">
                                          <h5 class="card-title">Messages</h5>
                                           <?php  $Course_Id = isset($_POST['Course_Id'])?$_POST['Course_Id']:'';?>
                      
                         <form class="form-inline" style="float:right;margin-top: -4%;margin-bottom: 10px;" action="<?=base_url()?>/Admin/ListUserCourse/<?php echo($list_msg)?>" method="post"  id="selectlanguage"  >
                           <div class="form-group mb-2">
                                         <select  name="Course_Id" class="form-control maxwidth">
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
                      <div class="form-group ml-2 mb-2">
                      <?php  $Membership = isset($_POST['Membership'])?$_POST['Membership']:'';?>
                    
                      
                      <select  name="Membership" class="form-control" >
                      <option value="" disabled="" selected="">Select Type</option>
                      <option value="Paid" 
                      <?php echo($Membership=='Paid')?'selected':''; ?> >
                      Paid</option><option value="Free" 
                      <?php echo($Membership=='Free')?'selected':''; ?> >
                      Free</option>
                                         
                      </select>
                      </div>
                       <button class="btn btn-primary ml-2 mb-2" onclick="Applyfilter()" id="Applyfilter">Apply Filter</button>
                    </form>
                                          <div class="table-responsive">
                                          <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                               <thead class="thead-hide">
                                                <tr>
                                                   <!--  <th>ID</th> -->
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                   
                                                    <!-- <th>Course Description</th> -->
                                                  
                                                    <th>Message</th>
                                                    <th>Message Datetime</th>
                                                    
                                                  
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php if(isset($Data['data'])){ 
                                                 foreach ($Data['data'] as $val){?>
                                                  <?php if($val['Message_value']==0){?>
                                                  <tr data-href="<?php echo $val['MessageId'] ?>,<?php echo $val['MSGDateTime'] ?>" class="cursor-pointer" id="<?php echo $val['MessageId'] ?>,<?php echo $val['MSGDateTime'] ?>">
                                                    <input type="hidden" value="<?php echo $val['User_Id']?>" id="User_Id">
                                                  
                                                  <td class="avatar">
                                                  <?php if($val['Profile_Picture']!==''){?>
                                                 <img src="<?=base_url()?>/public/uploads/<?php echo $val['Profile_Picture'] ?>" alt="<?php echo $val['Profile_Picture'] ?>">
                                                 <?php } else { ?>
                                                  <img src="<?=base_url()?>/public/uploads/AvtarImage.png"  alt="AvtarImage.png">
                                                  
                                                 <?php } ?>
                                                  </td>
                                                  <td><?php echo $val['Name']?></td>
                                                  
                                                  <td style="width:30%;" class="message-desc"><?php echo substr($val['Message'],0,40) ?></td>
                                                  <td><?php echo (date('  jS F , H:i A', strtotime($val['MSGDateTime']))) ?></td>
                                                  </tr>
                                                 <?php } else{ ?>
                                                  <tr class="cursor-pointer" onclick="window.location.href='<?=base_url()?>/Admin/Msgsend/<?php echo $val['User_Id']?>/<?php echo $val['MessageId'] ?>'">
                                                  
                                                  
                                                  <td class="avatar">
                                                  <?php if($val['Profile_Picture']!==''){?>
                                                 <img src="<?=base_url()?>/public/uploads/<?php echo $val['Profile_Picture'] ?>" alt="<?php echo $val['Profile_Picture'] ?>">
                                                 <?php } else { ?>
                                                  <img src="<?=base_url()?>/public/uploads/AvtarImage.png"  alt="AvtarImage.png">
                                                  
                                                 <?php } ?>
                                                  </td>
                                                  <td><?php echo $val['Name']?></td>
                                                  <td><?php echo (date('  jS F , H:i A', strtotime($val['MSGDateTime']))) ?></td>
                                                  <td  style="width:30%;" class="message-desc"><?php echo $val['Message'] ?></td>
                                                  </tr>

                                                 <?php } ?>



                                                <?php } } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                      </div>
                                    </div>
<!-- <div class="">
      <div class="">
        
          <div class="row">
            <div class="col-md-12">
          <div class="">

            <?php if(isset($Data['data'])){ 
            foreach ($Data['data'] as $val){?>
            <?php if($val['Message_value']==0){?>
            <div class="chat_list" id="<?php echo $val['MessageId'] ?>,<?php echo $val['MSGDateTime'] ?>" onclick="update_msgstatus(this.id)">
            <input type="hidden" value="<?php echo $val['User_Id']?>" id="User_Id">
              <div class="chat_people">
               <div class="avatar">
               <?php if($val['Profile_Picture']!==''){?>
               <img src="<?=base_url()?>/public/uploads/<?php echo $val['Profile_Picture'] ?>" alt="<?php echo $val['Profile_Picture'] ?>">
               <?php } else { ?>
                <img src="<?=base_url()?>/public/uploads/AvtarImage.png"  alt="AvtarImage.png">
                
               <?php } ?>
                </div>
                <div class="chat_ib">
                  <h5><?php echo $val['Name'] ?><span class="chat_date"><?php echo (date('  jS F , H:i A', strtotime($val['MSGDateTime']))) ?></span></h5>
                  <span class="badge badge-danger">New</span>
                  <p><?php echo $val['Message'] ?></p>
                </div>
              </div>
            </div>
          <?php } else {?>
           <div class="chat_list" onclick="window.location.href='<?=base_url()?>/Admin/Msgsend/<?php echo $val['User_Id']?>/<?php echo $val['MessageId'] ?>'">
              <div class="row">

              <div class="col-md-2">
              <?php if($val['Profile_Picture']!==''){?>
              <div class="avatar">
              <img src="<?=base_url()?>/public/uploads/<?php echo $val['Profile_Picture'] ?>" alt="<?php echo $val['Profile_Picture'] ?>">
              </div>
              <?php } else { ?>
              <div class="avatar">
              <img src="<?=base_url()?>/public/uploads/AvtarImage.png"  alt="AvtarImage.png">
              </div>
              <?php } ?>
             
              </div>
              <div class="col-md-3">
              <h5 style=""><?php echo $val['Name'] ?><h5>
              </div>
              <div class="col-md-5">
              <p class="message-desc"><?php echo $val['Message'] ?></p>
              </div>
              <div class="col-md-2">
              <span class="chat_date"><?php echo (date(' jS F , H:i A', strtotime($val['MSGDateTime']))) ?></span>
              </div>
              </div>
             
            </div>
          <?php } ?>
          <?php }} else {?>
          <p style="text-align:center;padding: 34px;">No Data Found</p>

          <?php } ?>
          
          
            
           
          
          
          </div>
        </div>
      </div>


       
      
      </div>
      
      
     
      
    </div> -->
    </div>
                    </div>
                    <?php include 'include/Footer.php' ?> 
                  </div>
        </div>
    </div>
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
    jQuery(document).ready(function($)
      {

         $('#bootstrap-data-table_filter');
         $("#maintable_filter").append("<button> Something</button>");
      
      });
   
     $(document).on('click','.cursor-pointer',function(e)
     {
         var id=$(this).data('href');
         var meg_id=id;
         var Meg_string = meg_id.split(",");
         var MessageId =Meg_string[0];
         var MSGDateTime =Meg_string[1];
         //alert(MSGDateTime);
         var User_Id=document.getElementById('User_Id').value;
         //alert(MessageId);
         $.post('<?=base_url()?>/Admin/update_msgstatus',{"Id":MessageId,"MSGDateTime":MSGDateTime},function(response){
         var obj = JSON.parse(response);
        console.log(obj);
        if(obj.Status==true)
       {
          //alert('Exam successfully save');
        var url = "<?=base_url()?>/Admin/Msgsend/"+User_Id+"/"+MessageId+"";
        $(location).attr('href',url);
       }
       else
       {
          alert('No data found');
       }


     }); 

    });
     function update_msgstatus($id)
     {
         var meg_id=$id;
         var Meg_string = meg_id.split(",");
         var MessageId =Meg_string[0];
         var MSGDateTime =Meg_string[1];
         //alert(MSGDateTime);
         var User_Id=document.getElementById('User_Id').value;
         //alert(MessageId);
         $.post('<?=base_url()?>/Admin/update_msgstatus',{"Id":MessageId,"MSGDateTime":MSGDateTime},function(response){
         var obj = JSON.parse(response);
        console.log(obj);
       if(obj.Status==true)
       {
          //alert('Exam successfully save');
        var url = "<?=base_url()?>/Admin/Msgsend/"+User_Id+"/"+MessageId+"";
        $(location).attr('href',url);
       }
       else
       {
          alert('No data found');
       }
     
       
     
    
    
        });
         //alert(meg_id);
     }


     function Readlist()
     {
          window.location.href='<?=base_url()?>/Admin/Readlist/Read';
         
          $('#read').addClass('unread');
          $('#unread').removeClass('unread');

     }
     function AppUserlist()
     {
        window.location.href='<?=base_url()?>/Admin/AppUserlist/Unread';
        $('#unread').addClass('unread');
         $('#read').removeClass('unread');
     }
     jQuery(document).ready(function($)
    {
      
       $("#Messages").addClass("mm-active");
       $("#App-active").addClass("mm-show");

    });

     function selectmembership()
      {
         $('#selectmembership').submit();
      }

      function selectlanguage()
      {
         $('#selectlanguage').submit();
      }

      function Applyfilter()
      {
        $('#selectlanguage').submit();
      }
    
    </script>
</body>
</html>
