<?php


$testo_alt=strip_tags($testo);





$email_to =new PHPMailer();
      /**********/
	/*
	$email_to->Host='000.000.000.000';
        $email_to->SMTPAuth =true; // turn on SMTP authentication  
        $email_to->Username = "username"; // SMTP username
        $email_to->Password = "password"; // SMTP password
	$email_to->SMTPDebug  = 2; 
	*/
      /**********/
	  $email_to->From     = "$mittente";
	  $email_to->FromName = "$mittente_name";
	  $email_to->Subject  = "$oggetto";
	  $email_to->Body=" $testo";
	  $email_to->AltBody=" $testo_alt";
	  $email_to->Sender="$mittente";
	  $email_to->replyTo  = "$mittente";
	  $email_to->AddAddress("$mail");         
	  if (!$email_to->Send()) 
	  {
	  	echo "ERRORE NELL'INVIO DELLA MAIL<br>".$email_to->ErrorInfo;
	  	exit;
	  }	else{
	  	echo 1;
	  }
	  $email_to->ClearAddresses();
	  $email_to->ClearBCCs();
	  $email_to->ClearAttachments();


?>
