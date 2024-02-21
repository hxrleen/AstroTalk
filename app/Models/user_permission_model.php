<?php namespace App\Models;

use CodeIgniter\Model;

class user_permission_model extends Model
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

    
public function permission_parameter($group_id,$module,$action){

    $db = \Config\Database::connect();         

    $builder = $db->table('permission');
    $builder-> where('Module_name',$module);
    $builder-> where('Group_id',$group_id);
    $query=  $builder->get();
    $num_rows=$query->getresult();
  
    if(count($num_rows) > 0)
    {
        
        //$access=true;
       $result=$query->getResultArray();  
       $value=0; 

       if  ($action == 'read')
       {
            $value=$result[0]['read'];
       }
       else if ($action == 'add')
       {
             $value=$result[0]['add'];
       }
       else if($action == 'update')
       {
            $value=$result[0]['update'];
       }
       else// Delete
       {
             $value=$result[0]['delete'];
       }
       
        if ($value==1)
        {
            $access=true;
        }
        else
        {
            $access=false;
        }
    }
    else
    {
       $access=false;
    }
                    
    
    return $access;
}



}