<?php
if(isset($_POST['submit']))
{
    require_once 'dbs.php';
    $first=mysqli_real_escape_string($link,$_POST['first']);
    $last=mysqli_real_escape_string($link,$_POST['last']);
    $email=mysqli_real_escape_string($link,$_POST['email']);
    $mobile=mysqli_real_escape_string($link,$_POST['mobile']);
    $address=mysqli_real_escape_string($link,$_POST['address']);
	$west=mysqli_real_escape_string($link,$_POST['west']);
	$thigh=mysqli_real_escape_string($link,$_POST['thigh']);
	$length=mysqli_real_escape_string($link,$_POST['length']);
	$pay=mysqli_real_escape_string($link,$_POST['pay']);
	$remain=400-$pay;
   if(empty($first)||empty($last)||empty($email)||empty($mobile)||empty($address)||empty($west)||empty($thigh)||empty($length))
   {
	        header("Location: ../pant.php?details=empty");
            exit();
   }
   else
   {   
	    if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$last))
	     {	
           header("Location: ../pant.php?signup=invalid");
           exit();	
     	}
		else
	    {	
                //check if email is valid
                if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	              {
     	    	   header("Location: ../pant.php?email=incalid");
	               exit();
		          }
				  else
				  {
	          		$sql="SELECT *FROM cus_pant_details WHERE cus_email='$email';";
			        $result=mysqli_query($conn, $sql);
			        $resultCheck=mysqli_num_rows($result);
			        if($resultCheck>0)
			        {
			          header("Location: ../pant.php?email=alreadyExist");
                       exit();			
			        }
					else
					{
						if(!preg_match("/^[0-9]*$/",$mobile))
						{
							header("Location: ../pant.php?mobile=exactly 10 digit");
                           exit();
						}
                         else
						 {
							 if(!ctype_digit($west)||!ctype_digit($thigh)||!ctype_digit($length))
							 {
								header("Location: ../pant.php?measure=it must be positive");
                                exit();
							 }
							 else
							 {
								  $sql = "INSERT INTO cus_pant_details(cus_first,cus_last,cus_email,cus_mobile,cus_address,cus_west,cus_thigh,cus_length,cus_pay,cus_remain) values('$first','$last','$email','$mobile','$address','$west','$thigh','$length','$pay','$remain');";
                                  mysqli_query($link,$sql);
                                  header("Location: ../pant.php?details=success");
							 }
						 }							 
							
					}
				  }
		}
   }		
						
}   
else   
{
	header("Location: ../pant.php?details=error");
    exit();
}
?>