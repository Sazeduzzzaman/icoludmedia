    <?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "teambug9933@gmail.com";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['phone_number']) ||
        !isset($_POST['message']) ||
        !isset($_POST['email'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $company_name = $_POST['company_name']; // required
    $phone_number = $_POST['phone_number']; // required
    $message = $_POST['message']; // required
    $email_from = $_POST['email']; // required
 
    $error_message = "";


 
 
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First-name: ".clean_string($first_name)."\n";
    $email_message .= "Last-name: ".clean_string($last_name)."\n";
    $email_message .= "Company-name: ".clean_string($company_name)."\n";
    $email_message .= "Phone-number: ".clean_string($phone_number)."\n";
    $email_message .= "Email-from: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);  
    ?>
 

 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>