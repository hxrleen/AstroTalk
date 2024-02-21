<!doctype html>
<html lang="en">

<?php include 'include/Head.php' ?>
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<style type="text/css">
.custom-clickable-row
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
                                <div class="main-card mb-3  card">
                                <div class="card-body">
                                <h5 class="card-title">Refer and Earn List</h5>
                                <!-- <button type="button" style="margin-top:-4%" onclick="openmodal()" class="btn btn-primary float-right">Add Payments</button>
                                 -->

                                <div class="table-responsive">
                                            <table id="bootstrap-data-table" class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>

                                                <th>Sr No.</th> 
                                                    <th>Username</th>
                                                    <th>Referral Code</th>
                                                    <th>Total Referral</th>
                                                    <th>Paid Referral</th>
                                                    <th>Total Amount</th>
                                                    <th>Paid Amount</th>
                                                    <th>Balance</th>
                                                    <th>Action</th>
                                                     
                                                    
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>

                                               
                                                <td>hi</td>
                                                <td>hi</td>
                                                <td>hi</td>
                                                <td>hi</td>
                                                <td>hi</td>
                                                <td>hi</td>
                                                <td>hi</td>
                                                <td>hi</td>
                                                <td>hi</td>

                                                 
                                        
                                                </tr>


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
       
      <!-- Modal -->
      <div class="modal" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?=base_url()?>/Admin/AddPayments" name="Payments" id="pay" method="post" enctype="multipart/form-data">
            <div class="form-group">

            <label>Select User</label>
            <input type="text" name="UserName" id= Username autocomplete="off" class="form-control">
            <input type="hidden"  name="User_Id" id="name" autocomplete="off" class="form-control">
    
            <!-- <input type="hidden"  name="UserName" id="name" autocomplete="off" class="form-control"> -->
            <div class="form-group">
            <label for="name">Pay Date:</label>
            <input type="date" name="PayDate" autocomplete="off" class="form-control" placeholder="Enter Pay Date" id="PayDate" required>
            </div>
            <div class="form-group">
            <label for="name">Amount:</label>
            <input type="number" name="Amount" autocomplete="off" class="form-control" id="Amount" placeholder="Enter Amount"  required="" >
            </div>
            
            <div class="form-group">
            <label for="name">Available Balance :</label>
            <input type="text" name="Balance" autocomplete="off" class="form-control" id="bal" placeholder="Enter Amount" required="">
            </div>

            <div class="form-group">
            <label for="name">Payment Details:</label>
            <!-- <input type="text" name="PaymentDetails"  autocomplete="off" class="form-control" id="PaymentDetails" placeholder="Enter Payment details" required="">
             -->
             <textarea name="PaymentDetails"  autocomplete="off" class="form-control" id="PaymentDetails" placeholder="Enter Payment details" required=""></textarea>
          
          </div>
            <input type="hidden" name="Payment_ID" id="hidden_Paymentid" value="">
           <button type="submit" class="btn btn-primary">Submit</button>
           </form>
            </div>
          
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
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    -->
    <script type="text/javascript">
    $(document).ready(function(){
     
     $("#Payments").addClass("mm-active");
     $("#App-active").addClass("mm-show");
     $('#Dashboard-active').removeClass("mm-active");
     $('#bootstrap-data-table').DataTable( {
           "destroy": true,
           "ordering": false
      } );

    });
</script>



</body>
</html>
