<?php namespace App\Controllers;
use App\Models\ApiModel;

class API_Call extends BaseController
{
    protected $helpers = [];
    


    public function __construct()
    {
     
      $this->session = \Config\Services::session();
      $this->db = \Config\Database::connect();
      $this->helpers = array_merge($this->helpers, ['url', 'session']);
    }

public function index()
{

         return view('Login');

}

public function GetBlogs()
{
   //$this->response->setContentType('Content-Type: application/json');
    $request = \Config\Services::request();
    $Token =$request->getVar('Token');
    $model= new ApiModel();
    $result=$model->GetBlogs();
    header('Content-Type: application/json');
    echo trim(json_encode($result));
}


public function GetSideBar()
{
    $this->response->setContentType('Content-Type: application/json');
    $request = \Config\Services::request();
    
    $Token =$request->getVar('Token');
    $model= new ApiModel();
    $result=$model->GetSideBar();
    
    return json_encode($result);
}


public function PostByCat()
{
    $this->response->setContentType('Content-Type: application/json');
    $request = \Config\Services::request();
    
    $Token =$request->getVar('Token');
    $cat_id =$request->getVar('Cat_ID');
    $model= new ApiModel();
    $result=$model->PostByCat($cat_id);
    
    return json_encode($result);
}


public function PostByTags()
{
    $this->response->setContentType('Content-Type: application/json');
    $request = \Config\Services::request();
    
    $Token =$request->getVar('Token');
    
    $tag_name =str_replace("-"," ",trim($request->getVar('tag_name')));
    
    $model= new ApiModel();
    $result=$model->PostByTags($tag_name);
    
    return json_encode($result);
}


public function PostDetails()
{
   // $this->response->setContentType('Content-Type: application/json');
    $request = \Config\Services::request();
    
    $Token =$request->getVar('Token');
    $p_id =$request->getVar('p_id');
    $model= new ApiModel();
    $result=$model->PostDetails($p_id);
    header('Content-Type: application/json');
    return json_encode($result);
}


public function CheckUser()
{
   // $this->response->setContentType('Content-Type: application/json');
    $request = \Config\Services::request();
    
    $Token =$request->getVar('Token');
    $mobile =$request->getVar('mobile');
    $model= new ApiModel();
    $result=$model->CheckUser($mobile);
    header('Content-Type: application/json');
    return json_encode($result);
}


public function addupdateUser()
{
   // $this->response->setContentType('Content-Type: application/json');
    $request = \Config\Services::request();
    
    $Token =$request->getVar('Token');
   
    $U_Data['MobileNo']=$request->getVar('MobileNo');
    $U_Data['Email']=$request->getVar('Email');
    $U_Data['Gender']=$request->getVar('Gender');
    $U_Data['FName']=$request->getVar('FName');
    $U_Data['LName']=$request->getVar('LName');
    $U_Data['FCM_Token']=$request->getVar('FCM_Token');
    $U_Data['DOB']=$request->getVar('DOB');
    $U_Data['Time_of_Birth']=$request->getVar('Time_of_Birth');
    $U_Data['Place_Of_Birth']=$request->getVar('Place_Of_Birth');
    $U_Data['POB_Lat']=$request->getVar('POB_Lat');
    $U_Data['POB_Long']=$request->getVar('POB_Long');
    $U_Data['Address']=$request->getVar('Address');
    $U_Data['Address_Lat']=$request->getVar('Address_Lat');
    $U_Data['Address_Long']=$request->getVar('Address_Long');
   
   
   
   /*
    $Image=$request->getFile('Profile_pic');
    if($Image->isvalid())
    {
      $newName = $Image->getRandomName();
      $imag=$Image->move('../public/uploads/profile_pics/', $newName);
      $U_Data['profilepic']=$newName ;
    }
    */
    
    $model= new ApiModel();
    $result=$model->addupdateUser($U_Data);
    header('Content-Type: application/json');
    return json_encode($result);
}



}


?>



