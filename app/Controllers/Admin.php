<?php namespace App\Controllers;
use CodeIgniter\Controller;

use App\Models\AdminModel;



class Admin extends BaseController

{


     
    protected $helpers = [];

    protected $session;



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
  
  
  public function Sitemap()
    {
        $model= new AdminModel();
        //Categories
        $result['cat'] = $model->Packages();
        
        //Tags
         $result['tags'] = $model->TagList();
        //Blogs
        $result['items'] = $model->ChapterView();
        //echo "hello";exit();
        return view('sitemap', $result);
    }

  public function Dashboard()
  {
   $model= new AdminModel();
   $result['Countdata']=$model->user();
   $result['Chart']=$model->initChart();
      return view('Dashboard',$result);
 
  }

  public function AdminLogin()
  {
       $data=array();
       $data['Email']=$this->request->getpost('Email');
       $data['Password']=md5($this->request->getpost('Password'));
       $model= new AdminModel();
       $result['Data']=$model->AdminLogin($data);
       $result['Countdata']=$model->user();
       $result['Chart']=$model->initChart();
       if($result['Data']['Status']==true)
       {
           return view('Dashboard',$result);
       }
       else
       {
          return view('Login');
       }
  }
  

/* Topic Insert  */

public function webinar_Insert()
{
   if (isset($_SESSION['AdminName']))
   {
      return view('Webinar_Insert');
   }
   else
   {
      return view('Login');
   }
    
}

public function webinar_Submit()
{


   
    $data['Date']=$this->request->getpost('Date');
    $data['Meeting_Details']=$this->request->getpost('Meeting_Details');
    $data['TimeSlot']=$this->request->getpost('TimeSlot');
    $data['LinkActiveTime']=$this->request->getpost('LinkActiveTime');
    //print_r($data); exit;
    $model = new AdminModel();
    $result['Msg']=$model->webinar_Submit($data);
    $result['Data'] = $model->Allwebinar();
    

    return view('Webinarlist',$result);

}

/* Topic Insert */
public function update_webinar($Id)
{    
    if (isset($_SESSION['AdminName']))
    {
       $model = new AdminModel();
       $result['Data']=$model->update_webinar($Id);
      //print_r($result);exit();
      return view('Updatewebinar',$result);
        
     }
     else
       {
        return view('Admin/Login');
       }
    
    }


public function webinarupdate()
  
  {
    if (isset($_SESSION['AdminName']))
    {
      

      $model = new AdminModel();   
      $data['Id']=$this->request->getpost('Id'); 
      $data['Date']=$this->request->getpost('Date');
      $data['Meeting_Details']=$this->request->getpost('Meeting_Details');
      $data['TimeSlot']=$this->request->getpost('TimeSlot'); 
      $data['LinkActiveTime']=$this->request->getpost('LinkActiveTime');  
      //print_r($data['LinkActiveTime']); exit;
      $model = new AdminModel();
      $result['Msg']=$model->webinarupdate($data);
      $result['Data'] = $model->Allwebinar();
      

      return view('Webinarlist',$result);
      
      
    }
     else
       {
        return view('Admin/Login');
       }
      
  }

/*  Topic Update   */


/* All Registration  */
public function AllRegistration()
{
   if (isset($_SESSION['AdminName']))
   {
       $model = new AdminModel();
       $result['Data'] = $model->AllRegistration();
       return view('Registrationlist.php',$result);
   }
   else
   {
      return view('Login');
   }
    
}


/*All Registration   */

/* Registration View  */
public function Registrationview()
{

   $request = \Config\Services::request();
    $uri = $request->uri;
    $ID  = $uri->getSegment(3); 
    $model = new AdminModel();
    $result['Registration']= $model->Registrationview($ID);
    $result['Count_user']=$model->Count_records($ID);
    $result['Attend']=$model->Attend_records($ID);
    $result['Attend_list']=$model->Attend_list($ID);
    $result['Registered_Webinar']=$model->Registered_Webinar($ID);
    //print_r($result['Registered_Webinar']); exit;
    return view('Registration_view.php',$result);
   //echo '<pre>'; print_r($result); exit;

  //echo($ID); exit;

}

/* Registration View  */


/* All Registration  */
public function Allwebinar()
{
   if (isset($_SESSION['AdminName']))
   {
       $model = new AdminModel();
       $result['Data'] = $model->Allwebinar();
       //print_r($result['Data']); exit;
       return view('Webinarlist.php',$result);
   }
   else
   {
      return view('Login');
   }
    
}


/*All Registration   */


/* Delete Topic  */
  public function Webinar_delete($Id)
    {    
        if (isset($_SESSION['AdminName']))
        {
      
         $model = new AdminModel();
         $result['Msg']= $model->Webinar_delete($Id);
        
         $result['Data'] = $model->Allwebinar();
         return view('Webinarlist',$result);
     }
     else
       {
     
      return view('Admin/Login');
    


       }
    
    }

public function Webinarview()
{

  $request = \Config\Services::request();
    $uri = $request->uri;
    $Id = $uri->getSegment(3);

    if($Id=='') 
    {
      $Id = $this->request->getpost('Id');  
    }

    //echo($Id); exit;
  
    $model = new AdminModel();
    $result['Webinar']= $model->update_webinar($Id);
    $result['UserList']=$model->WebinarUserList($Id);
   
    return view('Webinar_view.php',$result);
    //echo '<pre>';print_r($result['Webinar']); exit;

  //echo($ID); exit;

}

public function Attend_userlist()
{

    $request = \Config\Services::request();
    $Id = $this->request->getpost('Id');
      
    //print_r($Id); exit;
    $model = new AdminModel();
    $result['Webinar']= $model->update_webinar($Id);
    //print_r($result['Webinar']); exit;
    $result['UserList']=$model->Attend_userlist($Id);
    
    return view('Webinar_view.php',$result);

}

public function NonAttend_userlist()
{

    $request = \Config\Services::request();
    $Id = $this->request->getpost('Id');  
    //print_r($Id); exit;
    $model = new AdminModel();
    $result['Webinar']= $model->update_webinar($Id);
    //print_r($result['Webinar']); exit;
    $result['UserList']=$model->NonAttend_userlist($Id);
    
    return view('Webinar_view.php',$result);

}

public function Feedbacklist()
{
   if (isset($_SESSION['AdminName']))
   {
       $model = new AdminModel();
       $result['Data'] = $model->Feedbacklist();
       return view('Feedbacklist.php',$result);
   }
   else
   {
      return view('Login');
   }
    
}


public function Templatelist()
{
   if (isset($_SESSION['AdminName']))
   {
       $model = new AdminModel();
       $result['Data'] = $model->Templatelist();
       return view('Template_list.php',$result);
   }
   else
   {
      return view('Login');
   }
    
}

public function Template_update()
{
   if (isset($_SESSION['AdminName']))
   {
      $request = \Config\Services::request();
      $uri = $request->uri;
      $Id = $uri->getSegment(3); 
      $model = new AdminModel();
      $result['Template']= $model->Template_update($Id);
     
      return view('Template_update.php',$result);
   }
   else
   {
      return view('Login');
   }
    
}


public function update_template()
  
  {
    if (isset($_SESSION['AdminName']))
    {
      

      $model = new AdminModel();   
      $data['Temp_id']=$this->request->getpost('Temp_id'); 
      $data['Template_name']=$this->request->getpost('Template_name');
      $data['Email_Subject']=$this->request->getpost('Email_Subject');
      $data['Template_body']=$this->request->getpost('Template_body');  
      //print_r($data); exit;
      $model = new AdminModel();
      $result['Msg']=$model->update_template($data);
      $result['Data'] = $model->Templatelist();
      

      return view('Template_list.php',$result);
      
    }

   else
   {
      return view('Login');
   }
    

  }

  public function feedback_status()
  
  {
    if (isset($_SESSION['AdminName']))
    {
      

      $model = new AdminModel();   
      $data['EOW']=$this->request->getpost('EOW'); 
      $data['ID']=$this->request->getpost('ID'); 
      //print_r($data);
      $model = new AdminModel();
      $result=$model->feedback_status($data);
      echo json_encode($result); exit;
      

    
      
      
    }
     else
       {
        return view('Admin/Login');
       }
      
  }

/* Training Lesson List  */
public function Training_Lesson()
{
   if (isset($_SESSION['AdminName']))
   {
       $model = new AdminModel();
       $result['Data'] = $model->Training_Lesson();

       return view('TrainingLesson_list.php',$result);

   }
   else
   {
      return view('Login');
   }
    
}

/* Training Lesson List  */

public function Training_Insert()
{
   if (isset($_SESSION['AdminName']))
   {
      
       $model = new AdminModel();
       $request = \Config\Services::request();
       $uri = $request->uri;
       $LanguageId = $uri->getSegment(3);
       //echo($LanguageId ); exit;
       if($LanguageId!=='')
       {
          $result['filterLanguage']=$LanguageId;
          $result['Language'] = $model->filterLanguage($LanguageId);
       }
       else
       {
          $result['filterLanguage']='';
          $result['Language'] = $model->Languagelist();
       } 
       $result['CountID']=$model->Count_lesson(); 
       $result['Chapterlist'] = $model->TagList();
       // $result['CountID']=$model->Count_lesson($data);
       //echo '<pre>';print_r($result['Language']); exit;
       return view('TrainingLesson_Insert',$result);


   }
   else
   {
      return view('Login');
   }
    
}

/* Lesson Insert  */

public function Lesson_Submit()
{


   
    $Image=$this->request->getFile('Topic_Img');
    //$Audio=$this->request->getFile('Topic_Audio');
    //print_r($Audio); exit;
   
    
   /*
    $data['Title']=$this->request->getpost('Title');
    $data['Language']=$this->request->getpost('Language');
    // $data['Chapter_ID']=$this->request->getpost('Chapter_ID');
    $data['Title_Short_Desc']=$this->request->getpost('Title_Short_Desc');
    $data['Topic_Text']=$this->request->getpost('Topic_Text');
    $data['Topic_Order']=$this->request->getpost('Topic_Order');
*/


    
    
    $data['Blog_Title']=$this->request->getpost('Title');
    $data['Blog_Cat']=$this->request->getpost('Language');
    
    $data['Blog_Summary']=$this->request->getpost('Title_Short_Desc');
    $data['Blog_Content']=$this->request->getpost('Topic_Text');
    $data['Status']=$this->request->getpost('Topic_Order');
    $data['Publisher']=$this->request->getpost('Publisher');
    //$data['TAGS']=$this->request->getpost('TAGS');
    $data['Meta_Title']=$this->request->getpost('Meta_Title');
    $data['Meta_Desc']=$this->request->getpost('Meta_Desc');
    $data['Meta_Keywords']=$this->request->getpost('Meta_Keywords');
    $data['Slug']=$this->request->getpost('Slug');
    
    
    
    date_default_timezone_set("Asia/Kolkata");
    $data['Last_Update_Date']=date("Y-m-d H:i:s");
    $data['Created_Date']=date("Y-m-d H:i:s");
    $data['Publish_Date']=date("Y-m-d H:i:s");
    $data['TAGS'] = implode(', ', $_POST['TAGS']);
    
    
    
    //SLUG
   // $slug=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', trim($this->request->getpost('Title')))));
    
    //$data['Slug']=$this->slugify(trim($this->request->getpost('Title')));
    
    
    
    
    $model = new AdminModel();
    $CountID=$model->Count_lesson($data);

    if($Image->isvalid())
    {
     
      $newName = $Image->getRandomName();
      $imag=$Image->move(ImagePath, $newName);
      $data['Image']=$newName ;
     
    }

   

    $model = new AdminModel();
    $result['Msg']=$model->Lesson_Submit($data);
   
    echo json_encode($result['Msg']); exit;
     //return view('ChapterView.php',$result);
    

    
}




/* Lesson Insert  */


/* Delete Lesson  */

  // public function Lesson_delete($Topic_ID,$Chapter_ID)
  //   {    
  //       if (isset($_SESSION['AdminName']))
  //       {
      
  //        $model = new AdminModel();
  //        $result['Msg']= $model->Lesson_delete($Topic_ID);
  //         $data['Chapter_ID']=$Chapter_ID;
  //         $result['Chapter_Info']=$model->Chapterinfo($data);
  //         $result['Data'] = $model->ChapterView($data);
  //         return view('ChapterView.php',$result);
  //    }
  //    else
  //      {
     
  //      return view('Login');
    


  //      }
    
  //   }

      public function Lesson_delete($Topic_ID)
    {    
        if (isset($_SESSION['AdminName']))
        {
      
         $request = \Config\Services::request();
         $uri = $request->uri;
         $LanguageId = $uri->getSegment(4);
         //echo($LanguageId ); exit;
         $model = new AdminModel();
         $result['Msg']= $model->Lesson_delete($Topic_ID);
         if($LanguageId!=='')
         {
             $_POST['LanguageId']=$LanguageId;
             $data['LanguageId']=$_POST['LanguageId'];
             $result['Data'] = $model->SelectLanguage_chapter($data);
         }
        else
         {
             $result['Data'] = $model->ChapterView();
            
         }
        
         
          $result['Language'] = $model->Languagelist();
          return view('Topic_list.php',$result);
     }
     else
       {
     
       return view('Login');
    


       }
    
    }



/* Delete Lesson  */


/* Topic Insert */
// public function Lesson_Update($Topic_ID,$Chapter_ID)
// {    
//     if (isset($_SESSION['AdminName']))
//     {
//        $model = new AdminModel();
//        $result['Data']=$model->Lesson_Update($Topic_ID);
//        $data['Chapter_ID']  =$Chapter_ID;
//        $result['Chapter_ID']=$Chapter_ID;
//        $result['Chapter'] = $model->Selectlanguage($data);
      
//       return view('Lesson_update.php',$result);
        
//      }
//      else
//       {
//          return view('Login');
//       }
    
//     }

public function Lesson_Update($Topic_ID)
{    
    if (isset($_SESSION['AdminName']))
    {


       $model = new AdminModel();
       $request = \Config\Services::request();
       $uri = $request->uri;
       $LanguageId = $uri->getSegment(4);
       //($LanguageId ); exit;

       if($LanguageId!=='')
       {
          //echo ('test3'); exit;
          $result['filterLanguage']=$LanguageId;
          $result['Language'] = $model->filterLanguage($LanguageId);
          $result['Data']=$model->Lesson_Update($Topic_ID);
       }
       else
       {
          //echo ('test'); exit;
          $result['filterLanguage']='';
          $result['Language'] = $model->Languagelist();
          $result['Data']=$model->Lesson_Update($Topic_ID);
       }
        
       // $model = new AdminModel();
       // $result['Data']=$model->Lesson_Update($Topic_ID);
      
       // $result['Language'] = $model->Languagelist();
        $result['Chapterlist'] = $model->TagList();
      
      return view('Lesson_update.php',$result);
        
     }
     else
      {
         return view('Login');
      }
    
    }


/* Update Lesson */
/* Lesson Insert  */



public static function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

public function UpdateLesson_Submit()
{


   
    $data['Blog_ID']=$this->request->getpost('Topic_ID');
    
    $Image=$this->request->getFile('Topic_Img');
    //$Audio=$this->request->getFile('Topic_Audio');
    
    
    $data['Blog_Title']=$this->request->getpost('Title');
    $data['Blog_Cat']=$this->request->getpost('Language');
    $data['Blog_Summary']=$this->request->getpost('Title_Short_Desc');
    $data['Blog_Content']=$this->request->getpost('Topic_Text');
    $data['Status']=$this->request->getpost('Topic_Order');
    $data['Publisher']=$this->request->getpost('Publisher');
    //$data['TAGS']=$this->request->getpost('TAGS');
    $data['Meta_Title']=$this->request->getpost('Meta_Title');
    $data['Meta_Desc']=$this->request->getpost('Meta_Desc');
    $data['Meta_Keywords']=$this->request->getpost('Meta_Keywords');
    $data['Slug']=$this->request->getpost('Slug');
    
    
    
    date_default_timezone_set("Asia/Kolkata");
    $data['Last_Update_Date']=date("Y-m-d H:i:s");
    //$data['Slug']=$this->slugify(trim($this->request->getpost('Title')));
    
 $data['TAGS'] = implode(', ', $_POST['TAGS']);
  

    if($Image->isvalid())
    {
      $newName = $Image->getRandomName();
      $imag=$Image->move(ImagePath, $newName);
      $data['Image']=$newName ;
    }


    $model = new AdminModel();
    $result['Msg']=$model->UpdateLesson_Submit($data);
    echo json_encode($result['Msg']);
    // return view('ChapterView.php',);



}


/*  Update Lesson */
/* Training Lesson List  */
public function Notes()
{
   if (isset($_SESSION['AdminName']))
   {
       $model = new AdminModel();
       $result['Data'] = $model->Notes();
       $result['Course'] = $model->Courseslist();
       return view('Notes_List',$result);
   }
   else
   {
      return view('Login');
   }
    
}

/* Training Lesson List  */


/* Notes Insert  */

public function Notes_Insert()
{
   if (isset($_SESSION['AdminName']))
   {
       $model = new AdminModel();
       $request = \Config\Services::request();
       $uri = $request->uri;
       $Course_Id = $uri->getSegment(3);
       $result['filtercourse']=$Course_Id;
       if($Course_Id!=='')
       {
          $result['filtercourse']=$Course_Id;
          $result['Data'] = $model->filterCourses($Course_Id);
       }
       else
       {
          $result['filtercourse']='';
          $result['Data'] = $model->Courseslist();
       }

       $result['CountID']=$model->Count_Notes();
       return view('NotesInsert',$result);
       
   }
   else
   {
      return view('Login');
   }
    
}

/* Notes Insert  */


public function Notes_Submit()
{

    if(isset($_POST["submit"]))
    {

       $data['Status']='DRAFT';

    }
    else
    {
       date_default_timezone_set("Asia/Kolkata");
       $data['DateofPublish']=date("Y-m-d H:i:s"); 
       $data['Status']='PUBLISH';

    }
    
    $Attachment=$this->request->getFile('Attachment');
    // $Image=$this->request->getFile('Image');
    $data['Title']=$this->request->getpost('Title');
    // $data['DateofPublish']=$this->request->getpost('DateofPublish');
    $data['Description']=$this->request->getpost('Description');
    $data['Content']=$this->request->getpost('Content');
    //print_r($data['Content']); exit;
    // $data['Description']=$this->request->getpost('Description');
    $data['Notes_Order']=$this->request->getpost('Notes_Order');
    //$data['Type']=$this->request->getpost('Type');
   
    //$data['Language']=$this->request->getpost('Language');
    $data['Language']=1;
    $data['Course_ID']=$this->request->getpost('Course_ID');
    $Filterlist=$this->request->getpost('Course_Id');
    

    // if($Image->isvalid())
    // {
      
  
    //   $newName = $Image->getRandomName();
    //   $imag=$Image->move('./public/uploads/Notes', $newName);

    // //print_r($imag);
    //  $data['Image']='./Notes/'.$newName ;
      

    // }
   
    if($Attachment->isvalid())
    {

      $newAttachmentName = $Attachment->getRandomName();
      $ima_g=$Attachment->move('./public/uploads/Notes', $newAttachmentName);

      //print_r($imag);
      $data['Attachment']='./Notes/'.$newAttachmentName ;

    }

    $model = new AdminModel();
    $result['Msg']=$model->Notes_Submit($data);
    //echo '<pre>';print_r($result); 
    // $NotesID=$result['Msg']['NotesID'];
    //echo($NotesID); exit;
    // exit;
    // $result['Data']=$model->Notes_Update($NotesID);
    if($Filterlist!=='')
    {
        //echo('this is test'); exit;
        $data['Course_Id']=$this->request->getpost('Course_Id');
        $result['Data'] = $model->SelectNotes($data);

    }
    else
    {
        $result['Data'] = $model->Notes();
        
    }
   
    $result['Course'] = $model->Courseslist();
    // return view('Notes_update.php',$result);
    

    return view('Notes_List',$result);

}


/* Notes Insert  */


/* Delete Lesson  */

  public function Notes_delete($NotesID)
    {    
        if (isset($_SESSION['AdminName']))
        {
      
         $model = new AdminModel();
         $result['Msg']= $model->Notes_delete($NotesID);
        
         $result['Data'] = $model->Notes();
         return view('Notes_List',$result);
        }
      else
       {
          return view('Login');
       }
    
   }



/* Delete Lesson  */

/*  Notes View */

 public function NotesView($NotesID)
   {

   if (isset($_SESSION['AdminName']))
   {
       
       $data['NotesID']  = $NotesID;
       $model = new AdminModel();

       $result['Notes_Info']=$model->NotesView($data);
       $request = \Config\Services::request();
       $uri = $request->uri;
       $result['Course_Id'] = $uri->getSegment(4);
       //echo '<pre>'; print_r( $result['Notes_Info']); exit;
       $result['Data'] = $model->Topiclist($data);
    
       return view('Notesview.php',$result);
   }
   else
   {
      return view('Login');
   }
    
   }

/*  Notes View  */


/* Notes Update */
public function Notes_Update($NotesID)
{    
    if (isset($_SESSION['AdminName']))
    {

       $request = \Config\Services::request();
       $uri = $request->uri;
       $Course_Id = $uri->getSegment(4);
       $model = new AdminModel();
       if($Course_Id!=='')
       {
          //echo ('test3'); exit;
          $result['filtercourse']=$Course_Id;
          $result['Course'] = $model->filterCourses($Course_Id);
          $result['Data']=$model->Notes_Update($NotesID);
       }
       else
       {
          //echo ('test'); exit;
          $result['filtercourse']='';
          $result['Course'] = $model->Courseslist();
          $result['Data']=$model->Notes_Update($NotesID);
       } 
      
       // $result['Data']=$model->Notes_Update($NotesID);
       // $result['Course'] = $model->Courseslist();
      //print_r($result);exit();
      return view('Notes_update.php',$result);
        
     }
     else
      {
         return view('Login');
       }
    
    }


/* Update Lesson */

/* Lesson Insert  */

public function UpdateNotes_Submit()
{


    $Attachment=$this->request->getFile('Attachment');
    // $Image=$this->request->getFile('Image');
    $data['Title']=$this->request->getpost('Title');
  
    $data['Description']=$this->request->getpost('Description');
    $data['Content']=$this->request->getpost('Content');
    $data['Notes_Order']=$this->request->getpost('Notes_Order');
    $data['NotesID']=$this->request->getpost('NotesID');
    // $data['Type']=$this->request->getpost('Type');

    
    // $data['Status']=$this->request->getpost('Status');
    $data['Language']=1;
    $data['Course_ID']=$this->request->getpost('Course_ID');
    $Filterlist=$this->request->getpost('Course_Id');
    // $data['Language']=$this->request->getpost('Language');
  

    // if($Image->isvalid())
    // {
      
  
    //   $newName = $Image->getRandomName();
    //   $imag=$Image->move('./public/uploads/Notes', $newName);

    // //print_r($imag);
    //  $data['Image']='./Notes/'.$newName ;
      

    // }
   
    if($Attachment->isvalid())
    {

      $newAttachmentName = $Attachment->getRandomName();
      $ima_g=$Attachment->move('./public/uploads/Notes', $newAttachmentName);

      //print_r($imag);
      $data['Attachment']='./Notes/'.$newAttachmentName ;

    }

    $model = new AdminModel();
    $result['Msg']=$model->UpdateNotes_Submit($data);
    if($Filterlist!=='')
    {
        //echo('this is test'); exit;
        $data['Course_Id']=$this->request->getpost('Course_Id');
        $result['Data'] = $model->SelectNotes($data);

    }
    else
    {
        $result['Data'] = $model->Notes();
        
    }

    
    $result['Course'] = $model->Courseslist();
    return view('Notes_List',$result);

}


/*  Update Lesson */

function Publish_Notes($NotesID)
{
  
      date_default_timezone_set("Asia/Kolkata");
      $data['NotesID']=$NotesID; 
      //print_r($data['NotesID']); exit;
      $data['DateofPublish']=date("Y-m-d H:i:s"); 
      $data['Status']='PUBLISH';
      $model = new AdminModel();
      $result['Msg']=$model->UpdateNotes_Submit($data);
      $result['Notes_Info']=$model->NotesView($data);
      $result['Data'] = $model->Topiclist($data);
      // $result['Data'] = $model->Notes();
      return view('Notesview.php',$result);
     
    
}

function UnPublish_Notes($NotesID)
{
  
      date_default_timezone_set("Asia/Kolkata");
      $data['NotesID']=$NotesID; 
      //print_r($data['NotesID']); exit;
      $data['DateofPublish']=date("Y-m-d H:i:s"); 
      $data['Status']='DRAFT';
      $model = new AdminModel();
      $result['Msg']=$model->UpdateNotes_Submit($data);
      $result['Notes_Info']=$model->NotesView($data);
      $result['Data'] = $model->Topiclist($data);
      return view('Notesview.php',$result);

      

     
    
}

/*Feedback_Image*/
public function feedback_image($ID)
{    
    if (isset($_SESSION['AdminName']))
    {
       $model = new AdminModel();
       $result['Data']=$model->feedback_Update($ID);
      //print_r($result);exit();
      return view('Feedback_Image.php',$result);
        
     }
     else
       {
         return view('Login');
       }
    
    }

/* Feedback Image */


public function Update_feedback()
{


  
    $Image=$this->request->getFile('Image');
    $data['ID']=$this->request->getpost('ID');

    if($Image->isvalid())
    {
      
  
      $newName = $Image->getRandomName();
      $imag=$Image->move('./public/uploads', $newName);

    //print_r($imag);
     $data['Image']=$newName ;
      

    }
   
   
    $model = new AdminModel();
    $result['Msg']=$model->update_feedback($data);
    $result['Data'] = $model->Feedbacklist();
    return view('Feedbacklist.php',$result);

}


/*  Update Lesson */

public function Setting()
{
   if (isset($_SESSION['AdminName']))
   {
       $model = new AdminModel();
       $result['Data'] = $model->Setting();
       return view('Setting',$result);
   }
   else
   {
      return view('Login');
   }
    
}

public function Setting_Update()
{
   if (isset($_SESSION['AdminName']))
   {
      $request = \Config\Services::request();
      $uri = $request->uri;
      $S_ID = $uri->getSegment(3); 
      $model = new AdminModel();
      $result['Setting']= $model->Setting_Update($S_ID);
     
      return view('Setting_update.php',$result);
   }
   else
   {
      return view('Login');
   }
    
}

public function update_Setting()
  
  {
    if (isset($_SESSION['AdminName']))
    {
      

      $model = new AdminModel();   
      $data['S_ID']=$this->request->getpost('S_ID'); 
      $data['MobileNo']=$this->request->getpost('MobileNo');
      $data['Facebook']=$this->request->getpost('Facebook');
      $data['Youtube']=$this->request->getpost('Youtube');
      $data['About']=$this->request->getpost('About'); 
      $data['Legal']=$this->request->getpost('Legal');  
      //print_r($data); exit;
      $model = new AdminModel();
      $result['Msg']=$model->update_Setting($data);
      $result['Data'] = $model->Setting();
      return view('Setting',$result);
      
    }

   else
   {
      return view('Login');
   }
    

  }

  public function Chapter()
   {
     if (isset($_SESSION['AdminName']))
      {
       $model = new AdminModel();
     
        $result['Data'] = $model->ChapterView();
        $result['Language'] = $model->Languagelist();
      
      
       return view('Topic_list.php',$result);
      }
    else
    {
      return view('Login');
    }
    
   }

/* Notes Insert  */

public function Chapter_Insert()
{
   if (isset($_SESSION['AdminName']))
   {
       $model = new AdminModel();
       $request = \Config\Services::request();
       $uri = $request->uri;
       $LanguageId = $uri->getSegment(3);
       if($LanguageId!=='')
       {
          $result['filterLanguage']=$LanguageId;
          $result['Language'] = $model->filterLanguage($LanguageId);
       }
       else
       {
          $result['filterLanguage']='';
          $result['Language'] = $model->Languagelist();
       } 
       $result['CountID']=$model->Count_Chapter();
     
       return view('Add_Chapter.php',$result);
   }
   else
   {
      return view('Login');
   }
    
}

/* Notes Insert  */


public function Chapter_Submit()
{

    $Image=$this->request->getFile('Chpater_Icon');
    $data['Course_Name']=$this->request->getpost('Course_Name');
    $data['Language']=$this->request->getpost('Language');
    $data['Chapter_Title']=$this->request->getpost('Chapter_Title');
    $data['Chapter_desc']=$this->request->getpost('Chapter_desc');
    $data['Chapter_Order']=$this->request->getpost('Chapter_Order');
    $data['Language']=$this->request->getpost('Language');
    $Filterlist=$this->request->getpost('LanguageId');
    
    //print_r($data); exit;

  

    if($Image->isvalid())
    {
      
  
      $newName = $Image->getRandomName();
      $imag=$Image->move('./public/uploads/Chapters', $newName);

    //print_r($imag);
     $data['Chpater_Icon']='./Chapters/'.$newName ;
      

    }
    $model = new AdminModel();
    $result['Msg']=$model->Chapter_Submit($data);
    if($Filterlist!=='')
    {
        //echo('this is test'); exit;
        $data['LanguageId']=$this->request->getpost('LanguageId');
        $result['Data'] = $model->SelectLanguage_chapter($data);

    }
    else
    {
       $result['Data'] = $model->Chapter();
         //echo('second filter'); exit;
    }
     
    $result['Language'] = $model->Languagelist();
    return view('Chapter_List',$result); 
      
  }


/* Notes Insert  */

public function Chapter_delete($Chapter_ID)
    {    
        if (isset($_SESSION['AdminName']))
        {
      
         $model = new AdminModel();
         $result['Msg']= $model->Chapter_delete($Chapter_ID);
         $request = \Config\Services::request();
         $uri = $request->uri;
         $LanguageId = $uri->getSegment(4);
         if($LanguageId!=='')
         {
             $_POST['LanguageId']=$LanguageId;
             $data['LanguageId']=$_POST['LanguageId'];
             $result['Data'] = $model->SelectLanguage_chapter($data);
         }
        else
         {
             $result['Data'] = $model->Chapter();
            
         }
         
        $result['Language'] = $model->Languagelist();
         return view('Chapter_List',$result);
        }
     else
     {
     
       return view('Login');
     }
    
  }


public function Chapter_Update($Chapter_ID)
{    
    if (isset($_SESSION['AdminName']))
    {
       $model = new AdminModel();
       $request = \Config\Services::request();
       $uri = $request->uri;
       $LanguageId = $uri->getSegment(4);

       if($LanguageId!=='')
       {
          //echo ('test3'); exit;
          $result['filterLanguage']=$LanguageId;
          $result['Language'] = $model->filterLanguage($LanguageId);
          $result['Data']=$model->Chapter_Update($Chapter_ID);
       }
       else
       {
          //echo ('test'); exit;
          $result['filterLanguage']='';
          $result['Language'] = $model->Languagelist();
          $result['Data']=$model->Chapter_Update($Chapter_ID);
       } 
     
       // $result['Course'] = $model->Courseslist();

      //print_r($result);exit();
       //$result['CountID']=$model->Count_Chapter();
      return view('Chapter_update.php',$result);
        
     }
     else
       {
         return view('Login');
       }
    
}

public function UpdateChapter_Submit()
{


   
    $Image=$this->request->getFile('Chpater_Icon');
    $data['Chapter_Title']=$this->request->getpost('Chapter_Title');
    $data['Chapter_desc']=$this->request->getpost('Chapter_desc');
    $data['Chapter_Order']=$this->request->getpost('Chapter_Order');
    $data['Chapter_ID']=$this->request->getpost('Chapter_ID');
    $data['Language']=$this->request->getpost('Language');
    $data['Course_Name']=$this->request->getpost('Course_Name');
    $Filterlist=$this->request->getpost('LanguageId');

    //print_r($data['Free?']); exit;

  

    if($Image->isvalid())
    {
      
  
      $newName = $Image->getRandomName();
      $imag=$Image->move('./public/uploads/Chapters', $newName);

    //print_r($imag);
     $data['Chpater_Icon']='./Chapters/'.$newName ;
      

    }
   
   

    $model = new AdminModel();
    $result['Msg']=$model->UpdateChapter_Submit($data);

     if($Filterlist!=='')
    {
        //echo('this is test'); exit;
        $data['LanguageId']=$Filterlist;
        $result['Data'] = $model->SelectLanguage_chapter($data);

    }
    else
    {
       $result['Data'] = $model->Chapter();
         //echo('second filter'); exit;
    }
    
   $result['Language'] = $model->Languagelist();
    return view('Chapter_List',$result);

}

public function Packages()
{
   if (isset($_SESSION['AdminName']))
   {
       $model = new AdminModel();
       $result['Data'] = $model->Packages();
       return view('Packagelist',$result);
   }
   else
   {
      return view('Login');
   }
    
}

public function PackageInsert() 
{
   if (isset($_SESSION['AdminName']))
   {
       $model= new AdminModel();
       $result['CountID']=$model->Count_package();
       return view('AddPackage.php',$result);
       
   }
   else
   {
      return view('Login');
   }

}

public function Package_Submit()
{

    $data['Cat_Name']=trim($this->request->getpost('CategoryName'));
     $data['cat_slug']=str_replace(" ","-",$data['Cat_Name']);
    $data['Hindi_Name']=trim($this->request->getpost('HindiName'));
    $data['Cat_Order']=$this->request->getpost('Category_Order');
   
   
    $model = new AdminModel();
    $result['Msg']=$model->Package_Submit($data);
  
    $Id=$result['Msg']['LastInsertId'];
    $result['Data']= $model->Package_update($Id);
    //$result['Language'] = $model->Languagelist();
    //$result['Chapterlist'] = $model->Chapterlist();
    $result['Data'] = $model->Packages();
    //return view('PackageView.php',$result);
    
    return view('Packagelist',$result);
 

}


public function Package_update()
{
   if (isset($_SESSION['AdminName']))
   {
      $request = \Config\Services::request();
      $uri = $request->uri;
      $Id = $uri->getSegment(3); 
      $model = new AdminModel();
      $result['Data']= $model->Package_update($Id);
     
      return view('Package_update.php',$result);
   }
   else
   {
      return view('Login');
   }
    
}

public function PackageUpdate_Submit()
  {

    if (isset($_SESSION['AdminName']))
    {
      
      $data['CategoriesID']=$this->request->getpost('PackageId'); 
      $data['Cat_Name']=$this->request->getpost('PackageName');
      $data['Hindi_Name']=$this->request->getpost('PackageDesc');
      $data['Cat_Order']=$this->request->getpost('PackageAmount');
     // $data['Package_Order']=$this->request->getpost('Package_Order');
      // $data['Status']=$this->request->getpost('Status');
   
      
    
      //print_r($data); exit;
      $model = new AdminModel();
      $result['Msg']=$model->Update_Package($data);
      $result['Data'] = $model->Packages();
      

       return view('Packagelist',$result);
      
    }

   else
   {
      return view('Login');
   }
    

  }

  /* Courses Delete */
  public function Package_delete($PackageId)
    {    
        if (isset($_SESSION['AdminName']))
        {
      
         $model = new AdminModel();
         $result['Msg']= $model->Package_delete($PackageId);
         $result['Data'] = $model->Packages();
         return view('Packagelist',$result);
        
         
        }
      else
       {
          return view('Login');
       }
    
   }

  /* Package View */
  public function PackageView($PackageId)
  {

  	 if (isset($_SESSION['AdminName']))
        {
      
         $model = new AdminModel();
         $result['Data']= $model->Package_update($PackageId);
         $result['Package_Chapters']=$model->Package_Chapters($PackageId);
         $result['Language'] = $model->Languagelist();
         $result['Chapterlist'] = $model->Chapterlist();
         return view('PackageView.php',$result);
        
         
        }
      else
       {
          return view('Login');
       }

  }
  /* Add Package Chapters */
  public function AddPackageChapter($PackageId)
  {

    $request = \Config\Services::request();
    $uri = $request->uri;
    $LanguageId = $uri->getSegment(4);
    $model = new AdminModel();
    if($LanguageId!=='')
      {
          $result['filterLanguage']=$LanguageId;
          $result['Language'] = $model->filterLanguage($LanguageId);
      }
     else
       {
          $result['filterLanguage']='';
           $result['Language'] = $model->Languagelist();
       } 
  
     $result['Data']= $model->Package_update($PackageId);
     $result['Chapterlist'] = $model->Chapterlist();

     return view('AddPackageChapter.php',$result);
  }
  
  
  
  /* Add Package Chapters*/
  /* Package View */
  Public function PackageChapter()
  {
  	$data['PackageId']=$this->request->getpost('PackageId');
  	$PackageId=$this->request->getpost('PackageId');;
	  $data['Chapter'] = implode(', ', $_POST['Chapter']);
	  $data['Language'] =$this->request->getpost('Language');
    $Filterlist=$this->request->getpost('LanguageId');
    $model = new AdminModel();
    $result['Msg']= $model->PackageChapter($data);
    if($Filterlist!=='')
    {
        //echo('this is test'); exit;
        $data['LanguageId']=$this->request->getpost('LanguageId');
        $result['Package_Chapters'] = $model->Package_Lang_Chapter($data);

    }
    else
    {
       $result['Package_Chapters']=$model->Package_Chapters($PackageId);
         //echo('second filter'); exit;
    }
	 //echo '<pre>'; print_r($data); exit;
	 
	  $result['Data']= $model->Package_update($PackageId);
	  $result['Language'] = $model->Languagelist();
    // $result['Chapterlist'] = $model->Chapterlist();
    // $result['Package_Chapters']=$model->Package_Chapters($PackageId);
    return view('PackageView.php',$result);

}

/* Update PackageChapters */
 public function UpdatePackage_Chapters($P_chapterId,$PackageId)
 {
    $model = new AdminModel();
	  $result['Data']= $model->Package_update($PackageId);
	  $result['Package_Chapters']=$model->Package_Chapters($PackageId);
      //echo '<pre>'; print_r($result['Package_Chapters']);
	  $result['Language'] = $model->Languagelist();
      $result['Chapterlist'] = $model->Chapterlist();
      //$result['CountID'] = $model->Packageorder($PackageId);
     
    // $result['Msg']= $model->PackageChapter($data);
    return view('UpdatePackageChapters.php',$result);
 }
/* Update Package Chapters */

/* Update Package Chapters */
 public function PackageChapter_update()
 {
     if (isset($_SESSION['AdminName']))
    {
      
      $data['P_chapterId']=$this->request->getpost('P_chapterId');
      $PackageId=$this->request->getpost('PackageId');
	   $data['Chapter_Id'] = $this->request->getpost('Chapter');
	   $data['Language_Id'] =$this->request->getpost('Language');
        $data['P_Chapter_OrderId'] =$this->request->getpost('OrderId');
      //print_r($data); exit;
      $model = new AdminModel();
      $result['Msg']=$model->PackageChapter_update($data,$PackageId);
      $result['Data']= $model->Package_update($PackageId);
      $result['Package_Chapters']=$model->Package_Chapters($PackageId);
      $result['Language'] = $model->Languagelist();
      $result['Chapterlist'] = $model->Chapterlist();
      return view('PackageView.php',$result);
    
      

       
      
    }

   else
   {
      return view('Login');
   }

 }
/* Update Package Chapters */

public function Package_Chapters_Delete($P_chapterId,$PackageId)
{
     if (isset($_SESSION['AdminName']))
        {
      
         $model = new AdminModel();
         $result['Msg']= $model->Package_Chapters_Delete($P_chapterId);
         $result['Data']= $model->Package_update($PackageId);
         $result['Package_Chapters']=$model->Package_Chapters($PackageId);
         $result['Language'] = $model->Languagelist();
         $result['Chapterlist'] = $model->Chapterlist();
         return view('PackageView.php',$result);
        
         
        }
      else
       {
          return view('Login');
       }
    
}


/* Package Delete */

/*  Select Language by package chapers  */
public function SelectPackage_Chapter()
    {
       if (isset($_SESSION['AdminName']))
        {
        
          $data['PackageId'] = $this->request->getpost('PackageId');
          $PackageId=$this->request->getpost('PackageId');
          $data['LanguageId']=$this->request->getpost('LanguageId');
          $model = new AdminModel();
          $result['Data']  = $model->SelectLanguage_chapter($data);
          $result['Data']= $model->Package_update($PackageId);
          $result['Package_Chapters']=$model->Package_Lang_Chapter($data);
          $result['Language'] = $model->Languagelist();
         //print_r($result['Data']); exit;
         return view('PackageView.php',$result);
         // return view('Chapter_List',$result);

         
         
        }
     else
     {
        return view('Login');
     }
    
    }

  public function Registration_update($ID)
   {    


    if (isset($_SESSION['AdminName']))
    {
       $model = new AdminModel();

       $result['Webinar']=$model->Webinar_datelist();
       $result['Data']=$model->Registration_update($ID);
      //print_r($result);exit();
      return view('UpdateRegistration.php',$result);
        
     }
     else
       {
        return view('Admin/Login');
       }
    
    }


 public function updateRegistration()
  
  {
    if (isset($_SESSION['AdminName']))
    {
      

      $model = new AdminModel();   
      $data['ID']=$this->request->getpost('ID'); 
      $data['Name']=$this->request->getpost('Name');
      $data['Contact']=$this->request->getpost('Contact');
      $data['Email']=$this->request->getpost('Email'); 
      $Webinar_date=$this->request->getpost('Webinar_date'); 
      $Webinar= explode (",", $Webinar_date); 
      $data['Webinar_Id']=$Webinar[0];
      $data['Webinar_date']=$Webinar[1];
      
      
      $model = new AdminModel();
      $result['Msg']=$model->updateRegistration($data);
      $result['Data'] = $model->AllRegistration();
       return view('Registrationlist.php',$result);
      
      
    }
     else
       {
        return view('Admin/Login');
       }
      
  }

  public function Leavelist()
 {
   if (isset($_SESSION['AdminName']))
   {
       $model = new AdminModel();
       $result['Data'] = $model->Leavelist();
       return view('Leave_list.php',$result);
   }
   else
   {
      return view('Login');
   }
    
}


public function Leave_Insert()
{
   if (isset($_SESSION['AdminName']))
   {
       
       return view('Leave_Insert');
   }
   else
   {
      return view('Login');
   }
    
}
public function Leave_Submit()
{
    $data['Leave_Name']=$this->request->getpost('Leave_Name');
    $Country_code=$this->request->getpost('Country_code');
    $MobileNo=$this->request->getpost('Leave_MobileNo');
    $data['Leave_MobileNo']=$Country_code.$MobileNo;
    $data['Leave_Source']=$this->request->getpost('Leave_Source');
    $model = new AdminModel();
    $result['Msg']=$model->Leave_Submit($data);
    $result['Data'] =$model->Leavelist();
    return view('Leave_list.php',$result);

}

  public function Leave_delete($Leave_Id)
    {    
        if (isset($_SESSION['AdminName']))
        {
      
         $model = new AdminModel();
         $result['Msg']= $model->Leave_delete($Leave_Id);
        
         $result['Data'] =$model->Leavelist();
         return view('Leave_list.php',$result);
     }
     else
     {
     
       return view('Login');
     }
    
    }

    public function importFile()
    {
       if ($this->request->getMethod() == "post") {


            $input = $this->validate([
            'file' => 'uploaded[csv]|max_size[csv,1024]|ext_in[csv,csv],'
            ]);
            if (!$input) { // Not valid
            $data['validation'] = $this->validator;
           //echo '<pre>'; print_r($data['validation']['errors:protected'][0]['file']); exit;
             $model = new AdminModel();
             $result['Data'] =$model->Leavelist();
             return view('Leave_list.php',$result);
            }

          
            else 
            {

            $file = $this->request->getFile("csv");

            $file_name = $file->getTempName();

            $leads = array();

            $csv_data = array_map('str_getcsv', file($file_name));
            //echo '<pre>'; print_r($csv_data); exit;

            if (count($csv_data) > 0) {

                $index = 0;

                foreach ($csv_data as $data) {

                    if ($index > 0) {

                        $leads[] = array(
                            "Leave_Name" => $data[0],
                            "Leave_MobileNo" => $data[1],
                            "Leave_Source" => $data[2]
                        );
                    }
                    $index++;
                }

                // $model = new AdminModel();
                
    

                // $builder = $this->db->table('Leaves');

                // $builder->insertBatch($leads);

                // $session = session();

                // $session->setFlashdata("success", "Data saved successfully");

                
            }
          }
        }
        $model = new AdminModel();
        $result['Import']=$model->importFile($leads);
        //print_r($result['Msg']); exit;
        $result['Data'] =$model->Leavelist();
        return view('Leave_list.php',$result);

    }

    public function AppUserlist()
    {

        if (isset($_SESSION['AdminName']))
         {
             $model = new AdminModel();
             $request = \Config\Services::request();
             $uri = $request->uri;
             $result['list_msg']  = $uri->getSegment(3); 
             $result['Data'] = $model->AppUserlist();
             $result['Course'] = $model->Courseslist();
             //echo '<pre>';
             //print_r($result['Data']); exit;
             return view('Messagelist.php',$result);
         }
         else
         {
            return view('Login');
         }

    }

    public function Readlist()
    {

        if (isset($_SESSION['AdminName']))
         {
             $model = new AdminModel();
             $request = \Config\Services::request();
             $uri = $request->uri;
             $result['list_msg']  = $uri->getSegment(3); 
             //print_r($data['ID']);exit;
             $result['Data'] = $model->Readlist();
             $result['Course'] = $model->Courseslist();
             //echo '<pre>';
             //print_r($result['Data']); exit;
             return view('Messagelist.php',$result);
         }
         else
         {
            return view('Login');
         }

    }


    public function Msgsend()
    {
          $request = \Config\Services::request();
          $uri = $request->uri;
          $data1['ID']  = $uri->getSegment(3); 
          $data1['MessageId']  = $uri->getSegment(4);
          $result['ID']  = $uri->getSegment(3);
          $result['MessageId']  = $uri->getSegment(4);
          $model = new AdminModel();
          $result['Data'] = $model->Msgsendlist($data1); 
          //echo '<pre>'; print_r($result['Data']); exit;
        // echo '<pre>'; print_r($result); exit;
          return view('MessageInsert.php',$result);
    }

    public function Message_Submit()
    {
        date_default_timezone_set('Asia/Calcutta');
        $request = \Config\Services::request();
       
        $data['FromUser']=0;
        $data['ToUser']=$this->request->getpost('ToUser');
        $data['Message']=$this->request->getpost('Message');
        $data['Message_value']=1;
        $data1['ID']  = $this->request->getpost('ID');
        $data1['MessageId']  = $this->request->getpost('MessageId');
        $result['ID']  = $this->request->getpost('ID');
        $result['MessageId']  =  $this->request->getpost('MessageId');
       
        

        $data['Message_Color']='#F7D27B';
        $data['MSGDateTime'] = date('Y-m-d H:i:s');
        $Image=$this->request->getFile('Attachment');
         if($Image->isvalid())
        {
          
      
          $newName = $Image->getRandomName();
          $imag=$Image->move('./public/uploads/', $newName);

        //print_r($imag);
         $data['Image']=$newName ;
          

        }
        $model = new AdminModel();
        $result['Msg']=$model->Message_Submit($data);
        $result['Data'] = $model->Msgsendlist($data1); 
        // $result['Data'] = $model->AppUserlist();
        $result['Course'] = $model->Courseslist();
        return view('MessageInsert.php',$result);
        // return view('Messagelist.php',$result);


    }


    public function update_msgstatus()
    {
        
        $data['MessageId']=$this->request->getpost('Id');
        $data['MSGDateTime']=$this->request->getpost('MSGDateTime');
        $data['Message_value']=1;
        //print_r($data); exit;
        $model = new AdminModel();
        $result['data']=$model->update_msgstatus($data);
        //print_r($result['Msg']); exit;
        echo json_encode($result['data']); exit;
    }


    /*  Chapter List by Language  */
    public function Selectlanguage()
    {
       if (isset($_SESSION['AdminName']))
        {

         $data['Language']=$this->request->getpost('Language');
         //print_r($data); exit;
         $model = new AdminModel();
         $result['Data'] = $model->Selectlanguage($data);
         //print_r($result['Data']); exit;
         return view('Chapter_List',$result);
        }
     else
     {
        return view('Login');
     }
    
    }

    /*  Chapter List by Language  */
  public function ChapterView()
   {

   if (isset($_SESSION['AdminName']))
   {
       $request = \Config\Services::request();
       $uri = $request->uri;
       $data['Chapter_ID']  = $uri->getSegment(3); 
       $result['Course_Id'] = $uri->getSegment(4);
       $model = new AdminModel();
       
       $result['Chapter_Info']=$model->Chapterinfo($data);
       $result['Data'] = $model->ChapterView($data);
      // echo '<pre>'; print_r( $result['Chapter_Info']); exit;
       return view('ChapterView.php',$result);
   }
   else
   {
      return view('Login');
   }
    
   }

/* Training Lesson List  */

 /*  Topic List  */
 
 /*  Topic List  */

   public function SelectLanguage_chapter()
    {
       if (isset($_SESSION['AdminName']))
        {
        
         $data['Language']=$this->request->getpost('LanguageID');
         //echo( $data['Language']); exit;
         if($data['Language']!='')
         {
             $model = new AdminModel();
             $data['LanguageId']=$data['Language'];
             $result['Chapterlist']  = $model->SelectLanguage_chapter($data);
             echo json_encode($result['Chapterlist']); exit;
           
         }
         else
         {

         $data['LanguageId']=$this->request->getpost('LanguageId');
         $model = new AdminModel();
         $result['Data']  = $model->SelectLanguage_chapter($data);
         $result['Language'] = $model->Languagelist();
         //print_r($result['Data']); exit;
         return view('Topic_list.php',$result);
         // return view('Chapter_List',$result);

         }
         
        }
     else
     {
        return view('Login');
     }
    
    }

    public function SelectNotes()
    {

         if (isset($_SESSION['AdminName']))
        {

         $data['Course_Id']=$this->request->getpost('Course_Id');
         //print_r($data); exit;
         $model = new AdminModel();
         $result['Data'] = $model->SelectNotes($data);
         $result['Course'] = $model->Courseslist();
         //print_r($result['Data']); exit;
         return view('Notes_List',$result);
        }
       else
       {
          return view('Login');
       }

    }


    /*Message Filter*/
    public function ListUser()
    {

        if (isset($_SESSION['AdminName']))
         {

           $request = \Config\Services::request();
             $uri = $request->uri;
             $model = new AdminModel();
             $data['Membership']=$this->request->getpost('Membership');
             $data['list_msg']= $uri->getSegment(3); 
             $result['list_msg']  = $uri->getSegment(3); 
             $result['Data'] = $model->ListUser($data);
             $result['Course'] = $model->Courseslist();
             //echo '<pre>';
             //print_r($result['Data']); exit;
             return view('Messagelist.php',$result);
         }
         else
         {
            return view('Login');
         }

    }
    
    /* Message Filter*/

        public function ListUserCourse()
       {

        if (isset($_SESSION['AdminName']))
         {
             $model = new AdminModel();
             $data['Course_Id']=$this->request->getpost('Course_Id');
             $data['Membership']=$this->request->getpost('Membership');
             $request = \Config\Services::request();
             $uri = $request->uri;
             $data['list_msg']= $uri->getSegment(3); 
             $result['list_msg']  = $uri->getSegment(3); 
             $result['Data'] = $model->ListUserCourse($data);
             $result['Course'] = $model->Courseslist();
             //echo '<pre>';
             //print_r($result['Data']); exit;
             return view('Messagelist.php',$result);
         }
         else
         {
            return view('Login');
         }

       }


    /* UserList */
    public function UserApplist()
    {

        if (isset($_SESSION['AdminName']))
         {
             $model = new AdminModel();
             $result['Data'] = $model->UserApplist();
             // $result['Course'] = $model->Courseslist();
             //echo '<pre>';
             //print_r($result['Data']); exit;
             return view('Appuserlist.php',$result);
         }
         else
         {
            return view('Login');
         }

    }

    /* UserList */

    public function Usersview()
     {

        $request = \Config\Services::request();
        $uri = $request->uri;
        $ID  = $uri->getSegment(3); 
        $model = new AdminModel();
        $result['User']= $model->Usersview($ID);
        $result['Course_orderlist']=$model->Course_orderlist($ID);
        $result['Course_Subscriptionlist']=$model->Subscriptionlist($ID);
        return view('Usersview.php',$result);
        //echo '<pre>'; print_r($result); exit;

        //echo($ID); exit;
     }

     /* App Review */
   
    public function UserReviewlist()
    {

        if (isset($_SESSION['AdminName']))
         {
             $model = new AdminModel();
             $result['Data'] = $model->UserReviewlist();
              $result['Course'] = $model->Courseslist();
             //echo '<pre>';
             //print_r($result['Data']); exit;
             return view('AppReview_list.php',$result);
         }
         else
         {
            return view('Login');
         }

    }

    /* App Review*/
    /* Course Review Filter */
      public function AppCourseReviewlist()
    {
       if (isset($_SESSION['AdminName']))
        {

         $data['Course_Id']=$this->request->getpost('Course_Id');
         //print_r($data); exit;
         $model = new AdminModel();
         $result['Data'] = $model->AppCourseReviewlist($data);
         $result['Course'] = $model->Courseslist();
        return view('AppReview_list.php',$result);
      
        }
     else
     {
        return view('Login');
     }
    
    }


    /* Course Review Filter */
    /* Review Status */
      public function Review_status()
      {
          if (isset($_SESSION['AdminName']))
          {
            

            $model = new AdminModel();   
            $data['Status']=$this->request->getpost('Status'); 
            $data['Review_ID']=$this->request->getpost('Review_ID'); 
            //print_r($data);
            $model = new AdminModel();
            $result=$model->Review_status($data);
            echo json_encode($result); exit;
            

          
            
            
          }
           else
             {
              return view('Admin/Login');
             }
            
        }

    /* Review Status */
     public function Bannerlist()
    {

        if (isset($_SESSION['AdminName']))
         {


             $model = new AdminModel();
             $result['Data'] = $model->Bannerlist();
             $result['Course'] = $model->Courseslist();
             //echo '<pre>';
             //print_r($result['Data']); exit;
             return view('Bannerlist.php',$result);
         }
         else
         {
            return view('Login');
         }

    }

    /* App Review*/ 

    /* Course Bannerlist  */
    public function Coursebannerlist()
    {
       if (isset($_SESSION['AdminName']))
        {

         $data['Course_Id']=$this->request->getpost('Course_Id');
         //print_r($data); exit;
         $model = new AdminModel();
         $result['Data'] = $model->Coursebannerlist($data);
         $result['Course'] = $model->Courseslist();
         return view('Bannerlist.php',$result);
      
        }
     else
     {
        return view('Login');
     }
    
    }

    /* Course Bannerlist  */

    /* Banner Insert  */
    public function Banner_Insert()
    {
       if (isset($_SESSION['AdminName']))
       {
           $model = new AdminModel();
           $request = \Config\Services::request();
           $uri = $request->uri;
           $Course_Id = $uri->getSegment(3);
           $result['filtercourse']=$Course_Id;

           if($Course_Id!=='')
           {
               $result['filtercourse']=$Course_Id;
               $result['Data'] = $model->filterCourses($Course_Id);
           }
           else
           {
              $result['filtercourse']='';
              $result['Data'] = $model->Courseslist();
           } 
           return view('BannerInsert.php',$result);
       }
       else
       {
          return view('Login');
       }
        
    }


    /* Banner Insert  */

    /* BannerSubmit */
    public function Banner_Submit()
    {


   
    $Image=$this->request->getFile('image');
    $data['CourseID']=$this->request->getpost('Course_ID');
    $data['Title']=$this->request->getpost('Title');
    $data['ShortDesc']=$this->request->getpost('ShortDesc');
    $data['Link?']=$this->request->getpost('Link?');
    if($data['Link?']=='')
    {
      $data['Link?']=0;
    }
    $data['Long_Desc']=$this->request->getpost('Long_Desc');
  
    $data['Link']=$this->request->getpost('Link');
    $data['button_text']=$this->request->getpost('button_text');
    $data['back_color']=$this->request->getpost('back_color');
    $data['Status']=$this->request->getpost('Status');
    $Filterlist=$this->request->getpost('Course_Id');

    //print_r($data); exit;
    
   
    
    
  

    if($Image->isvalid())
    {
      
  
      $newName = $Image->getRandomName();
      $imag=$Image->move('./public/uploads/Top_Banner', $newName);

    //print_r($imag);
     $data['image']='./Top_Banner/'.$newName ;
      

    }
   
    $model = new AdminModel();
    $result['Msg']=$model->Banner_Submit($data);
    if($Filterlist!=='')
    {
        //echo('this is test'); exit;
        $data['Course_Id']=$this->request->getpost('Course_Id');
        $result['Data'] = $model->Coursebannerlist($data);

    }
    else
    {
      $result['Data'] = $model->Bannerlist();
         //echo('second filter'); exit;
    }
    
    $result['Course'] = $model->Courseslist();
    return view('Bannerlist.php',$result);

}

    /* Banner Submit */
  public function Banner_delete($BannerID)
    {    
        if (isset($_SESSION['AdminName']))
        {
      
         $model = new AdminModel();
         $result['Msg']= $model->Banner_delete($BannerID);
        
         $result['Data'] = $model->Bannerlist();
         $result['Course'] = $model->Courseslist();
          return view('Bannerlist.php',$result);
        }
      else
       {
          return view('Login');
       }
    
   }

   public function Banner_Update($BannerID)
   {  

    if (isset($_SESSION['AdminName']))
    {
       $model = new AdminModel();
       $request = \Config\Services::request();
       $uri = $request->uri;
       $Course_Id = $uri->getSegment(4);
      
      

       if($Course_Id!=='')
       {
          //echo ('test3'); exit;
          $result['filtercourse']=$Course_Id;
          $result['Course'] = $model->filterCourses($Course_Id);
          $result['Data']=$model->Banner_Update($BannerID);
       }
       else
       {
          //echo ('test'); exit;
          $result['filtercourse']='';
          $result['Course'] = $model->Courseslist();
          $result['Data']=$model->Banner_Update($BannerID);
       } 
     
      return view('Banner_update.php',$result);
        
     }
     else
       {
         return view('Login');
       }
    
    }

    public function Bannerupdate_Submit()
     {


   
      $Image=$this->request->getFile('image');
      $data['BannerID']=$this->request->getpost('BannerID');
      $data['CourseID']=$this->request->getpost('Course_ID');
      $data['Title']=$this->request->getpost('Title');
      $data['ShortDesc']=$this->request->getpost('ShortDesc');
      $data['Link?']=$this->request->getpost('Link?');
      if($data['Link?']=='')
      {
        $data['Link?']=0;
        $data['Link']='';
      }
      if($data['Link?']==1)
      {
         $data['Long_Desc']='';
         $data['Link']=$this->request->getpost('Link');
      }
      else
      {
          $data['Long_Desc']=$this->request->getpost('Long_Desc');
      }

    
  
    
     $data['button_text']=$this->request->getpost('button_text');
     $data['back_color']=$this->request->getpost('back_color');
     $data['Status']=$this->request->getpost('Status');
     $Filterlist=$this->request->getpost('Course_Id');
     //print_r( $Filterlist); exit;


  

  

    if($Image->isvalid())
    {
      
  
      $newName = $Image->getRandomName();
      $imag=$Image->move('./public/uploads/Top_Banner', $newName);

    //print_r($imag);
     $data['image']='./Top_Banner/'.$newName ;
      

    }
    // print_r($data); exit;
   
   

    $model = new AdminModel();
    $result['Msg']=$model->Bannerupdate_Submit($data);
    if($Filterlist!=='')
    {
        //echo('this is test'); exit;
        $data['Course_Id']=$this->request->getpost('Course_Id');
        $result['Data'] = $model->Coursebannerlist($data);

    }
    else
    {
       $result['Data'] = $model->Bannerlist();
         //echo('second filter'); exit;
    }
  
    $result['Course'] = $model->Courseslist();
    return view('Bannerlist.php',$result);

  }

  /* App Userfilter  according to course and membership*/


  public function AppCouseUserslist()
       {

        if (isset($_SESSION['AdminName']))
         {
             $model = new AdminModel();
             $data['Course_Id']=$this->request->getpost('Course_Id');
             $data['Membership']=$this->request->getpost('Membership');
             $result['Data'] = $model->AppCouseUserslist($data);
             $result['Course'] = $model->Courseslist();
             return view('Appuserlist.php',$result);
         }
         else
         {
            return view('Login');
         }

       }

       /* App Userfilter  according to course and membership*/

    /* User Subscription */
     public function AddSubscription()
     {

        $request = \Config\Services::request();
        $uri = $request->uri;
        $ID  = $uri->getSegment(3); 
        $model = new AdminModel();
        $result['ID']=$uri->getSegment(3); 
        $result['User']= $model->Usersview($ID);
        $result['Data'] = $model->Courseslist();
        return view('AddSubscription.php',$result);
        //echo '<pre>'; print_r($result); exit;

        //echo($ID); exit;
     }

    /* User Subscription  */

    /* Subscription Submit data  */

    public function Subscription()
    {
        date_default_timezone_set("Asia/Kolkata");
       
        $request = \Config\Services::request();
        $uri = $request->uri;
        $data['UserId']  = $this->request->getpost('ID');
        $ID = $data['UserId'];
        $data['Course_Id'] = $this->request->getpost('Course_ID');
        $data['Amount'] = $this->request->getpost('Amount');
        $data['Order_Date']=date("Y-m-d H:i:s");
        $data['Order_ReferenceNo']=date("Y-m-d H:i:s");
        $data['Subs_Date_PAID']=date("Y-m-d H:i:s");
        //print_r($data); exit;
        $model = new AdminModel();
        $result['Subscription'] = $model->Subscription($data);
        $result['User']= $model->Usersview($ID);
        $result['Course_orderlist']=$model->Course_orderlist($ID);
        $result['Course_Subscriptionlist']=$model->Subscriptionlist($ID);
        return view('Usersview.php',$result);

    }

    /*  Subscription User data */

    /* Select Particular Course for price   */
    public function Selectcourseprice()
      {
          if (isset($_SESSION['AdminName']))
          {
            

            $model = new AdminModel();   
            $data['CourseId']=$this->request->getpost('CourseId'); 
            $model = new AdminModel();
            $result=$model->Selectcourseprice($data);
            echo json_encode($result); exit;
            

          
            
            
          }
          else
          {
              return view('Admin/Login');
          }
            
      }

    /* Slect Particular price for price   */


    /* Language LIst  */
    public function Languages()
  {
     if (isset($_SESSION['AdminName']))
     {
         $model = new AdminModel();
         $result['Data'] = $model->TagList();
         return view('Languagelist',$result);
     }
     else
     {
        return view('Login');
     }
      
  }
    /* Language List  */

    /* Add Language  */
    public function AddTags()
    {
      if (isset($_SESSION['AdminName']))
      {
         $data['Tag_Name']=$this->request->getpost('LanguageName');
         
            try {
                 $model = new AdminModel();
                $result['Msg']=$model->AddTags($data);
                $result['Data'] = $model->TagList();
                
            } catch (\Exception $e) {
                //die($e->getMessage());
                $exec['Msg']=$e->getMessage(); 
                 $exec['Status']=false; 
                $result['Msg']=$exec;
                $result['Data'] = $model->TagList();
            }
         
         
        
         return view('Languagelist',$result);
      }
      else
      {
       
         return view('Login');
      
      }
    }
    /* Add Language   */

    public function LanguageUpdate()
     {
        $data['LanguageId']=$this->request->getpost('id');
        $model = new AdminModel();
        $result=$model->LanguageUpdate($data);
        echo json_encode($result); exit;
     }

    public function UpdateLanguage()
     {
         $data['Tag_Name']=$this->request->getpost('LanguageName');
         $data['Tag_ID']=$this->request->getpost('LanguageId');
         //$data['Language_Subtitle']=$this->request->getpost('Language_Subtitle');
         //$Image=$this->request->getfile('Image');
         
         $model = new AdminModel();
         $result['Msg']=$model->UpdateLanguage($data);
         $result['Data'] = $model->TagList();
         return view('Languagelist',$result);
     }

    public function TagDelete($Tag_Name)
    {

     if (isset($_SESSION['AdminName']))
        {
      
         $model = new AdminModel();
         $result['Msg']= $model->TagDelete($Tag_Name);
         $result['Data'] = $model->TagList();
         return view('Languagelist',$result);
     

        }
       else
       {
           return view('Login');
       }

     }

public function Logout()
  {

    $this->session->destroy('AdminName');
    return view('Login');
  }

  /* Media Gallery */
  public function  media_library()
  {    
    if (isset($_SESSION['AdminName']))
    {

       $model = new AdminModel();
       $result['media']=$model->display_media();
       // echo '<pre>'; print_r($result); exit;
       return view('Media_Library.php',$result);
    }
    else
    {
       return view('Login');
    }

  }

  /* Media Gallery */
  /*  Add Media Gallery */
  public function Add_media()
  {
      if (isset($_SESSION['AdminName']))
      {
         return view('Add_Media.php');
      }
     else
      {
         return view('Login');

      }
  }
  /*  Add Media Gallery */
   /* Submit  Media Gallery  */
 public function AddmediaPost()
 {

    helper('date');
     if (isset($_SESSION['AdminName']))
      {
         $Image=$this->request->getfile('Media_Img');
         $Image2=$this->request->getfile('Media_Img2');
         $Image3=$this->request->getfile('Media_Img3');
         $Image4=$this->request->getfile('Media_Img4');
         $Image5=$this->request->getfile('Media_Img5');
          
         
         $model = new AdminModel();
         if($Image->isvalid())
          {
            
            $filename=explode('.', trim($Image->getName()));
            $newName = str_replace(' ', '_', $filename[0]).'_'.now().'.'.$filename[1];
            $data['Title']=$filename[0];
            $data['size']=round($Image->getSizeByUnit('kb')).' KB';
            //$newName = $Image->getRandomName();
            //$newName = now().$Image->guessExtension();
            
            
            $imag=$Image->move(ImagePath, $newName);
            $data['Media_Img']=$newName ;
            $result['Msg']=$model->AddmediaPost($data);
          }
          
          
          if($Image2->isvalid())
          {
            
            
            //$newName = $Image2->getRandomName();
             
            $filename2=explode('.', trim($Image2->getName()));
            $newName2 = str_replace(' ', '_', $filename2[0]).'_'.now().'.'.$filename2[1];
            
            $data2['Title']=$filename2[0];
            $data2['size']=round($Image2->getSizeByUnit('kb')).' KB';
            
            $imag=$Image2->move(ImagePath, $newName2);
            $data2['Media_Img']=$newName2 ;
            $result['Msg']=$model->AddmediaPost($data2);
          }
          
          
          if($Image3->isvalid())
          {
            $filename3=explode('.', trim($Image3->getName()));
            $newName3 = str_replace(' ', '_', $filename3[0]).'_'.now().'.'.$filename3[1];
           
           
            $data3['Title']=$filename3[0];
            $data3['size']=round($Image3->getSizeByUnit('kb')).' KB';
           
           // $newName = $Image3->getRandomName();
            $imag=$Image3->move(ImagePath, $newName3);
            $data3['Media_Img']=$newName3 ;
            $result['Msg']=$model->AddmediaPost($data3);
          }
          
          
           if($Image4->isvalid())
          {
            
            
            $filename4=explode('.', trim($Image4->getName()));
            $newName4 = str_replace(' ', '_', $filename4[0]).'_'.now().'.'.$filename4[1];
           
            $data4['Title']=$filename4[0];
            $data4['size']=round($Image4->getSizeByUnit('kb')).' KB';
            
            //$newName = $Image4->getRandomName();
            $imag=$Image4->move(ImagePath, $newName4);
            $data4['Media_Img']=$newName4 ;
            $result['Msg']=$model->AddmediaPost($data4);
          }
          
          if($Image5->isvalid())
          {
            
            
            $filename5=explode('.', trim($Image5->getName()));
            $newName5 = str_replace(' ', '_', $filename5[0]).'_'.now().'.'.$filename5[1];
           
           $data5['Title']=$filename5[0];
           $data5['size']=round($Image5->getSizeByUnit('kb')).' KB';
            
            //$newName = $Image5->getRandomName();
            $imag=$Image5->move(ImagePath, $newName5);
            $data5['Media_Img']=$newName5 ;
            $result['Msg']=$model->AddmediaPost($data5);
          }
          
          
          //echo '<pre>'; print_r($data); exit;
         
         
         
         //$result['Msg']=$model->AddmediaPost($data);
         //print_r()
         $result['media']=$model->display_media();
         return view('Media_Library.php',$result);

      }
      else
      {
            return view('Login');
      }
      
   }
   /*  SUbmit Media Gallery */
  public function delete_media($Media_Id)
    {    
        if (isset($_SESSION['AdminName']))
        {
      
         $model = new AdminModel();
         $result['Msg']= $model->delete_media($Media_Id);
        
         $result['media']=$model->display_media();
         return view('Media_Library.php',$result);
        }
      else
       {
          return view('Login');
       }
    
   }

  /*Package Publish */
  public function unpublish()
  {
     $data['PackageId']=$this->request->getpost('Package_Id');
     $data['Status']=$this->request->getpost('Status');
     $model = new AdminModel();
     $result['Msg']= $model->unpublish($data);
     echo json_encode($result['Msg']); exit;

  }
  /* Package Publish */

  public function publish()
  {
     $data['PackageId']=$this->request->getpost('Package_Id');
     $data['Status']=$this->request->getpost('Status');
     $model = new AdminModel();
     $result['Msg']= $model->unpublish($data);
     echo json_encode($result['Msg']);

  }

  Public function Nikhil_insert()
  {
   
    
   //  $data = ['Name'=>$this->request->getVar('Name'),
   //  'Category'=>$this->request->getVar('Category'),
   //  'Description'=>$this->request->getVar('Description') ];

   //  $db=\Config\Database::connect();
   //  $builder = $db->table('Nikhil');

   //  $builder->Nikhil_insert($data);
   //  $model = new AdminModel();
   // $result['Data']=$model->Nikhil_display();
   return view('Nikhil.php');
     

   }

   public function updatePassword(){
        //echo '<pre>'; 
       //print_r($_SESSION); exit;
      return view('UpdatePassword.php');
   }

   public function changePassword()
   {
     
     
        if($this->request->getpost('changePassword'))
          {
          
             $User_ID = $_SESSION['Id'];
           
           $data['currentPass']=md5($this->request->getpost('currentPass'));
              $data['password']=$this->request->getpost('password');
             $data['confirmPass']=$this->request->getpost('confirmPass');
            //  echo '<pre>';
            //  print_r($data); exit;
           $model = new AdminModel();
               
           $result['Msg'] = $model->changePassword($data,$User_ID);
           //echo '<pre>'; print_r($result); exit;
             return view('UpdatePassword',$result);
         

                
             }
              
          }

   
public function PaymentsList(){
   $model = new AdminModel();
   $result['Data'] = $model->PaymentsList();
   $result['Users'] = $model->UserApplist();
   return view('Payments',$result);
}

public function AddPayments()
    {
      if (isset($_SESSION['AdminName']))
      {
         $data['User_ID']=$this->request->getpost('User_Id');
         $data['UserName']=$this->request->getpost('UserName');
         $data['PayDate']=$this->request->getpost('PayDate');
         $data['Amount']=$this->request->getpost('Amount');
         $data['PaymentDetails']=$this->request->getpost('PaymentDetails');
      
         $model = new AdminModel();
         $result['Msg']=$model->AddPayments($data);
         $result['Data'] = $model->PaymentsList();
         $result['Users'] = $model->UserApplist();
         return view('Payments',$result); 
      }
      else
      {
       
         return view('Login');
      
      }
   }
  

   public function PaymentDelete($Payment_ID)
   {

    if (isset($_SESSION['AdminName']))
       {
     
        $model = new AdminModel();
        $result['Msg']= $model->PaymentDelete($Payment_ID);
        $result['Data'] = $model->PaymentsList();
        $result['Users'] = $model->UserApplist();
        return view('Payments',$result);
    

       }
      else
      {
          return view('Login');
      }

    }

    public function PaymentUpdate()
    {
       $data['Payment_ID']=$this->request->getpost('id');
       //$data['User_ID']=$this->request->getpost('User_ID');
       //print_r($data); exit;
       $model = new AdminModel();
       $result=$model->PaymentUpdate($data);
       //$result['Users'] = $model->UserApplist();
       echo json_encode($result); exit;
       //return view('Payments',$result);
    }


    public function UpdatePayment()
    {
        $data['Payment_ID']=$this->request->getpost('Payment_ID');
        $data['User_ID']=$this->request->getpost('User_ID');
        $data['UserName']=$this->request->getpost('UserName');
        $data['PayDate']=$this->request->getpost('PayDate');
        $data['Amount']=$this->request->getpost('Amount');
        $data['PaymentDetails']=$this->request->getpost('PaymentDetails');
       
        $model = new AdminModel();
        $result['Msg']=$model->UpdatePayment($data);
        
        $result['Data'] = $model->PaymentsList();
        $result['Users'] = $model->UserApplist();
        
        return view('Payments',$result);
    }


    public function ReferEarn(){
      if (isset($_SESSION['AdminName']))
      {
       $Ref_Code = $this->request->getpost('Ref_Code');
       $model = new AdminModel();
       $result['Data'] = $model->ReferEarn($Ref_Code);
       //$result['Data'] = $model->ReferAndEarn();
       return view('Refer_earn',$result);
      }
      else
      {
          return view('Login');
      }

    }
    

    public function PaymentNow()
    {
       $data['Payment_ID']=$this->request->getpost('id');
       //$data['User_ID']=$this->request->getpost('User_ID');
       //print_r($data); exit;
       $model = new AdminModel();
       $result=$model->PaymentNow($data);
       //$result['Users'] = $model->UserApplist();
       echo json_encode($result); exit;
    }


    
public function PayNow()
{
  if (isset($_SESSION['AdminName']))
  {
     $data['User_ID']=$this->request->getpost('User_Id');
     $data['UserName']=$this->request->getpost('UserName');
     $data['PayDate']=$this->request->getpost('PayDate');
     $data['Amount']=$this->request->getpost('Amount');
     $data['PaymentDetails']=$this->request->getpost('PaymentDetails');
  
     $model = new AdminModel();
     $result['Msg']=$model->AddPayments($data);
     $result['Data'] = $model->ReferEarn();
     $result['Users'] = $model->UserApplist();

     return view('Refer_earn',$result); 
  }
  else
  {
   
     return view('Login');
  
  }
}
public function refer(){
  
   return view('Refer_E');
} 


}






