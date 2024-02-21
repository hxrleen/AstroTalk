<?php namespace App\Models;

use CodeIgniter\Model;

class MyModel extends Model
{
    protected $helpers = [];
    protected $session;
    protected $db;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->helpers = array_merge($this->helpers, ['url'],['file']);
        $this->db=\Config\Database::connect();
    }

    

    public function customers()
    {
          $db = \Config\Database::connect();
          
          $builder = $db->table('customers');
          $query=  $builder->get();
        
          $result['Status']=true;
          $result['data']=$query->getResultArray(); 
           
         return $result;
    }

    public function customerdetail($Id){


        $db = \Config\Database::connect();
          
        $builder = $db->table('customers');
        $builder-> where('UserID',$Id);
        $query=  $builder->get();
        $result['Customerdata']=$query->getResultArray(); 

         $builder = $db->table('reviews');
        $builder-> where('UserID',$Id);
        $query=  $builder->get();
        $result['Reviewdata']=$query->getResultArray();

    
        return $result;
    
    }

    public function astrodetails($data)
    {
        
        $db = \Config\Database::connect();

        $builder = $db->table('astrologers');
        $builder-> where('Mobile',$data['Mobile']);
        
        $query=  $builder->get();
        $num_rows=count($query->getresult());
        if ($num_rows>0)
        {
            $result['Status']=false;
            $result['Msg']='Astrologer already registered with the Mobile';
        }
        else
        {
            $builder = $db->table('astrologers');
            $builder->insert($data);
            //$sql = $builder->set($data)->getCompiledInsert();
            
            $last_id=$db->insertID();
            $result['Status']=true;
            $result['Msg']='Data Inserted Successfully';
           $result['LastId']=$last_id;
        }
     
        return $result;
  }


     //fetch

     public function astrologervalue()
     {
           $db = \Config\Database::connect();
         
           $sql ="SELECT *,(Select CatName from astrologer_category where astrologer_category.Astro_Cat=astrologers.AstroCat ) as CategoryName FROM `astrologers`";
           $query =$db->query($sql);
           
           $builder = $db->table('astrologers');
           $query=  $builder->get();
         
           $result['Status']=true;
           $result['data']=$query->getResultArray(); 
            
          return $result;
     }


     public function astro_cat()
     {
           $db = \Config\Database::connect();
           
           $builder = $db->table('astrologer_category');
           //$builder-> where('Astro_Cat',$cat);

           $query=  $builder->get();
         
           $result['Status']=true;
           $result['data']=$query->getResultArray(); 
            
          return $result;
     }

     //update

    public function astroupdate($Id){

        $db = \Config\Database::connect();

        $sql ="SELECT *,(Select CatName from astrologer_category where astrologer_category.Astro_Cat=astrologers.AstroCat ) as CategoryName FROM `astrologers` where Astrologer_id=".$Id;
        $query =$db->query($sql);
          
        $builder = $db->table('astrologers');
        $builder-> where('Astrologer_id',$Id);
        $query=  $builder->get();
        $result=$query->getResultArray(); 
         return $result;
    }



    public function edit_astrologer_pg1($Id,$data){

        $db = \Config\Database::connect();
       

        $sql="SELECT * FROM `astrologers` as AstroValid WHERE  Astrologer_id=".$Id;
        $query =$db->query($sql);
        $num_rows=$query->getresult();
        if(count($num_rows) > 0)
        {
           
            $AstroValid=$query->getResultArray(); 
            $Chat = $AstroValid[0]['Chat_price'];
            $Maxchat = $AstroValid[0]['Max_chat_price'];
            $Audio = $AstroValid[0]['Audio_call_price'];
            $Maxaudio = $AstroValid[0]['Max_audio_call_price'];
            $Video = $AstroValid[0]['Video_call_price'];
            $Maxvideo = $AstroValid[0]['Max_video_call_price'];
        
        
            if($Chat > 0 && $Maxchat>0 &&  $Audio>0 && $Maxaudio>0 && $Video>0 && $Maxvideo>0)
            {
                $builder = $db->table('astrologers');
                $builder-> where('Astrologer_id',$Id);
                $builder->update($data);
                $result['Status']=true;
                $result['Msg']='Data Inserted Successfully ';
        
            }
            else{
        
                $result['Status']=false;
                $result['Msg']='Please update the Financial data';
        
            }          
        
        }else
        {
            $result['Status']=false;
            $result['Msg']=" Fill the form correctly";    
        }
        
          
        return $result;
        }
        

    
public function edit_astrologer_qualification($Id,$data){

    $db = \Config\Database::connect();         
    $builder = $db->table('astrologers');
    $builder-> where('Astrologer_id',$Id);
    $builder->update($data);

    $result['Status']=true;
    $result['Msg']='Data updated Successfully ';

return $result;


}

public function edit_astrologer_financials($Id,$data){

    $db = \Config\Database::connect();         
    $builder = $db->table('astrologers');
    $builder-> where('Astrologer_id',$Id);
    $builder->update($data);

    $result['Status']=true;
    $result['Msg']='Data updated Successfully ';

return $result;


}

public function financialsupdate($Id,$data){
    $db =  \Config\Database::connect();  
    $builder = $db->table('astrologers');
    $builder->select('Chat_price, Max_chat_price','Audio_call_price','Max_audio_call_price','Video_call_price','Max_video_call_price');
    $query=  $builder->get();
    $num_rows=count($query->getresult());
    if ($num_rows>0)
    {
            $fin= $query->getResultArray();
            $Chat = $fin[0]['Chat_price'];
            $Maxchat = $fin[0]['Max_chat_price'];
            $Audio = $fin[0]['Audio_call_price'];
            $Maxaudio = $fin[0]['Max_audio_call_price'];
            $Video = $fin[0]['Video_call_price'];
            $Maxvideo = $fin[0]['Max_video_call_price'];

            if($Chat >0 && $Maxchat > 0 &&  $Audio>0 && $Maxaudio>0 && $Video>0 && $Maxvideo>0)
            {
                $builder = $db->table('astrologers');
                $builder-> where('Astrologer_id',$Id);
                $builder->update($data);
                $result['Status']=true;
                $result['Msg']='Data Inserted Successfully ';
        
            }
            else{
        
                $result['Status']=false;
                $result['Msg']='Please fill the Financial data correctly';
        
            }          

    }
    else
    {
            $result['Status']=false;
            $result['Msg']=" Fill the form correctly";    

}

return $result;
}

public function edit_astrologer_documents($data){

    $db = \Config\Database::connect();         
    $builder = $db->table('astrologer_document');
    $builder->insert($data);

    $result['Status']=true;
    $result['Msg']='Data Inserted Successfully ';

return $result;
}


//fetch

public function astrodoc($Id)
     {
           $db = \Config\Database::connect();
           
           $builder = $db->table('astrologer_document');
           $builder-> where('Astrologer_id',$Id);
           $query=  $builder->get();
         
           $result['Status']=true;
           $result['data']=$query->getResultArray(); 
            
          return $result;
     }

public function edit_astrologer_Availability($data){

    $db = \Config\Database::connect();         
    $builder = $db->table('astro_availability');
    $builder->insert($data);

    $result['Status']=true;
    $result['Msg']='Data updated Successfully ';

return $result;
}

public function avail($Id)
     {
           $db = \Config\Database::connect();
           
           $builder = $db->table('astro_availability');
           $builder-> where('Astrologer_id',$Id);
           $query=  $builder->get();
           $result['Status']=true;
           $result['data']=$query->getResultArray(); 
            
          return $result;
     }

public function deleteAstro($Id){


    $db = \Config\Database::connect();
      
    $builder = $db->table('astrologers');
    $builder-> where('Astrologer_id',$Id);
    $builder->delete();
return true ;

}


public function deleteDoc($doc){
    $db = \Config\Database::connect();
      
    $builder = $db->table('astrologer_document');
    $builder-> where('Doc_id',$doc);
    $builder->delete();

return true ;

}

public function deleteAvail($doc){


    $db = \Config\Database::connect();
      
    $builder = $db->table('astro_availability');
    $builder-> where('Avail_id',$doc);
    $builder->delete();
    
    return true ;
    
    }

//Promos and Banners

public function promodetails($data)
{
      $db = \Config\Database::connect();
      
      $builder = $db->table('promotions');
    $builder->insert($data);
    
    $result['Status']=true;
    $result['Msg']= 'Data inserted successfully';   
   return $result;

}
public function promo_table()
{
      $db = \Config\Database::connect();
      
      $builder = $db->table('promotions');
      $query=  $builder->get();
    
      $result['Status']=true;
      $result['data']=$query->getResultArray(); 
       
     return $result;
}
//delete

public function promo_delete($Id){


    $db = \Config\Database::connect();
      
    $builder = $db->table('promotions');
    $builder-> where('Prom_id',$Id);
    $builder->delete();

return true ;

}
//update
public function promostatus($status,$Id)
{

    
      $db = \Config\Database::connect();
      
      $builder = $db->table('promotions');
      $builder-> where('Prom_id',$Id);
      $builder->set('Status', $status);
     
      
      $builder->update();

      $result =$query= $db->error();
   
      return $query ;

}
//FAQ---------------------------------------------


public function FAQdetails($data)
{
      $db = \Config\Database::connect();
      
      $builder = $db->table('faq');
    $builder->insert($data);

    $result['Status']=true;
    $result['Msg']='Data Inserted Successfully ';

    return $result;

}

//fetch
 
public function FAQ()
{
      $db = \Config\Database::connect();
      
      $builder = $db->table('faq');
      $query=  $builder->get();
      $result['Status']=true;
      $result['data']=$query->getResultArray(); 
       
     return $result;

    }
//update

public function FAQ_update($Id){

    $db = \Config\Database::connect();
      
    $builder = $db->table('faq');
    $builder-> where('Faq_id',$Id);
    $query=  $builder->get();

return $query->getResultArray(); 
}


public function FAQ_details($Id,$data){

    $db = \Config\Database::connect();         
    $builder = $db->table('faq');
    $builder-> where('Faq_id',$Id);
    $builder->update($data);

    $result['Status']=true;
    $result['Msg']='Data updated Successfully ';

    return $result;
}

//delete
public function FAQ_delete($Id){


    $db = \Config\Database::connect();
      
    $builder = $db->table('faq');
    $builder-> where('Faq_id',$Id);
    $builder->delete();

return true ;

}

//users---------------------------------

//insert

public function userdetails($data)
{
      $db = \Config\Database::connect();
      
      $builder = $db->table('user');
       
      $builder-> where('User_name',$data['User_name']);
      $query=  $builder->get();
      $num_rows=count($query->getresult());
      if ($num_rows>0)
      {
          $result['Status']=false;
          $result['Msg']='Email already exist';
        
      }
      else
      {
          $builder = $db->table('user');
          $builder->insert($data);
          $result['Status']=true;
          $result['Msg']='Data Inserted Successfully ';

      }
        return $result;
  }

public function User_add(){

    $db = \Config\Database::connect();         
    $builder = $db->table('groups');
    $builder->select('Group_id, Group_name');
    $query=  $builder->get();
    $result['group']= $query->getResultArray();
    return $result;
}
 //fetch
public function user_table()
{
      $db = \Config\Database::connect();
      
      $builder = $db->table('user');
      $query=  $builder->get();
      $result['Status']=true;
      $result['data']=$query->getResultArray(); 
       
     return $result;

    }
//update

public function User_update($Id){

    $db = \Config\Database::connect();
      
    $sql ="SELECT *,(Select Group_name from groups where groups.Group_id=user.User_id )as groups FROM `user` where User_id=".$Id;
    $query =$db->query($sql);
    $num_rows=$query->getresult();
      
    if(count($num_rows) > 0)
    {
        
        $result['Status']=true;
        $result['data']=$query->getResultArray();  
            
    }
    else
    {
        $result['Status']=false;
        $result['Msg']="Something Went Wrong";
    }    


    return $result; 
}



public function User_edit($Id,$data){

    $db = \Config\Database::connect();         
    $builder = $db->table('user');
    $builder-> where('User_id',$Id);
    $builder->update($data);


    $result['Status']=true;
    $result['Msg']= 'Data updated successfully';   
   return $result;
}
//delete
public function User_delete($Id){


    $db = \Config\Database::connect();
      
    $builder = $db->table('user');
    $builder-> where('User_id',$Id);
    $builder->delete();

return true ;

}

// groups------------------


//insert
public function Group_details($data)
{
      $db = \Config\Database::connect();
      
      $builder = $db->table('groups');
    $builder->insert($data);

    $result['Status']=true;
    $result['Msg']= 'Data inserted successfully';   
   return $result;
}
 //fetch
public function Group_table()
{
      $db = \Config\Database::connect();
      $builder = $db->table('groups');
      $query=  $builder->get();
      $result['Status']=true;
      $result['data']=$query->getResultArray(); 
       
     return $result;

    }

    //update

public function Group_update($Id){

    $db = \Config\Database::connect();
      
    $builder = $db->table('groups');
    $builder-> where('Group_id',$Id);
    $query=  $builder->get();

return  $query->getResultArray(); 

}


public function Group_edit($Id,$data){

    $db = \Config\Database::connect();         
    $builder = $db->table('groups');
    $builder-> where('Group_id',$Id);
    $builder->update($data);


    $result['Status']=true;
    $result['Msg']= 'Data updated successfully';   
   return $result;
}

    //delete
public function Group_delete($Id){


    $db = \Config\Database::connect();
      
    $builder = $db->table('groups');
    $builder-> where('Group_id',$Id);
    $builder->delete();

return true ;

}

 // groups fetch on permission
 public function permission($Id)
 {

    $db = \Config\Database::connect();
      
    $builder = $db->table('groups');
    $builder-> where('Group_id',$Id);
    $query=  $builder->get();

    $result['groupdata']=$query->getResultArray();

    $builder = $db->table('permission');
    $builder-> where('Group_id',$Id);
    $query=  $builder->get();
    $result['Permissiondata']=$query->getResultArray();

return $result ;
}

//permission insert

public function permission_insert($data)
{
    $db = \Config\Database::connect();
      
    $builder = $db->table('permission');

    $builder-> where('Module_name',$data['Module_name']);
    $builder-> where('Group_id',$data['Group_id']);
    $query=  $builder->get();
    $num_rows=count($query->getresult());
    if ($num_rows>=1)
    {
        $result['Status']=false;
        $result['Msg']='Module already exist, Please select other Module.';
      
    }
    else
    {
        $builder = $db->table('permission');
        $builder->insert($data);
        $last_id=$db->insertID();

        $result['Status']=true;
        $result['Msg']= 'Data inserted successfully';
        $result['LastId']=$last_id;
    }  
   return $result;
}


    //delete
    public function permission_delete($Per){


        $db = \Config\Database::connect();
          
        $builder = $db->table('permission');
        $builder-> where('Permission_id',$Per);
        $builder->delete();
    
    return true ;
    
    }
    
    //update
    public function Permission_update($Id){

        $db = \Config\Database::connect();
          
        $builder = $db->table('permission');
        $builder-> where('Permission_id',$Id);
        $query=  $builder->get();

    return $query->getResultArray(); ;
    
    }

  
    public function Permission_edit($Id,$data,$old_module_name){
    
        $db = \Config\Database::connect();         
       
       
       if ($data['Module_name'] != $old_module_name)
       {     
            $builder = $db->table('permission');
            $builder-> where('Module_name',$data['Module_name']);
            $builder-> where('Group_id',$data['Group_id']);
            $query=  $builder->get();
            $num_rows=count($query->getresult());

            if ($num_rows>=1)
            {
                $result['Status']=false;
                $result['Msg']='Module already exist, Please select other Module.';
                return $result; 
            }
       }

            $builder = $db->table('permission');
            $builder-> where('Permission_id',$Id);
            $builder->update($data);
        
            $result['Status']=true;
            $result['Msg']= 'Data updated ';
            return $result;    
    }

    //Review------------------------------------------- 

public function Review_add(){

    $db = \Config\Database::connect();         
    $builder = $db->table('astrologers');
    $builder->select('Astrologer_id, First_name');
    $query=  $builder->get();

    $result['astrologer']= $query->getResultArray();

    $builder = $db->table('customers');
    $builder->select('UserID, FName');
    $query=  $builder->get();

    $result['customer']= $query->getResultArray();

return $result;

}

public function Reviewdetails($data)
{
      $db = \Config\Database::connect();
      $builder = $db->table('reviews');
      $builder->insert($data);

      $result['Status']=true;
      $result['Msg']= 'Data updated ';   
     return $result;

}


//fetch
 
public function Review()
{
    $db = \Config\Database::connect();
    $sql ="SELECT *,(Select Fname from customers where customers.UserID=reviews.UserID ) as Customer, (select first_name from astrologers WHERE astrologers.Astrologer_id=reviews.Astrologer_id) as astrologer  FROM `reviews`";
    
    $query =$db->query($sql);
    $num_rows=$query->getresult();
      
    if(count($num_rows) > 0)
    {
        $result['Status']=true;
        $result['data']=$query->getResultArray();  
            
    }
    else
    {
        $result['Status']=false;
        $result['Msg']="Something Went Wrong";
    }    
    return $result; 
}


//update

public function Review_update($Id){

    $db = \Config\Database::connect();

    $sql ="SELECT *,(Select Fname from customers where customers.UserID=reviews.UserID ) as Customer, (select first_name from astrologers WHERE astrologers.Astrologer_id=reviews.Astrologer_id) as astrologer FROM `reviews` where Review_id=".$Id;
    
    $query =$db->query($sql);
    $num_rows=$query->getresult();
      
    if(count($num_rows) > 0)
    {
        $result['data']=$query->getResultArray();  
        $result['Msg']="Data updated successfully!";
            
    }
    else
    {
        $result['Status']=false;
        $result['Msg']="Something Went Wrong";
    }    
    return $result; 
}

public function Review_details($Id,$data){

    $db = \Config\Database::connect();         
    $builder = $db->table('reviews');
    $builder-> where('Review_id',$Id);
    $builder->update($data);

    $result['Status']=true;
    $result['Msg']="Data inserted successfully";
return $result ;

}
//delete
public function Review_delete($Id){


    $db = \Config\Database::connect();
      
    $builder = $db->table('reviews');
    $builder-> where('Review_id',$Id);
    $builder->delete();

return true ;

}

//Category ---------------------------------------------


        public function Catdetails($data)
        {
            $db = \Config\Database::connect();
            
            $builder = $db->table('astrologer_category');
            $builder-> where('CatName',$data['CatName']);
            $query=  $builder->get();
            $num_rows=count($query->getresult());
            if ($num_rows>0)
        {
            $result['Status']=false;
            $result['Msg']='Category already exist';
        
        }
        else
        {
            $builder = $db->table('astrologer_category');
        
            $builder->insert($data);
            $last_id=$db->insertID();
            $result['Status']=true;
            $result['Msg']='Updated Success';
            $result['LastId']=$last_id;
        }


    return $result;

}

//fetch
 
public function Cat()
{
      $db = \Config\Database::connect();
      
      $builder = $db->table('astrologer_category');
      $query=  $builder->get();
      $result['Status']=true;
      $result['data']=$query->getResultArray(); 
       
     return $result;

    }

//update

public function Cat_update($Id){

    $db = \Config\Database::connect();
      
    $builder = $db->table('astrologer_category');
    $builder-> where('Astro_Cat',$Id);
    $query=  $builder->get();

return $query->getResultArray(); 
}



public function Cat_details($Id,$data){

    $db = \Config\Database::connect();         
    $builder = $db->table('astrologer_category');
    $builder-> where('Astro_Cat',$Id);
    $builder->update($data);

    $result['Status']=true;
    $result['Msg']='Data updated Successfully ';

    return $result;
}

//delete
public function Cat_delete($Id){


    $db = \Config\Database::connect();
      
    $builder = $db->table('astrologer_category');
    $builder-> where('Astro_Cat',$Id);
    $builder->delete();

return true ;

}

//Page---------------------------------------------
public function Page_add(){

    $db = \Config\Database::connect();         
    $builder = $db->table('page_category');
    $builder->select('PG_CAT_ID, CategoryName');
    $query=  $builder->get();
    $result['category']= $query->getResultArray();


    $builder = $db->table('page_sub_category');
    $builder->select('PG_Sub_CAT_ID, SubCategoryName');
    $query=  $builder->get();
    $result['subcategory']= $query->getResultArray();

return $result;

}

public function Pagedetails($data)
{
    $db = \Config\Database::connect();
    $builder = $db->table('page');
    $builder->insert($data);
    $result['Status']=true;
    $result['Msg']='Data Inserted Successfully ';

    return $result;

}


//fetch
 
public function Page()
{
      $db = \Config\Database::connect();
      $sql= "SELECT *,(Select CategoryName from page_category where page_category.PG_CAT_ID=page.PG_CAT_ID ) as Category , (select SubCategoryName from page_sub_category WHERE page_sub_category.PG_Sub_CAT_ID=page.PG_Sub_CAT_ID) as Subcategory FROM `page`";
 
      $query =$db->query($sql);
      $num_rows=$query->getresult();
        
      if(count($num_rows) > 0)
      {
          $result['data']=$query->getResultArray();  
          $result['Msg']="Data updated successfully!";
              
      }
      else
      {
          $result['Status']=false;
          $result['Msg']="Something Went Wrong";
      }    
      return $result; 
  }

 
//update

public function Page_update($Id){
    
    $db = \Config\Database::connect();
    $sql= "SELECT *,(Select CategoryName from page_category where page_category.PG_CAT_ID=page.PG_CAT_ID ) as Category FROM `page` where PG_ID=".$Id;  
    $query =$db->query($sql);
    $num_rows=$query->getresult();

   if(count($num_rows) > 0)
    {
        $result['data']=$query->getResultArray();  
        $result['Msg']="Data updated successfully!";
            
    }
    else
    {
        $result['Status']=false;
        $result['Msg']="Something Went Wrong";
    }    
    return $result; 
}


public function Page_details($Id,$data){

    $db = \Config\Database::connect();         
    $builder = $db->table('page');
    $builder-> where('PG_ID',$Id);
    $builder->update($data);

    $result['Status']=true;
    $result['Msg']='Data updated Successfully ';

    return $result;
}

//delete
public function Page_delete($Id){


    $db = \Config\Database::connect();
      
    $builder = $db->table('page');
    $builder-> where('PG_ID',$Id);
    $builder->delete();

return true ;

}


//Page Category-------------------------------------------


public function Page_Categorydetails($data)
{
      $db = \Config\Database::connect();
      
      $builder = $db->table('page_category');
    $builder->insert($data);

    $result['Status']=true;
    $result['Msg']='Data Inserted Successfully ';

    return $result;

}


//fetch
 
public function Page_Category()
{
      $db = \Config\Database::connect();
      
      $builder = $db->table('page_category');
      $query=  $builder->get();
      $result['Status']=true;
      $result['data']=$query->getResultArray(); 
       
     return $result;

    }

    //update

public function Page_Category_update($Id){

    $db = \Config\Database::connect();
      
    $builder = $db->table('page_category');
    $builder-> where('PG_CAT_ID',$Id);
    $query=  $builder->get();
    

return $query->getResultArray(); 
}


public function Page_Category_details($Id,$data){

    $db = \Config\Database::connect();         
    $builder = $db->table('page_category');
    $builder-> where('PG_CAT_ID',$Id);
    $builder->update($data);

    $result['Status']=true;
    $result['Msg']='Data updated Successfully ';

    return $result;
}

//delete
public function Page_Category_delete($Id){


    $db = \Config\Database::connect();
      
    $builder = $db->table('page_category');
    $builder-> where('PG_CAT_ID',$Id);
    $builder->delete();

return true ;

}

//Page Subcategory-----------------------------------
public function Page_subcategory_add(){

    $db = \Config\Database::connect();         
    $builder = $db->table('page_category');
    $builder->select('PG_CAT_ID, CategoryName');
    $query=  $builder->get();

    $result['category']= $query->getResultArray();

return $result;

}

public function Page_subcategorydetails($data)
{
      $db = \Config\Database::connect();
      
      $builder = $db->table('page_sub_category');
    $builder->insert($data);

    $result['Status']=true;
    $result['Msg']='Data Inserted Successfully ';

    return $result;

}


//fetch
 
public function Page_subcategory()
{
      $db = \Config\Database::connect();
      $sql= "SELECT *,(Select CategoryName from page_category where page_category.PG_CAT_ID=page_sub_category.PG_CAT_ID ) as Category FROM `page_sub_category`";
      $query =$db->query($sql);
      $num_rows=$query->getresult();
      if(count($num_rows) > 0)
      {
          $result['Status']=true;
          $result['data']=$query->getResultArray();  
              
      }
      else
      {
          $result['Status']=false;
          $result['Msg']="Something Went Wrong";
      }    
      return $result; 
  }


    //update

public function Page_subcategory_update($Id){

    $db = \Config\Database::connect();
      
    $builder = $db->table('page_sub_category');
    $builder-> where('PG_Sub_CAT_ID',$Id);
    $query=  $builder->get();

return $query->getResultArray(); 
}


public function Page_subcategory_details($Id,$data){

    $db = \Config\Database::connect();         
    $builder = $db->table('page_sub_category');
    $builder-> where('PG_Sub_CAT_ID',$Id);
    $builder->update($data);

    $result['Status']=true;
    $result['Msg']='Data updated Successfully ';

    return $result;
}

//delete
public function Page_subcategory_delete($Id){


    $db = \Config\Database::connect();
      
    $builder = $db->table('page_sub_category');
    $builder-> where('PG_Sub_CAT_ID',$Id);
    $builder->delete();

return true ;

}


public function get_subcat($cat){

    $db = \Config\Database::connect();         
    $builder = $db->table('page_sub_category');
    $builder-> where('PG_CAT_ID', $cat);

    $query=  $builder->get();
    return $query->getResultArray();
}
}
