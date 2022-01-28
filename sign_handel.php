<?php 
session_start(); 

$first_name=$_POST['first-name'];
$last_name=$_POST['last-name'];
$email_mobile=$_POST['email-mobile'];
$up_password=$_POST['up-password'];
$birth_day=$_POST['birth-day'];
$birth_month=$_POST['birth-month'];
$birth_year=$_POST['birth-year'];
$gen=$_POST['gen'];
$errors=[];
$passwordLen = strlen($up_password);
$first_nameLen = strlen($first_name);
$last_nameLen = strlen($last_name);





if(empty($first_name)){
 
    $errors[]="firstName is required";
  }else if($first_nameLen <8 or $first_nameLen > 30){
     $errors[]="firstName should be between 8 and 30 letters";
  }
 if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {  
    $errors[] = "Only alphabets and white space are allowed";  
} 
  if(empty($last_name)){
      $errors[]="lastName is required";
     }else if($last_nameLen <8 or $last_nameLen > 30){
        $errors[]="lastName should be between 8 and 30 letters";
     }
     if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {  
      $errors[] = "Only alphabets and white space are allowed";  
  } 
     if(empty($email_mobile)){
       $errors[]="email is required";
       }else if(!filter_var($email_mobile,FILTER_VALIDATE_EMAIL)){
       $errors[]="email is not valid";
       }

     if(empty($up_password)){
        $errors[]="password is required";
      }else if($passwordLen <4 or $passwordLen > 30){
       $errors[]="password should be between 8 and 30 letters";
      }

     
       
       
       if(!empty($gen))
       {
        $gen=$_POST['gen'];
           }else{
          $errors[]="please select any one ";
       }
       

      if(empty($errors)){
        $_SESSION['Login']=true;
       // header("location:home.php");
        $dbEmail="tariqshreem00@gmail.com";
        $dbPassword="12345678";
        if($email_mobile==$dbEmail){
            if($up_password==$dbPassword){
              $_SESSION['username']=$first_name;
              $_SESSION['useremail']=$email_mobile;

             header("location:home.php");

            }else {
             $_SESSION['error']='your password is invalid';
              header("location:sign.php");
            }
        }else{
            $_SESSION['error']='your email is invalid';
            header("location:sign.php");
        }


      } else {
      
        $_SESSION['errors']=$errors;
        header("location:sign.php");
      }

    /*  if(empty($errors)){
        $_SESSION['Login']=true;
        header("location:home.php");

      }else{
        $_SESSION['errors']=$errors;
        header("location:sign.php");


      }*/
      



      

  







/*echo "first name is $first_name and last name is $last_name and mobile or email is $email_mobile
and password is $up_password and birthday is $birth_day and birthmonth is $birth_month
and birthyead is $birth_year and gender is $gen";*/

?>