
<!doctype html>
<html lang="en">
<?php include 'include/Head.php' ?>
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=THEME?>assets/css/bootstrapdatatable.min.css">
<link rel="stylesheet" href="<?=THEME?>assets/css/style.css">
<style type="text/css">

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
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
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>
</head>
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
                                                           
<!--Main body content -->
<div class="preloader"></div>
    

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><h6>Personal</h6></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><h6>Qualification</h6></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#resume" role="tab" aria-controls="profile" aria-selected="false"><h6>Financial</h6></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="profile" aria-selected="false"><h6>Documents</h6></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#available" role="tab" aria-controls="profile" aria-selected="false"><h6>Availability</h6></a>
                              </li>
                             </ul>

<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<div class="row no-margin home-det">
<div class="card-body" >
   <div class="card-title">PERSONAL DETAILS <p>    </div>                     
<form  class="cmxform" id="astroinsert1" method="POST" action="" autocomplete="off">
                                 <!--Personal Details-->
                <div class="position-relative row form-group" hidden>
                              
                             <label for="exampleEmail" class="col-sm-2 col-form-label"> ID </label>
                              <div class="col-sm-4" >
                              <td><input name="Astrologer_id" value="<?php echo $id['Astrologer_id'] ?>" id="Astrologer_id" placeholder="first name" class="form-control" required=""></td>
                              <small class="form-text text-muted"></small>
                              </div>
              </div>


              <div class="position-relative row form-group">
                       
                             <label for="exampleEmail" class="col-sm-2 col-form-label"> Name</label>
                              <div class="col-sm-4">
                              <td><input name="First_name" value="<?php echo $singleProduct[0]['First_name'] ?>" id="First_name" placeholder="first name" class="form-control" required=""></td>
                              <small class="form-text text-muted"></small>
                              </div>
        
        
                              <label for="exampleFile" class="col-sm-2 col-form-label"></label>
                              <div class="col-sm-4">
                              <tr>
                              <td><input name="Last_name" value="<?php echo $singleProduct[0]['Last_name'] ?>"  id="Last_name" placeholder="Last name" class="form-control" required=""></td>
                              </tr>
                              <small class="form-text text-muted"></small>
                              </div> 
        
              </div>
        
                                                  
                        <div class="position-relative row form-group">
        
                        <label for="exampleEmail" class="col-sm-2 col-form-label" >Date of Birth </label>
                        <div class="col-sm-4">
                          <tr>
                        <td><input type="date" value="<?php echo $singleProduct[0]['Dob'] ?>" class="form-control form-control-user" id="Dob" name="Dob" placeholder="" required=""></td>
                        </tr>
                        </div>
        
        
                        <label for="exampleEmail" class="col-sm-2 col-form-label"> Gender </label>
                        <div class="col-sm-4">
                        <select class="form-control form-control-user" value="<?php echo $singleProduct[0]['Gender'] ?>" name="Gender" id="Gender" required="">
                        <option value=""> Choose any One </option>
                        <option value="Male" selected>  Male </option>
                        <option value="Female"> Female </option>
                        <option value="Others"> Others </option> 
                        </select> 
                        </div>
        
                        </div>
        
        
        
                          <div class="position-relative row form-group">
                                                      
                          <label for="exampleFile" class="col-sm-2 col-form-label" >Contact </label>
                          <div class="col-sm-4">
                          <input name="Mobile" value="<?php echo $singleProduct[0]['Mobile'] ?>"  id="Mobile" placeholder="" class="form-control" required>   
                          <small class="form-text text-muted"></small>
                          </div>
                                                                    
        
                          <label for="exampleFile" class="col-sm-2 col-form-label" >Email-ID </label>
                          <div class="col-sm-4" >
                          <input name="Email" value="<?php echo $singleProduct[0]['Email'] ?>"  id="Email" placeholder=""  class="form-control"  required>   
                          <small class="form-text text-muted"></small>
                          </div>
                                                                                                            
                          </div>
        
        
        
        
                          <div class="position-relative row form-group">
        
                          <label for="exampleFile" class="col-sm-2 col-form-label"> Address </label>
                          <div class="col-sm-9">
                          <input name="Address" value="<?php echo $singleProduct[0]['Address']?>"  id="Address" placeholder="" class="form-control" required="">   
                          <small class="form-text text-muted"></small>
                          </div>
        
                          </div>
        
        
        
                          <div class="position-relative row form-group">
                                                      
        
                          <label for="exampleFile" class="col-sm-2 col-form-label"> Pin Code </label>
                          <div class="col-sm-2">
                          <input name="Pincode" value="<?php echo $singleProduct[0]['Pincode'] ?>" id="Pincode" placeholder="" class="form-control" required="">   
                          <small class="form-text text-muted"></small>
                          </div>
        
        
        
                        <label for="exampleEmail" class="col-sm-2 col-form-label"> State </label>
                        <div class="col-sm-2">
                        <select class="form-control" value="<?php echo $singleProduct[0]['State']?>" name="State" id="State" required="">
                          <option value=""> Please Select </option>
                                    <option value="Andhra Pradesh" selected>Andhra Pradesh</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                    </select>
                            </div>               
                                       
        
        
        
        
                        <label for="exampleEmail" value="<?php echo $singleProduct[0]['Country'] ?>" class="col-sm-2 col-form-label"> Country </label>
                        <div class="col-sm-2">
                        <select class="form-control" name="Country" id="Country" required="">
                            <option value="" > Please Select </option>
                            <option value="United States"> United States </option>
                            <option value="Afghanistan"> Afghanistan </option>
                            <option value="Albania"> Albania </option>
                            <option value="Algeria"> Algeria </option>
                            <option value="American Samoa"> American Samoa </option>
                            <option value="Andorra"> Andorra </option>
                            <option value="Angola"> Angola </option>
                            <option value="Anguilla"> Anguilla </option>
                            <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
                            <option value="Argentina"> Argentina </option>
                            <option value="Armenia"> Armenia </option>
                            <option value="Aruba"> Aruba </option>
                            <option value="Australia"> Australia </option>
                            <option value="Austria"> Austria </option>
                            <option value="Azerbaijan"> Azerbaijan </option>
                            <option value="The Bahamas"> The Bahamas </option>
                            <option value="Bahrain"> Bahrain </option>
                            <option value="Bangladesh"> Bangladesh </option>
                            <option value="Barbados"> Barbados </option>
                            <option value="Belarus"> Belarus </option>
                            <option value="Belgium"> Belgium </option>
                            <option value="Belize"> Belize </option>
                            <option value="Benin"> Benin </option>
                            <option value="Bermuda"> Bermuda </option>
                            <option value="Bhutan"> Bhutan </option>
                            <option value="Bolivia"> Bolivia </option>
                            <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
                            <option value="Botswana"> Botswana </option>
                            <option value="Brazil"> Brazil </option>
                            <option value="Brunei"> Brunei </option>
                            <option value="Bulgaria"> Bulgaria </option>
                            <option value="Burkina Faso"> Burkina Faso </option>
                            <option value="Burundi"> Burundi </option>
                            <option value="Cambodia"> Cambodia </option>
                            <option value="Cameroon"> Cameroon </option>
                            <option value="Canada"> Canada </option>
                            <option value="Cape Verde"> Cape Verde </option>
                            <option value="Cayman Islands"> Cayman Islands </option>
                            <option value="Central African Republic"> Central African Republic </option>
                            <option value="Chad"> Chad </option>
                            <option value="Chile"> Chile </option>
                            <option value="China"> China </option>
                            <option value="Christmas Island"> Christmas Island </option>
                            <option value="Cocos (Keeling) Islands"> Cocos (Keeling) Islands </option>
                            <option value="Colombia"> Colombia </option>
                            <option value="Comoros"> Comoros </option>
                            <option value="Congo"> Congo </option>
                            <option value="Cook Islands"> Cook Islands </option>
                            <option value="Costa Rica"> Costa Rica </option>
                            <option value="Cote d&#x27;Ivoire"> Cote d&#x27;Ivoire </option>
                            <option value="Croatia"> Croatia </option>
                            <option value="Cuba"> Cuba </option>
                            <option value="Curacao"> Curacao </option>
                            <option value="Cyprus"> Cyprus </option>
                            <option value="Czech Republic"> Czech Republic </option>
                            <option value="Democratic Republic of the Congo"> Democratic Republic of the Congo </option>
                            <option value="Denmark"> Denmark </option>
                            <option value="Djibouti"> Djibouti </option>
                            <option value="Dominica"> Dominica </option>
                            <option value="Dominican Republic"> Dominican Republic </option>
                            <option value="Ecuador"> Ecuador </option>
                            <option value="Egypt"> Egypt </option>
                            <option value="El Salvador"> El Salvador </option>
                            <option value="Equatorial Guinea"> Equatorial Guinea </option>
                            <option value="Eritrea"> Eritrea </option>
                            <option value="Estonia"> Estonia </option>
                            <option value="Ethiopia"> Ethiopia </option>
                            <option value="Falkland Islands"> Falkland Islands </option>
                            <option value="Faroe Islands"> Faroe Islands </option>
                            <option value="Fiji"> Fiji </option>
                            <option value="Finland"> Finland </option>
                            <option value="France"> France </option>
                            <option value="French Polynesia"> French Polynesia </option>
                            <option value="Gabon"> Gabon </option>
                            <option value="The Gambia"> The Gambia </option>
                            <option value="Georgia"> Georgia </option>
                            <option value="Germany"> Germany </option>
                            <option value="Ghana"> Ghana </option>
                            <option value="Gibraltar"> Gibraltar </option>
                            <option value="Greece"> Greece </option>
                            <option value="Greenland"> Greenland </option>
                            <option value="Grenada"> Grenada </option>
                            <option value="Guadeloupe"> Guadeloupe </option>
                            <option value="Guam"> Guam </option>
                            <option value="Guatemala"> Guatemala </option>
                            <option value="Guernsey"> Guernsey </option>
                            <option value="Guinea"> Guinea </option>
                            <option value="Guinea-Bissau"> Guinea-Bissau </option>
                            <option value="Guyana"> Guyana </option>
                            <option value="Haiti"> Haiti </option>
                            <option value="Honduras"> Honduras </option>
                            <option value="Hong Kong"> Hong Kong </option>
                            <option value="Hungary"> Hungary </option>
                            <option value="Iceland"> Iceland </option>
                            <option value="India" selected> India </option>
                            <option value="Indonesia"> Indonesia </option>
                            <option value="Iran"> Iran </option>
                            <option value="Iraq"> Iraq </option>
                            <option value="Ireland"> Ireland </option>
                            <option value="Israel"> Israel </option>
                            <option value="Italy"> Italy </option>
                            <option value="Jamaica"> Jamaica </option>
                            <option value="Japan"> Japan </option>
                            <option value="Jersey"> Jersey </option>
                            <option value="Jordan"> Jordan </option>
                            <option value="Kazakhstan"> Kazakhstan </option>
                            <option value="Kenya"> Kenya </option>
                            <option value="Kiribati"> Kiribati </option>
                            <option value="North Korea"> North Korea </option>
                            <option value="South Korea"> South Korea </option>
                            <option value="Kosovo"> Kosovo </option>
                            <option value="Kuwait"> Kuwait </option>
                            <option value="Kyrgyzstan"> Kyrgyzstan </option>
                            <option value="Laos"> Laos </option>
                            <option value="Latvia"> Latvia </option>
                            <option value="Lebanon"> Lebanon </option>
                            <option value="Lesotho"> Lesotho </option>
                            <option value="Liberia"> Liberia </option>
                            <option value="Libya"> Libya </option>
                            <option value="Liechtenstein"> Liechtenstein </option>
                            <option value="Lithuania"> Lithuania </option>
                            <option value="Luxembourg"> Luxembourg </option>
                            <option value="Macau"> Macau </option>
                            <option value="Macedonia"> Macedonia </option>
                            <option value="Madagascar"> Madagascar </option>
                            <option value="Malawi"> Malawi </option>
                            <option value="Malaysia"> Malaysia </option>
                            <option value="Maldives"> Maldives </option>
                            <option value="Mali"> Mali </option>
                            <option value="Malta"> Malta </option>
                            <option value="Marshall Islands"> Marshall Islands </option>
                            <option value="Martinique"> Martinique </option>
                            <option value="Mauritania"> Mauritania </option>
                            <option value="Mauritius"> Mauritius </option>
                            <option value="Mayotte"> Mayotte </option>
                            <option value="Mexico"> Mexico </option>
                            <option value="Micronesia"> Micronesia </option>
                            <option value="Moldova"> Moldova </option>
                            <option value="Monaco"> Monaco </option>
                            <option value="Mongolia"> Mongolia </option>
                            <option value="Montenegro"> Montenegro </option>
                            <option value="Montserrat"> Montserrat </option>
                            <option value="Morocco"> Morocco </option>
                            <option value="Mozambique"> Mozambique </option>
                            <option value="Myanmar"> Myanmar </option>
                            <option value="Nagorno-Karabakh"> Nagorno-Karabakh </option>
                            <option value="Namibia"> Namibia </option>
                            <option value="Nauru"> Nauru </option>
                            <option value="Nepal"> Nepal </option>
                            <option value="Netherlands"> Netherlands </option>
                            <option value="Netherlands Antilles"> Netherlands Antilles </option>
                            <option value="New Caledonia"> New Caledonia </option>
                            <option value="New Zealand"> New Zealand </option>
                            <option value="Nicaragua"> Nicaragua </option>
                            <option value="Niger"> Niger </option>
                            <option value="Nigeria"> Nigeria </option>
                            <option value="Niue"> Niue </option>
                            <option value="Norfolk Island"> Norfolk Island </option>
                            <option value="Turkish Republic of Northern Cyprus"> Turkish Republic of Northern Cyprus </option>
                            <option value="Northern Mariana"> Northern Mariana </option>
                            <option value="Norway"> Norway </option>
                            <option value="Oman"> Oman </option>
                            <option value="Pakistan"> Pakistan </option>
                            <option value="Palau"> Palau </option>
                            <option value="Palestine"> Palestine </option>
                            <option value="Panama"> Panama </option>
                            <option value="Papua New Guinea"> Papua New Guinea </option>
                            <option value="Paraguay"> Paraguay </option>
                            <option value="Peru"> Peru </option>
                            <option value="Philippines"> Philippines </option>
                            <option value="Pitcairn Islands"> Pitcairn Islands </option>
                            <option value="Poland"> Poland </option>
                            <option value="Portugal"> Portugal </option>
                            <option value="Puerto Rico"> Puerto Rico </option>
                            <option value="Qatar"> Qatar </option>
                            <option value="Republic of the Congo"> Republic of the Congo </option>
                            <option value="Romania"> Romania </option>
                            <option value="Russia"> Russia </option>
                            <option value="Rwanda"> Rwanda </option>
                            <option value="Saint Barthelemy"> Saint Barthelemy </option>
                            <option value="Saint Helena"> Saint Helena </option>
                            <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
                            <option value="Saint Lucia"> Saint Lucia </option>
                            <option value="Saint Martin"> Saint Martin </option>
                            <option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
                            <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
                            <option value="Samoa"> Samoa </option>
                            <option value="San Marino"> San Marino </option>
                            <option value="Sao Tome and Principe"> Sao Tome and Principe </option>
                            <option value="Saudi Arabia"> Saudi Arabia </option>
                            <option value="Senegal"> Senegal </option>
                            <option value="Serbia"> Serbia </option>
                            <option value="Seychelles"> Seychelles </option>
                            <option value="Sierra Leone"> Sierra Leone </option>
                            <option value="Singapore"> Singapore </option>
                            <option value="Slovakia"> Slovakia </option>
                            <option value="Slovenia"> Slovenia </option>
                            <option value="Solomon Islands"> Solomon Islands </option>
                            <option value="Somalia"> Somalia </option>
                            <option value="Somaliland"> Somaliland </option>
                            <option value="South Africa"> South Africa </option>
                            <option value="South Ossetia"> South Ossetia </option>
                            <option value="South Sudan"> South Sudan </option>
                            <option value="Spain"> Spain </option>
                            <option value="Sri Lanka"> Sri Lanka </option>
                            <option value="Sudan"> Sudan </option>
                            <option value="Suriname"> Suriname </option>
                            <option value="Svalbard"> Svalbard </option>
                            <option value="eSwatini"> eSwatini </option>
                            <option value="Sweden"> Sweden </option>
                            <option value="Switzerland"> Switzerland </option>
                            <option value="Syria"> Syria </option>
                            <option value="Taiwan"> Taiwan </option>
                            <option value="Tajikistan"> Tajikistan </option>
                            <option value="Tanzania"> Tanzania </option>
                            <option value="Thailand"> Thailand </option>
                            <option value="Timor-Leste"> Timor-Leste </option>
                            <option value="Togo"> Togo </option>
                            <option value="Tokelau"> Tokelau </option>
                            <option value="Tonga"> Tonga </option>
                            <option value="Transnistria Pridnestrovie"> Transnistria Pridnestrovie </option>
                            <option value="Trinidad and Tobago"> Trinidad and Tobago </option>
                            <option value="Tristan da Cunha"> Tristan da Cunha </option>
                            <option value="Tunisia"> Tunisia </option>
                            <option value="Turkey"> Turkey </option>
                            <option value="Turkmenistan"> Turkmenistan </option>
                            <option value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
                            <option value="Tuvalu"> Tuvalu </option>
                            <option value="Uganda"> Uganda </option>
                            <option value="Ukraine"> Ukraine </option>
                            <option value="United Arab Emirates"> United Arab Emirates </option>
                            <option value="United Kingdom"> United Kingdom </option>
                            <option value="Uruguay"> Uruguay </option>
                            <option value="Uzbekistan"> Uzbekistan </option>
                            <option value="Vanuatu"> Vanuatu </option>
                            <option value="Vatican City"> Vatican City </option>
                            <option value="Venezuela"> Venezuela </option>
                            <option value="Vietnam"> Vietnam </option>
                            <option value="British Virgin Islands"> British Virgin Islands </option>
                            <option value="Isle of Man"> Isle of Man </option>
                            <option value="US Virgin Islands"> US Virgin Islands </option>
                            <option value="Wallis and Futuna"> Wallis and Futuna </option>
                            <option value="Western Sahara"> Western Sahara </option>
                            <option value="Yemen"> Yemen </option>
                            <option value="Zambia"> Zambia </option>
                            <option value="Zimbabwe"> Zimbabwe </option>
                            <option value="other"> Other </option>
                          </select>
                                </div>
                                </div>
                               
                                <div class="position-relative row form-group">
                                 <label for="exampleFile" class="col-sm-2 col-form-label">Profile Picture</label>
                             <div class="col-sm-10">
                             <input name="ProfilePic"  accept="image/*" id="ProfilePic" placeholder="Profile Picture" type="file" class="form-control" >              
                            </div>
                                </div>
                               
                               
                               

                                <div class="position-relative row form-group">
                                 <label for="exampleFile" class="col-sm-2 col-form-label"> About Me </label>
                             <div class="col-sm-10">
                             <textarea id="About" placeholder="Please Enter the Description "  name="About" value="" class="form-control ckeditor" type="text" rows="4" cols="50" required=""><?php echo $singleProduct[0]['About'] ?></textarea>
                                                  
                            </div>
                  </div>


                  <div class="position-relative row form-group"><label for="exampleEmail"  class="col-sm-2 col-form-label">Category</label>
 
                                           
                                           <div class="col-sm-10">
                                           <select class="js-example-basic-multiple form-control" value="<?php echo $singleProduct[0]['AstroCat']?>" multiple required="" name="Astro_Cat" id="Astro_Cat" required="">
                                               <?php
                                                if(isset($data['data']))
                                                {

                                                 $count=0;
                                                 foreach ($data['data'] as $val) {  ?>
                                                 <option value="<?php  echo $val['CatName'] ?>"><?php echo $val['CatName'] ?></option>
                                                 <?php $count = $count + 1; ?>  
                                                  
                                                <?php } } ?>
                           
                                               </select>
                                          </div>
                                                 </div>

                                                 <?php //print_r($Valid) ?>
                                                                       
                                           <div class="position-relative row form-group">
                                       <label for="exampleEmail" class="col-sm-2 col-form-label"> Status </label>
                                       <div class="col-sm-4">
                                       <select class="form-control form-control-user" value="<?php echo $singleProduct[0]['Account_Status']?>"  name="Account_Status" id="Account_Status" required="">  
                                          <option value="Active">Active</option>        
                                          <option value="Inactive">Inactive</option>                          
                  
                                       </select> 
                                       </div>
                                          </div>


                                            
                  
                  <div class="position-relative row form-check" style="align:center">
                               <div class="col-sm-10 offset-sm-2" >
                                        <a href="#"  ><button class="btn btn-primary">Save</button></a>
                                                  
                              </div>
                         </div>
                         <div class="position-relative row form-check" style="align:center">
                               <div class="col-sm-10 offset-sm-2" >
                                            <a href="#"><button style="margin-left: 27%;margin-top: -60px;"  class="btn btn-primary " onclick="window.location.href='./astrologerlist'">Close</button></a>
                                </div>
                         </div>
         

</form>
</div>
</div>
</div>




<!--Qualifications-->
<div class="tab-pane fade exp-cover" id="profile" role="tabpanel" aria-labelledby="profile-tab">    
<div class="row no-margin home-det"> 
<div class="card-body" ><div class="card-title">QUALIFICATION AND EXPERIENCE <p> </div>
<form  class="cmxform" id="astroinsert2" method="POST" action="" autocomplete="off">  
   
<div class="position-relative row form-group" hidden>
                              
                              <label for="exampleEmail" class="col-sm-2 col-form-label"> ID </label>
                               <div class="col-sm-4" >
                               <td><input name="Astrologer_id" value="<?php echo $singleProduct[0]['Astrologer_id'] ?>" id="Astrologer_id" placeholder="first name" class="form-control" required=""></td>
                               <small class="form-text text-muted"></small>
                               </div>
               </div>


                            <div class="position-relative row form-group">
                                 <label for="exampleEmail" class="col-sm-2 col-form-label" style="width:100%"> Core Skills </label>
                                      <div class="col-sm-10" >
                                      <select id="Core_skills"  value="<?php echo $singleProduct[0]['Core_skills'] ?>" class="js-example-basic-multiple form-control" multiple required="" style="width:100%" name="Core_skills" required="" >
          
                                            <option value="Tarot">Tarot </option>
                                            <option value="Numerology" selected>Numerology </option>  
                                            <option value="Vastu">vastu </option>
                                            <option value="Kundli">Kundli </option>
                                            <option value="Gemstones">Gemstones </option>
                                            <option value="Zodiac">Zodiac </option>
                                            <option value="Horoscopes">Horoscopes </option>
                                            <option value="Vedic">Vedic </option>
                                            <option value="Love/Romance">Love/Romance </option>
                                            <option value="Gemstones">Gemstones </option>
                                            <option value="Sunsigns">Sunsigns </option> 
                                            </select>
                                            <span class="form-text text-muted">Multiple Skills can be selected using CTRL </span>
                                        </div>
                         </div>
          
          
                          <div class="position-relative row form-group">
                             <label for="exampleEmail" class="col-sm-2 col-form-label" >Languages </label>                   
                                 <div class="col-sm-10">
                                                  <select id="Language" value="<?php echo $singleProduct[0]['Language'] ?>" class="js-example-basic-multiple form-control" multiple required="" style="width:100%" name="Language" required="">
                                                    <option value="Afrikaans" selected>Afrikaans</option>
                                                    <option value="Albanian">Albanian</option>
                                                    <option value="Arabic">Arabic</option>
                                                    <option value="Armenian">Armenian</option>
                                                    <option value="Basque">Basque</option>
                                                    <option value="Bengali">Bengali</option>
                                                    <option value="Bulgarian">Bulgarian</option>
                                                    <option value="Catalan">Catalan</option>
                                                    <option value="Cambodian">Cambodian</option>
                                                    <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                                                    <option value="Croatian">Croatian</option>
                                                    <option value="Czech">Czech</option>
                                                    <option value="Danish">Danish</option>
                                                    <option value="Dutch">Dutch</option>
                                                    <option value="English">English</option>
                                                    <option value="Estonian">Estonian</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finnish">Finnish</option>
                                                    <option value="French">French</option>
                                                    <option value="Georgian">Georgian</option>
                                                    <option value="German">German</option>
                                                    <option value="Greek">Greek</option>
                                                    <option value="Gujarati">Gujarati</option>
                                                    <option value="Hebrew">Hebrew</option>
                                                    <option value="Hindi">Hindi</option>
                                                    <option value="Hungarian">Hungarian</option>
                                                    <option value="Icelandic">Icelandic</option>
                                                    <option value="Indonesian">Indonesian</option>
                                                    <option value="Irish">Irish</option>
                                                    <option value="Italian">Italian</option>
                                                    <option value="Japanese">Japanese</option>
                                                    <option value="Javanese">Javanese</option>
                                                    <option value="Korean">Korean</option>
                                                    <option value="Latin">Latin</option>
                                                    <option value="Latvian">Latvian</option>
                                                    <option value="Lithuanian">Lithuanian</option>
                                                    <option value="Macedonian">Macedonian</option>
                                                    <option value="Malay">Malay</option>
                                                    <option value="Malayalam">Malayalam</option>
                                                    <option value="Maltese">Maltese</option>
                                                    <option value="Maori">Maori</option>
                                                    <option value="Marathi">Marathi</option>
                                                    <option value="Mongolian">Mongolian</option>
                                                    <option value="Nepali">Nepali</option>
                                                    <option value="Norwegian">Norwegian</option>
                                                    <option value="Persian">Persian</option>
                                                    <option value="Polish">Polish</option>
                                                    <option value="Portuguese">Portuguese</option>
                                                    <option value="Punjabi">Punjabi</option>
                                                    <option value="Quechua">Quechua</option>
                                                    <option value="Romanian">Romanian</option>
                                                    <option value="Russian">Russian</option>
                                                    <option value="Samoan">Samoan</option>
                                                    <option value="Serbian">Serbian</option>
                                                    <option value="Slovak">Slovak</option>
                                                    <option value="Slovenian">Slovenian</option>
                                                    <option value="Spanish">Spanish</option>
                                                    <option value="Swahili">Swahili</option>
                                                    <option value="Swedish ">Swedish </option>
                                                    <option value="Tamil">Tamil</option>
                                                    <option value="Tatar">Tatar</option>
                                                    <option value="Telugu">Telugu</option>
                                                    <option value="Thai">Thai</option>
                                                    <option value="Tibetan">Tibetan</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Turkish">Turkish</option>
                                                    <option value="Ukrainian">Ukrainian</option>
                                                    <option value="Urdu">Urdu</option>
                                                    <option value="Uzbek">Uzbek</option>
                                                    <option value="Vietnamese">Vietnamese</option>
                                                    <option value="Welsh">Welsh</option>
                                                    <option value="Xhosa">Xhosa</option>
                                                  </select>
                                                  <span class="form-text text-muted">Multiple Skills can be selected using CTRL </span>
          
                                  </div>
                            </div>
          
          
                             <div class="position-relative row form-group">
                                <label for="exampleEmail" class="col-sm-2 col-form-label"> Expertise </label>
                              
                                  <div class="col-sm-10">
                                  <select id="Expertise" value="<?php echo $singleProduct[0]['Expertise'] ?>" class="js-example-basic-multiple form-control"  style="width:100%" multiple required="" name="Expertise" required="">
                                  
                                  <option value="Love" selected>Love </option>
                                  <option value="career">Career </option>  
                                  <option value="business">Business </option>
                                  <option value="health">Health </option>
                                  <option value="family">Family </option>
                                  <option value="marriage">Marriage </option>
                                  <option value="legal">Legal </option>
                                  <option value="education">Education </option>
                                
                                  </select>
                                  <span class="form-text text-muted">Multiple Skills can be selected using CTRL </span>
                                  </div>
                             </div>
          
          
                          <div class="position-relative row form-group"><label for="exampleFile" class="col-sm-2 col-form-label"> Experience (in years) </label>
                                <div class="col-sm-10">
                                      <input id="Experience" placeholder="" name="Experience" value="<?php echo $singleProduct[0]['Experience'] ?>" maxlength="30" class="form-control" type="text" rows="1" cols="50" required=""></input>
                                             <span id="rchars">10</span> Character(s) Remaining
                                </div>
                          </div> 

                      
                          

                          <div class="position-relative row form-check" style="align:center">
                               <div class="col-sm-10 offset-sm-2" >
                                        <a href="./astrologerlist"  ><button class="btn btn-primary">Save</button></a>
                                                  
                              </div>
                         </div>
                         <div class="position-relative row form-check" style="align:center">
                               <div class="col-sm-10 offset-sm-2" >
                                            <a href="./astrologerlist"  ><button style="margin-left: 27%;margin-top: -60px;"  class="btn btn-primary ">Close</button></a>
                                </div>
                         </div>
         
</form>
</div>
</div>
</div>
<!--pricing starts-->

<div class="tab-pane fade exp-cover" id="resume" role="tabpanel" aria-labelledby="contact-tab">
<form  class="cmxform" id="astroinsert3" method="POST" action="" autocomplete="off" class="card-title"><b>PRICING </b>

<div class="position-relative row form-group" hidden>
                              
                              <label for="exampleEmail" class="col-sm-2 col-form-label"> ID </label>
                               <div class="col-sm-4" >
                               <td><input name="Astrologer_id" value="<?php echo $singleProduct[0]['Astrologer_id'] ?>" id="Astrologer_id" placeholder="first name" class="form-control" required=""></td>
                               
                               <small class="form-text text-muted"></small>
                               </div>
               </div>
          
               <div class="position-relative row form-group">
                       
                             <label for="exampleFile" class="col-sm-2 col-form-label" >Chat Price </label>
                              <div class="col-sm-4">
                              <td><input name="Chat_price" value="<?php echo $singleProduct[0]['Chat_price'] ?>" id="Chat_price" placeholder="" min="1" max="" class="form-control" ></td>
                             
                              <small class="form-text text-muted"></small>
                              </div>
        
        
                              <label for="exampleFile" class="col-sm-2 col-form-label"> Max Chat Price </label>
                              <div class="col-sm-4">
                              <tr>
                              <td><input id="Max_chat_price" placeholder="" name="Max_chat_price" value="<?php echo $singleProduct[0]['Max_chat_price'] ?>" class="form-control" ></td>
                              </tr>
                              <small class="form-text text-muted"></small>
                              </div> 
        
              </div>

<div class="position-relative row form-group">
   <label for="exampleFile"  class="col-sm-2 col-form-label" >Audio Call Price </label>
      <div class="col-sm-4">
      <tr>
     <td> <input id="Audio_call_price" placeholder="" name="Audio_call_price" value="<?php echo $singleProduct[0]['Audio_call_price'] ?>" class="form-control" ></td>
      </tr>
      <small class="form-text text-muted"></small>
      </div>


<label for="exampleFile" class="col-sm-2 col-form-label"> Maximum Audio Call Price </label>
      <div class="col-sm-4">
         <tr>
     <td> <input id="Max_audio_call_price" placeholder="" name="Max_audio_call_price"  value="<?php echo $singleProduct[0]['Max_audio_call_price'] ?>" class="form-control" ></td>
        </tr>
        <small class="form-text text-muted"></small>
      </div>
</div> 

<div class="position-relative row form-group">
   <label for="exampleFile"  class="col-sm-2 col-form-label"> Video Call Price </label>
      <div class="col-sm-4">
         <tr>
      <td><input id="Video_call_price" placeholder="" name="Video_call_price" value="<?php echo $singleProduct[0]['Video_call_price'] ?>" class="form-control"  required=""></td>
        </tr>
        <small class="form-text text-muted"></small>
      </div>
 <label for="exampleFile"  class="col-sm-2 col-form-label"> Maximum Video Call Price </label>
      <div class="col-sm-4">
         <tr>
      <td><input id="Max_video_call_price" placeholder="" name="Max_video_call_price" value="<?php echo $singleProduct[0]['Max_video_call_price'] ?>" maxlength="30" class="form-control" type="text" rows="1" cols="50" required=""></tr>
       </tr>
       <small class="form-text text-muted"></small>
      </div>
</div> 



<!--Pricing Ends-->

<!--financials starts--> 
<b>BANK DETAILS </b>
               <div class="position-relative row form-group" hidden>
                              
                              <label for="exampleEmail" class="col-sm-2 col-form-label"> ID </label>
                               <div class="col-sm-4" >
                               <td><input name="Astrologer_id" value="<?php echo $singleProduct[0]['Astrologer_id'] ?>" id="Astrologer_id" placeholder="first name" class="form-control" required=""></td>
                               <small class="form-text text-muted"></small>
                               </div>
               </div>

<div class="position-relative row form-group">
   <label for="exampleFile"  class="col-sm-2 col-form-label"> Bank Name </label>
         <div class="col-sm-4">
         <tr>
     <td> <input id="Bank_name" placeholder=""  value="<?php echo $singleProduct[0]['Bank_name'] ?>" name="Bank_name"  maxlength="40" class="form-control" required=""></td>
        </tr>
        <small class="form-text text-muted"></small>
      </div>

<label for="exampleFile"  class="col-sm-2 col-form-label"> Bank Branch </label>
      <div class="col-sm-4">
         <tr>
      <td><input id="Bank_branch" placeholder="" name="Bank_branch" value="<?php echo $singleProduct[0]['Bank_branch'] ?>" maxlength="40" class="form-control" required=""></td>
          </tr>
          <small class="form-text text-muted"></small>
      </div>
</div> 

<div class="position-relative row form-group"><label for="exampleFile"  class="col-sm-2 col-form-label" >Bank Account Number </label>
      <div class="col-sm-4">
         <tr>
      <td><input id="Bank_account_no" placeholder="" name="Bank_account_no" value="<?php echo $singleProduct[0]['Bank_account_no'] ?>" maxlength="15" class="form-control" required=""></td>
       </tr>
       <small class="form-text text-muted"></small>
      </div>

<label for="exampleFile"  class="col-sm-2 col-form-label" >IFSC Code </label>
      <div class="col-sm-4">
         <tr>
     <td> <input id="IFSC_code" placeholder="" name="IFSC_code" value="<?php echo $singleProduct[0]['IFSC_code'] ?>" maxlength="15" class="form-control"  required=""></td>
         </tr>
         <small class="form-text text-muted"></small>
      </div>
</div> 

<div class="position-relative row form-group"><label for="exampleFile"  class="col-sm-2 col-form-label"> Account Holder Name </label>
      <div class="col-sm-10">
      <input id="Account_holder_name" placeholder="" name="Account_holder_name" value="<?php echo $singleProduct[0]['Account_holder_name'] ?>" maxlength="50" class="form-control" type="text" rows="1" cols="50" required=""></input>
        
      </div>
</div> 

<div class="position-relative row form-check" style="align:center">
     <div class="col-sm-10 offset-sm-2" >
              <a href="./astrologerlist"  ><button class="btn btn-primary">Save</button></a>
                        
    </div>
</div>
<div class="position-relative row form-check" style="align:center">
     <div class="col-sm-10 offset-sm-2" >
                  <a href="./astrologerlist"  ><button style="margin-left: 27%;margin-top: -60px;"  class="btn btn-primary ">Close</button></a>
      </div>
</div>


</form>   
 </div>
<!--financials ends-->
<!--document starts-->
<div class="tab-pane fade exp-cover" id="gallery" role="tabpanel" aria-labelledby="profile-tab"> 
<div class="row no-margin home-det">
<div class="card-body" class="card-title"><b>DOCUMENTS  </b><p> 
<form  class="cmxform" id="astroinsert4" method="POST" action="" autocomplete="off">  

                           

               <div class="position-relative row form-group" hidden>
                              
                              <label for="exampleEmail" class="col-sm-2 col-form-label"> Astrologer ID </label>
                               <div class="col-sm-5" >
                               <td><input name="Astrologer_id" value="<?php echo $singleProduct[0]['Astrologer_id'] ?>" id="Astrologer_id" placeholder="" class="form-control" required=""></td>
                               <small class="form-text text-muted"></small>
                               </div>
               </div>

               <div class="position-relative row form-group" >

                              <label for="exampleEmail" class="col-sm-2 col-form-label" > Document type  </label>
                               <div class="col-sm-4" >
                               <td><input name="Doc_type" id="Doc_type" placeholder="" class="form-control" required=""></td>
                               <small class="form-text text-muted"></small>
                               </div>


                               <label for="exampleFile" class="col-sm-2 col-form-label">File name</label>
                             <div class="col-sm-4">
                             <input name="Filename" id="Filename" placeholder="Filename" type="file" class="form-control" >              
                            </div>
                            

              </div>

                                <div class="position-relative row form-group" >
                               <div class="col-sm-2 offset-sm-2">
                              
                              <a href="" ><button class="btn btn-primary"   style="width:120px; height:30px";>Add</button></a>
                                               
                              </div>
                                   
                              </div>
                             
                               
                        

                <?php if(isset($Msg['Msg'])){?>

<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 
  <p class="mb-0"><?php print_r($Msg['Msg']); ?></p>
</div>
<?php } ?>
  <div class="main-card mb-3  card">
  <div class="card-body">
  <h5 class="card-title">Documents</h5>


                                <div class="table-responsive">
                                            <table id="bootstrap-data-table"  class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Document ID</th>
                                                    <th>Document Type</th> 
                                                    <th>File Name</th>  
                                                    <th>Upload Date</th> 
                                                    <th >Action</th>
      
                                                </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                <?php if(isset($Astrodoc)){ 
                                                foreach ($Astrodoc['data'] as $val){?>
                                                            
                                           <tr>
                                            
                                               <td><?php  echo ($val['Doc_id']) ?></td>
                                               <td><?php  echo ($val['Doc_type']) ?></td>
                                               <td><?php  echo ($val['Filename']) ?></td>
                                               <td><?php  echo ($val['Upload_date']) ?></td> 
                                               <td><a  value="Reload page" onclick="location.reload();" href="./deleteDoc?Doc_id=<?php echo $val['Doc_id'] ?>&Astrologer_id=<?php echo $val['Astrologer_id']?>"><i class="fa fa-trash-o" style="color:red;"></i></a>  </td>                                              

                                                </tr>

                                                <?php } } ?>

                                                </tbody>
                                            </table>
                                       
                               </div>
                         </div>              
                                                </div>
         
</form>
</div>
</div>
</div>
<!--document ends-->

<!--Astrologer Availibility-->
<div class="tab-pane fade exp-cover" id="available" role="tabpanel" aria-labelledby="profile-tab"> 
<div class="row no-margin home-det">
<div class="card-body" class="card-title"><b>AVAILABILITY </b> <p> 
<form  class="cmxform" id="astroinsert5" method="POST" action="" autocomplete="off">  

<div class="position-relative row form-group" hidden>
                              
                              <label for="exampleEmail" class="col-sm-2 col-form-label"> Astrologer ID </label>
                               <div class="col-sm-4" >
                               <td><input name="Astrologer_id" value="<?php echo $singleProduct[0]['Astrologer_id'] ?>" id="Astrologer_id" placeholder="" class="form-control" required=""></td>
                               <small class="form-text text-muted"></small>
                               </div>
               </div>

<div class="position-relative row form-group" >
                              
                              <label for="exampleEmail" class="col-sm-2 col-form-label"> Day </label>
                        <div class="col-sm-4">
                        <select class="form-control form-control-user"  name="Day" id="Day" required="">
                        <option value=""> Choose any One </option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        </select> 
                        </div>


                              <label for="exampleFile"  class="col-sm-2 col-form-label" >Time From</label>
                                 <div class="col-sm-4">
                                 
                                    <select  id="Time_from" placeholder="" name="Time_from"  class="form-control" required="">
                                    <option value=""> Choose any One </option>
                                    <option value="00:00 AM">00:00 AM</option>
                                    <option value="00:30 AM ">00:30 AM  </option>
                                    <option value="01:00 AM">01:00 AM </option>
                                    <option value="01:30 AM">01:30 AM </option>
                                    <option value="02:00 AM"> 02:00 AM</option>
                                    <option value="02:30 AM">02:30 AM </option>
                                    <option value="03:00 AM"> 03:00 AM</option>
                                    <option value="03:30 AM"> 03:30 AM</option>
                                    <option value="04:00 AM"> 04:00 AM</option>
                                    <option value="04:30 AM"> 04:30 AM</option>
                                    <option value="05:00 AM">05:00 AM </option>
                                    <option value="05:30 AM">05:30 AM </option>
                                    <option value="06:00 AM">06:00 AM</option>
                                    <option value="06:30 AM"> 06:30 AM</option>
                                    <option value="07:00 AM"> 07:00 AM</option>
                                    <option value="07:30 AM"> 07:30 AM</option>
                                    <option value="08:00 AM"> 08:00 AM</option>
                                    <option value="08:30 AM"> 08:30 AM</option>
                                    <option value="09:00 AM"> 09:00 AM</option>
                                    <option value="09:30 AM"> 19:30 AM</option>
                                    <option value="10:00 AM"> 10:00 AM</option>
                                    <option value="10:30 AM"> 10:30 AM</option>
                                    <option value="11:00 AM"> 11:00 AM</option>
                                    <option value="11:30 AM"> 11:30 PM</option>
                                    <option value="12:00 PM">12:00 PM</option>
                                    <option value="12:30 PM ">12:30 PM  </option>
                                    <option value="01:00 PM">01:00 PM </option>
                                    <option value="01:30 PM">01:30 PM </option>
                                    <option value="02:00 PM"> 02:00 PM</option>
                                    <option value="02:30 PM">02:30 PM </option>
                                    <option value="03:00 PM"> 03:00 PM</option>
                                    <option value="03:30 PM"> 03:30 PM</option>
                                    <option value="04:00 PM"> 04:00 PM</option>
                                    <option value="04:30 PM"> 04:30 PM</option>
                                    <option value="05:00 PM">05:00 PM </option>
                                    <option value="05:30 PM">05:30 PM </option>
                                    <option value="06:00 PM">06:00 PM</option>
                                    <option value="06:30 PM"> 06:30 PM</option>
                                    <option value="07:00 PM"> 07:00 PM</option>
                                    <option value="07:30 PM"> 07:30 PM</option>
                                    <option value="08:00 PM"> 08:00 PM</option>
                                    <option value="08:30 PM"> 08:30 PM</option>
                                    <option value="09:00 PM"> 09:00 PM</option>
                                    <option value="09:30 PM"> 19:30 PM</option>
                                    <option value="10:00 PM"> 10:00 PM</option>
                                    <option value="10:30 PM"> 10:30 PM</option>
                                    <option value="11:00 PM"> 11:00 PM</option>
                                    <option value="11:30 PM"> 11:30 PM</option>
                                                </select>
                                       </div>   
               
</div>

<div class="position-relative row form-group" >
 
                        <label for="exampleFile"  class="col-sm-2 col-form-label" >Time To</label>
                                       <div class="col-sm-4">
                                    <select  id="Time_to" placeholder="" name="Time_to"  class="form-control" required="">
                                    <option value=""> Choose any One </option>
                                    <option value="00:00 AM">00:00 AM</option>
                                    <option value="00:30 AM ">00:30 AM  </option>
                                    <option value="01:00 AM">01:00 AM </option>
                                    <option value="01:30 AM">01:30 AM </option>
                                    <option value="02:00 AM"> 02:00 AM</option>
                                    <option value="02:30 AM">02:30 AM </option>
                                    <option value="03:00 AM"> 03:00 AM</option>
                                    <option value="03:30 AM"> 03:30 AM</option>
                                    <option value="04:00 AM"> 04:00 AM</option>
                                    <option value="04:30 AM"> 04:30 AM</option>
                                    <option value="05:00 AM">05:00 AM </option>
                                    <option value="05:30 AM">05:30 AM </option>
                                    <option value="06:00 AM">06:00 AM</option>
                                    <option value="06:30 AM"> 06:30 AM</option>
                                    <option value="07:00 AM"> 07:00 AM</option>
                                    <option value="07:30 AM"> 07:30 AM</option>
                                    <option value="08:00 AM"> 08:00 AM</option>
                                    <option value="08:30 AM"> 08:30 AM</option>
                                    <option value="09:00 AM"> 09:00 AM</option>
                                    <option value="09:30 AM"> 19:30 AM</option>
                                    <option value="10:00 AM"> 10:00 AM</option>
                                    <option value="10:30 AM"> 10:30 AM</option>
                                    <option value="11:00 AM"> 11:00 AM</option>
                                    <option value="11:30 AM"> 11:30 PM</option>
                                    <option value="12:00 PM">12:00 PM</option>
                                    <option value="12:30 PM ">12:30 PM  </option>
                                    <option value="01:00 PM">01:00 PM </option>
                                    <option value="01:30 PM">01:30 PM </option>
                                    <option value="02:00 PM"> 02:00 PM</option>
                                    <option value="02:30 PM">02:30 PM </option>
                                    <option value="03:00 PM"> 03:00 PM</option>
                                    <option value="03:30 PM"> 03:30 PM</option>
                                    <option value="04:00 PM"> 04:00 PM</option>
                                    <option value="04:30 PM"> 04:30 PM</option>
                                    <option value="05:00 PM">05:00 PM </option>
                                    <option value="05:30 PM">05:30 PM </option>
                                    <option value="06:00 PM">06:00 PM</option>
                                    <option value="06:30 PM"> 06:30 PM</option>
                                    <option value="07:00 PM"> 07:00 PM</option>
                                    <option value="07:30 PM"> 07:30 PM</option>
                                    <option value="08:00 PM"> 08:00 PM</option>
                                    <option value="08:30 PM"> 08:30 PM</option>
                                    <option value="09:00 PM"> 09:00 PM</option>
                                    <option value="09:30 PM"> 19:30 PM</option>
                                    <option value="10:00 PM"> 10:00 PM</option>
                                    <option value="10:30 PM"> 10:30 PM</option>
                                    <option value="11:00 PM"> 11:00 PM</option>
                                    <option value="11:30 PM"> 11:30 PM</option>
                                    </select>

                                       </div>
                                       </div>


                                       <div class="position-relative row form-group" style="align:center" >


                                       <div class="position-relative row form-check" style="align:center">
                               <div class="col-sm-10 offset-sm-2" >
                                     <a href=""> <button class="btn btn-primary" onclick="location.reload(false)"; >Save</button>
                                                  
                              </div>
                         </div>
                                 

                 </div> 

                 <?php if(isset($Msg['Msg'])){?>

<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 
  <p class="mb-0"><?php print_r($Msg['Msg']); ?></p>
</div>
<?php } ?>
  <div class="main-card mb-3  card">
  <div class="card-body">
  <h5 class="card-title">Availability</h5>


                                <div class="table-responsive">
                                            <table id="bootstrap-data-table"  class="mb-0 table table-bordered">
                                                <thead>
                                                <tr>
                                              
                                                    <th>Day</th> 
                                                    <th> Time From</th>  
                                                    <th>Time To</th> 
                                                    <th >Action</th>
      
                                                </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                <?php if(isset($avail)){ 
                                                foreach ($avail['data'] as $val){?>
                                                            
                                           <tr>
                                            
                                               <td><?php  echo ($val['Day']) ?></td>

                                           <td><?php  echo ($val['Time_from']) ?></td> 
                                           <td><?php  echo ($val['Time_to']) ?></td>
                                               
                                           <td><a  value="Reload page" onclick="location.reload();" href="./deleteAvail?Avail_id=<?php echo $val['Avail_id'] ?>&Astrologer_id=<?php echo $val['Astrologer_id']?>"><i class="fa fa-trash-o" style="color:red;"></i></a>  </td>                                                       
                                          </tr>

                                                <?php } } ?>

                                                </tbody>
                                            </table>
                                       
                               </div>
                         </div>              
                                                </div>
     
</form>
</div>
</div>
</div>

<!--document ends-->
</div>
<!-- main content end-->
                               </div>
                            </div>
                          
                         
                        </div>
                    </div>
                   
                    <!-- Modal -->
                  
                <?php include 'include/Footer.php' ?> 
               
           </div>
        </div>
    </div>

      <!-- End-->
 <div class="col-md-7">
   <div class="card">

   </div> 
           
   </div>
      
</body> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 
 <!--validation-->
 <script type="text/javascript">
  $(function valid(){
   //alert("Hello");

         $("#First_name_error_message").hide();
         $("#Last_name_error_message").hide();
         $("#Email_error_message").hide();
         $("#Mobile_error_message").hide();
         $("#Pincode_error_message").hide();


         var error_First_name = false;
         var error_Last_name = false;
         var error_Email = false;
         var error_Mobile = false;
         var error_Pincode = false;

         $("#First_name").focusout(function(){
            check_First_name();
         });
         $("#Last_name").focusout(function() {
            check_Last_name();
         });
         $("#Email").focusout(function() {
            check_Email();
         });
         $("#Mobile").focusout(function() {
            check_Mobile();
         });
         $("#Pincode").focusout(function() {
            check_Pincode();
         });

         function check_First_name() {
            var pattern = /^[a-z A-Z]*$/;
            var First_name = $("#First_name").val();
            if (pattern.test(First_name) && First_name !== '') {
               $("#First_name_error_message").hide();
               $("#First_name").css("border-bottom","2px solid #34F458",);
            } else {
               $("#First_name_error_message").html("Should contain only Characters");
               $("#First_name_error_message").show();
               $("#First_name").css("border-bottom","2px solid #F90A0A");
               error_First_name = true;
            }
         }

         function check_Last_name() {
            var pattern = /^[a-zA-Z]*$/;
            var Last_name = $("#Last_name").val()
            if (pattern.test(Last_name) && Last_name !== '') {
               $("#Last_name_error_message").hide();
               $("#Last_name").css("border-bottom","2px solid #34F458");
            } else {
               $("#Last_name_error_message").html("Should contain only Characters");
               $("#Last_name_error_message").show();
               $("#Last_name").css("border-bottom","2px solid #F90A0A");
               error_Last_name = true;
            }
         }

         function check_Email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var Email = $("#Email").val();
            if (pattern.test(Email) && Email !== '') {
               $("#Email_error_message").hide();
               $("#Email").css("border-bottom","2px solid #34F458");
            } else {
               $("#Email_error_message").html("Invalid Email");
               $("#Email_error_message").show();
               $("#Email").css("border-bottom","2px solid #F90A0A");
               error_Email = true;
            }
         }

         function check_Mobile() {
            var pattern = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
            var Mobile = $("#Mobile").val();
            if (pattern.test(Mobile) && Mobile !== '') {
               $("#Mobile_error_message").hide();
               $("#Mobile").css("border-bottom","2px solid #34F458",);
            } else {
               $("#Mobile_error_message").html("Should contain only Numbers");
               $("#Mobile_error_message").show();
               $("#Mobile").css("border-bottom","2px solid #F90A0A");
               error_Mobile = true;
            }
         }

         function check_Pincode() {
            var pattern = /^[0-9]+$/;
            var Pincode = $("#Pincode").val();
            if (pattern.test(Pincode) && Pincode !== '') {
               $("#Pincode_error_message").hide();
               $("#Pincode").css("border-bottom","2px solid #34F458",);
            } else {
               $("#Pincode_error_message").html("Should contain only Numbers");
               $("#Pincode_error_message").show();
               $("#Pincode").css("border-bottom","2px solid #F90A0A");
               error_Pincode = true;
            }
         }


         $("#astroinsert1").submit(function() {
            error_First_name = false;
            error_Last_name = false;
            error_Email = false;
            error_Mobile = false;
            error_Pincode = false;

            check_First_name();
            check_Last_name();
            check_Email();
            check_Mobile();
            check_Pincode();

            
            if (error_First_name === false && error_Last_name === false && error_Email === false && error_Mobile === false  && error_Pincode === false) {
              alert("Registration Successfull");
               return true;
            } else {
               alert("Please Fill the form Correctly");
               return false;
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
        $('#Expertise').html(formoption);
        
 });
 
 
 $(document).ready(function(e){
  $('.preloader').hide();
 });
 function goback()
 {
    $('#gobackform').submit();
 }

 $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
 
 
 $("#astroinsert1").on('submit',(function(e) {
  valid();
 //alert('this is text1');
   debugger;
    e.preventDefault();
    var data = new FormData(this);
    //add the content
   data.append('About', CKEDITOR.instances['About'].getData());
   $('.preloader').show();
 // alert("<?=base_url()?>/MyControl/astrodetails");
   $.ajax({
          url: "<?=base_url()?>/MyControl/edit_astrologer_pg1",
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
              //  alert(obj.Msg);
               $('.preloader').hide();
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

  $("#astroinsert2").on('submit',(function(e) {
 //alert('this is text2');
 //debugger;
    e.preventDefault();
    var data = new FormData(this);
    //add the content
   //data.append('About', CKEDITOR.instances['About'].astrodetails());
   $('.preloader').show();
  //alert("<?=base_url()?>/MyControl/astrodetails");
   $.ajax({
          url: "<?=base_url()?>/MyControl/edit_astrologer_qualification",
    type: "POST",
    data:data,
    contentType: false,
          cache: false,
    processData:false,
   
     success:function(response)
             {
              $('.preloader').hide();
           
           // alert(response);
             var obj = JSON.parse(response);
           
             if(obj.Status==true)
             {
                alert(obj.Msg);
               $('.preloader').hide();
               window.open('./astroupdate?Astrologer_id=<?php echo $singleProduct[0]['Astrologer_id']?>', "_self");

              //$('#Slectlanguage').submit();
               
            }
            else
            {
                alert(obj.Msg);
                $('.preloader').hide();
                window.open('./astroupdate?Astrologer_id=<?php echo $singleProduct[0]['Astrologer_id']?>', "_self");

            }
         }
 
     });
 
 
  }));

  $("#astroinsert3").on('submit',(function(e) {
  //alert('this is text');
 //debugger;
    e.preventDefault();
    var data = new FormData(this);
    //add the content
   //data.append('About', CKEDITOR.instances['About'].astrodetails());
   $('.preloader').show();
  //alert("<?=base_url()?>/MyControl/astrodetails");
   $.ajax({
          url: "<?=base_url()?>/MyControl/edit_astrologer_financials",
    type: "POST",
    data:data,
    contentType: false,
          cache: false,
    processData:false,
   
     success:function(response)
             {
              $('.preloader').hide();
           
           // alert(response);
             var obj = JSON.parse(response);
           
             if(obj.Status==true)
             {
                alert(obj.Msg);
               $('.preloader').hide();
 
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

  $("#astroinsert4").on('submit',(function(e) {
  //alert('this is text');
 //debugger;
    e.preventDefault();
    var data = new FormData(this);
    //add the content
   //data.append('About', CKEDITOR.instances['About'].astrodetails());
   $('.preloader').show();
  //alert("<?=base_url()?>/MyControl/astrodetails");
   $.ajax({
          url: "<?=base_url()?>/MyControl/edit_astrologer_documents",
    type: "POST",
    data:data,
    contentType: false,
          cache: false,
    processData:false,
   
     success:function(response)
             {
              $('.preloader').hide();
           
            //alert(response);
             var obj = JSON.parse(response);
           
             if(obj.Status==true)
             {
                alert(obj.Msg);
               $('.preloader').hide();
               window.open('./astroupdate?Astrologer_id=<?php echo $singleProduct[0]['Astrologer_id']?>', "_self");

 
              //$('#Slectlanguage').submit();
               
            }
            else
            {
                alert(obj.Msg);
                $('.preloader').hide();
                window.open('./astroupdate?Astrologer_id=<?php echo $singleProduct[0]['Astrologer_id']?>', "_self");

               
            }
         }
 
     });
 
 
  }));


  $("#astroinsert5").on('submit',(function(e) {
  //alert('this is text');
 //debugger;
    e.preventDefault();
    var data = new FormData(this);
    //add the content
   data.append('About', CKEDITOR.instances['About'].getData());
   $('.preloader').show();
  //alert("<?=base_url()?>/MyControl/astrodetails");
   $.ajax({
          url: "<?=base_url()?>/MyControl/edit_astrologer_Availability",
    type: "POST",
    data:data,
    contentType: false,
          cache: false,
    processData:false,
   
     success:function(response)
             {
              $('.preloader').hide();
           
           //alert(response);
             var obj = JSON.parse(response);
           
             if(obj.Status==true)
             {
                alert(obj.Msg);
               $('.preloader').hide();
               window.open('./astroupdate?Astrologer_id=<?php echo $singleProduct[0]['Astrologer_id']?>', "_self");

              //$('#Slectlanguage').submit();
               
            }
            else
            {
                alert(obj.Msg);
                $('.preloader').hide();
                window.open('./astroupdate?Astrologer_id=<?php echo $singleProduct[0]['Astrologer_id']?>', "_self");

            }
         }
 
     });
 
 
  }));
 </script> 
<script src="<?=THEME?>assets/js/bootstrap.min.js"></script>
<script src="<?=THEME?>assets/js/script.js"></script>
<script src="<?=THEME?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?=THEME?>assets/js/popper.min.js"></script>
<script src="<?=THEME?>assets/js/bootstrap.min.js"></script>
<script src="<?=THEME?>assets/js/script.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>

</html>