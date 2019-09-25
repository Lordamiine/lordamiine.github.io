<?php 

 $msg = '';
 $msgClass = '';

  //Submit
if (filter_has_var(INPUT_POST, 'submit')) {
	echo 'Submitted';

	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$message = htmlspecialchars($_POST['message']);

	if (!empty($email) && !empty($name) && !empty($message)) {
		
        if (filter_var($email, FILTER_VALIDATE_EMAIL === false)) {
        	  $msg = 'Merci de remplir tous les champs';
              $msgClass = 'danger dalerte';
        
        }else{

        	$toEmail = 'fatimazahra.mzarhoudy@gmail.com';
        	$subject = 'Contact Request Form '.$name;
        	$body = '<h2>Contact Request</h2>
        	<h4>Name</h4><p>'.$name.'</p>
        	<h4>Email</h4><p>'.$email.'</p>
        	<h4>Message</h4><p>'.$message.'</p>
        	';

        	$headers = "MIME-Version: 1.0" ."\r\n";
        	$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
        	$headers .= "Form: " .$name. "<".$email.">". "\r\n";

        	if (mail($toEmail, $subject, $body, $headers)) {
        		$msg = 'Votre email a été envoyé';
      $msgClass = 'alert succés';
        	}else{
            $msg = 'Votre email na pas été envoyé';
      $msgClass = 'alert succés';

        	}
        }

	}else{
      $msg = 'Merci de remplir tous les champs';
      $msgClass = 'danger dalerte';

	}
}
?>