<?php
if(isset($_POST['emailsubmit'])){
    $sender_name = $_POST['name'];
    $sender_email = $_POST['email'];
    $sender_phone = $_POST['phone'];
    $sender_message = $_POST['message'];
    $email_subject = "You have a new email from your website!";
    $to = 'vacas79507@bombaya.com';//change this email
    $body = "";
    if(empty($sender_email)||empty($sender_name)||empty($sender_phone)||empty($sender_message)){
        header("Location: ../contact.php?form=empty");
        exit();
    }
    elseif(!filter_var($sender_email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../contact.php?form=invalidemail");
        exit();
    }
    elseif(!preg_match('/^[+]?[\d]+([\-][\d]+)*\d$/',$sender_phone)){
        header("Location: ../contact.php?form=phone");
        exit();
    }
    elseif(strlen($sender_message) > 70){
        header("Location: ../contact.php?form=message");
        exit();
    }else{
        $headers = "From: ".$sender_email;
        $body .="Sender Name: ".$sender_name."\r\n";
        $body .="Sender's Contact Number ".$sender_phone."\r\n";
        $body .="Message: ".$sender_message."\r\n";
        mail($to,$email_subject,$body,$headers);
        header("Location: ../contact.php?mailsend");
    }
}
    
?>