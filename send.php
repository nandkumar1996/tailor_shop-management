<?php

  $to=$_REQUEST['email'];
  $subject = "order Confirmation";
  $txt = "Hello sir, Your Order is Ready, Please come and Collect it from our Shop.";

  
  if(mail($to,$subject,$txt))
  {
    echo "send";
  }
  else{
	  echo "not send";
  } 
 ?>