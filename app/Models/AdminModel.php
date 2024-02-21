<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
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


     public function Login($data)
    {
        $db = \Config\Database::connect();
        
        
        $sql ="SELECT * FROM User where Email='".$data['Email']."' AND Password='".md5($data['Password'])."' ";
       
        //echo $sql;exit();

        $query =$db->query($sql);
        $num_rows=$query->getresult();
        //print_r($query); exit();
        if(count($num_rows) > 0)
        {
            $result['Status']=true;
            $result['Msg']='Login Successfully';
            $result['data']=$query->getRowArray();  
                
        }
        else
        {
            $result['Status']=false;
            $result['Msg']="Something Went Wrong";
        }
   
        
        return $result;
        
    }






    public function UserInsert($data)
    {
        //print_r($data); exit();
        $db = \Config\Database::connect();
        $sql="SELECT * from  User Where  Email='".$data['Email']."'";
        $query =$db->query($sql);
        $num_rows=$query->getresult();
        if(count($num_rows) > 0)
        {
            $result['Status']   = false;
            $result['Msg']      ='Email Id Already Exit';
        } 
        else
        {

        // $query='INSERT INTO `User`(`Email`,`Name`,`MobileNo`,`Gender`,`DOB`,`Password`,
        // `FCM_Token`) VALUES ("'.$data['Email'].'","'.$data['Name'].'","'.$data['MobileNo'].'","'.$data['Gender'].'","'.$data['DOB'].'","'.$data['Password'].'","'.$data['FCM_Token'].'") '; 
        $query='INSERT INTO `User`(`Email`,`Name`,`Password`,
        `FCM_Token`) VALUES ("'.$data['Email'].'","'.$data['Name'].'","'.$data['Password'].'","'.$data['FCM_Token'].'") ';   
        $execute=$db->query($query); 
        $lastrecord=$db->insertID();
        $sql="SELECT * from  User Where  Id ='".$lastrecord."'";
        //echo($sql); exit();
        $query =$db->query($sql);
        $result['data']=$query->getRowArray(); 
        $result['Status']   = true;
        $result['Msg']      = "Login Successfully";

        
       

       }

       return $result;


   




    }


    public function AdminLogin($data)
    {
         $db = \Config\Database::connect();
         $query = $db->query("SELECT * from user where `User_name`='".$data['Email']."' and 
            `Password`='".$data['Password']."'");

            
         //echo "SELECT * from user where `User_name`='".$data['Email']."' and `Password`='".$data['Password']."'";
         //exit();
            
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;
              $result['data']=$query->getRowArray();
              $_SESSION['AdminEmail']=$result['data']['User_name'];
              $_SESSION['Id']=$result['data']['User_id'];
              $_SESSION['AdminName']=$result['data']['Name'];
              $_SESSION['GroupID']=$result['data']['Group_id'];
              $_SESSION['Type']=$result['data']['Type'];

              $db = \Config\Database::connect();         
               $builder = $db->table('permission');
               $builder->select('Module_name');
               $builder-> where('Group_id',$result['data']['Group_id']);
               $query=  $builder->get();
               $permission= $query->getResultArray();
               $_SESSION['Permission']=$permission;
            
         }
         else
         {
             $result['Status']=false;
             $result['Msg']='Something Went wrong';
         }


         return $result;
    }

    Public function webinar_Submit($data)
    {
        //print_r($data); exit();
        $db = \Config\Database::connect();
        $Meeting_Details =$db->escapeString($data['Meeting_Details']);
        $sql="SELECT * FROM `Workshop_Date` WHERE Workshop_Date.Date='".$data['Date']."' and  Workshop_Date.TimeSlot='".$data['TimeSlot']."'";
          //echo($sql); exit;
          $query =$db->query($sql);
          $num_rows=$query->getresult();
          if(count($num_rows) > 0)
          {
             $result['Msg']='This Webinar Already exit.';
           
          }
          else
          {
              $query='INSERT INTO `Workshop_Date`(`Date`,`TimeSlot`,`Meeting_Details`,`LinkActiveTime`) VALUES ("'.$data['Date'].'","'.$data['TimeSlot'].'","'.$Meeting_Details.'","'.$data['LinkActiveTime'].'") ';  
              //echo($query); exit(); 
               $execute=$db->query($query); 
        
              $result['Status']   = true;
              $result['Msg']      = "Inserted Successfully";
              // $db->affectedRows();
          }
            return $result;
    }

    /* All topic */
    public function AllRegistration()
    {
         $db = \Config\Database::connect();
         $query = $db->query("SELECT Registration.*,(SELECT `Date` from  Workshop_Date where `Id`=Registration.`Webinar_Id`) as Webinardate,(SELECT `TimeSlot` from  Workshop_Date where `Id`=Registration.`Webinar_Id`) as TimeSlot  from Registration  group BY `Contact` ");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;
              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
          }

          return $result;

    }

    public function Allwebinar()
    {
         $db = \Config\Database::connect();
         $query = $db->query("SELECT Workshop_Date.*,(SELECT count(`ID`) from Registration where Registration.`Webinar_Id`=Workshop_Date.`Id`) as Total_Reg from Workshop_Date ORDER BY `Id` desc");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;
              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
          }

          return $result;

    }

    public function update_webinar($Id)
     {
         $db = \Config\Database::connect(); 
         $sql="SELECT Workshop_Date.*,(SELECT count(`ID`) from Registration where Registration.`Webinar_Id`='".$Id."') as Total_Reg,(SELECT count(`ID`) from Registration where Registration.`Webinar_Id`='".$Id."' and Registration.`Status`='NonAttendant' ) as NonAttendent from Workshop_Date where Workshop_Date.Id='".$Id."'";
         //echo($sql); exit;
         //$sql="SELECT * from Workshop_Date where Id='".$Id."'";
         $query =$db->query($sql);
         $num_rows=$query->getresult();
           if(count($num_rows) > 0)
              {
             $result['data']=$query->getResultArray(); 
             $result['Status']=true;
           }
           else
         {
             $result['Status']=false;
            }
             return $result;
     }

    public function Webinar_delete($Id)
    {   
           
          $db = \Config\Database::connect();
          $sql="SELECT * FROM `Workshop_Date`,Registration WHERE Registration.`Webinar_Id`=Workshop_Date.Id and Workshop_Date.Id='".$Id."'";
          //echo($sql); exit;
          $query =$db->query($sql);
          $num_rows=$query->getresult();
          if(count($num_rows) > 0)
          {
             $result['Msg']='You can not delete webinar because webinar is ongoing';
           
          }
          else
          {
            $builder = $db->table('Workshop_Date');
            $builder->where('Id', $Id);
            $result['deleted'] =$builder->delete();
        
           if($result['deleted'] ==true)
           {
          
            $result['Msg']='Delete Successfully';
            $result['Status']=true;
             
           }
           else{
             
            $result['Msg']='Something went wrong'; 
            $result['Status']=false; 
           }

         }
   
     return $result;
       
    }

    public function webinarupdate($data)
      {
          $db = \Config\Database::connect();
          // $sql="SELECT * FROM `Workshop_Date` WHERE Workshop_Date.Date='".$data['Date']."' and  Workshop_Date.TimeSlot='".$data['TimeSlot']."'";
          // //echo($sql); exit;
          // $query =$db->query($sql);
          // $num_rows=$query->getresult();
          // if(count($num_rows) > 0)
          // {
          //    $result['Msg']='This Webinar Already exit.';
           
          // }
          // else
          // {

         
          $builder = $db->table('Workshop_Date');
          $builder->where('Id',$data['Id']);
          $builder->update($data);

          $affected_rows = $this->db->affectedRows();
          //echo '<pre>';print_r($affected_rows ); exit();
      
         if ($affected_rows >=0)
         {

            $result['Msg']='Update Successfully';
            $result['Status']=true;

          
          
           
         }
         else
         {

           $result['Msg']='Something went wrong'; 
           $result['Status']=false; 
        
           
          
         }

        // }
        // print_r($result);exit();
         return $result;

      }

    

   


    public function WebinarUserList($Id)
    {
         $db = \Config\Database::connect();
         $query = $db->query("SELECT Workshop_Date.*,Registration.`ID` as RegistrationId ,Registration.`Registration_Date`,Registration.`Name`,Registration.`Contact`,Registration.`Status`,Registration.`Email`,Registration.`Source` from Workshop_Date,Registration where Workshop_Date.`Id`=Registration.`Webinar_Id` and Workshop_Date.Id='".$Id."'");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;
              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
          }

          return $result;

    }


    public function Attend_userlist($Id)
    {
         $db = \Config\Database::connect();
         $query = $db->query("SELECT Workshop_Date.*,Registration.`ID` as RegistrationId,Registration.`Registration_Date`,Registration.`Name`,Registration.`Contact`,Registration.`Status`,Registration.`Email`,Registration.`Source` from Workshop_Date,Registration,Attendence where Workshop_Date.`Id`=Registration.`Webinar_Id` and Attendence.`Webinar_Id`=Workshop_Date.Id and Attendence.`Registration_Id`=Registration.`ID` and  Workshop_Date.Id='".$Id."'");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;
              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
          }

          return $result;

    }

    public function NonAttend_userlist($Id)
    {
         $db = \Config\Database::connect();
         $query = $db->query("  SELECT Workshop_Date.*,Registration.`ID` as RegistrationId,Registration.`Registration_Date`,Registration.`ID`,Registration.`Name`,Registration.`Contact`,Registration.`Status`,Registration.`Email`,Registration.`Source` from Workshop_Date,Registration where Workshop_Date.`Id`=Registration.`Webinar_Id` and  Registration.`ID` NOT IN (SELECT `Registration_Id`  FROM `Registration`, Attendence where Attendence.`Registration_Id`=Registration.`ID` and Registration.`Webinar_Id`='".$Id."') and  Workshop_Date.Id='".$Id."'");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;
              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
          }

          return $result;

    }

  



    public function Attendent($Id)
    {
         $db = \Config\Database::connect();
         $query = $db->query("SELECT Workshop_Date.*,Registration.`Name`,Registration.`Contact`,Registration.`Email`,Registration.`Source` from Workshop_Date,Registration where Workshop_Date.`Id`=Registration.`Webinar_Id` and Workshop_Date.Id='".$Id."'");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;
              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
          }

          return $result;

    }

     public function Attend_list($Id)
    {
         $db = \Config\Database::connect();
         $query = $db->query("SELECT Registration.`Name`,Registration.`Contact`,Registration.`Email`,Registration.`Source`,Registration.`Webinar_date`,(Select `TimeSlot` from  Workshop_Date where Registration.Webinar_Id=Workshop_Date.`Id`)as Timeslot from Registration, Attendence where Registration.`ID`=Attendence.`Registration_Id` and Registration.`Webinar_Id`=Attendence.`Webinar_Id` and Registration.ID='".$Id."'");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;
              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
          }

          return $result;

    }

     /*  Particular Registration view details */

        public function Registrationview($ID)
        {

             $db = \Config\Database::connect();
             $query = $db->query(" SELECT * from Registration where ID='".$ID."' ");
             $num_rows=$query->getresult();
             if(count($num_rows) > 0 )
             {
                  $result['Status']=true;
                  $result['data']=$query->getResultArray();

                 

             }
             else
             {
                 $result['Status']=false;
                 $result['Msg']='No Data Found';
             }

              return $result;

        }

        /*  Particular Registration view details */
        public function Count_records($ID)
        {

             $db = \Config\Database::connect();
             $query = $db->query(" SELECT * from Registration where ID='".$ID."' ");
             $num_rows=$query->getresult();
             if(count($num_rows) > 0 )
             {
                  $result['Status']=true;
                  $result1['data']=$query->getResultArray();
                  //print_r($result1['data'][0]['Contact']); exit;

                  $count = $db->query(" SELECT count(`Webinar_date`) as count from Registration where Contact='".$result1['data'][0]['Contact']."' ");
                   $num_rows1=$count->getresult();
                   $result['count']=$count->getResultArray();

             }
             else
             {
                 $result['Status']=false;
                 $result['Msg']='No Data Found';
             }

              return $result;

         }


          public function Attend_records($ID)
        {

             $db = \Config\Database::connect();
             $query = $db->query(" SELECT count(`Attendence_Id`) as Attend_webinar from Attendence,Registration   where Attendence.`Webinar_Id`=Registration.`Webinar_Id`  and  Attendence.`Registration_Id`=Registration.`ID` and Registration.`ID`='".$ID."'  ");
             $num_rows=$query->getresult();
             if(count($num_rows) > 0 )
             {
                  $result['Status']=true;
                  $result['data']=$query->getResultArray();
              

                  

             }
             else
             {
                 $result['Status']=false;
                 $result['Msg']='No Data Found';
             }

              return $result;

         }


          public function Registered_Webinar($ID)
        {

             $db = \Config\Database::connect();
             $query = $db->query(" SELECT * from Registration where ID='".$ID."' ");
             $num_rows=$query->getresult();
             if(count($num_rows) > 0 )
             {
                  $result['Status']=true;
                  $result1['data']=$query->getResultArray();
                  //print_r($result1['data'][0]['Contact']); exit;

                  $count = $db->query("SELECT Registration.*,(select `TimeSlot` from Workshop_Date where Workshop_Date.`Id`=Registration.`Webinar_Id`)  as Timeslot  from Registration where Contact='".$result1['data'][0]['Contact']."'");
                   $num_rows1=$count->getresult();
                   $result['data']=$count->getResultArray();

             }
             else
             {
                 $result['Status']=false;
                 $result['Msg']='No Data Found';
             }

              return $result;

         }



        public function Feedbacklist()
          {
               $db = \Config\Database::connect();
               $query = $db->query("SELECT * from Feedback");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

          }

          public function Templatelist ()
          {
               $db = \Config\Database::connect();
               $query = $db->query("SELECT * from Template limit 1");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

          }


          public function Template_update($Id)
          {

               $db = \Config\Database::connect();
               $query = $db->query("SELECT * from Template where Temp_id='".$Id."'");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;



          }

          public function update_template($data)
           {

              $db = \Config\Database::connect();
              $builder = $db->table('Template');
              $builder->where('Temp_id ',$data['Temp_id']);
              $builder->update($data);

              $affected_rows = $this->db->affectedRows();
              //echo '<pre>';print_r($affected_rows ); exit();
          
             if ($affected_rows >=0)
             {

                $result['Msg']='Update Successfully';
                $result['Status']=true;

              
              
               
             }
             else
             {

               $result['Msg']='Something went wrong'; 
               $result['Status']=false; 
            
               
              
             }
            // print_r($result);exit();
             return $result;

          }


        public function feedback_status($data)
           {
             
              //print_r($data); exit;
              $db = \Config\Database::connect();
              $builder = $db->table('Feedback');
              $builder->set('EOW', $data['EOW']);
              $builder->where('ID',$data['ID']);
              $builder->update();

              $affected_rows = $this->db->affectedRows();
              //echo '<pre>';print_r($affected_rows ); exit();
          
             if ($affected_rows >0)
             {

                $result['Msg']='Update Successfully';
                $result['Status']=true;

              
              
               
             }
             else
             {

               $result['Msg']='Something went wrong'; 
               $result['Status']=false; 
            
               
              
             }
            // print_r($result);exit();
             return $result;

      }

      /* TrainingList */
        public function Training_Lesson ()
          {
               $db = \Config\Database::connect();
               // $query = $db->query("SELECT * from Training_Lesson");
               $query = $db->query("SELECT Training_Lesson.*,(Select `ChapterTitle` FROM Chapter where Chapter.`Chapter_ID`=Training_Lesson.ChapterId)as ChapterTitle  from Training_Lesson");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

          }

      /* TrainingList*/


      /* Training Insert */


    Public function Lesson_Submit($data)
    {
       $db = \Config\Database::connect();
       
        $dup_slup=$this->Slug_Check($data['Slug'],0);
            if($dup_slup > 0)
            {
                    $result['Msg']= 'Slug: '.$data['Slug'].' Already in use';
                    $result['Status']=false;
            }
            else
            {
                
                    $builder = $db->table('Blog_Posts');
                    $result1['Insert']=$builder->insert($data);
                    
                         $sql = $builder->set($data)->getCompiledInsert();;
                    //echo $sql;
                     //   exit();
                    
                    
                    if($result1['Insert'] ==true)
                    {
                        $result['Status']   = true;
                        $result['Msg']      = "Inserted Successfully";
            
                    }
                    else
                    {
            
                       $result['Msg']='Something went wrong'; 
                       $result['Status']=false; 
            
                    }
            }
            
            return $result;
    }


      /* Training Insert */

    public function Lesson_delete($Topic_ID)
    {
           
        
          $sql="SELECT Image from Blog_Posts where Blog_ID='".$Topic_ID."'";
          $query =$this->db->query($sql);
          $num_rows=$query->getresult();
          if(count($num_rows) > 0 )
             {

          $result1['data']=$query->getResultArray();
          $builder = $this->db->table('Blog_Posts');
          $builder->where('Blog_ID', $Topic_ID);
          $result['deleted'] =$builder->delete();
      
         if($result['deleted'] ==true)
         {
        
          $result['Msg']='Deleted Successfully';
          unlink('./public/uploads/blog_posts/'.$result1['data'][0]['Image']);
          
          $result['Status']=true;
           
         }
         else
         {
           
          $result['Msg']='Something went wrong'; 
          $result['Status']=false; 
         }
              
        }

        else
        {

           $result['Msg']='Something went wrong'; 
           $result['Status']=false; 


        }

            

    // print_r($result);exit();
     return $result;
       
    }


    public function Lesson_Update($Topic_ID )
     {
         $db = \Config\Database::connect(); 
         // $sql="SELECT Topics.*,(SELECT `Chapter_Title` from  Chapters where `Chapter_ID`=Topics.Chapter_ID) as Chapter_Title from Topics where Topic_ID='".$Topic_ID."'";
        $sql="SELECT Blog_Posts.*,(Select Cat_Name from Categories where Categories.CategoriesID=Blog_Posts.Blog_Cat)as LanguageName  from Blog_Posts where Blog_Posts.Blog_ID='".$Topic_ID."' ";
       // $query=$this->db->query("SELECT Blog_ID,Blog_Title,Image,SUBSTRING(Blog_Summary,1,100) as Blog_Summary,Publish_Date,(select Cat_Name from Categories where Categories.CategoriesID=Blog_Posts.Blog_Cat)as CategoryName  from Blog_Posts ORDER BY Blog_Posts.Blog_ID asc");
        
        
        //echo($sql); exit;
         $query =$db->query($sql);
         $num_rows=$query->getresult();
         if(count($num_rows) > 0)
          {
             $result['data']=$query->getResultArray(); 
             $result['Status']=true;
           }
          else
          {

             $result['Status']=false;
          }
             return $result;
     }  

//Function to check Duplicate Slug
      public function Slug_Check($Slug,$BID)
      {
             $db = \Config\Database::connect();
            
            if ($BID ==0)
            {
                 $sql_Slug="SELECT `Blog_ID` FROM `Blog_Posts` where Slug='$Slug'"; 
            }
            else
            {
                 $sql_Slug="SELECT `Blog_ID` FROM `Blog_Posts` where Slug='".$Slug."' and Blog_ID!=".$BID; 
            }
       
                     
            $query = $db->query($sql_Slug);
            $num_rows=$query->getresult();
            
          //
           
            if(count($num_rows) > 0)
            {
                return 1;
            }
            else
            {
                return 0;
            }
          
      }



      public function UpdateLesson_Submit($data)
      {
         $dup_slup=$this->Slug_Check($data['Slug'],$data['Blog_ID']);
            if($dup_slup > 0)
            {
                    $result['Msg']= 'Slug: '.$data['Slug'].' Already in use';
                    $result['Status']=false;
            }
            else
            {
              $builder = $this->db->table('Blog_Posts');
              $builder->where('Blog_ID',$data['Blog_ID']);
              $builder->update($data);
              $affected_rows = $this->db->affectedRows();
                    if ($affected_rows >0)   
                    {
                        $result['Msg']= 'Updated Successfully';
                        $result['Status']=true;
                    }
                    else
                    {
    
                     $result['Msg']=count($num_rows). ' Something went wrong'; 
                    $result['Status']=false; 
                    }
            }
      
        // print_r($result);exit();
         return $result;

      }
      
      
      
      
      /*  For lesson Notes */

      /* Count Lesson  */
      public function Count_lesson()
      {

        // $query = $this->db->query(" SELECT  count(`Topic_ID`)as Totalrecord FROM `Topics` where Chapter_ID='".$data['Chapter_ID']."'");
        $query = $this->db->query("SELECT count(`Blog_ID`)as Totalrecord FROM `Blog_Posts`");
               $num_rows=$query->getresult();
       if(count($num_rows) > 0 )
       {
           
            $result1['data']=$query->getResultArray();
            $result=$result1['data'][0]['Totalrecord'];
        }
        else
        {
           $result['Status']=false;
        }

        return $result;


      }

      /* Count Lesson  */
      public function LessonNotes($data)
      {

              $db = \Config\Database::connect();
               // $query = $db->query("SELECT * from Notes");
               $query = $db->query(" SELECT Notes.*,(SELECT `Couse_Title` from Package where Package.`Course_Id`=Notes.Course_ID )as Course_Title from Notes where Notes.Course_ID='".$data['CourseID']."'");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

      }

        /* NotsList */
        public function Notes ()
          {
               $db = \Config\Database::connect();
               // $query = $db->query("SELECT * from Notes");
               $query = $db->query("SELECT Notes.*,(SELECT `Couse_Title` from Package where Package.`Course_Id`=Notes.Course_ID )as Course_Title from Notes order by Notes.`Notes_Order` asc");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

          }

      /* TrainingList*/

     /* Notes Insert */


    Public function Notes_Submit($data)
    {
        //print_r($data); exit();
        // $db = \Config\Database::connect();

        // $Content=$this->db->escapeString($data['Content']);
       // $Content=real_escape_string($data['Content']);
        //echo($Content); exit;

       // $query='INSERT INTO `Notes`(`Title`,`Description`,`Content`,`Attachment`,`Image`,`Notes_Order`,`DateofPublish`,`Type`,`Language`,`Status`,`Course_ID`) VALUES ("'.$data['Title'].'","'.$data['Description'].'","'.$Content.'","'.$data['Attachment'].'","'.$data['Image'].'","'.$data['Notes_Order'].'","'.$data['DateofPublish'].'","'.$data['Type'].'","'.$data['Language'].'","'.$data['Status'].'","'.$data['Course_ID'].'") ';  
        // $query='INSERT INTO `Notes`(`Title`,`Description`,`Content`,`Attachment`,`Notes_Order`,`Language`,`Status`,`Course_ID`) VALUES ("'.$data['Title'].'","'.$data['Description'].'","'.$Content.'","'.$data['Attachment'].'","'.$data['Notes_Order'].'","'.$data['Language'].'","'.$data['Status'].'","'.$data['Course_ID'].'") ';  
        // //echo($query); exit(); 
        // $execute=$this->db->query($query); 
        // $result['NotesID']=$this->db->insertID();
        // $result['Status']   = true;
        // $result['Msg']      = "Insert Successfully";
       // $db->affectedRows();
          

        $builder = $this->db->table('Notes');
        $result['Insert']=$builder->insert($data);
        if($result['Insert'] ==true)
        {

            $result['Status']   = true;
            $result['Msg']      = "Insert Successfully";

        }
        else
        {

           $result['Msg']='Something went wrong'; 
           $result['Status']=false; 

        }
          return $result;



    }


      /* Notes Insert */

    public function Notes_delete($NotesID)
    {


           
          $db = \Config\Database::connect();
          $sql="SELECT Notes.* from Notes,Training_Lesson where Notes.NotesID=Training_Lesson.Notes_ID and Notes.`NotesID`='$NotesID'";
          $query =$db->query($sql);
          $num_rows=$query->getresult();
          if(count($num_rows) > 0 )
          {
            
            $result['Msg']='Notic Can Not Delete';
            $result['Status']=true;
          }
          else
          {


               $sql="SELECT Attachment,Image from Notes where  NotesID='".$NotesID."'";
          $query =$db->query($sql);
          $num_rows=$query->getresult();
          if(count($num_rows) > 0 )
            {

              $result1['data']=$query->getResultArray();
              // if($result1['data'][0]['Image']!='')
              // {
              //     unlink('./public/uploads/'.$result1['data'][0]['Image']);
              // }

              if($result1['data'][0]['Attachment']!='')
              {

                unlink('./public/uploads/'.$result1['data'][0]['Attachment']);

              }


              $builder = $db->table('Notes');
              $builder->where('NotesID', $NotesID);
              $result['deleted'] =$builder->delete();
      
               if($result['deleted'] ==true)
               {
              
                $result['Msg']='Delete Successfully';
                $result['Status']=true;
                 
               }
               else{
                 
                $result['Msg']='Something went wrong'; 
                $result['Status']=false; 
               }
              


            }
          else
          {

                 $result['Msg']='Something went wrong'; 
                $result['Status']=false; 


          }

          }
         

     
    // print_r($result);exit();
     return $result;
       
    }

    public function Notes_Update($NotesID)
     {
         $db = \Config\Database::connect(); 
         
         $sql="SELECT Notes.*,Package.`Course_Id`,Package.`Couse_Title` from Notes, Package where Package.Course_Id=Notes.Course_ID and Notes.`NotesID`='".$NotesID."'";
         // $sql="SELECT * from Notes where NotesID='".$NotesID."'";
         $query =$db->query($sql);
         $num_rows=$query->getresult();
         if(count($num_rows) > 0)
          {
             $result['data']=$query->getResultArray(); 
             $result['Status']=true;
          }
          else
          {

             $result['Status']=false;
          }
             return $result;
     }

     public function UpdateNotes_Submit($data)
      {

          $db = \Config\Database::connect();
          $builder = $db->table('Notes');
          $builder->where('NotesID',$data['NotesID']);
          $builder->update($data);

          $affected_rows = $this->db->affectedRows();
          //echo '<pre>';print_r($affected_rows ); exit();
      
         if ($affected_rows >=0)
         {

            $result['Msg']='Update Successfully';
            $result['Status']=true;

          
          
           
         }
         else
         {

           $result['Msg']='Something went wrong'; 
           $result['Status']=false; 
        
           
          
         }
        // print_r($result);exit();
         return $result;

      }


       public function feedback_Update($ID)
     {
         $db = \Config\Database::connect(); 
         $sql="SELECT * from Feedback where ID='".$ID."'";
         $query =$db->query($sql);
         $num_rows=$query->getresult();
         if(count($num_rows) > 0)
          {
             $result['data']=$query->getResultArray(); 
             $result['Status']=true;
           }
          else
          {

             $result['Status']=false;
          }
             return $result;
     }

      public function update_feedback($data)
      {

          $db = \Config\Database::connect();
          $builder = $db->table('Feedback');
          $builder->where('ID',$data['ID']);
          $builder->update($data);

          $affected_rows = $this->db->affectedRows();
          //echo '<pre>';print_r($affected_rows ); exit();
      
         if ($affected_rows >=0)
         {

            $result['Msg']='Update Successfully';
            $result['Status']=true;

         }
         else
         {

           $result['Msg']='Something went wrong'; 
           $result['Status']=false; 
        
           
          
         }
        // print_r($result);exit();
         return $result;

      }

        /* NotsList */
        public function Setting ()
          {
               $db = \Config\Database::connect();
               $query = $db->query("SELECT * from Settings");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

          }

      /* TrainingList*/
       public function Setting_Update($S_ID)
          {

               $db = \Config\Database::connect();
               $query = $db->query("SELECT * from Settings where S_ID='".$S_ID."'");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;



          }

           public function update_Setting($data)
           {

              $db = \Config\Database::connect();
              $builder = $db->table('Settings');
              $builder->where('S_ID ',$data['S_ID']);
              $builder->update($data);

              $affected_rows = $this->db->affectedRows();
              //echo '<pre>';print_r($affected_rows ); exit();
          
             if ($affected_rows >=0)
             {

                $result['Msg']='Update Successfully';
                $result['Status']=true;

              
              
               
             }
             else
             {

               $result['Msg']='Something went wrong'; 
               $result['Status']=false; 
            
               
              
             }
            // print_r($result);exit();
             return $result;

      }

        /* NotsList */
        public function Chapter ()
          {
              
               
               // $query=$this->db->query("SELECT Chapter.*,(SELECT `Couse_Title` from Package where Package.`Course_Id`=Chapter.Course_ID )as Course_Title from Chapter ORDER BY Chapter.`Chapter_Order` asc");
            $query=$this->db->query("SELECT Chapters.*,(select LanguageName from Language where Language.LanguageId=Chapters.Language)as Language  from Chapters ORDER BY Chapters.`Chapter_Order` asc");
              
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

          }

        /* Languagelist  */

       
      /* TrainingList*/
      Public function Chapter_Submit($data)
       {
        //print_r($data); exit();
      

      
        $builder = $this->db->table('Chapters');
        $result['Insert']=$builder->insert($data);
        if($result['Insert'] ==true)
        {

            $result['Status']   = true;
            $result['Msg']      = "Insert Successfully";

        }
        else
        {

           $result['Msg']='Something went wrong'; 
           $result['Status']=false; 

        }

         return $result;
       }
       public function Count_Chapter()
      {

        $query = $this->db->query(" SELECT  count(`Chapter_ID`)as Totalrecord FROM `Chapters`");
               $num_rows=$query->getresult();
       if(count($num_rows) > 0 )
       {
           
            $result1['data']=$query->getResultArray();
            $result=$result1['data'][0]['Totalrecord'];
        }
        else
        {
           $result['Status']=false;
        }

        return $result;


      }

    public function Chapter_delete($Chapter_ID)
    {

      $sql="Select Chapters.*,Topics.`Chapter_ID` from Chapters,Topics where Chapters.`Chapter_ID`=`Topics`.`Chapter_ID`and Chapters.`Chapter_ID`='".$Chapter_ID."'";
       //echo($sql); exit;
       $query =$this->db->query($sql);
       $num_rows=$query->getresult();
       if(count($num_rows) > 0 )
        {
           $result['Msg']='Chapter Can Not Delete, its contain topic';
           $result['Status']=true;

        }
      
        else
        {

          $sql="SELECT Chpater_Icon from Chapters where Chapter_ID='".$Chapter_ID."'";
          $query =$this->db->query($sql);
          $num_rows=$query->getresult();
          if(count($num_rows) > 0 )
            {

                $result1['data']=$query->getResultArray();
                if($result1['data'][0]['Chpater_Icon']!=='')
                {
                  unlink('./public/uploads/'.$result1['data'][0]['Chpater_Icon']);
                }


              $builder = $this->db->table('Chapters');
              $builder->where('Chapter_ID', $Chapter_ID);
              $result['deleted'] =$builder->delete();
      
               if($result['deleted'] ==true)
               {
              
                $result['Msg']='Delete Successfully';
                $result['Status']=true;
                 
               }
               else{
                 
                $result['Msg']='Something went wrong'; 
                $result['Status']=false; 
               }



             }
          else
          {

              $result['Msg']='Something went wrong'; 
              $result['Status']=false; 

          }

        }

      

           

    // print_r($result);exit();
     return $result;
       
    }

     public function Chapter_Update($Chapter_ID)
     {
         $db = \Config\Database::connect(); 
        
         // $sql="SELECT Chapter.*,Package.`Course_Id`,Package.`Couse_Title` from Chapter, Package where Package.Course_Id=Chapters.Course_ID and Chapter.Chapter_ID='".$Chapter_ID."'";
          $sql="SELECT Chapters.*,(Select LanguageName from Language where Language.LanguageId=Chapters.Language )as LanguageName  from Chapters where Chapters.Chapter_ID='".$Chapter_ID."' ";
          
         $query =$db->query($sql);
         $num_rows=$query->getresult();
         if(count($num_rows) > 0)
          {
             $result['data']=$query->getResultArray(); 
             $result['Status']=true;
           }
          else
          {

             $result['Status']=false;
          }
             return $result;
     }

     public function UpdateChapter_Submit($data)
      {

          $db = \Config\Database::connect();
          $builder = $db->table('Chapters');
          $builder->where('Chapter_ID',$data['Chapter_ID']);
          $builder->update($data);

          $affected_rows = $this->db->affectedRows();
          //echo '<pre>';print_r($affected_rows ); exit();
      
         if ($affected_rows >=0)
         {

            $result['Msg']='Update Successfully';
            $result['Status']=true;

          
          
           
         }
         else
         {

           $result['Msg']='Something went wrong'; 
           $result['Status']=false; 
        
           
          
         }
        // print_r($result);exit();
         return $result;

      }

      public function Packagelist ()
          {
               $db = \Config\Database::connect();
               $query = $db->query("SELECT * from Package ORDER BY Course_Order asc");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

          }

      /*  Filter-Courselisrt */
        public function filterPackage ($Course_Id)
          {
               $db = \Config\Database::connect();
               $query = $db->query("SELECT * from Package where Course_Id='".$Course_Id."'");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

          }

        public function Package_update($Id)
          {

              
               $query = $this->db->query("SELECT * from Categories where CategoriesID ='".$Id."'");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;



          }


          public function Update_Package($data)
           {

        
              $builder = $this->db->table('Categories');
              $builder->where('CategoriesID',$data['CategoriesID']);
              $builder->update($data);

              $affected_rows = $this->db->affectedRows();
            
          
             if ($affected_rows >=0)
             {

                $result['Msg']='Update Successfully';
                $result['Status']=true;

              
              
               
             }
             else
             {

               $result['Msg']='Something went wrong'; 
               $result['Status']=false; 
            
               
              
             }
         
             return $result;

          }

    public function Registration_update($ID)
     {
         $db = \Config\Database::connect(); 
         $sql="SELECT Registration.*,(Select `Id` from Workshop_Date where Workshop_Date.Id=Registration.Webinar_Id) as webinarID  from Registration where ID='".$ID."' ";
         $query =$db->query($sql);
         $num_rows=$query->getresult();
           if(count($num_rows) > 0)
              {
             $result['data']=$query->getResultArray(); 
             $result['Status']=true;
           }
           else
         {
             $result['Status']=false;
            }
             return $result;
     }

        public function Webinar_datelist()
     {
         $db = \Config\Database::connect(); 
         $sql="SELECT Workshop_Date.Date,Workshop_Date.Id from Workshop_Date";
         $query =$db->query($sql);
         $num_rows=$query->getresult();
           if(count($num_rows) > 0)
              {
             $result['data']=$query->getResultArray(); 
             $result['Status']=true;
           }
           else
         {
             $result['Status']=false;
            }
             return $result;
     }


    public function updateRegistration($data)
      {
          $db = \Config\Database::connect();
          $builder = $db->table('Registration');
          $builder->where('ID',$data['ID']);
          $builder->update($data);

          $affected_rows = $this->db->affectedRows();
          //echo '<pre>';print_r($affected_rows ); exit();
      
         if ($affected_rows >=0)
         {

            $result['Msg']='Update Successfully';
            $result['Status']=true;

          
          
           
         }
         else
         {

           $result['Msg']='Something went wrong'; 
           $result['Status']=false; 
        
           
          
         }

        // }
        // print_r($result);exit();
         return $result;

      }

      public function Leavelist ()
        {
               $db = \Config\Database::connect();
               $query = $db->query("SELECT * from Leaves");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

          }

      Public function Leave_Submit($data)
      {
        //print_r($data); exit();
        $db = \Config\Database::connect();
        $builder = $db->table('Leaves');
        $result['Insert']=$builder->insert($data);
        if($result['Insert'] ==true)
        {

            $result['Status']   = true;
            $result['Msg']      = "Insert Successfully";

        }
        else
        {

           $result['Msg']='Something went wrong'; 
           $result['Status']=false; 

        }

      }

      public function Leave_delete($Leave_Id)
        {   
           
          $db = \Config\Database::connect();
          $builder = $db->table('Leaves');
          $builder->where('Leave_Id', $Leave_Id);
          $result['deleted'] =$builder->delete();
        
           if($result['deleted'] ==true)
           {
          
            $result['Msg']='Delete Successfully';
            $result['Status']=true;
             
           }
           else
           {
             
             $result['Msg']='Something went wrong'; 
             $result['Status']=false; 
           }

       
   
        return $result;
       
        }


      Public function importFile($leads)
      {
        
       //echo '<pre>'; print_r($leads); exit;
       $result=array();
       foreach ($leads as $data) {
        $query =$this->db->query("SELECT *  from Leaves where Leave_MobileNo='".$data['Leave_MobileNo']."'");
        $num_rows=$query->getresult();
        if(count($num_rows) > 0 )
        {

              $builder = $this->db->table('Leaves');
              $builder->where('Leave_MobileNo',$data['Leave_MobileNo']);
              $builder->update($data);


        }
        else
        {


                $builder = $this->db->table('Leaves');
                $result['Insert']=$builder->insert($data);
                if($result['Insert'] ==true)
                {

                    $result['Status']   = true;
                    $result['Msg']      = "Insert Successfully";

                }
                else
                {

                   $result['Msg']='Something went wrong'; 
                   $result['Status']=false; 

                }

        }

       }

      return $result;


      }

    public function AppUserlist()
    {
         $db = \Config\Database::connect();
         $query = $db->query("SELECT Messages.*,User.* FROM `Messages`,User  where `FromUser`=User.User_Id  and
          `Message_value`='0'  order by `MSGDateTime` desc");
         //$query = $db->query("Select * from User");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;

              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
             $result['msg']='No Data';
          }

          return $result;

    }

      public function Readlist()
    {
         $db = \Config\Database::connect();
         $query = $db->query("SELECT Messages.*,User.* FROM `Messages`,User  where `FromUser`=User.User_Id  and
          `Message_value`='1'  order by `MSGDateTime` desc");
         //$query = $db->query("Select * from User");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;

              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
             $result['msg']='No Data';
          }

          return $result;

    }

        public function Msgsendlist($data1)
        {

          //print_r($data); exit;
         $db = \Config\Database::connect();
         // $query = $db->query("SELECT * FROM `Messages` where `FromUser`='".$data['ID']."' and `MessageId`='".$data['MessageId']."'");
          $query = $db->query("SELECT Messages.*,(SELECT `Name` from  `User` where `User_Id`='".$data1['ID']."')as FromUser,(SELECT `Profile_Picture` from  `User` where `User_Id`='".$data1['ID']."')as Profile_Picture,
            (SELECT `Mobile_No` from `User` where `User_Id`='".$data1['ID']."')as Mobile_No,(SELECT `Email` from  `User` where `User_Id`='".$data1['ID']."')as Email  FROM `Messages` where Messages.FromUser='".$data1['ID']."' OR Messages.ToUser='".$data1['ID']."'");

         //$query = $db->query("Select * from User");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;
              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
          }

          return $result;

    }

    Public function Message_Submit($data)
      {
        //print_r($data); exit();
       
        $builder = $this->db->table('Messages');
        $result['Insert']=$builder->insert($data);
        if($result['Insert'] ==true)
        {

            $result['Status']   = true;
            $result['Msg']      = "Message Successfully";

        }
        else
        {

           $result['Msg']='Something went wrong'; 
           $result['Status']=false; 

        }

      }

       public function update_msgstatus($data)
           {


      $sql ="UPDATE `Messages` SET `Message_value`='".$data['Message_value']."',`MSGDateTime`='".$data['MSGDateTime']."' WHERE MessageId ='".$data['MessageId']."'";
        //echo $sql;exit();
              $query = $this->db->query($sql);
              if($query)
              {
                $result['Status']=true;
                
                
                  
              }
              else
              {
                $result['Status']=false;
                
              }
        
             return $result;

          }


           public function Selectlanguage($data)
           {
               $db = \Config\Database::connect();
               // $query = $db->query("SELECT * from Chapter where Language='".$data['Language']."'");
               $query = $db->query("SELECT * from Chapters where Chapter_ID='".$data['Chapter_ID']."' ");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

           }


          public function ChapterView()
          {


               $db = \Config\Database::connect();
               //$query = $db->query("SELECT Blog_ID,Blog_Title,Image,Blog_Summary,Publish_Date,(select Cat_Name from Categories where Categories.CategoriesID=Blog_Posts.Blog_Cat)as CategoryName  from Blog_Posts ORDER BY Blog_Posts.Blog_ID asc");
               //$query=$this->db->query("SELECT Topics.*,(select LanguageName from Language where Language.LanguageId=Topics.Language)as LanguageName  from Topics ORDER BY Topics.`Topic_Order` asc");
               $query=$this->db->query("SELECT Blog_ID,Slug,Blog_Title,Image,SUBSTRING(Blog_Summary,1,100) as Blog_Summary,Publish_Date,(select Cat_Name from Categories where Categories.CategoriesID=Blog_Posts.Blog_Cat)as CategoryName  from Blog_Posts ORDER BY Blog_Posts.Blog_ID desc");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;



          }

            public function Chapterinfo($data)
            {


               $db = \Config\Database::connect();
               $query=$db->query(" SELECT Chapters.*,(Select count(`Topic_ID`) from Topics where
                `Topics`.`Chapter_ID`='".$data['Chapter_ID']."') as TotalLesson,(SELECT LanguageName from Language where Language.LanguageId=Chapters.Language)as Language  from Chapters  where  Chapters.`Chapter_ID`='".$data['Chapter_ID']."'");

               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;



            }


          Public function Package_Submit($data)
          {
            //print_r($data); exit();
           
            $builder =$this->db->table('Categories');
            $result['Insert']=$builder->insert($data);
            $result['LastInsertId']=$this->db->insertID();
            if($result['Insert'] ==true)
            {
                $result['Status']   = true;
                $result['Msg']      = "Insert Successfully";

            }
            else
            {
               $result['Msg']='Something went wrong'; 
               $result['Status']=false; 

            }

            return $result;

          }

          /* Count Course  */
           public function Count_package()
          {

            $query = $this->db->query("SELECT  Max(`Cat_Order`)as Totalrecord FROM `Categories`");
                   $num_rows=$query->getresult();
           if(count($num_rows) > 0 )
           {
               
                $result1['data']=$query->getResultArray();
                $result=$result1['data'][0]['Totalrecord'];
            }
            else
            {
               $result=1;
            }

            return $result;


          }

          /* Count Course  */
 

          public function Package_delete($PackageId)
          {

            
            $sql = "SELECT Blog_Posts.Blog_ID from Blog_Posts where Blog_Cat='$PackageId'";
            $query =$this->db->query($sql);
            $num_rows=$query->getresult();
            if(count($num_rows)>0){
            $result['Msg']='Category used in Blog posts hence can not be deleted.';
            $result['Status']=false;
             }
            else{
             $builder =$this->db->table('Categories');
             $builder->where('CategoriesID ',$PackageId);
             $result['deleted'] =$builder->delete();
             $result['Msg']='Deleted Successfully'; 
              $result['Status']=true;
              }
      
      
            //   $builder =$this->db->table('Package');
            //   $builder->where('PackageId', $PackageId);
            //   $result['deleted'] =$builder->delete();
      
            //    if($result['deleted'] ==true)
            //    {
              
            //     $result['Msg']='Delete Successfully';
            //     $result['Status']=true;
                 
            //    }
            //    else
            //    {
                 
            //     $result['Msg']='Something went wrong'; 
            //     $result['Status']=false; 
            //    }
         return $result;
       
        }

        /* Chapter List */
        public  function Chapterlist()
        {

          $query = $this->db->query("SELECT * from  Topics");
              $num_rows=$query->getresult();
              if(count($num_rows) > 0 )
              {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
              }
              else
              {
                   $result['Status']=false;
              }

              return $result;

        }
        /* Chapter Lis */

        public function SelectLanguage_chapter($data)
         {
            

              // $query = $this->db->query("SELECT Chapters.*,(SELECT `LanguageName` from Language where Language.`LanguageId`=Chapters.Language )as Language,(SELECT `LanguageId` from Language where Language.`LanguageId`=Chapters.Language )as  LanguageId  from Chapters where Chapters.Language ='".$data['LanguageId']."'");
              //$query = $this->db->query("SELECT  Topics.*,(SELECT `LanguageName` from Language where Language.`LanguageId`= Topics.Language )as LanguageName,(SELECT `LanguageId` from Language where Language.`LanguageId`= Topics.Language )as  LanguageId  from Topics where  Topics.Language ='".$data['LanguageId']."'");
              $query=$this->db->query("SELECT Blog_ID,Blog_Title,Image,SUBSTRING(Blog_Summary,1,100) as Blog_Summary,Publish_Date,(select Cat_Name from Categories where Categories.CategoriesID=Blog_Posts.Blog_Cat)as CategoryName  from Blog_Posts where Blog_Posts.Blog_Cat=".$data['LanguageId']);
              
              $num_rows=$query->getresult();
              if(count($num_rows) > 0 )
              {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
              }
              else
              {
                   $result['Status']=false;
              }

              return $result;

          }

           public function NotesView($data)
            {


               $db = \Config\Database::connect();
               $query=$db->query("SELECT Notes.*,(SELECT `Couse_Title` from Package  where Package.Course_Id=Notes.`Course_ID`) as Couse_Title,(Select count(`TrainingLesson_Id`) from Training_Lesson where Training_Lesson.`Notes_ID`='".$data['NotesID']."')as topic from Notes where  Notes.`NotesID`='".$data['NotesID']."'");

               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
                {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;



            }

            /* Count Lesson  */
             public function Count_Notes()
            {

              $query = $this->db->query(" SELECT  count(`NotesID`)as Totalrecord FROM `Notes`");
                     $num_rows=$query->getresult();
             if(count($num_rows) > 0 )
             {
                 
                  $result1['data']=$query->getResultArray();
                  $result=$result1['data'][0]['Totalrecord'];
              }
              else
              {
                 $result['Status']=false;
              }

              return $result;


            }
            /* Count Lesson  */


            public function Topiclist($data)
            {


               $db = \Config\Database::connect();
               $query=$db->query("SELECT Training_Lesson.*,Training_Lesson.Image as lessonImage,Notes.* FROM `Training_Lesson`,`Notes` WHERE Training_Lesson.`Notes_ID`=Notes.`NotesID` and Notes.NotesID='".$data['NotesID']."'");

               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
                {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;



            }

          public function SelectNotes($data)
            {
              
              $query = $this->db->query(" SELECT Notes.*,(SELECT `Couse_Title` from Package where Package.`Course_Id`=Notes.Course_ID )as Course_Title from Notes where Notes.Course_ID='".$data['Course_Id']."' order by Notes.`Notes_Order` asc");
              $num_rows=$query->getresult();
              if(count($num_rows) > 0 )
              {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
              }
              else
              {
                   $result['Status']=false;
              }

              return $result;

           }


        public function ListUser($data)
         {

         $db = \Config\Database::connect();
         if($data['list_msg']=='Read')
           {
         $query = $db->query("SELECT Messages.*,User.* FROM `Messages`,User  where `FromUser`=User.User_Id  and
          `Message_value`='1' and User.`Membership`='".$data['Membership']."' order by `MSGDateTime` desc");
         }
         else
         {

          $query = $db->query("SELECT Messages.*,User.* FROM `Messages`,User  where `FromUser`=User.User_Id  and
          `Message_value`='0' and User.`Membership`='".$data['Membership']."' order by `MSGDateTime` desc");

         }
         //$query = $db->query("Select * from User");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;

              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
             $result['msg']='No Data';
          }

          return $result;

          }


        public function UserApplist()
         {

        
         $query = $this->db->query("SELECT * from User");
         //$query = $db->query("Select * from User");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;

              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
             $result['msg']='No Data';
          }

          return $result;

          }


        public function Usersview($ID)
         {

         $query = $this->db->query("SELECT User.*,(SELECT `Couse_Title` from Package where User.`course_id`= Package.`Course_Id` )as Course_Title from User where User.User_Id='".$ID."'");
         //$query = $db->query("Select * from User");
         $num_rows=$query->getresult();
         if(count($num_rows) > 0 )
         {
              $result['Status']=true;

              $result['data']=$query->getResultArray();
          }
          else
          {
             $result['Status']=false;
             $result['msg']='No Data';
          }

          return $result;

          }

          public function Course_orderlist($ID)
           {

           $query = $this->db->query("SELECT Order_Detali.*,Course_Subscription.*,(SELECT `Couse_Title` from Package where Order_Detali.`Course_ID`=Package.`Course_Id`)as Course_Title from Order_Detali,Course_Subscription where  Course_Subscription.`Course_ID`=Order_Detali.`Course_ID`and Course_Subscription.`Order_Id`=Order_Detali.`Order_Id` and Order_Detali.`User_Id`='".$ID."' and Order_Detali.`User_Id`=Course_Subscription.USER_ID");
           
           //$query = $db->query("Select * from User");
           $num_rows=$query->getresult();
           if(count($num_rows) > 0 )
           {
                $result['Status']=true;

                $result['data']=$query->getResultArray();
            }
            else
            {
               $result['Status']=false;
               $result['msg']='No Data';
            }

            return $result;

            }

          public function ListUserCourse($data)
           {

           $db = \Config\Database::connect();
           if($data['list_msg']=='Read')
           {

              $query = $db->query("SELECT Messages.*,User.* FROM `Messages`,User  where `FromUser`=User.User_Id  and
             `Message_value`='1' and User.`Course_Id`='".$data['Course_Id']."' and User.`Membership`='".$data['Membership']."' order by `MSGDateTime` desc");

           }
           else
           {
                $query = $db->query("SELECT Messages.*,User.* FROM `Messages`,User  where `FromUser`=User.User_Id  and
               `Message_value`='0' and User.`Course_Id`='".$data['Course_Id']."' and User.`Membership`='".$data['Membership']."' order by `MSGDateTime` desc");

           }
           
           //$query = $db->query("Select * from User");
           $num_rows=$query->getresult();
           if(count($num_rows) > 0 )
           {
                $result['Status']=true;

                $result['data']=$query->getResultArray();
            }
            else
            {
               $result['Status']=false;
               $result['msg']='No Data';
            }

            return $result;

            }

          public function Subscriptionlist($ID)
           {

             $query = $this->db->query("SELECT Course_Subscription.*,(SELECT `Couse_Title` from Package where Course_Subscription.Course_ID=Package.Course_Id) as Course_Title,(SELECT `Course_Fees` from Package where Course_Subscription.Course_ID=Package.Course_Id) as Course_Fees,(SELECT `Course_Fee_USD` from Package where Course_Subscription.Course_ID=Package.Course_Id) as `Course_Fee_USD`,(SELECT `Course_Duration` from Package where Course_Subscription.Course_ID=Package.Course_Id) as `Course_Duration` FROM Course_Subscription LEFT JOIN Order_Detali ON Course_Subscription.`Order_Id` = Order_Detali.`Order_Id`  where Course_Subscription.`USER_ID`='".$ID."'");
             $num_rows=$query->getresult();
             if(count($num_rows) > 0 )
              {
                  $result['Status']=true;

                  $result['data']=$query->getResultArray();
              }
              else
              {
                 $result['Status']=false;
                 $result['msg']='No Data';
              }

              return $result;

          }

          /* Review User Listr   */
          public function UserReviewlist()
           {

        
             $query = $this->db->query("SELECT User.`Name`,User.`User_Id`,User.`Profile_Picture`, App_Course_Review.*,(SELECT `Couse_Title` from Package where App_Course_Review.`Course_ID`=Package.`Course_Id`)as Course_Title from User,App_Course_Review where User.User_Id=App_Course_Review.User_ID  ");
          
             $num_rows=$query->getresult();
             if(count($num_rows) > 0 )
             {
                  $result['Status']=true;

                  $result['data']=$query->getResultArray();
              }
              else
              {
                 $result['Status']=false;
                 $result['msg']='No Data';
              }

          return $result;

          }


          /* Review User List */
          /* Review User List Filter */
            public function AppCourseReviewlist($data)
           {
               
                $query = $this->db->query("SELECT User.`Name`,User.`User_Id`,User.`Profile_Picture`, App_Course_Review.*,(SELECT `Couse_Title` from Package where App_Course_Review.`Course_ID`=Package.`Course_Id`)as Course_Title from User,App_Course_Review where User.User_Id=App_Course_Review.User_ID and App_Course_Review.Course_ID='".$data['Course_Id']."' ");
                $num_rows=$query->getresult();
                if(count($num_rows) > 0 )
                {
                      $result['Status']=true;
                      $result['data']=$query->getResultArray();
                }
                else
                {
                     $result['Status']=false;
                }

                return $result;

            }
          /* Course Bannerlist*/
          /*  Review User list Filter  */
          /* Update Review Status */
          public function Review_status($data)
           {
             
              //print_r($data); exit;
          
              $builder = $this->db->table('App_Course_Review');
              $builder->set('Status', $data['Status']);
              $builder->where('Review_ID ',$data['Review_ID']);
              $builder->update();

              $affected_rows = $this->db->affectedRows();
              //echo '<pre>';print_r($affected_rows ); exit();
          
             if ($affected_rows >0)
             {

                $result['Msg']='Status Update Successfully';
                $result['Status']=true;

              
              
               
             }
             else
             {

               $result['Msg']='Something went wrong'; 
               $result['Status']=false; 
            
               
              
             }
            // print_r($result);exit();
             return $result;

      }

          /*Update Review Status  */

          /* Banner List   */
          public function Bannerlist()
           {

        
             $query = $this->db->query("SELECT App_TopBanner.*,Package.Couse_Title as Course_Title,Package.Course_Id FROM `App_TopBanner`,Package WHERE App_TopBanner.CourseID=Package.Course_Id ORDER  BY `BannerID` asc");
          
             $num_rows=$query->getresult();
             if(count($num_rows) > 0 )
             {
                  $result['Status']=true;

                  $result['data']=$query->getResultArray();
              }
              else
              {
                 $result['Status']=false;
                 $result['msg']='No Data';
              }

          return $result;

          }
          /* Banner list */

          /*  Course Bannerlist */
            public function Coursebannerlist($data)
           {
               
                $query = $this->db->query("SELECT App_TopBanner.*,(SELECT `Couse_Title` from Package where Package.`Course_Id`=App_TopBanner.`CourseID` )as Course_Title from App_TopBanner where App_TopBanner.`CourseID`='".$data['Course_Id']."'");
                $num_rows=$query->getresult();
                if(count($num_rows) > 0 )
                {
                      $result['Status']=true;
                      $result['data']=$query->getResultArray();
                }
                else
                {
                     $result['Status']=false;
                }

                return $result;

            }
          /* Course Bannerlist*/

          /* BannerSubmit */
          Public function Banner_Submit($data)
          {
            //print_r($data); exit();
           
            $builder =$this->db->table('App_TopBanner');
            $result['Insert']=$builder->insert($data);
            if($result['Insert'] ==true)
            {

                $result['Status']   = true;
                $result['Msg']      = "Insert Successfully";

            }
            else
            {

               $result['Msg']='Something went wrong'; 
               $result['Status']=false; 

            }

          }


          /* Banner submit */

          /*Banner Delete */
          public function Banner_delete($BannerID)
    {


           
          $db = \Config\Database::connect();
          $sql="SELECT * from App_TopBanner where Status='Active' and BannerID='".$BannerID."'";
          $query =$db->query($sql);
          $num_rows=$query->getresult();
          if(count($num_rows) > 0 )
          {
            
            $result['Msg']='Banner Can not Delete its currently is active';
            $result['Status']=true;
          }
          else
          {


          $sql="SELECT  image from  App_TopBanner where  BannerID='".$BannerID."'";
          $query =$db->query($sql);
          $num_rows=$query->getresult();
          if(count($num_rows) > 0 )
            {

              $result1['data']=$query->getResultArray();
              // if($result1['data'][0]['Image']!='')
              // {
              //     unlink('./public/uploads/'.$result1['data'][0]['Image']);
              // }

              if($result1['data'][0]['image']!='')
              {

                unlink('./public/uploads/'.$result1['data'][0]['image']);

              }


              $builder = $db->table('App_TopBanner');
              $builder->where('BannerID', $BannerID);
              $result['deleted'] =$builder->delete();
      
               if($result['deleted'] ==true)
               {
              
                $result['Msg']='Delete Successfully';
                $result['Status']=true;
                 
               }
               else{
                 
                $result['Msg']='Something went wrong'; 
                $result['Status']=false; 
               }
              


            }
          else
          {

                 $result['Msg']='Something went wrong'; 
                $result['Status']=false; 


          }

          }
         

     
    // print_r($result);exit();
     return $result;
       
    }

    /* Banner Delete */

    /* BsnnerUpdate  */
     public function Banner_Update($BannerID)
     {
        
  
         $sql="SELECT App_TopBanner.*,Package.`Course_Id`,Package.`Couse_Title` from App_TopBanner, Package where Package.Course_Id=App_TopBanner.CourseID and App_TopBanner.BannerID='".$BannerID."'";
         $query =$this->db->query($sql);
         $num_rows=$query->getresult();
         if(count($num_rows) > 0)
          {
             $result['data']=$query->getResultArray(); 
             $result['Status']=true;
           }
          else
          {

             $result['Status']=false;
          }
             return $result;
     }


    /* BannerUpdate   */

     public function Bannerupdate_Submit($data)
      {

          $db = \Config\Database::connect();
          $builder = $db->table('App_TopBanner');
          $builder->where('BannerID',$data['BannerID']);
          $builder->update($data);

          $affected_rows = $this->db->affectedRows();
          //echo '<pre>';print_r($affected_rows ); exit();
      
         if ($affected_rows >=0)
         {

            $result['Msg']='Update Successfully';
            $result['Status']=true;

          
          
           
         }
         else
         {

           $result['Msg']='Something went wrong'; 
           $result['Status']=false; 
        
           
          
         }
        // print_r($result);exit();
         return $result;

      }

      /* App Userfilter According to Couse And memberships */
       public function AppCouseUserslist($data)
           {

           $db = \Config\Database::connect();
           if($data['Membership']=='Both')
           {

              $query = $db->query("SELECT User.* FROM  User  where User.`Course_Id`='".$data['Course_Id']."'  order by `User_Id` asc");

           }
           else
           {
                $query = $db->query("SELECT User.* FROM  User where  User.`Course_Id`='".$data['Course_Id']."' and User.`Membership`='".$data['Membership']."' order by `User_Id` asc");

           }
           
           //$query = $db->query("Select * from User");
           $num_rows=$query->getresult();
           if(count($num_rows) > 0 )
           {
                $result['Status']=true;

                $result['data']=$query->getResultArray();
            }
            else
            {
               $result['Status']=false;
               $result['msg']='No Data';
            }

            return $result;

            }

      /* App Userfilter According to Course And Menbership  */


      /*  Course Subscription */
      public function Subscription($data)
        {

        $query='INSERT INTO `Order_Detali`(`Order_Date`,`User_Id`,`Order_ReferenceNo`,`Amount`,`Razorpay_Status`,`Course_ID`) VALUES ("'.$data['Order_Date'].'","'.$data['UserId'].'","'.$data['Order_ReferenceNo'].'","'.$data['Amount'].'","Completed","'.$data['Course_Id'].'")'; 
        // echo($query); exit;
        $execute=$this->db->query($query); 
        $lastrecord=$this->db->insertID();

        $update="UPDATE Course_Subscription SET Subs_Date_PAID='".$data['Subs_Date_PAID']."',Membership_Status='Paid',Order_Id='".$lastrecord."' where USER_ID='".$data['UserId']."' and Course_ID ='".$data['Course_Id']."'";
        //echo($update); exit;

        $executeupdate=$this->db->query($update); 
       
        $sql_to_execute="UPDATE `User` SET `Membership`='Paid',`course_id`='".$data['Course_Id']."' WHERE `User_Id`='".$data['UserId']."'";
        //echo( $sql_to_execute); exit;
        $executeuser=$this->db->query($sql_to_execute); 
      
  
        $result['Status']   = true;
        $result['Msg']      = "Payment Successfully";
             
          return $result;

         }

      /* Course Subscription  */
           
      /*  Display course Price according to Id  */
      public function Selectcourseprice($data)
         {
            
      
             $sql="SELECT * FROM `Package` WHERE `Course_Id`='".$data['CourseId']."' ";
             $query =$this->db->query($sql);
             $num_rows=$query->getresult();
             if(count($num_rows) > 0)
              {
                 $result['data']=$query->getResultArray(); 
                 $result['Status']=true;
               }
              else
              {

                 $result['Status']=false;
              }
                 return $result;
         }


      /* Display course price according to Id  */

      /* Package List  */
      public function Packages()
          {
              
               $query = $this->db->query("SELECT * from Categories");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

          }


      /* Package List  */

      /* Add Language*/

      public function AddTags($data)
       {
           
            // print_r($data); exit;
            $builder = $this->db->table('Tags_Master');
            $result['Insert']=$builder->insert($data);
            if($result['Insert'] ==true)
            {

                $result['Status']   = true;
                $result['Msg']      = "Inserted Successfully";

            }
            else
            {

               $result['Msg']='Something went wrong'; 
               $result['Status']=false; 

            }
          return $result;
       }

        public function LanguageUpdate($data)
        {
            $sql="SELECT * from Tags_Master where Tag_ID='".$data['LanguageId']."'";
                 // echo($sql); exit;
                $query =$this->db->query($sql);
                $num_rows=$query->getresult();
                if(count($num_rows) > 0)
                  {
                     $result=$query->getRowArray();
                     
                  }
                else
                  {

                     $result['Status']=false;
                  }
                return $result;

        }
        /* Update Language  */
         public function UpdateLanguage($data)
          {

              $builder = $this->db->table('Tags_Master');
              $builder->where('Tag_ID ',$data['Tag_ID']);
              $builder->update($data);

              $affected_rows = $this->db->affectedRows();
                //echo '<pre>';print_r($affected_rows ); exit();
            
              if ($affected_rows >=0)
              {

                  $result['Msg']='Tag Updated Successfully';
                  $result['Status']=true;
              }
              else
              {

                 $result['Msg']='Something went wrong'; 
                 $result['Status']=false; 
              }
              // print_r($result);exit();
               return $result;

          }

        /* Update Language */

        /* Delete Language */
        public function TagDelete($Tag_Name)
        {
            $Tag_Name=str_replace('%20',' ',$Tag_Name);
             
             $sql = "SELECT * FROM `Blog_Posts` where TAGS like '%$Tag_Name%'";
             $query =$this->db->query($sql);
             $num_rows=$query->getresult();
             
             if(count($num_rows)>0){
               $result['Msg']='Tag already used in blog';
               $result['Status']=false;
             }
             else{
                $builder =$this->db->table('Tags_Master');
                $builder->where('Tag_Name ',$Tag_Name);
                $result['deleted'] =$builder->delete();
                $result['Msg']='Deleted Successfully'; 
                $result['Status']=true;
             }
             
             
        
              return $result;
        

        }


 /*  Tag List */
        public function TagList()
        {

              $query=$this->db->query("SELECT * from Tags_Master Order by Tag_ID");
              
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

        }






        /*  Delete Language */
        public function Languagelist()
        {
              $query=$this->db->query("SELECT * FROM `Categories`");
              
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

        }





        /*  Filter Chapter According to language */
           public function filterLanguage ($LanguageId)
          {
               $db = \Config\Database::connect();
               $query = $db->query("SELECT * from Categories where CategoriesID='".$LanguageId."'");
               $num_rows=$query->getresult();
               if(count($num_rows) > 0 )
               {
                    $result['Status']=true;
                    $result['data']=$query->getResultArray();
                }
                else
                {
                   $result['Status']=false;
                }

                return $result;

          }

        /* Filter Chapter According to Language */

        /* Insert PackageChapters */
        public function PackageChapter($data)
        {
           $Chapters=explode(",",$data['Chapter']);

           $i=0;
           foreach ($Chapters as $ChapterId) {
           $query = $this->db->query("SELECT * from Package_Chapters where Language_Id='".$data['Language']."' and Chapter_Id='".$ChapterId."' and Package_Id='".$data['PackageId']."'");
           $num_rows=$query->getresult();
           if(count($num_rows) > 0 )
           {
               
           }
           else
           {

              $query='INSERT INTO `Package_Chapters`(`Language_Id`,`Chapter_Id`,`Package_Id`) VALUES ("'.$data['Language'].'","'.$ChapterId.'","'.$data['PackageId'].'") ';   

              $execute=$this->db->query($query);
              $lastid[$i]=$this->db->insertID();
              $update='Update  Package_Chapters SET P_Chapter_OrderId="'.$lastid[$i].'" where   P_chapterId="'.$lastid[$i].'" ';
              $execute1=$this->db->query($update);


           }
           $i++;

            

           }
          $result['Status']   = true;
          $result['Msg']      = "Package Chapter Insert Successfully";

         return $result; 
           
        }
        /* Insert PackageChapters */

        /* Package Chapter List  */
        public function Package_Chapters($PackageId)
        {

           $query = $this->db->query("SELECT Package_Chapters.*,(SELECT `LanguageName` from Language where Language.LanguageId=Package_Chapters.Language_Id )as Language,(SELECT Title from Topics WHERE Topics.`Topic_ID`=Package_Chapters.Chapter_Id )as ChapterTitle FROM `Package_Chapters` WHERE `Package_Id`='".$PackageId."'");
           $num_rows=$query->getresult();
           if(count($num_rows) > 0 )
           {
                $result['Status']=true;
                $result['data']=$query->getResultArray();
            }
            else
            {
               $result['Status']=false;
            }

                return $result;
           
        }
        /* Package Chapter List  */
        public function Package_Lang_Chapter($data)
        {
            
          
           $query = $this->db->query("SELECT Package_Chapters.*,(SELECT `LanguageName` from Language where Language.LanguageId=Package_Chapters.Language_Id )as Language,(SELECT Title from Topics WHERE Topics.`Topic_ID`=Package_Chapters.Chapter_Id )as ChapterTitle FROM `Package_Chapters` WHERE `Package_Id`='".$data['PackageId']."' and `Language_Id`='".$data['LanguageId']."' ");
           $num_rows=$query->getresult();
           if(count($num_rows) > 0 )
           {
                $result['Status']=true;
                $result['data']=$query->getResultArray();
            }
            else
            {
               $result['Status']=false;
            }

                return $result;
           
        }
        /* Package Chapter List  */

      

        /* Chapter Package Dele */
          public function Package_Chapters_Delete($P_chapterId)
          {

      
              $builder =$this->db->table('Package_Chapters');
              $builder->where('P_chapterId',$P_chapterId);
              $result['deleted'] =$builder->delete();
      
               if($result['deleted'] ==true)
               {
              
                $result['Msg']='Delete Successfully';
                $result['Status']=true;
                 
               }
               else
               {
                 
                $result['Msg']='Something went wrong'; 
                $result['Status']=false; 
               }
              
            return $result;
       
        }
        /* Chapter Package Delete  */

        /* Package Chapter Update  */
        public function PackageChapter_update($data,$PackageId)
           {
              //echo '<pre>'; print_r($data);
              $query = $this->db->query("SELECT * from Package_Chapters where Language_Id='".$data['Language_Id']."' and Chapter_Id='".$data['Chapter_Id']."' and Package_Id='".$PackageId."'");
              $num_rows=$query->getresult();
             if(count($num_rows) > 0 )
              {
                  $data1['P_Chapter_OrderId']=$data['P_Chapter_OrderId'];
                  $builder = $this->db->table('Package_Chapters');
                  $builder->where('P_chapterId',$data['P_chapterId']);
                  $builder->update($data1);
                  $result['Msg']='Update Successfully';
                  $result['Status']=true;
              }
             else
             {

                $builder = $this->db->table('Package_Chapters');
                $builder->where('P_chapterId',$data['P_chapterId']);
                $builder->update($data);
                $affected_rows = $this->db->affectedRows();
                if ($affected_rows >=0)
                {

                 //echo 'first'; exit;
                $result['Msg']='Update Successfully';
                $result['Status']=true;

                }
               else
               {


              // echo 'second'; exit;
               $result['Msg']='Something went wrong'; 
               $result['Status']=false; 
               
               }

             }
              
         
             return $result;

          }

        /* Package Chapter Update  */
        /* Media Gallery  */
         public function display_media()
         {
            $query = $this->db->query("SELECT * FROM Media_LIbrary ORDER BY `Media_Id` desc");
            $num_rows=$query->getresult();
            if(count($num_rows) > 0 )
            {
              $result['status']=true;
              $result['data']=$query->getResultArray();
            }
           else
            {
             $result['Status']=false;
            }

          return $result;

         }
        /* Media Gallery */

        /* Submit Gallery */
        public function AddmediaPost($data)
        {
            // print_r($data); exit;
            $builder = $this->db->table('Media_LIbrary');
            $result['Insert']=$builder->insert($data);
            if($result['Insert'] ==true)
            {

                $result['Status']   = true;
                $result['Msg']      = "Insert Successfully";

            }
            else
            {

               $result['Msg']='Something went wrong'; 
               $result['Status']=false; 

            }
          return $result;
       }
        /* Submit Gallery */

      public function delete_media($Media_Id)
        {


          $sql="SELECT  Media_Img from Media_LIbrary where Media_Id='".$Media_Id."'";
          $query =$this->db->query($sql);
          $num_rows=$query->getresult();
          if(count($num_rows) > 0 )
            {

              $result1['data']=$query->getResultArray();
              if($result1['data'][0]['Media_Img']!='')
              {

                unlink('./public/uploads/'.$result1['data'][0]['Media_Img']);

              }


              $builder = $this->db->table('Media_LIbrary');
              $builder->where('Media_Id', $Media_Id);
              $result['deleted'] =$builder->delete();
      
               if($result['deleted'] ==true)
               {
              
                $result['Msg']='Delete Successfully';
                $result['Status']=true;
                 
               }
               else{
                 
                $result['Msg']='Something went wrong'; 
                $result['Status']=false; 
               }
              


            }
          else
          {

                 $result['Msg']='Something went wrong'; 
                $result['Status']=false; 


          }

          
         

     
    // print_r($result);exit();
     return $result;
       
    }

    /*  Unpublish Package  */
    public function unpublish($data)
          {

              $builder = $this->db->table('Package');
              $builder->where('PackageId ',$data['PackageId']);
              $builder->update($data);

              $affected_rows = $this->db->affectedRows();
                //echo '<pre>';print_r($affected_rows ); exit();
            
              if ($affected_rows >=0)
              {

                  $result['Msg']='Publish Successfully';
                  $result['Status']=true;
              }
              else
              {

                 $result['Msg']='Something went wrong'; 
                 $result['Status']=false; 
              }
              // print_r($result);exit();
               return $result;

          }
    /*  Unpublish Package */


    public function Nikhil_display()
{
    
       $query = $this->db->query("Select * from Nikhil");

       $number_rows = $query->getresult();

       if(count($number_rows)>0){

              $result['status'] = true;

              $result['data'] = $query->getResultArray();
       }

       else

       {

              $result['status'] = false;

       }

       return $result;

       }  
       
       public function changePassword($data,$User_ID)
       {
            if(!strcmp($data['password'], $data['confirmPass']))
                {
                   $query=$this->db->query("select * from Admin where Id='$User_ID'");
                  // echo '$query';
                    $number_rows = $query->getresult();
    
                    if(count($number_rows)>0)
                     {
                       $result['data'] = $query->getRowArray();
    
                     if($data['currentPass']==$result['data']['Password'])
                     {
                          $data1['Password']=md5($data['password']);
                           $builder = $this->db->table('Admin');
    
                          $builder->where('Id',$User_ID);
             
                          $builder->update($data1);  
                           $result['Status']=true;
                           $result['msg']= 'Password Changed Successfully';
                      }
                        else
                         {
                            $result['msg']='Password not matched ';
                            $result['Status']=false;
                         }
                }
             } 
              else{
                $result['msg']='Current Password and confirm password is not matched ';
                $result['Status']=false;
                }
               return($result);

            }
       

   public function user(){
    
      $query = $this->db->query("SELECT count(`Blog_ID`) as countu FROM `Blog_Posts`");
      $number_rows = $query->getresult();
      if(count($number_rows)>0){

         $result['status'] = true;
         $result['data'] = $query->getResultArray();
          }
        
          else
        
          {
        
                 $result['status'] = false;
        
          }
          return $result;
         // return view('Dashboard');
   }
   public function initChart() {
       $query=$this->db->query("SELECT Count(Blog_ID) as CUID,(select Cat_Name from Categories where Categories.CategoriesID=Blog_Posts.Blog_Cat)as Package_Name  FROM `Blog_Posts` group by Blog_Cat"); 
       $number_rows = $query->getresult();
      $data['products'] = $query->getResultArray();    
       return $data; 
                  
  }

  public function PaymentsList(){
   $query=$this->db->query("SELECT * from Payments");
              
   $num_rows=$query->getresult();
   if(count($num_rows) > 0 )
   {
        $result['Status']=true;
        $result['data']=$query->getResultArray();
    }
    else
    {
       $result['Status']=false;
    }

    return $result;

  }

  public function AddPayments($data){
      // print_r($data); exit;
      $builder = $this->db->table('Payments');
      $result['Insert']=$builder->insert($data);
      if($result['Insert'] ==true)
      {

          $result['Status']   = true;
          $result['Msg']      = "Insert Successfully";

      }
      else
      {

         $result['Msg']='Something went wrong'; 
         $result['Status']=false; 

      }
    return $result;
  }
  

  public function PaymentDelete($Payment_ID)
  {

       $builder =$this->db->table('Payments');
       $builder->where('Payment_ID ',$Payment_ID);
       $result['deleted'] =$builder->delete();
      
      if($result['deleted'] ==true)
        {
        
          $result['Msg']='Delete Successfully';
          $result['Status']=true;
           
        }
      else
        {
            $result['Msg']='Something went wrong'; 
            $result['Status']=false; 
        }

        return $result;  
  }

  public function PaymentUpdate($data)
  { 
      $sql="SELECT * from Payments where Payment_ID='".$data['Payment_ID']."'" ;
      // echo($sql); exit;
          $query =$this->db->query($sql);
          $num_rows=$query->getresult();
          if(count($num_rows) > 0)
            {
               $result=$query->getRowArray();
            
            }
          else
            {  

               $result['Status']=false;
            }
          return $result;
 
  }

  public function UpdatePayment($data)
  {
       //print_r($data); exit;
      $builder = $this->db->table('Payments');
      $builder->where('Payment_ID',$data['Payment_ID']);
      $builder->update($data);
 
      $affected_rows = $this->db->affectedRows();
       
      if ($affected_rows >=0)
      {
          $result['Status']=true;
          $result['Msg']='Payment Updated Successfully';
      }
      else
      { 
         $result['Status']=false; 
         $result['Msg']='Something went wrong'; 
      }
       return $result;

  }

  public function PaymentNow($data)
  { 
      $sql="SELECT * from Payments where Payment_ID='".$data['Payment_ID']."'" ;
      // echo($sql); exit;
          $query =$this->db->query($sql);
          $num_rows=$query->getresult();
          if(count($num_rows) > 0)
            {
               $result=$query->getRowArray();
            
            }
          else
            {  

               $result['Status']=false;
            }
          return $result;
 
  }


  public function ReferEarn(){
   $query=$this->db->query("SELECT * from User");
   $num_rows=$query->getresult();
   $result=array();
   $i=0;
   if (count($num_rows)> 0)
   {
       $result['Status']=true;
       foreach($query->getResultArray() as $row){
         
         
         //  $result['data'][$i]['User_Id']=$row['User_Id'];
         //  $result['data'][$i]['Name']=$row['Name'];
         //  $result['data'][$i]['Referral_Code']=$row['Referral_Code'];
           $Ref_Code=$row['Referral_Code'];
         
         
           
           //--------- Total Referal------ 
             $sql = "SELECT COUNT(User_Id) as Tot FROM `User` where Referred_BY ='$Ref_Code'";
             $queryfirst=$this->db->query($sql);
             $row_first = $queryfirst->getResultArray();
             //$result['data'][$i]['Total_Referral']=$row_first[0]['Tot'];
            //----- End of  Array -----
           
         
           //$result['data'][$i]['Total_Referral']=rand(10,99);

          // $Ref_Code=$row['Referral_Code'];
           
            //--------- Total Paid Referal------
            $sql2 = "SELECT COUNT(User_Id) as Tot_Paid FROM `User` where Referred_BY ='$Ref_Code' and Membership='Paid'";
            $query2=$this->db->query($sql2);
            $row2 = $query2->getResultArray();
            
            $paid_referral=$row2[0]['Tot_Paid'];
            //$result['data'][$i]['Tot_Paid']=$row2[0]['Tot_Paid'];
            
           //$result['data'][$i]['Paid_Referral']=rand(10,99);


 
            //--------- Total Amount Earned ------
            $sql3 = "SELECT refrerral_amt FROM Admin";
            $query3=$this->db->query($sql3);
            $row3 = $query3->getResultArray();
            $Amt=$row3[0]['refrerral_amt'];
            $Amt_Earned=$Amt*$paid_referral; 
            

                     
            //--------- Total Payment Received------
            $User_ID=$row['User_Id'];
            $sql4 = "SELECT Sum(Amount) as Tot_amt FROM `Payments` where User_ID='$User_ID'";
            $query4=$this->db->query($sql4);
            $row4 = $query4->getResultArray();
            
            if($row4[0]['Tot_amt']==null)
            {
               $Pmt_received=0;
            }
            else
            {
               $Pmt_received=$row4[0]['Tot_amt'];
            }
            
            
            //Balance Calculation
            $Bal=$Amt_Earned-$Pmt_received;
           //Showing only records in which payment is pending
            If ($Bal>0)
            {            
                //User Data
                $result['data'][$i]['User_Id']=$row['User_Id'];
                $result['data'][$i]['Name']=$row['Name'];
                $result['data'][$i]['Referral_Code']=$row['Referral_Code'];
                
                //Total referral
                $result['data'][$i]['Total_Referral']=$row_first[0]['Tot'];
                
                //Paid Referral -- 3343
                $result['data'][$i]['Tot_Paid']=$row2[0]['Tot_Paid'];
                
                //Amount Earned
                $result['data'][$i]['Amt_Earned']=$Amt_Earned;
                //Payment Received
                $result['data'][$i]['Pmt_received']=$Pmt_received;
               // BALANCE 
               $result['data'][$i]['Balance']=$Bal;
            }
          
          
          //Counter 
           $i++;
       
           
           
           
        
       }
   }
   else
   {
        $result['Status']=false;
   }
   
   
   /*
   if(count($num_rows) > 0 )
   {
        $result['Status']=true;
        $result['data']=$query->getResultArray();
    }
    else
    {
       $result['Status']=false;
    }
*/
    return $result;

  }
  
//Calculating refer and Earn data  
/*
  public function ReferAndEarn(){
  
   $sql = "SELECT COUNT(User_Id) as Tot FROM `User` where Referred_BY ='$Ref_Code'";
   $queryfirst=mysqli_query($con,$sql);
   $row = mysqli_fetch_assoc($queryfirst);
   
   $result['Tot_Referral']=$row['Tot'];
    echo json_encode( $result);
}
*/


}