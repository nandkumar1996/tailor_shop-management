<?php
if(isset($_POST['submit']))
{
    require_once 'dbs.php';
    $first=mysqli_real_escape_string($link,$_POST['first']);
    $last=mysqli_real_escape_string($link,$_POST['last']);
    $email=mysqli_real_escape_string($link,$_POST['email']);
    $mobile=mysqli_real_escape_string($link,$_POST['mobile']);
    $msg=mysqli_real_escape_string($link,$_POST['msg']);
   if(empty($first)||empty($last)||empty($email)||empty($mobile)||empty($msg))
   {
	        header("Location: ../tailor/home.php?details=empty");
            exit();
   }
   else
   {   
	    if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$last))
	     {	
           header("Location: ../tailor/home.php?information=invalid");
           exit();	
     	}
		else
	    {	
                //check if email is valid
                if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	              {
     	    	   header("Location: ../tailor/home.php?email=invalid");
	               exit();
		          }
					else
					{
						if(!preg_match("/^[0-9]*$/",$mobile))
						{
							header("Location: ../tailor/home.php?mobile=exactly 10 digit");
                           exit();
						}
							 else
							 {
								  $sql = "INSERT INTO contact(first,last,email,mobile,message) values('$first','$last','$email','$mobile','$msg');";
                                  mysqli_query($link,$sql);
                                  header("Location: ../tailor/home.php");
								  exit();
							 }
						 							 
							
					}
		}	  
		
   }		
						
}   
else   
{
	header("Location: ../tailor/home.php?details=error");
    exit();
}
?>