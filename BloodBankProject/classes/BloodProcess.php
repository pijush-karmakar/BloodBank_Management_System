<?php 
$filepath = realpath(dirname( __FILE__ ) );

 include_once ($filepath.'/../lib/Database.php');
 include_once ($filepath.'/../helpers/Format.php');

 ?>


<?php 

class BloodProcess{
    private $db;
    private $fm;

	public function __construct() {
        $this->db = new Database();
        $this->fm = new Format();
	}


// ==============  For Blood Group ================ //

public function getBloodGroup(){
	$query = "SELECT * FROM bloodgroup ";
    $result = $this->db->select($query);
    return $result; 
}

public function getbgById($id){
	$query = "SELECT * FROM bloodgroup WHERE bg_id = '$id' ";
    $result = $this->db->select($query);
    return $result;
}

public function bgUpdate($bg_name, $id){
	$bg_name = $this->fm->validation($bg_name);
    $bg_name = mysqli_real_escape_string($this->db->link,$bg_name);
    $id      = mysqli_real_escape_string($this->db->link,$id);

    if( empty($bg_name) ){
         $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Blood Group Name must not be empty</div>';
         return $msg ;
      } 

      else{
         $query = "UPDATE bloodgroup SET bg_name = '$bg_name' WHERE bg_id = '$id'; ";
         $Update_row = $this->db->update( $query );

          if($Update_row){
            $msg = '<div class="alert alert-success"><strong>Success ! </strong>Blood Group Name Updated Successfully</div>';
            return $msg;
       }
       else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Blood Group Name Not Updated .</div>';
            return $msg;
       }

    }

}

public function bgInsert($bg_name){
	  $bg_name = $this->fm->validation($bg_name);
    $bg_name = mysqli_real_escape_string($this->db->link,$bg_name);

    $cQuery ="SELECT * FROM bloodgroup WHERE bg_name = '$bg_name' ";
    $chkQuery = $this->db->select($cQuery);
    if( $chkQuery ){
         $msg = '<div class="alert alert-danger"><strong>Error ! </strong>  Already Added .</div>';
        return $msg;
    }

    if( empty($bg_name) ){
         $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Blood Group  must not be empty</div>';
         return $msg ;
   	  } 

   	else{
       $query = "INSERT INTO bloodgroup(bg_name) VALUES('$bg_name')";
       $bgInsert = $this->db->insert($query);
       if($bgInsert){
       	    $msg = '<div class="alert alert-success"><strong>Success ! </strong>Blood Group Inserted Successfully</div>';
       	    return $msg;
       }
       else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Blood Group Not Inserted .</div>';
       	    return $msg;
       }

   	}  

}

public function delbgById($id){
   $query = "DELETE FROM bloodgroup WHERE bg_id = '$id' ";
   $result  = $this->db->delete($query);

    if( $result ){
      $msg = '<div class="alert alert-success"><strong>Success ! </strong> Deleted Successfully</div>';
      return $msg;
   }
   else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Deleted .</div>';
            return $msg;
       }
}

// =========  For District  =================== //

public function getDistrict(){
	$query = "SELECT d.*,v.divName FROM tbl_district AS d,tbl_division AS v WHERE d.divId = v.divId 

             ORDER BY d.distId DESC";

    $result = $this->db->select($query);
    return $result; 
}

public function distUpdate($data,$id){
	  $distName        = mysqli_real_escape_string($this->db->link,$data['distName']);
    $divId           = mysqli_real_escape_string($this->db->link,$data['divId']);
    $cityName        = mysqli_real_escape_string($this->db->link,$data['cityName']);
    $zipcode         = mysqli_real_escape_string($this->db->link,$data['zipcode']);

     if( empty($distName) || empty($cityName) || empty($zipcode) || empty($divId) ){
         $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Field must not be empty</div>';
         return $msg ;
      } 

      else{
         $query = "UPDATE tbl_district SET distName = '$distName', cityName = '$cityName', zipcode = '$zipcode',divId = '$divId' WHERE distId = '$id'; ";
         $Update_row = $this->db->update( $query );

          if($Update_row){
            $msg = '<div class="alert alert-success"><strong>Success ! </strong> Updated Successfully</div>';
            return $msg;
       }
       else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Updated .</div>';
            return $msg;
       }

    }

   
}

public function getdistById($id){
	$query = "SELECT * FROM tbl_district WHERE distId = '$id' ";
    $result = $this->db->select($query);
    return $result;
}

public function distInsert($data){
    $distName        = mysqli_real_escape_string($this->db->link,$data['distName']);
    $divId           = mysqli_real_escape_string($this->db->link,$data['divId']);
    $cityName        = mysqli_real_escape_string($this->db->link,$data['cityName']);
    $zipcode         = mysqli_real_escape_string($this->db->link,$data['zipcode']);



     if( empty($distName) || empty($cityName) || empty($zipcode) || empty($divId) ){
         $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Field must not be empty</div>';
         return $msg ;
      } 

      else{

          $query = "INSERT INTO tbl_district(divId,distName,cityName,zipcode) 
          VALUES('$divId','$distName','$cityName','$zipcode' ) ";
         $insert_row = $this->db->update( $query );

          if($insert_row){
            $msg = '<div class="alert alert-success"><strong>Success ! </strong> Inserted Successfully</div>';
            return $msg;
       }
       else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Inserted .</div>';
            return $msg;
       }

    }


}

public function getALLdiv(){
    $query = "SELECT * FROM tbl_division ORDER BY divId DESC";
    $result = $this->db->select($query);
    return $result;
}

public function getALLdist(){
    $query = "SELECT * FROM tbl_district ORDER BY distId DESC";
    $result = $this->db->select($query);
    return $result;
}

public function deldistById($id){
  $query = "DELETE FROM tbl_district WHERE distId = '$id' ";
   $result  = $this->db->delete($query);

    if( $result ){
      $msg = '<div class="alert alert-success"><strong>Success ! </strong> Deleted Successfully</div>';
      return $msg;
   }
   else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Deleted .</div>';
            return $msg;
       }

}

// =================  For Division  =================== //

public function divInsert($divName){
    $divName = $this->fm->validation($divName);
    $divName = mysqli_real_escape_string($this->db->link,$divName);

    $cQuery ="SELECT * FROM tbl_division WHERE divName = '$divName' ";
    $chkQuery = $this->db->select($cQuery);
    if( $chkQuery ){
         $msg = '<div class="alert alert-danger"><strong>Error ! </strong>  Already Added .</div>';
        return $msg;
    }

    if( empty($divName) ){
         $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Input Field must not be empty</div>';
         return $msg ;
      } 

    else{
       $query = "INSERT INTO tbl_division(divName) VALUES('$divName')";
       $divInsert = $this->db->insert($query);
       if($divInsert){
            $msg = '<div class="alert alert-success"><strong>Success ! </strong>Division Inserted Successfully</div>';
            return $msg;
       }
       else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Division Not Inserted .</div>';
            return $msg;
       }

    } 
}

public function getDivision(){
  $query = "SELECT * FROM tbl_division ORDER BY divId DESC";
    $result = $this->db->select($query);
    return $result; 
}

public function getdivById($id){
  $query = "SELECT * FROM tbl_division WHERE divId = '$id' ";
    $result = $this->db->select($query);
    return $result;
}

public function divUpdate($divName, $id){
    $divName = $this->fm->validation($divName);
    $divName = mysqli_real_escape_string($this->db->link,$divName);
    $id      = mysqli_real_escape_string($this->db->link,$id);

    if( empty($divName) ){
         $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Field must not be empty</div>';
         return $msg ;
      } 

      else{
         $query = "UPDATE tbl_division SET divName = '$divName' WHERE divId = '$id'; ";
         $Update_row = $this->db->update( $query );

          if($Update_row){
            $msg = '<div class="alert alert-success"><strong>Success ! </strong>Division Name Updated Successfully</div>';
            return $msg;
       }
       else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Updated .</div>';
            return $msg;
       }

    }

}

public function deldivById($id){
   $query = "DELETE FROM tbl_division WHERE divId = '$id' ";
   $result  = $this->db->delete($query);

    if( $result ){
      $msg = '<div class="alert alert-success"><strong>Success ! </strong> Deleted Successfully</div>';
      return $msg;
   }
   else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Deleted .</div>';
            return $msg;
       }
}


// For Camp ====================================  // 

public function campInsert($data,$file){
  
    $campTitle        = mysqli_real_escape_string($this->db->link,$data['campTitle']);
    $distId           = mysqli_real_escape_string($this->db->link,$data['distId']);
    $divId            = mysqli_real_escape_string($this->db->link,$data['divId']);
    $details          = mysqli_real_escape_string($this->db->link,$data['details']);
    $organizedBy      = mysqli_real_escape_string($this->db->link,$data['organizedBy']);
    


        $permited  = array( 'jpg','jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if( $campTitle=="" ||  $distId=="" ||  $divId=="" ||  $details=="" ||  $organizedBy=="" || $file_name=="" ){
          $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Field must not be empty</div>';
           return $msg ;
        }

        elseif ($file_size >1048567) {
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Image Size should be less then 1MB!</div>';
             return $msg;
        }

         elseif (in_array($file_ext, $permited) === false) {
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>You can upload only:-'
           .implode(', ', $permited).'</div>';

             return $msg;
        }

        else{
          move_uploaded_file($file_temp, $uploaded_image);
          $query = "INSERT INTO tbl_camp(campTitle,distId,divId,details,organizedBy,image ) 
          VALUES( '$campTitle','$distId','$divId','$details','$organizedBy','$uploaded_image' ) ";

            $insert_row = $this->db->insert($query);
           if($insert_row){
                $msg = '<div class="alert alert-success"><strong>Success ! </strong>Camp Inserted Successfully</div>';
                return $msg;
           }
           else{
               $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Camp Not Inserted .</div>';
                return $msg;
           }

        }

}


public function getAllCamp(){
     $query = " SELECT c.*,d.distName,v.divName FROM 
              tbl_camp as c, tbl_district as d,tbl_division as v
              WHERE c.distId = d.distId AND c.divId = v.divId 
              ORDER BY c.campId DESC " ;

   $result = $this->db->select($query);
   return $result;
}

public function getCampById($id){
  $query = "SELECT * FROM tbl_camp WHERE campId = '$id' ";
    $result = $this->db->select($query);
    return $result;
}


public function campUpdate( $data,$file,$id ) {

    $campTitle        = mysqli_real_escape_string($this->db->link,$data['campTitle']);
    $distId           = mysqli_real_escape_string($this->db->link,$data['distId']);
    $divId            = mysqli_real_escape_string($this->db->link,$data['divId']);
    $details          = mysqli_real_escape_string($this->db->link,$data['details']);
    $organizedBy      = mysqli_real_escape_string($this->db->link,$data['organizedBy']);
   


        $permited  = array( 'jpg','jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if( $campTitle=="" ||  $distId=="" ||  $divId=="" ||  $details=="" ||  $organizedBy=="" ){
          $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Field must not be empty</div>';
           return $msg ;
        }

        else{

            if(!empty($file_name) ){ 

                   if ($file_size >1048567) {
                   $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Image Size should be less then 1MB!</div>';
                     return $msg;
                       }

                  elseif (in_array($file_ext, $permited) === false) {
                   $msg = '<div class="alert alert-danger"><strong>Error ! </strong>You can upload only:-'
                   .implode(', ', $permited).'</div>';

                     return $msg;
                       }

                  else{
                      move_uploaded_file($file_temp, $uploaded_image);
                      
                      $query = "UPDATE tbl_camp SET 
                           campTitle       = '$campTitle',
                           distId          = '$distId',
                           divId           = '$divId',
                           details         = '$details',
                           organizedBy     = '$organizedBy',  
                           image           = '$uploaded_image'
                           WHERE campId   = '$id'  ";


                       $update_row = $this->db->update($query);
                       if($update_row){
                            $msg = '<div class="alert alert-success"><strong>Success ! </strong>Camp Updated Successfully</div>';
                            return $msg;
                       }
                       else{
                           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Camp Not Updated .</div>';
                            return $msg;
                       }

                  }

             } else{
                     $query = "UPDATE  tbl_camp SET 
                           campTitle       = '$campTitle',
                           distId          = '$distId',
                           divId           = '$divId',
                           details         = '$details',
                           organizedBy     = '$organizedBy'
                          
                          WHERE campId   = '$id'  ";


                       $update_row = $this->db->update($query);
                       if($update_row){
                            $msg = '<div class="alert alert-success"><strong>Success ! </strong>Camp Updated Successfully</div>';
                            return $msg;
                       }
                       else{
                           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Camp Not Updated .</div>';
                            return $msg;
                       } 
             }

      }

}

public function delCampById($id){
    $getquery = "SELECT * FROM tbl_camp WHERE campId='$id'  ";
    $getdata = $this->db->select($getquery);

   if($getdata){
      while( $delimg = $getdata->fetch_assoc() ){
         $dellink = $delimg['image'];
         unlink($dellink);            
      }
   }

   $query = "DELETE FROM tbl_camp WHERE campId='$id'  ";
   $deldata = $this->db->delete($query);
   
   if( $deldata ){
      $msg = '<div class="alert alert-success"><strong>Success ! </strong> Deleted Successfully</div>';
      return $msg;
   }
   else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Deleted .</div>';
            return $msg;
       }
}

public function getCamp(){
   $query = "SELECT * FROM tbl_camp ORDER BY campId DESC";
    $result = $this->db->select($query);
    return $result;
}

public function galleryInsert( $data,$file ){
    $imageTitle        = mysqli_real_escape_string($this->db->link,$data['imageTitle']);
    $campId           = mysqli_real_escape_string($this->db->link,$data['campId']);
    
    


        $permited  = array( 'jpg','jpeg', 'png', 'gif');
        $file_name = $file['galleryImage']['name'];
        $file_size = $file['galleryImage']['size'];
        $file_temp = $file['galleryImage']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if( $imageTitle=="" ||  $campId=="" || $file_name=="" ){
          $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Field must not be empty</div>';
           return $msg ;
        }

        elseif ($file_size >1048567) {
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Image Size should be less then 1MB!</div>';
             return $msg;
        }

         elseif (in_array($file_ext, $permited) === false) {
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>You can upload only:-'
           .implode(', ', $permited).'</div>';

             return $msg;
        }

        else{
          move_uploaded_file($file_temp, $uploaded_image);
          $query = "INSERT INTO tbl_campgallery(imageTitle,campId,galleryImage ) 
          VALUES( '$imageTitle','$campId','$uploaded_image' ) ";

          $insert_row = $this->db->insert($query);
           if($insert_row){
                $msg = '<div class="alert alert-success"><strong>Success ! </strong> Inserted Successfully</div>';
                return $msg;
           }
           else{
               $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Inserted .</div>';
                return $msg;
           }

        }

}


public function getCampGallery(){
        $query = " SELECT g.*,c.campTitle FROM 
              tbl_campgallery as g, tbl_camp as c
              WHERE g.campId = c.campId  
              ORDER BY g.galleryId DESC " ;

   $result = $this->db->select($query);
   return $result;
}


public function getCampGalleryById($id){
    $query = "SELECT * FROM tbl_campgallery WHERE galleryId = '$id' ";
    $result = $this->db->select($query);
    return $result;
}


public function galleryUpdate( $data,$file,$id ) {

    $campId               = mysqli_real_escape_string($this->db->link,$data['campId']);
    $imageTitle           = mysqli_real_escape_string($this->db->link,$data['imageTitle']);
   


        $permited  = array( 'jpg','jpeg', 'png', 'gif');
        $file_name = $file['galleryImage']['name'];
        $file_size = $file['galleryImage']['size'];
        $file_temp = $file['galleryImage']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if( empty($imageTitle) ||  empty($campId) ){
          $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Field must not be empty</div>';
           return $msg ;
        }

        else{

            if(!empty($file_name) ){ 

                   if ($file_size >1048567) {
                   $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Image Size should be less then 1MB!</div>';
                     return $msg;
                       }

                  elseif (in_array($file_ext, $permited) === false) {
                   $msg = '<div class="alert alert-danger"><strong>Error ! </strong>You can upload only:-'
                   .implode(', ', $permited).'</div>';

                     return $msg;
                       }

                  else{
                      move_uploaded_file($file_temp, $uploaded_image);
                      
                      $query = "UPDATE tbl_campgallery SET 
                           campId              = '$campId',
                           imageTitle          = '$imageTitle', 
                           galleryImage        = '$uploaded_image'
                           WHERE galleryId     = '$id' ";


                       $update_row = $this->db->update($query);
                       if($update_row){
                            $msg = '<div class="alert alert-success"><strong>Success ! </strong>Gallery Image Updated Successfully</div>';
                            return $msg;
                       }
                       else{
                           $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Updated .</div>';
                            return $msg;
                       }

                  }

             } else{
                     $query = "UPDATE  tbl_campgallery SET 
                           campId              = '$campId',
                           imageTitle          = '$imageTitle'
                          
                          WHERE galleryId   = '$id'  ";


                       $update_row = $this->db->update($query);
                       if($update_row){
                            $msg = '<div class="alert alert-success"><strong>Success ! </strong>Gallery Image Updated Successfully</div>';
                            return $msg;
                       }
                       else{
                           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Gallery Image Not Updated .</div>';
                            return $msg;
                       } 
             }

      }

}


public function delCampGalleryById($id){

    $getquery = "SELECT * FROM tbl_campgallery WHERE galleryId='$id'  ";
    $getdata = $this->db->select($getquery);

   if($getdata){
      while( $delimg = $getdata->fetch_assoc() ){
         $dellink = $delimg['galleryImage'];
         unlink($dellink);            
      }
   }

   $query = "DELETE FROM tbl_campgallery WHERE galleryId='$id'  ";
   $deldata = $this->db->delete($query);
   
   if( $deldata ){
      $msg = '<div class="alert alert-success"><strong>Success ! </strong> Deleted Successfully</div>';
      return $msg;
   }
   else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Deleted .</div>';
            return $msg;
       }


}


// =================  Donor Registration =======================  //

public function donorRegistration( $data,$file ){

        $name         = mysqli_real_escape_string($this->db->link,$data['name']);
        $gender       = mysqli_real_escape_string($this->db->link,$data['gender']);
        $age          = mysqli_real_escape_string($this->db->link,$data['age']);
        $mobile       = mysqli_real_escape_string($this->db->link,$data['mobile']);
        $bg_id        = mysqli_real_escape_string($this->db->link,$data['bg_id']);
        $email        = mysqli_real_escape_string($this->db->link,$data['email']);
        $password     = mysqli_real_escape_string($this->db->link,md5($data['password'] ) ) ;

        $permited  = array( 'jpg','jpeg', 'png', 'gif');
        $file_name = $file['donorImage']['name'];
        $file_size = $file['donorImage']['size'];
        $file_temp = $file['donorImage']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "admin/upload/".$unique_image;

        if( $name=="" ||  $gender=="" ||  $age=="" ||  $mobile=="" ||  $bg_id=="" ||  $email=="" || $password=="" || $file_name=="" ){
          $msg = '<div class="alert alert-danger alert-dismiss"><strong>Error ! </strong>Field must not be empty</div>';
           return $msg ;
        }

        $mailQuery = "SELECT * FROM  tbl_donorRegister WHERE email='$email' LIMIT 1 ";
        $mailChk   = $this->db->select($mailQuery);
        if( $mailChk != false ){
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Email Already exist</div>';
           return $msg;
        }  

        if( filter_var($email,FILTER_VALIDATE_EMAIL) === false ){
               $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Invalid email address .</div>";

                return $msg;
        }

        if ($file_size >1048567) {
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Image Size should be less then 1MB!</div>';
             return $msg;
        }

         elseif (in_array($file_ext, $permited) === false) {
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>You can upload only:-'
           .implode(', ', $permited).'</div>';

             return $msg;
        }

        else{
          move_uploaded_file($file_temp, $uploaded_image);

          $query = "INSERT INTO  tbl_donorRegister(name,gender,age,mobile,bg_id,email,password,donorImage ) 
          VALUES( '$name','$gender','$age','$mobile','$bg_id','$email','$password','$uploaded_image' ) ";

            $insert_row = $this->db->insert($query);
           if($insert_row){
                $msg = '<div class="alert alert-success"><strong>Success ! </strong>You are registered Successfully</div>';
                return $msg;
           }
           else{
               $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Inserted. try again...</div>';
                return $msg;
           }

        }

}


public function donorLogIn($data){
  
  $email      = mysqli_real_escape_string($this->db->link,$data['email']);
  $password   = mysqli_real_escape_string($this->db->link,md5($data['password']) );

      if( empty($email) || empty($password) ) {
          $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Field must not be empty</div>';
          return $msg ;
      }

      $query    = "SELECT * FROM  tbl_donorregister WHERE email='$email' AND password='$password'  ";
      $result   =  $this->db->select($query);
      if( $result != false ){

        $value = $result->fetch_assoc();
        Session::set("donorLogin",true );
        Session::set("donorId",$value['donorId'] );
        Session::set("donorName",$value['name'] ); 
        // echo "<script>window.location = 'donordashboard.php';</script>";
        header('location:donordashboard.php');
        
        
     }
     else{
          $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Email and Password not match...</div>';
          return $msg ;
     }
  
}

/// ===============   Blood Request  ====================  ////

public function sendBloodRequest( $data ){
        $reqName         = mysqli_real_escape_string($this->db->link,$data['reqName']);
        $reqGender       = mysqli_real_escape_string($this->db->link,$data['reqGender']);
        $reqAge          = mysqli_real_escape_string($this->db->link,$data['reqAge']);
        $reqMobile       = mysqli_real_escape_string($this->db->link,$data['reqMobile']);
        $bg_id           = mysqli_real_escape_string($this->db->link,$data['bg_id']);
        $reqEmail        = mysqli_real_escape_string($this->db->link,$data['reqEmail']);
        $reqDate         =  mysqli_real_escape_string($this->db->link,$data['reqDate']);
        $reqDetail       = mysqli_real_escape_string($this->db->link,$data['reqDetail']);



        if( $reqName=="" ||  $reqGender=="" ||  $reqAge=="" ||  $reqMobile=="" ||  $bg_id=="" ||  $reqEmail=="" || $reqDate=="" || $reqDetail=="" ){
            $msg = '<div class="alert alert-danger alert-dismiss"><strong>Error ! </strong>Field must not be empty</div>';
           return $msg ;
        }

        else{

            $query = "INSERT INTO  tbl_request(reqName,reqGender,reqAge,reqMobile,bg_id,reqEmail,reqDate,reqDetail ) 
            VALUES( '$reqName','$reqGender','$reqAge','$reqMobile','$bg_id','$reqEmail','$reqDate','$reqDetail' ) ";

            $insert_row = $this->db->insert($query);
            if($insert_row){
                $msg = '<div class="alert alert-success"><strong>Success ! </strong>Request Sent Successfully</div>';
                return $msg;
             }
            else{
               $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Sent. try again...</div>';
                return $msg;
            }

        }

}


public function getBloodReq(){
    $query = "SELECT r.*,b.bg_name FROM tbl_request AS r,bloodgroup AS b WHERE b.bg_id = r.bg_id 

             ORDER BY r.requestId DESC";

    $result = $this->db->select($query);
    return $result; 
}

// ========== for profile page ============  //

public function getDonarData($donorId){
    $query = "SELECT d.*,b.bg_name FROM tbl_donorregister AS d,bloodgroup AS b WHERE d.bg_id = b.bg_id AND donorId = '$donorId' " ;
    
    $result = $this->db->select($query);
    return $result;
}

 public function donorUpdate( $data,$file,$donorId ){
     
    $name             = mysqli_real_escape_string($this->db->link,$data['name']);
    $gender           = mysqli_real_escape_string($this->db->link,$data['gender']);
    $bg_id            = mysqli_real_escape_string($this->db->link,$data['bg_id']);
    $age              = mysqli_real_escape_string($this->db->link,$data['age']);
    $mobile           = mysqli_real_escape_string($this->db->link,$data['mobile']);
    $email            = mysqli_real_escape_string($this->db->link,$data['email']);
   


        $permited  = array( 'jpg','jpeg', 'png', 'gif');
        $file_name = $file['donorImage']['name'];
        $file_size = $file['donorImage']['size'];
        $file_temp = $file['donorImage']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "admin/upload/".$unique_image;

        if( $name=="" ||  $gender=="" ||  $bg_id=="" ||  $age=="" ||  $mobile=="" || $email=="" ){
          $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Field must not be empty</div>';
           return $msg ;
        }

        else{

            if(!empty($file_name) ){ 

                   if ($file_size >1048567) {
                   $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Image Size should be less then 1MB!</div>';
                     return $msg;
                       }

                  elseif (in_array($file_ext, $permited) === false) {
                   $msg = '<div class="alert alert-danger"><strong>Error ! </strong>You can upload only:-'
                   .implode(', ', $permited).'</div>';

                     return $msg;
                       }

                  else{
                      move_uploaded_file($file_temp, $uploaded_image);
                      
                      $query = "UPDATE tbl_donorregister SET 
                           name            = '$name',
                           gender          = '$gender',
                           bg_id           = '$bg_id',
                           age             = '$age',
                           mobile          = '$mobile',  
                           email           = '$email',  
                           donorImage      = '$uploaded_image'
                           WHERE donorId    = '$donorId'  ";


                       $update_row = $this->db->update($query);
                       if($update_row){
                            $msg = '<div class="alert alert-success"><strong>Success ! </strong>Your data Updated Successfully</div>';
                            return $msg;
                       }
                       else{
                           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>your data Not Updated .</div>';
                            return $msg;
                       }

                  }

             } else{
                    $query = "UPDATE tbl_donorregister SET 
                           name            = '$name',
                           gender          = '$gender',
                           bg_id           = '$bg_id',
                           age             = '$age',
                           mobile          = '$mobile',  
                           email           = '$email'
                          
                          WHERE donorId    = '$donorId'  ";


                       $update_row = $this->db->update($query);
                       if($update_row){
                            $msg = '<div class="alert alert-success"><strong>Success ! </strong>Your data Updated Successfully</div>';
                            return $msg;
                       }
                       else{
                           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>your data Not Updated .</div>';
                            return $msg;
                       } 
             }

      }
     
 }

// ==============  For searching the blood group ==============//

public function searchResult(){
    $query = "SELECT d.*,b.bg_name FROM tbl_donorregister AS d,bloodgroup AS b WHERE d.bg_id = b.bg_id AND 
    d.bg_id='". $_REQUEST["bg"]."' " ;
    
    $result = $this->db->select($query);
    return $result;
}

//  ==================== For slider ================= //

public function sliderInsert( $data,$file ){

        $body      = mysqli_real_escape_string($this->db->link,$data['body']);

        $permited  = array( 'jpg','jpeg', 'png', 'gif');
        $file_name = $file['slider_image']['name'];
        $file_size = $file['slider_image']['size'];
        $file_temp = $file['slider_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if( $body==""  || $file_name=="" ){
          $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Field must not be empty</div>';
           return $msg ;
        }

        elseif ($file_size >1048567) {
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Image Size should be less then 1MB!</div>';
             return $msg;
        }

         elseif (in_array($file_ext, $permited) === false) {
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>You can upload only:-'
           .implode(', ', $permited).'</div>';

             return $msg;
        }

        else{
          move_uploaded_file($file_temp, $uploaded_image);
          $query = "INSERT INTO tbl_slider(body,slider_image ) 
          VALUES( '$body','$uploaded_image' ) ";

            $insert_row = $this->db->insert($query);
           if($insert_row){
                $msg = '<div class="alert alert-success"><strong>Success ! </strong>Slide Inserted Successfully</div>';
                return $msg;
           }
           else{
               $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Slide Not Inserted .</div>';
                return $msg;
           }

        }


}


public function getAllSlide(){
   $query = "SELECT * FROM tbl_slider  ORDER BY slider_id DESC ";
   $result = $this->db->select($query);
   return $result;
}

public function getSlideById($id){
  $query = "SELECT * FROM tbl_slider WHERE slider_id = '$id' ";
  $result = $this->db->select($query);
  return $result;
}

public function slideUpdate($data,$file,$id){

    $body      = mysqli_real_escape_string($this->db->link,$data['body']);
   


        $permited  = array( 'jpg','jpeg', 'png', 'gif');
        $file_name = $file['slider_image']['name'];
        $file_size = $file['slider_image']['size'];
        $file_temp = $file['slider_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if( $body=="" ){
          $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Field must not be empty</div>';
           return $msg ;
        }

        else{

            if(!empty($file_name) ){ 

                   if ($file_size >1048567) {
                   $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Image Size should be less then 1MB!</div>';
                     return $msg;
                       }

                  elseif (in_array($file_ext, $permited) === false) {
                   $msg = '<div class="alert alert-danger"><strong>Error ! </strong>You can upload only:-'
                   .implode(', ', $permited).'</div>';

                     return $msg;
                       }

                  else{
                      move_uploaded_file($file_temp, $uploaded_image);
                      
                      $query = "UPDATE tbl_slider SET 
                           body           = '$body',  
                           slider_image   = '$uploaded_image'
                           WHERE slider_id   = '$id'  ";


                       $update_row = $this->db->update($query);
                       if($update_row){
                            $msg = '<div class="alert alert-success"><strong>Success ! </strong>Slide Updated Successfully</div>';
                            return $msg;
                       }
                       else{
                           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Slide Not Updated .</div>';
                            return $msg;
                       }

                  }

             } else{
                     $query = "UPDATE  tbl_slider SET 
                           body           = '$body'
                          
                          WHERE slider_id   = '$id'  ";


                       $update_row = $this->db->update($query);
                       if($update_row){
                            $msg = '<div class="alert alert-success"><strong>Success ! </strong>Slide Updated Successfully</div>';
                            return $msg;
                       }
                       else{
                           $msg = '<div class="alert alert-danger"><strong>Error ! </strong>Slide Not Updated .</div>';
                            return $msg;
                       } 
             }

      }

}


public function delSlideById($id){

    $getquery = "SELECT * FROM tbl_slider WHERE slider_id='$id'  ";
    $getdata = $this->db->select($getquery);

   if($getdata){
      while( $delimg = $getdata->fetch_assoc() ){
         $dellink = $delimg['slider_image'];
         unlink($dellink);            
      }
   }

   $query = "DELETE FROM tbl_slider WHERE slider_id='$id'  ";
   $deldata = $this->db->delete($query);
   
   if( $deldata ){
      $msg = '<div class="alert alert-success"><strong>Success ! </strong> Deleted Successfully</div>';
      return $msg;
   }
   else{
           $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not Deleted .</div>';
            return $msg;
       }

}

//  ============== for site Option ==================//

public function OptionInsert($data){

    $site_email      = mysqli_real_escape_string($this->db->link,$data['site_email']);
    $site_phone      = mysqli_real_escape_string($this->db->link,$data['site_phone']);
    $copyright      = mysqli_real_escape_string($this->db->link,$data['copyright']);
    $fb      = mysqli_real_escape_string($this->db->link,$data['fb']);
    $tw      = mysqli_real_escape_string($this->db->link,$data['tw']);
    $gp      = mysqli_real_escape_string($this->db->link,$data['gp']);
    $ins      = mysqli_real_escape_string($this->db->link,$data['ins']);


       if( $site_email=="" ||  $site_phone=="" ||  $copyright=="" ||  $fb=="" ||  $tw=="" ||  $gp=="" || $ins==""  ){
            $msg = '<div class="alert alert-danger alert-dismiss"><strong>Error ! </strong>Field must not be empty</div>';
           return $msg ;
        }

        else{

            $query = "INSERT INTO  tbl_social(site_email,site_phone,copyright,fb,tw,gp,ins ) 
            VALUES( '$site_email','$site_phone','$copyright','$fb','$tw','$gp','$ins' ) ";

            $insert_row = $this->db->insert($query);
            if($insert_row){
                $msg = '<div class="alert alert-success"><strong>Success ! </strong>Added Successfully</div>';
                return $msg;
             }
            else{
               $msg = '<div class="alert alert-danger"><strong>Error ! </strong> Not added. try again...</div>';
                return $msg;
            }

        }


}
















}

?>