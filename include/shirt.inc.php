<?php
if(isset($_POST['submit']))
{
    require_once 'dbs.php';
    $first=mysqli_real_escape_string($link,$_POST['first']);
    $last=mysqli_real_escape_string($link,$_POST['last']);
    $email=mysqli_real_escape_string($link,$_POST['email']);
    $mobile=mysqli_real_escape_string($link,$_POST['mobile']);
    $address=mysqli_real_escape_string($link,$_POST['address']);
	$collar=mysqli_real_escape_string($link,$_POST['collar']);
	$sleeve=mysqli_real_escape_string($link,$_POST['sleeve']);
	$cuffing=mysqli_real_escape_string($link,$_POST['cuffing']);
	$chest=mysqli_real_escape_string($link,$_POST['chest']);
	$neck=mysqli_real_escape_string($link,$_POST['neck']);	
	$length=mysqli_real_escape_string($link,$_POST['length']);
	$pay=mysqli_real_escape_string($link,$_POST['pay']);
	$remain=300-$pay;
   if(empty($first)||empty($last)||empty($email)||empty($mobile)||empty($address)||empty($collar)||empty($sleeve)||empty($cuffing)||empty($chest)||empty($neck)||empty($length)||empty($pay))
   {
	        header("Location: ../sh.php?details=empty");
            exit();
   }
   else
   {   
	    if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$last))
	     {	
           header("Location: ../sh.php?details=invalid");
           exit();	
     	}
		else
	    {	
                //check if email is valid
                if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	              {
     	    	   header("Location: ../sh.php?email=incalid");
	               exit();
		          }
				  else
				  {
	          		$sql="SELECT *FROM cus_pant_details WHERE cus_email='$email';";
			        $result=mysqli_query($conn, $sql);
			        $resultCheck=mysqli_num_rows($result);
			        if($resultCheck>0)
			        {
			          header("Location: ../sh.php?email=alreadyExist");
                       exit();			
			        }
					else
					{
						if(!preg_match("/^[0-9]*$/",$mobile))
						{
							header("Location: ../sh.php?mobile=exactly 10 digit");
                           exit();
						}
                         else
						 {
							 if(!ctype_digit($collar)||!ctype_digit($sleeve)||!ctype_digit($cuffing)||!ctype_digit($chest)||!ctype_digit($neck)||!ctype_digit($length))
							 {
								header("Location: ../sh.php?measure=it must be positive");
                                exit();
							 }
							 else
							 {
								  $sql = "INSERT INTO cus_shirt_details(cus_first,cus_last,cus_email,cus_mobile,cus_address,cus_collar,cus_sleeve,cus_cuffing,cus_chest,cus_neck,cus_length,cus_pay,cus_remain) values('$first','$last','$email','$mobile','$address','$collar','$sleeve','$cuffing','$chest','$neck','$length','$pay','$remain');";
                                  mysqli_query($link,$sql);
                                  header("Location: ../sh.php?details=success");
							 }
						 }							 
							
					}
				  }
		}
   }		
						
}   
else   
{
	header("Location: ../sh.php?details=error");
    exit();
}
?>