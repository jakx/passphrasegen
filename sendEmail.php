<?php

if($_POST)
{
    $to_Email       = $_POST['sendto']; 
    $subject        = $_POST['subject']; 
    $body           = $_POST['body']; 
    
    
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    
        //exit script outputting json data
        $output = json_encode(
        array(
            'type'=>'error', 
            'text' => 'Request must come from Ajax'
        ));
        
        die($output);
    } 
    
    //check $_POST vars are set, exit if any missing
    if(!isset($_POST["sendto"]) || !isset($_POST["subject"]) || !isset($_POST["body"]))
    {
        $output = json_encode(array('type'=>'error', 'text' => 'Input fields are empty!'));
        die($output);
    }

    //Sanitize input data using PHP filter_var().
    $to_Email         = filter_var($_POST["sendto"], FILTER_SANITIZE_EMAIL);
    $subject          = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    $body             = filter_var($_POST["body"], FILTER_SANITIZE_STRING);
    
    //additional php validation
  
    if(!filter_var($to_Email, FILTER_VALIDATE_EMAIL)) //email validation
    {
        $output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
        die($output);
    }
    if(strlen($body)<5) //check emtpy message
    {
        $output = json_encode(array('type'=>'error', 'text' => 'Too short message! Please enter something.'));
        die($output);
    }
    if(strlen($subject)<1) //check empty subject
    {
        $output = json_encode(array('type'=>'error', 'text' => 'Too short subject! Please enter something.'));
        die($output);
    }
    
    //proceed with PHP email.

    /*
    Incase your host only allows emails from local domain, 
    you should un-comment the first line below, and remove the second header line. 
    Of-course you need to enter your own email address here, which exists in your cp.
    */
    //$headers = 'From: your-name@YOUR-DOMAIN.COM' . "\r\n" .
    $headers = 'From: nobody@passphrasegen.com' . "\r\n" . //remove this line if line above this is un-commented
    'Reply-To: nobody@passphrasegen.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
        // send mail
    $sentMail = @mail($to_Email, $subject, $body, $headers);
    
    if(!$sentMail)
    {
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
        die($output);
    }else{
        $output = json_encode(array('type'=>'message', 'text' => 'Email sent!'));
        echo "Email sent!";

        
//        echo "\r\nData = ";
//        print_r($_POST);
        //die($output);
    }
}
?>
