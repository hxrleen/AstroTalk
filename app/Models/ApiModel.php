<?php namespace App\Models;

use CodeIgniter\Model;

class ApiModel extends Model
{
    protected $helpers = [];
    protected $session;
    protected $db;
    public function __construct()
    {
        
        $this->helpers = array_merge($this->helpers, ['url'],['file']);
        $this->db=\Config\Database::connect();
         

      
    }


     public function GetBlogs()
    {
        $db = \Config\Database::connect();
        //$this->db->cache_on();
        $sql ="SELECT Blog_ID,Blog_Title,Publish_Date,View_Count,View_Count_7Days,Image,`Blog_Posts`.`featured?`, Publisher, Categories.Cat_Name,Slug FROM `Blog_Posts` join Categories on Blog_Posts.Blog_Cat=Categories.CategoriesID ORDER by Publish_Date DESC";
        
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

    public function GetSideBar()
    {
          $db = \Config\Database::connect();
          
          $builder = $db->table('Categories');
          $builder->orderBy('Cat_Order', 'ASC');
          $query   = $builder->get();  // Produces: SELECT * FROM mytable
          $num_rows=$query->getresult();
         
          if(count($num_rows) > 0)
          {
            $result['Status']=true;
            $result['data']=$query->getResultArray();  
                
                        //getting Tag data
                        $builder = $db->table('Tags_Master');
                        $query2   = $builder->get();  // Produces: SELECT * FROM mytable
                        if(count($query2->getresult())) {
                            $result['Tag_data']=$query2->getResultArray();  
                        }
                        
                        //Recent Blog_Posts
                        $builder = $db->table('Blog_Posts');
                        $builder->select('Blog_Title,Blog_Summary,Publish_Date,Slug');
                        $builder->orderBy('Publish_Date', 'DESC');
                        $builder->limit(3);
                        $query3   = $builder->get();  // Produces: SELECT * FROM mytable
                        if(count($query3->getresult())) {
                            $result['recent_posts']=$query3->getResultArray();  
                        }
                        
                        
              
          }
          else
          {
              $result['Status']=false;
              $result['Msg']="Unable to get the categories";
          }
          
          return $result;
    }

    public function PostByCat($cat_id)
    {
          $db = \Config\Database::connect();
        //$this->db->cache_on();
        $sql = "SELECT Blog_ID,Blog_Title,Blog_Summary,Publish_Date,View_Count,View_Count_7Days,Image,`Blog_Posts`.`featured?`, Publisher, Categories.Cat_Name,Blog_Posts.Slug FROM `Blog_Posts` join Categories on Blog_Posts.Blog_Cat=Categories.CategoriesID where Categories.cat_slug='$cat_id' ORDER by Publish_Date DESC";
        
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
            $result['Msg']="No Blogs for this Category";
        }
   
        
        return $result;
    }
    
    
    
    public function PostByTags($tag_name)
    {
          $db = \Config\Database::connect();
        //$this->db->cache_on();
        $sql = "SELECT Blog_ID,Blog_Title,Blog_Summary,Publish_Date,View_Count,View_Count_7Days,Image,`Blog_Posts`.`featured?`, Publisher, Categories.Cat_Name,Slug FROM `Blog_Posts` join Categories on Blog_Posts.Blog_Cat=Categories.CategoriesID where TAGS like '%$tag_name%' ORDER by Publish_Date DESC";
        
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
            $result['Msg']="No Blogs for this Tag";
        }
   
        
        return $result;
    }

    
    public function PostDetails($p_id)
    {
          $db = \Config\Database::connect();
          
          $builder = $db->table('Blog_Posts');
          $builder->where('Slug', $p_id);
          $query   = $builder->get();  // Produces: SELECT * FROM mytable
          $num_rows=$query->getresult();
         
          if(count($num_rows) > 0)
          {
            $result['Status']=true;
            $result['data']=$query->getResultArray();  
            
            
                        $sql_up = "UPDATE `Blog_Posts` SET View_Count = View_Count+1 WHERE `Blog_Posts`.`Slug` = '$p_id'";
                            //$q=mysqli_query($con,$sql_up);
                           $query =$db->query($sql_up);   
          }
          else
          {
              $result['Status']=false;
              $result['Msg']="Unable to find the Blodddg" .$p_id;
          }
          
          
          
          
          
          
          return $result;
    }
   


 public function CheckUser($mobile)
    {
          $db = \Config\Database::connect();
          
          $builder = $db->table('Users');
          $builder->where('MobileNo', $mobile);
          $query   = $builder->get();  // Produces: SELECT * FROM mytable
          $num_rows=$query->getresult();
         
          if(count($num_rows) > 0)
          {
            $result['Status']=true;
            $result['data']=$query->getResultArray();  
                
          }
          else
          {
              $result['Status']=false;
              $result['Msg']="Unable to find the User" .$mobile;
          }
          
          return $result;
    }
    
    
    
     public function addupdateUser($U_Data)
    {
          //echo "hello";
            //    exit();
          $db = \Config\Database::connect();
          
          $builder = $db->table('Users');
          $builder->where('MobileNo', $U_Data['MobileNo']);
          $query   = $builder->get();  // Produces: SELECT * FROM mytable
          $num_rows=$query->getresult();
         
          if(count($num_rows) > 0)
          {
                //update
                $builder->update($data);
                $result['Status']=true;
                 $result['Msg']="data updated";
                
                
          }
          else
          {
              //insert
               // $sql = $builder->set($U_Data)->getCompiledInsert();
            //    echo $sql;
              //  exit();
              $builder->insert($U_Data);
              $result['UserID']=strval($db->insertID());
              $result['Status']=true;
              $result['Msg']="data Inserted";
          }
          
          return $result;
    }




}

