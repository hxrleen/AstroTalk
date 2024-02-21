<?php namespace App\Controllers;
use App\Models\MyModel;
use App\Models\user_permission_model;

class MyControl extends BaseController
{
    protected $helpers = [];
    
       protected $session;


    public function __construct()
    {
     
      $this->session = \Config\Services::session();
      $this->db = \Config\Database::connect();
      $this->helpers = array_merge($this->helpers, ['url', 'session']);
    }



    //Customer list

    public function customers()
    {
      if (isset($_SESSION['AdminName']))
      {
        $model= new MyModel();
        $result=$model->customers();
        return view('customers', $result);
      }
      else
       {
         return view('/Login');
       }
    }

//Customer Details

    public function customerview()
    {
      if (isset($_SESSION['AdminName']))
      {  
         $Id= $this->request->getGet('Customer_ID');
      
         $model= new MyModel(); 
         $result['singleProduct'] = $model->customerdetail($Id);
         $result['Customerdata'] = $model->customerdetail($Id);
         $result['Reviewdata'] = $model->customerdetail($Id);


        //print_r( $result);
       // exit();
        return view('customerview',$result);   
      }
      else
       {
         return view('/Login');
       }
    }

        //Astrologers 

//insert

        public function Add_Astrologer()
        {
          if (isset($_SESSION['AdminName']))
          {
            $model= new user_permission_model;
            $group_id= $_SESSION['GroupID'];
            $module= 'Astrologers';
            $action=  'update';
             $access=$model->permission_parameter($group_id,$module,$action);
  
             if($access==true)
             {
              $mymodel=  new MyModel(); 
              $result['data']=$mymodel->astro_cat();
          
              return view('astro_login',$result);
              }
              else{
                return view('access_denied.php');
              }
            }
              else
              {
                return view('Login');
              }
          
          }

//fetch
        public function astrologerlist()
        {
          if (isset($_SESSION['AdminName']))
          {
             $model= new MyModel();
            $result=$model->astrologervalue();
         
           return view('astrologervalue', $result); 
               }
         else
         {
            return view('Login');
         }      
       }


       public function astrodetails()
       {
              if (isset($_SESSION['AdminName']))
                      {
                      helper('date');
                
                      $Image=$this->request->getfile('ProfilePic');
                        $data['First_name']= $this->request->getpost('First_name');
                        $data['Last_name']=  $this->request->getpost('Last_name');
                        $data['Email']=  $this->request->getpost('Email');
                        $data['Dob']=  $this->request->getpost('Dob');
                        $data['Gender']=  $this->request->getpost('Gender');
                        $data['Mobile']=  $this->request->getpost('Mobile');
                        $data['Address']=  $this->request->getpost('Address');
                        $data['Pincode']=  $this->request->getpost('Pincode');
                        $data['State']=  $this->request->getpost('State');
                        $data['Country']=  $this->request->getpost('Country');
                        $data['About']=  $this->request->getpost('About');
                        $data['Experience']=  $this->request->getpost('Experience');
                        $data['Core_skills']=  $this->request->getpost('Core_skills');
                        $data['Language']=  $this->request->getpost('Language');
                        $data['Expertise']=  $this->request->getpost('Expertise');
                        $data['AstroCat']=  $this->request->getpost('Astro_Cat');


                        
                if($Image->isvalid())
                {
                  
                  $filename=explode('.', trim($Image->getName()));
                  $newName = str_replace(' ', '_', $filename[0]).'_'.now().'.'.$filename[1];
                  //$data['ProfilePic']=$filename[0];
                  $imag=$Image->move('./public/uploads/Profile_PIC/', $newName);
                  $data['ProfilePic']=$newName ;
                  
                }
                    
                $model= new MyModel();
                
                $result=$model->astrodetails($data);
                      

                      echo json_encode($result);
                      exit;
                    
                      
          } 
          else
          {
             return view('Login');
          } 
        }

         //update
    
    public function astroupdate()
    {
      if (isset($_SESSION['AdminName']))
        {
          $model= new user_permission_model;
          $group_id= $_SESSION['GroupID'];
          $module= 'Astrologers';
          $action=  'update';
           $access=$model->permission_parameter($group_id,$module,$action);

           if($access==true)
           {
            $Id= $this->request->getGet('Astrologer_id');

            //echo $Id;
            //exit();
            $model= new MyModel();
            
            $result['id']=$Id;
            $result['singleProduct'] = $model->astroupdate($Id);
            $result['Astrodoc'] =$model->astrodoc($Id);
            $result['avail'] =$model->avail($Id);
            $result['data']=$model->astro_cat();
        //    $result['Valid']=$model->edit_astrologer_pg1($Id,$data);

            //$result['Documents'] = $model->GetDoc($Id);
            //$result['Avail'] = $model->GetAvail($Id);
         //print_r($result);
       // exit;
            return view('astroupdate',$result);
             
           }
           else{
                return view('access_denied.php'); 
     
           }

        }
        else
        {
      
       return view('/Login');
 
        }   
    }
 
    public function edit_astrologer_pg1()
    {
       
      if (isset($_SESSION['AdminName']))
      { 
              helper('date');
              $Image=$this->request->getfile('ProfilePic');
              $Id= $this->request->getpost('Astrologer_id');
              $data['First_name']= $this->request->getpost('First_name');
              $data['Last_name']=  $this->request->getpost('Last_name');
              $data['Email']=  $this->request->getpost('Email');
              $data['Dob']=  $this->request->getpost('Dob');
              $data['Gender']=  $this->request->getpost('Gender');
              $data['Mobile']=  $this->request->getpost('Mobile');
              $data['Address']=  $this->request->getpost('Address');
              $data['Pincode']=  $this->request->getpost('Pincode');
              $data['State']=  $this->request->getpost('State');
              $data['Country']=  $this->request->getpost('Country');
              $data['About']=  $this->request->getpost('About');
              $data['AstroCat']=  $this->request->getpost('Astro_Cat');
              $data['Account_Status']= $this->request->getpost('Account_Status');

              if($Image->isvalid())
            {
              
              $filename=explode('.', trim($Image->getName()));
              $newName = str_replace(' ', '_', $filename[0]).'_'.now().'.'.$filename[1];
              //$data['ProfilePic']=$filename[0];
              $imag=$Image->move('./public/uploads/Profile_PIC/', $newName);
              $data['ProfilePic']=$newName ;
              
            }
            $model= new MyModel();
            $result =$model->edit_astrologer_pg1($Id,$data);
           
            echo json_encode($result);
            exit;
      }
     else
     {
          
       return view('/Login');
     }
 }  


//  $result=$model->astrologervalue();
//  return view('astrologervalue',$result);


 public function edit_astrologer_qualification()
 {
  if (isset($_SESSION['AdminName']))
  {
    $Id['Astrologer_id']= $this->request->getpost('Astrologer_id');
  
    $data['Core_skills']=  $this->request->getpost('Core_skills');
    $data['Language']=  $this->request->getpost('Language');
    $data['Expertise']=  $this->request->getpost('Expertise');
    $data['Experience']=  $this->request->getpost('Experience');


    $model= new MyModel();
  
    $result =$model->edit_astrologer_qualification($Id,$data);
  
    echo json_encode($result);
    exit;
  }
  else{
     return view('/Login');
  }

}  

public function edit_astrologer_financials()
 {
  if (isset($_SESSION['AdminName']))
  {
  
    $Id= $this->request->getpost('Astrologer_id');
  
 $data['Chat_price']=  $this->request->getpost('Chat_price');
 $data['Max_chat_price']=  $this->request->getpost('Max_chat_price');
 $data['Audio_call_price']=  $this->request->getpost('Audio_call_price');
 $data['Max_audio_call_price']=  $this->request->getpost('Max_audio_call_price');
 $data['Video_call_price']=  $this->request->getpost('Video_call_price');
 $data['Max_video_call_price']=  $this->request->getpost('Max_video_call_price');
 $data['Bank_name']=  $this->request->getpost('Bank_name');
 $data['Bank_branch']=  $this->request->getpost('Bank_branch');
 $data['Bank_account_no']=  $this->request->getpost('Bank_account_no');
 $data['IFSC_code']=  $this->request->getpost('IFSC_code');
 $data['Account_holder_name']=  $this->request->getpost('Account_holder_name');

  $model= new MyModel();
 
  $result =$model->edit_astrologer_financials($Id,$data);
  $result=$model-> financialsupdate($Id,$data);
  echo json_encode($result);
  exit;
  }
  else
  {
    return view('/Login');
 
  }
}  

public function edit_astrologer_documents()
{

  if (isset($_SESSION['AdminName']))
  {
    helper('date');
     
  $Image=$this->request->getfile('Filename');
 $data['Astrologer_id']= $this->request->getpost('Astrologer_id');
 $data['Doc_type']=  $this->request->getpost('Doc_type');

 if($Image->isvalid())
     {
       
       $filename=explode('.', trim($Image->getName()));
       $newName = str_replace(' ', '_', $filename[0]).'_'.now().'.'.$filename[1];
       //$data['ProfilePic']=$filename[0];
       $imag=$Image->move('./public/assets/astrodoc/', $newName);
       $data['Filename']=$newName ;
       
     }

    $model= new MyModel();

    $result['singleProduct']=$model->edit_astrologer_documents($data);
    echo json_encode($result);
    exit;
 }
 else
 {

return view('/Login');

 }

}  



public function edit_astrologer_Availability()
{
  if (isset($_SESSION['AdminName']))
  {
    $data['Astrologer_id']= $this->request->getpost('Astrologer_id');
    $data['Day']=  $this->request->getpost('Day');
    $data['Time_from']=  $this->request->getpost('Time_from');
    $data['Time_to']=  $this->request->getpost('Time_to');

    
    $model= new MyModel();
   
    $result =$model->edit_astrologer_Availability($data);
    echo json_encode($result);
    exit;
  }
  else{
    return view('/Login');
  }

}  

//Delete

 public function deleteAstro()
 {
  if (isset($_SESSION['AdminName']))
  {
    $model= new user_permission_model;
    $group_id= $_SESSION['GroupID'];
    $module= 'Astrologers';
    $action=  'delete';
     $access=$model->permission_parameter($group_id,$module,$action);

     if($access==true)
     {
        $Id= $this->request->getGet('Astrologer_id');
        
        $model= new MyModel();
        $model->deleteAstro($Id);

        $result=$model->astrologervalue();
        return view('astrologervalue', $result);
       }
       else{
          return view('access_denied.php'); 

      }
    }
  else {

      return view('/Login');
   }
}  

 public function deleteDoc()
 {
    
  if (isset($_SESSION['AdminName']))
  {
  $doc= $this->request->getGet('Doc_id');
  $Id=$this-> request-> getGet('Astrologer_id');
  $model= new MyModel();
  $model->deleteDoc($doc);

 
  $result['singleProduct']=$model->astroupdate($Id);
  $result['Astrodoc'] =$model->astrodoc($Id);
  $result['avail'] =$model->avail($Id);

  return view('astroupdate', $result);
  }
  else
  {

 return view('/Login');
  } 
 }  

 public function deleteAvail()
 {
  if (isset($_SESSION['AdminName']))
  {
  $doc= $this->request->getGet('Avail_id');
  $Id=$this-> request-> getGet('Astrologer_id');
  $model= new MyModel();
  $model->deleteAvail($doc);

 
  $result['singleProduct']=$model->astroupdate($Id);
  $result['avail'] =$model->avail($Id);
  $result['Astrodoc'] =$model->astrodoc($Id);

  return view('astroupdate', $result);
  }
  else
  {

   return view('/Login');
  }
 }  


 //promotions and banners

 public function promotions()
 {         
  if (isset($_SESSION['AdminName'])){
  $model= new user_permission_model;
  $group_id= $_SESSION['GroupID'];
  $module= 'Promotions and Banners';
  $action=  'add';
   $access=$model->permission_parameter($group_id,$module,$action);
        if($access==true){
  return view('promotions');
 } 
 else {
  return view('access_denied.php'); 
} 
 }

else{
  return view('/Login');
}
}
 //insert

 public function promodetails()
 {
  if (isset($_SESSION['AdminName']))
  {
     helper('date');
     $Image=$this->request->getfile('File');
     $data['Prom_id']=  $this->request->getpost('Prom_id');
     $data['Title']=  $this->request->getpost('Title');
     $data['Place']=  $this->request->getpost('Place');
     $data['Creation']=  $this->request->getpost('Creation');
     $data['Expiry']=  $this->request->getpost('Expiry');
     $data['Status']=  $this->request->getpost('Status');

     if($Image->isvalid())
     {
       
       $filename=explode('.', trim($Image->getName()));
       $newName = str_replace(' ', '_', $filename[0]).'_'.now().'.'.$filename[1];
       //$data['ProfilePic']=$filename[0];
       $imag=$Image->move('./public/uploads/promos_banners/', $newName);
       $data['File']=$newName ;
     }

     $model= new MyModel();
     $result=$model->promodetails($data);

     echo json_encode($result);
     exit;
    }
    else
       {
     
      return view('/Login');
     }
     
   //  $result=$model->astrologervalue();
   //  return view('astrologervalue',$result);
 }  


 //fetch

 public function promo_table()
 {
    
  if (isset($_SESSION['AdminName']))
  {

     $model= new MyModel();
     $result=$model->promo_table();
     return view('promo_table', $result); 
  }
  else
  {

 return view('/Login');
}      
 }

 //delete

 public function promo_delete()
 {

    if (isset($_SESSION['AdminName'])){
      $model= new user_permission_model;
      $group_id= $_SESSION['GroupID'];
      $module= 'Promotions and Banners';
      $action=  'delete';
       $access=$model->permission_parameter($group_id,$module,$action);
            if($access==true){
  $Id= $this->request->getGet('Prom_id');
  $model= new MyModel();
  $model->promo_delete($Id);

  $result=$model->promo_table();
  return view('promo_table', $result);
  }
  else{
    return view('access_denied.php');
}
    }
  else
  {
 return view('/Login');
}
 }  

 public function promostatus()
 {
  if (isset($_SESSION['AdminName']))
 {
     $Id=  $this->request->getpost('Id');
     $status['Status']=  $this->request->getpost('Status');
 
     $model= new MyModel();
     $result=$model->promostatus($status,$Id);

     echo json_encode($result);
     exit;
   //  $result=$model->astrologervalue();
   //  return view('astrologervalue',$result);
 }  
 else
 {

return view('/Login');
}

}

 //FAQ------------------------------------------------------


 public function FAQ_add()
 {
    return view('FAQ_add');
           
}


//insert

public function FAQdetails()
{
    
    $data['Faq_title']=  $this->request->getpost('Faq_title');
    $data['Status']=  $this->request->getpost('Status');
    $data['Faq_contents']=  $this->request->getpost('Faq_contents');
 
    $model= new MyModel();
    $result=$model->FAQdetails($data);
   echo json_encode($result);
   exit;
}
//fetch

public function FAQ()
{
  if (isset($_SESSION['AdminName']))
  {
    $model= new MyModel();
    $result=$model->FAQ();
    return view('FAQ', $result);        
}  
else
{
return view('/Login');
}

}
//update

public function FAQ_update()
{
  if (isset($_SESSION['AdminName']))
  {
              
    $model= new user_permission_model;
    $group_id= $_SESSION['GroupID'];
    $module= 'FAQ';
    $action=  'update';
     $access=$model->permission_parameter($group_id,$module,$action);
          if($access==true){
    $Id= $this->request->getGet('Faq_id');
 //echo $Id;
 //exit();
 $model= new MyModel();
 
 $result['Faq_id']=$Id;
 $result['singleProduct'] = $model->FAQ_update($Id);
// print_r();
return view('FAQ_update',$result);   
}
else{
  return view('access_denied.php'); 

}
  }
else
 {
     
  return view('/Login');
 }
    
}

public function FAQ_details()
{
  if (isset($_SESSION['AdminName']))
  {
    $Id= $this->request->getpost('Faq_id');
    $data['Faq_title']=  $this->request->getpost('Faq_title');
    $data['Faq_contents']=  $this->request->getpost('Faq_contents');
    $data['Status']=  $this->request->getpost('Status');
    $model= new MyModel();

    $result=$model->FAQ_details($Id,$data);
    echo json_encode($result);
    exit;
  }  
  else
  {
  
      return view('/Login');
  }
    
    }
  //delete

  public function FAQ_delete()
  {
    if (isset($_SESSION['AdminName']))
        {
              
    $model= new user_permission_model;
    $group_id= $_SESSION['GroupID'];
    $module= 'FAQ';
    $action=  'delete';
     $access=$model->permission_parameter($group_id,$module,$action);
          if($access==true){
          $Id= $this->request->getGet('Faq_id');
          $model= new MyModel();
          $model->FAQ_delete($Id);
        
          $result=$model->FAQ();
          return view('FAQ', $result);
              
       } 
       else{
        return view('access_denied.php'); 
       }
      }
       else
       {
     
      return view('/Login');
     }
    
    } 

  //user -----------------------------------------
 
  public function User_add()
 {
   
  if (isset($_SESSION['AdminName']))
  {
      
    $model= new user_permission_model;
    $group_id= $_SESSION['GroupID'];
    $module= 'Users';
    $action=  'add';
     $access=$model->permission_parameter($group_id,$module,$action);
          if($access==true){
     $model= new MyModel();
     $result['data']=$model->User_add();
     return view('User_add',$result);

        }
        else
        {
          return view('access_denied.php'); 
        }
}
 else{
return view('/Login');
}

}  

 //insert

public function userdetails()
{
  if (isset($_SESSION['AdminName']))
  {
     $data['Group_id']=  $this->request->getpost('Group_id');
    $data['Name']=  $this->request->getpost('Name');
    $data['Password']= md5($this->request->getpost('Password')) ;
    $data['User_name']=  $this->request->getpost('User_name');
    $data['Designation']=  $this->request->getpost('Designation');
    $data['Mob_no']=  $this->request->getpost('Mob_no');
    $data['Address']=  $this->request->getpost('Address');
    $data['Created_on']=  $this->request->getpost('Created_on');
    $data['Status']=  $this->request->getpost('Status');
    $data['Type']=  $this->request->getpost('Type');

    $model= new MyModel();
    $result=$model->userdetails($data);

    echo json_encode($result);
    exit;
  }
  else
 {
     return view('/Login');
  }
    
    }

//fetch
public function user_table()
{
  if (isset($_SESSION['AdminName']))
  {
    $model= new MyModel();
    $result=$model->user_table();
    return view('user_table', $result);        
}
else
     {
     
      return view('/Login');
     }
    
    } 

//update

public function User_update()
{
  if (isset($_SESSION['AdminName']))
  {
    $model= new user_permission_model;
    $group_id= $_SESSION['GroupID'];
    $module= 'Users';
    $action=  'update';
     $access=$model->permission_parameter($group_id,$module,$action);
          if($access==true){

      $Id= $this->request->getGet('User_id');
      //echo $Id;
      //exit();
      $model= new MyModel();
      
      $result['User_id']=$Id;
      $result['singleProduct'] = $model->User_update($Id);
      $result['data']=$model->User_add();

      // print_r();
      return view('User_update',$result);
        }   
      else{
        return view('access_denied.php'); 

      }
}
else
    {
      return view('/Login');
     }
    
    }

public function User_edit()
{
  if (isset($_SESSION['AdminName']))
        {
          $Id= $this->request->getpost('User_id');
          $data['Group_id']=  $this->request->getpost('Group_id');
          $data['Name']=  $this->request->getpost('Name');
          $data['Password']=  md5($this->request->getpost('Password'));
          $data['User_name']=  $this->request->getpost('User_name');
          $data['Designation']=  $this->request->getpost('Designation');
          $data['Mob_no']=  $this->request->getpost('Mob_no');
          $data['Address']=  $this->request->getpost('Address');
          $data['Created_on']=  $this->request->getpost('Created_on');
          $data['Status']=  $this->request->getpost('Status');
          $data['Type']=  $this->request->getpost('Type');

          $model= new MyModel();

          $result=$model->User_edit($Id,$data);
          echo json_encode($result);
          exit;
        }
        else
        {

        return view('/Login');
        } 
      }
 //delete

 public function User_delete()
 {
  if (isset($_SESSION['AdminName']))
    {
      $model= new user_permission_model;
    $group_id= $_SESSION['GroupID'];
    $module= 'Users';
    $action=  'delete';
     $access=$model->permission_parameter($group_id,$module,$action);
          if($access==true){
        $Id= $this->request->getGet('User_id');
        $model= new MyModel();
        $model->User_delete($Id);

        $result=$model->user_table();
        return view('user_table', $result);
        
    }  
    else{
      return view('access_denied.php'); 
    }
  }
    else
       {
     
      return view('/Login');
     }
    
    }

   //groups & permissions------------------

   public function Group_add()
   {
    if (isset($_SESSION['AdminName']))
    {
     return view('Group_add');
  
     //  $result=$model->astrologervalue();
     //  return view('astrologervalue',$result);
   }  
   else
       {
     
      return view('/Login');
     }
    
    }
   //insert
  
  public function Group_details()
  {
    if (isset($_SESSION['AdminName']))
    {

      $data['Group_name']=  $this->request->getpost('Group_name');
      $data['Group_desc']=  $this->request->getpost('Group_desc');
  
      $model= new MyModel();
      $result=$model->Group_details($data);
  
      echo json_encode($result);
      exit;
  }
  else
  {

 return view('/Login');
}

}

  //fetch
  public function Group_table()
  {
    if (isset($_SESSION['AdminName']))
    {
      $model= new MyModel();
      $result=$model->Group_table();
      return view('Group_table', $result);        
  } 
  else
       {
     
      return view('/Login');
     }
    
    }

//update

public function Group_update()
{
  if (isset($_SESSION['AdminName']))
  {
      $Id= $this->request->getGet('Group_id');
      //echo $Id;
      //exit();
      $model= new MyModel();
      
      $result['Group_id']=$Id;
      $result['singleProduct'] = $model->Group_update($Id);

      return view('Group_update',$result);   
}
else
{

return view('/Login');
}

}

public function Group_edit()
{
  if (isset($_SESSION['AdminName']))
  {
    $Id= $this->request->getpost('Group_id');
    $data['Group_name']=  $this->request->getpost('Group_name');
    $data['Group_desc']=  $this->request->getpost('Group_desc');

    $model= new MyModel();

    $result=$model->Group_edit($Id,$data);
    echo json_encode($result);
    exit;
} 
else
{
return view('/Login');
}
}


 //delete

 public function Group_delete()
 {
  if (isset($_SESSION['AdminName']))
  {
    $Id= $this->request->getGet('Group_id');
    $model= new MyModel();
    $model->Group_delete($Id);

    $result=$model->Group_table();
    return view('Group_table', $result);
     
 } 
 else
 {

return view('/Login');
}

} 

 //group details fetched on permissions

public function permission()
{
  if (isset($_SESSION['AdminName']))
  {
    $Id= $this->request->getGet('Group_id');
    
    $model= new MyModel();
    
    $result['Group_id']=$Id;

    $result['data'] = $model->permission($Id);


    return view('permission',$result);   
}
else
{

return view('/Login');
}

}



//insert permission


public function permission_detail()
{
  if (isset($_SESSION['AdminName']))
  {
     return view('permission_detail');

}
else
       {
     
      return view('/Login');
     }
    
    }  

public function permission_insert()
{
  if (isset($_SESSION['AdminName']))
  {
    $data['Group_id']= $this->request->getpost('Group_id');
    $data['Module_name']=  $this->request->getpost('Module_name');
    
    if ($this->request->getpost('read')==null)
    {
      $data['read']= 0;
    }
    else
    {
      $data['read']= 1;
    }
    
    if ($this->request->getpost('add')==null)
    {
      $data['add']= 0;
    }
    else
    {
      $data['add']= 1;
    }
    
    if ($this->request->getpost('update')==null)
    {
      $data['update']= 0;
    }
    else
    {
      $data['update']= 1;
    }
    
    
    if ($this->request->getpost('delete')==null)
    {
      $data['delete']= 0;
    }
    else
    {
      $data['delete']= 1;
    }
    
   $model= new MyModel();
  $result=$model->permission_insert($data);
    
    echo json_encode($result);
   exit;
}
else
{

return view('/Login');
}

}
//update

public function Permission_update()
{
  if (isset($_SESSION['AdminName']))
        {
        $Id= $this->request->getGet('Permission_id');
        //echo $Id;
        //exit();
        $model= new MyModel();
        
        $result['Permission_id']=$Id;
        $result['data'] = $model->Permission_update($Id);
        // print_r();
        return view('Permission_update',$result);   
}
else
{

return view('/Login');
}

}

public function Permission_edit()
{
  if (isset($_SESSION['AdminName']))
  {

 $Id= $this->request->getpost('Permission_id');
 $data['Group_id']= $this->request->getpost('Group_id');
 $old_module_name= $this->request->getpost('Old_module');
 $data['Module_name']=  $this->request->getpost('Module_name');


 if ($this->request->getpost('read')==null)
    {
      $data['read']= 0;
    }
    else
    {
      $data['read']= 1;
    }
    
    if ($this->request->getpost('add')==null)
    {
      $data['add']= 0;
    }
    else
    {
      $data['add']= 1;
    }
    
    if ($this->request->getpost('update')==null)
    {
      $data['update']= 0;
    }
    else
    {
      $data['update']= 1;
    }
    
    
    if ($this->request->getpost('delete')==null)
    {
      $data['delete']= 0;
    }
    else
    {
      $data['delete']= 1;
    }
  
 $model= new MyModel();

 $result=$model->Permission_edit($Id,$data,$old_module_name);
 echo json_encode($result);
 exit;
} 
else
{

return view('/Login');
}
}

 //delete

 public function permission_delete()
 {
  if (isset($_SESSION['AdminName']))
   {
      $Per= $this->request->getGet('Permission_id');
      $Id=$this-> request->getGet('Group_id');
      $model= new MyModel();
      $model->permission_delete($Per);

      $result['data']=$model->permission($Id);
      return view('permission', $result);

 }  
 else
 {

return view('/Login');
}
}


  //Review------------------------------------------------------

  public function Review_add()
  {

    if (isset($_SESSION['AdminName']))
    {
      $model= new user_permission_model;
      $group_id= $_SESSION['GroupID'];
      $module= 'Reviews';
      $action=  'add';
       $access=$model->permission_parameter($group_id,$module,$action);
            if($access==true){
              $model= new MyModel();
              $result['data']=$model->Review_add();
               return view('Review_add',$result);
            }
            else {
              return view('access_denied.php'); 
            }
          }
      else
       {
     
      return view('/Login');
     }
    
    }


 //insert
 
 public function Reviewdetails()
 {
  if (isset($_SESSION['AdminName']))
  {
 

   $data['UserID']=  $this->request->getpost('UserID');
   $data['Astrologer_id']=  $this->request->getpost('Astrologer_id');
     $data['Review_date']=  $this->request->getpost('Review_date');
     $data['Rating']=  $this->request->getpost('Rating');
     $data['Comments']=  $this->request->getpost('Comments');
     $data['Status']=  $this->request->getpost('Status');
     $model= new MyModel();
     $result=$model->Reviewdetails($data);
     echo json_encode($result);
     exit;
 } 
 else
 {

return view('/Login');
}

}

 
 //fetch
 
 public function Review()
 {
  if (isset($_SESSION['AdminName']))
  {
     $model= new MyModel();

     $result['data'] = $model->Review();
     //print_r($result);
    // exit;
    return view('Review', $result);        
 }  
 else
   {
    
      return view('Login');
   }
    
    }
 
 //update
 
 public function Review_update()
 {
  if (isset($_SESSION['AdminName']))
  {
    
    $model= new user_permission_model;
    $group_id= $_SESSION['GroupID'];
    $module= 'Reviews';
    $action=  'update';
     $access=$model->permission_parameter($group_id,$module,$action);
          if($access==true){
     $model= new MyModel();
      $Id= $this->request->getGet('Review_id');
      //echo $Id;
      //exit();
      $model= new MyModel();
      
      $result['Review_id']=$Id;
      $result['review']= $model->Review_update($Id);
      $result['data']=$model->Review_add();
    //  print_r($result);
    //  exit;
    return view('Review_update',$result);   
          }
    else {
      return view('access_denied.php'); 
    }
  }
    else
    { 
   return view('/Login');
  }
 }

 public function Review_details()
 {
  if (isset($_SESSION['AdminName']))
  {
   
      $Id['Review_id']=  $this->request->getpost('Review_id');
      $data['UserID']=  $this->request->getpost('UserID');
      $data['Astrologer_id']=  $this->request->getpost('Astrologer_id');
     $data['Review_date']=  $this->request->getpost('Review_date');
     $data['Rating']=  $this->request->getpost('Rating');
     $data['Comments']=  $this->request->getpost('Comments');
     $data['Status']=  $this->request->getpost('Status');
  $model= new MyModel();
 
  $result['data']=$model->Review_details($Id,$data);
  echo json_encode($result);
  exit;
 
 }  
 else
       {
     
      return view('/Login');
     }
    
    }
   //delete
 
   public function Review_delete()
   {
    if (isset($_SESSION['AdminName']))
    {
      
    $model= new user_permission_model;
    $group_id= $_SESSION['GroupID'];
    $module= 'Reviews';
    $action=  'delete';
     $access=$model->permission_parameter($group_id,$module,$action);
          if($access==true){
      $Id= $this->request->getGet('Review_id');
      $model= new MyModel();
      $model->Review_delete($Id);
    
      $result['data']=$model->Review();
      return view('Review', $result);   
    } 
    else{
      return view('access_denied.php'); 
    }
  }
    else
    {
      return view('/Login');
     }

    }  

    // Astrologer Category

    
 public function Category_add()
 {
  if (isset($_SESSION['AdminName']))
    {
             return view('Category_add');
          }
       else{
              return view('/Login');
            }
          }

          //insert

public function Catdetails()
{
 if (isset($_SESSION['AdminName']))
 {
      helper('date');                            
      $Image=$this->request->getfile('Icon');
      $data['CatName']=  $this->request->getpost('CatName');
    
        
        if($Image->isvalid()) 
        {
                    
                    $filename=explode('.', trim($Image->getName()));
                    $newName = str_replace(' ', '_', $filename[0]).'_'.now().'.'.$filename[1];
                    //$data['ProfilePic']=$filename[0];
                    $imag=$Image->move('./public/uploads/Icon/', $newName);
                    $data['Icon']=$newName ;
                  
       

            if($filename[1]=='png' || $filename[1]=='svg' )
            {
            
             $model= new MyModel();
             $result=$model->Catdetails($data);
            }
            else
            {
              
              $result['Status']=false;
              $result['Msg']='incorrect file extension';

            }
          }

          echo json_encode($result);
          exit;   
      
} 
else
{
return view('/Login');
}
}


//fetch

public function Cat()
{
  if (isset($_SESSION['AdminName']))
  {
    $model= new MyModel();
    $result=$model->Cat();
    return view('Cat', $result);        
}  
else
{
return view('/Login');
}

}


//update

public function Cat_update()
{
  if (isset($_SESSION['AdminName']))
  {
           
    $Id= $this->request->getGet('Astro_Cat');
 //echo $Id;
 //exit();
 $model= new MyModel();
 
 $result['Astro_Cat']=$Id;
 $result['data'] = $model->Cat_update($Id);
// print_r();
return view('Cat_update',$result);   
}
  
else
 {
     
  return view('/Login');
 }
    
}

public function Cat_details()
{
  if (isset($_SESSION['AdminName']))
  {
     helper('date');
                                
  $Image=$this->request->getfile('Icon');
    $Id= $this->request->getpost('Astro_Cat');
    $data['CatName']=  $this->request->getpost('CatName');

    if($Image->isvalid()) 
        {
                    
                    $filename=explode('.', trim($Image->getName()));
                    $newName = str_replace(' ', '_', $filename[0]).'_'.now().'.'.$filename[1];
                    //$data['ProfilePic']=$filename[0];
                    $imag=$Image->move('./public/uploads/Icon/', $newName);
                    $data['Icon']=$newName ;
                  
       

            if($filename[1]=='png' || $filename[1]=='svg' )
            {
            
             $model= new MyModel();
             $result=$model->Catdetails($data);
            }
            else
            {
              
              $result['Status']=false;
              $result['Msg']='incorrect file extension';

            }
          }

    $model= new MyModel();

    $result=$model->Cat_details($Id,$data);
    echo json_encode($result);
    exit;
  }  
  else
  {
  
      return view('/Login');
  }
    
    }
  //delete

  public function Cat_delete()
  {
    if (isset($_SESSION['AdminName']))
        {
   
          $Id= $this->request->getGet('Astro_Cat');
          $model= new MyModel();
          $model->Cat_delete($Id);
        
          $result=$model->Cat();
          return view('Cat', $result);
              
       } 
       else
       {
     
      return view('/Login');
     }
    
    } 

//Page Category-------------------------------------------------------

          public function Page_Category_add()
          {
              return view('Page_Category_add');
          }
               
    
 public function Page_Categorydetails()
{
  if (isset($_SESSION['AdminName']))
 {


    $data['CategoryName']=  $this->request->getpost('CategoryName');
   
    $model= new MyModel();
    $result=$model->Page_Categorydetails($data);
   echo json_encode($result);
   exit;
} 
else
{

return view('/Login');
}
}


//fetch

public function Page_Category()
{
  if (isset($_SESSION['AdminName']))
  {
    $model= new MyModel();
    $result=$model->Page_Category();
    return view('Page_Category', $result);        
}  
else
{
return view('/Login');
}
}


//update

public function Page_Category_update()
{
    $Id= $this->request->getGet('PG_CAT_ID');
 //echo $Id;
 //exit();
 $model= new MyModel();
 $result['PG_CAT_ID']=$Id;
 $result['data'] = $model->Page_Category_update($Id);
// print_r();
return view('Page_Category_update',$result);   
}


public function Page_Category_details()
{
 
    $Id= $this->request->getpost('PG_CAT_ID');
    $data['CategoryName']=  $this->request->getpost('CategoryName');

    $model= new MyModel();

    $result=$model->Page_Category_details($Id,$data);
    echo json_encode($result);
    exit;
  }  
  
  public function Page_Category_delete()
  {
          $Id= $this->request->getGet('PG_CAT_ID');
          $model= new MyModel();
          $model->Page_Category_delete($Id);
        
          $result=$model->Page_Category();
          return view('Page_Category', $result);
              
       } 


//Page------------------------------------------------------------------
public function Page_add()
{
 if (isset($_SESSION['AdminName']))
   {
            $model= new MyModel();
            $result['data']=$model->Page_add();
            return view('Page_add',$result);
         }
      else{
             return view('/Login');
           }
         }

//insert

public function Pagedetails()
{
  if (isset($_SESSION['AdminName']))
 {
      
    $data['PageTitle']=  $this->request->getpost('PageTitle');
    $data['PageDescription']=  $this->request->getpost('PageDescription');
    $data['Page_SLUG']=  $this->request->getpost('Page_SLUG');
    $data['Page_Content']=  $this->request->getpost('Page_Content');
    $data['PG_CAT_ID']=  $this->request->getpost('PG_CAT_ID');
    $data['PG_Sub_CAT_ID']=  $this->request->getpost('PG_Sub_CAT_ID');

    $model= new MyModel();
  $result=$model->Pagedetails($data);
   echo json_encode($result);
   exit;
} 
else
{

return view('/Login');
}

}
   

//fetch

public function Page()
{
  if (isset($_SESSION['AdminName']))
  {
    $model= new MyModel();
    $result=$model->Page();
    return view('Page', $result);        
}  
else
{
return view('/Login');
}
}

//update

//update

public function Page_update()
{
    $Id= $this->request->getGet('PG_ID');
 $model= new MyModel();
 $result['PG_ID']=$Id;
 $result['data'] = $model->Page_update($Id);
 $result['Cat']=$model->Page_add();
 //print_r($result);
return view('Page_update',$result);   
}


public function Page_details()
{
 
    $Id= $this->request->getpost('PG_ID');
    $data['PageTitle']=  $this->request->getpost('PageTitle');
    $data['PageDescription']=  $this->request->getpost('PageDescription');
    $data['Page_SLUG']=  $this->request->getpost('Page_SLUG');
    $data['Page_Content']=  $this->request->getpost('Page_Content');
   
    $data['PG_CAT_ID']=  $this->request->getpost('PG_CAT_ID');
    $data['PG_Sub_CAT_ID']=  $this->request->getpost('PG_Sub_CAT_ID');

    $model= new MyModel();

    $result=$model->Page_details($Id,$data);
    echo json_encode($result);
    exit;
  }  
  
  public function Page_delete()
  {
          $Id= $this->request->getGet('PG_ID');
          $model= new MyModel();
          $model->Page_delete($Id);
        
          $result=$model->Page();
          return view('Page', $result);
              
       } 


   //Page Subcategory----------------------------------------------------

         public function Page_subcategory_add()
          {
            $model= new MyModel();
            $result['data']=$model->Page_subcategory_add();
            
            return view('Page_subcategory_add',$result);
            
          }
               


 public function Page_subcategorydetails()
{

    $data['SubCategoryName']=$this->request->getpost('SubCategoryName');
    $data['PG_CAT_ID']=  $this->request->getpost('PG_CAT_ID');

    $model= new MyModel();
    $result=$model->Page_subcategorydetails($data);
    
   echo json_encode($result);
   exit;

}


//fetch

public function Page_subcategory()
{
  if (isset($_SESSION['AdminName']))
  {
    $model= new MyModel();
    $result=$model->Page_subcategory();
    return view('Page_subcategory', $result);        
}  
else
{
return view('/Login');
}
}


//update

public function Page_subcategory_update()
{
    $Id= $this->request->getGet('PG_Sub_CAT_ID');
 //echo $Id;
 //exit();
 $model= new MyModel();
 $result['PG_Sub_CAT_ID']=$Id;
 $result['Subcategory'] = $model->Page_subcategory_update($Id);
 $result['Category']=$model->Page_subcategory_add();

return view('Page_subcategory_update',$result);   
}


public function Page_subcategory_details()
{
 
    $Id= $this->request->getpost('PG_Sub_CAT_ID');
    $data['SubCategoryName']=  $this->request->getpost('SubCategoryName');
    $model= new MyModel();

    $result=$model->Page_subcategory_details($Id,$data);
    echo json_encode($result);
    exit;
  }  
  
        public function Page_subcategory_delete()
        {
                  $Id= $this->request->getGet('PG_Sub_CAT_ID');
                  $model= new MyModel();
                  $model->Page_subcategory_delete($Id);
                
                  $result=$model->Page_subcategory();
                  return view('Page_subcategory', $result);
                      
        } 


       public function get_subcat(){
       $cat=$this->request->getGet('catid');
       $model= new MyModel();
       $result=$model->get_subcat($cat);
       echo json_encode($result);
       exit;

       }
       
       

}