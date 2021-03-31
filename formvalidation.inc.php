<?php
include 'head.php';
include 'opendb.php';

//contact form validation
if(isset($_POST['emailsubmit'])){
    $sender_name = $_POST['name'];
    $sender_email = $_POST['email'];
    $sender_phone = $_POST['phone'];
    $sender_message = $_POST['message'];
    $email_subject = "You have a new email from your website!";
    $to = 'vacas79507@bombaya.com';//change this email
    $body = "";
    if(empty($sender_email)||empty($sender_name)||empty($sender_phone)||empty($sender_message)){
        header("Location: contact.php?form=empty");
        exit();
    }
    elseif(!filter_var($sender_email,FILTER_VALIDATE_EMAIL)){
        header("Location: contact.php?form=invalidemail");
        exit();
    }
    elseif(!preg_match('/^[+]?[\d]+([\-][\d]+)*\d$/',$sender_phone)){
        header("Location: contact.php?form=phone");
        exit();
    }
    elseif(strlen($sender_message) > 70){
        header("Location: contact.php?form=message");
        exit();
    }else{
        $headers = "From: ".$sender_email;
        $body .="Sender Name: ".$sender_name."\r\n";
        $body .="Sender's Contact Number ".$sender_phone."\r\n";
        $body .="Message: ".$sender_message."\r\n";
        mail($to,$email_subject,$body,$headers);
        header("Location: contact.php?mailsend");
        exit();
    }
}

//Log-In form validation
if(isset($_POST['LogInSubmit'])){
    if(empty($_POST['LogIn_username'])||empty($_POST['LogIn_password'])){
        header("Location: login.php?empty");
        exit();
    }
    //dito yung kapag di nag-eexist yung username sa database
    if(isset($_POST['LogIn_username'])){
        $query = mysqli_query($DBConnect,"SELECT uname from userinfo");
        $userExists = false;
        while($user = mysqli_fetch_array($query)){
            if($_POST['LogIn_username']==$user['uname'])
                $userExists = true;
        }
        if(!$userExists){
            header("location: login.php?Invalid");
            exit();
        }
    }
    if($_POST['LogIn_username']=="admin"){
        $query = mysqli_query($DBConnect,"SELECT pw from userinfo WHERE uname='admin'");
        $pw = mysqli_fetch_array($query);
        if($_POST['LogIn_password']==$pw['pw']){
            $_SESSION['user'] = $_POST['LogIn_username'];
            $_SESSION['pass'] = $_POST['LogIn_password'];
            $_SESSION['access'] = "admin";
            header('location: dashboard.php');
        }else{ 
            header("Location: login.php?Invalid");
            exit();
         }   
    }else{
        $data = mysqli_query($DBConnect,"SELECT * from userinfo");
        $total = mysqli_num_rows($data);
        $v1=$v2="";
        $isTrue = false;
        if($total!=0){
            while($user=mysqli_fetch_array($data)){
                if($user['uname']==$_POST['LogIn_username']){
                    if($user['pw']==$_POST['LogIn_password']){
                        $isTrue = true;
                        $_SESSION['user'] = $user['uname'];
                        $_SESSION['pass'] = $user['pw'];
                        $_SESSION['fullname'] = $user['fname']." ".$user['mname']." ".$user['lname'];
                        $_SESSION['add'] = $user['address'];
                        $_SESSION['connum'] = $user['contactno'];
                        $_SESSION['email'] = $user['email'];
                        header('location: games-landing.php');
                    }
                }
            }
        }
        if(!$isTrue){ 
            header("Location: login.php?Invalid");
            exit();         
        }
    }
}
?>