<?php
if(isset($_POST['submit']))
{
    require_once 'dbs.php';
    $first=mysqli_real_escape_string($link,$_POST['first']);
    $last=mysqli_real_escape_string($link,$_POST['last']);
    $email=mysqli_real_escape_string($link,$_POST['email']);
    $mobile=mysqli_real_escape_string($link,$_POST['mobile']);
    $address=mysqli_real_escape_string($link,$_POST['address']);
   if(empty($first)||empty($last)||empty($email)||empty($mobile)||empty($address))
   {
	        header("Location: ../cus_det.php?details=empty");
            exit();
   }
   else
   {   
	    if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$last))
	     {	
           header("Location: ../cus_det.php?registeration=invalid");
           exit();	
     	}
		else
	    {	
                //check if email is valid
                if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	              {
     	    	   header("Location: ../cus_det.php?email=invalid");
	               exit();
		          }
				  else
				  {
	          		$sql="SELECT *FROM cus_details WHERE cus_email='$email';";
			        $result=mysqli_query($conn, $sql);
			        $resultCheck=mysqli_num_rows($result);
			        if($resultCheck>0)
			        {
			          header("Location: ../cus_det.php?email=alreadyExist");
                       exit();			
			        }
					else
					{
						if(!preg_match("/^[0-9]*$/",$mobile))
						{
							header("Location: ../cus_det.php?mobile=exactly 10 digit");
                           exit();
						}
							 else
							 {
								  $sql = "INSERT INTO cus_details(cus_first,cus_last,cus_email,cus_mobile,cus_address) values('$first','$last','$email','$mobile','$address');";
                                  mysqli_query($link,$sql);
                                  header("Location: ../cusdetail.php");
							 }
						 							 
							
					}
				  }
		}
   }		
						
}   
else   
{
	header("Location: ../cus_det.php?details=error");
    exit();
}
?>