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
    $to = 'byxllaeheh@gmail.com';//change this email
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
        // $body .="Sender Name: ".$sender_name."\r\n";
        // $body .="Sender's Contact Number ".$sender_phone."\r\n";
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
            header("location: login.php?doesnotexist");
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
                        $_SESSION['fname'] = $user['fname'];
                        $_SESSION['mname'] = $user['mname'];
                        $_SESSION['lname'] = $user['lname'];
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

//sign up form validation
if(isset($_POST['SignUpSubmit'])){
    $SignUp_name = $_POST['fname'];
    $SignUp_mname = $_POST['mname'];
    $SignUp_lname = $_POST['lname'];
    $SignUp_address = $_POST['address'];
    $SignUp_phone = $_POST['phonenum'];
    $SignUp_uname = $_POST['uname'];
    $SignUp_pass = $_POST['password'];
    $SignUp_email = $_POST['email'];
    $userExists = false;
    if(empty($SignUp_name)||empty($SignUp_mname)||empty($SignUp_lname)||empty($SignUp_address)||empty($SignUp_phone)||empty($SignUp_uname)||empty($SignUp_pass)||empty($SignUp_email)){
        header("Location: signup.php?empty");
        exit();
    }
    elseif(!preg_match('/^[+]?[\d]+([\-][\d]+)*\d$/',$SignUp_phone)){
        header("Location: signup.php?invalidphone&fname=$SignUp_name&mname=$SignUp_mname&lname=$SignUp_lname&address=$SignUp_address");
        exit();
    }
    elseif(!filter_var($SignUp_email,FILTER_VALIDATE_EMAIL)){
        header("Location: signup.php?invalidemail&fname=$SignUp_name&mname=$SignUp_mname&lname=$SignUp_lname&address=$SignUp_address&phonenum=$SignUp_phone&username=$SignUp_uname");
        exit();
    }
    $query = mysqli_query($DBConnect,"SELECT uname from userinfo") or die("ERROR");
    while($username = mysqli_fetch_array($query)){
        echo $SignUp_uname.'<br>'.$username;
        if($SignUp_uname ==$username['uname']){
            $userExists = true;
        }
    }
    if(!$userExists){
        mysqli_query($DBConnect,"INSERT INTO userinfo (fname,mname,lname,address,contactno,uname,pw,email) VALUES
        ('$SignUp_name','$SignUp_mname','$SignUp_lname','$SignUp_address','$SignUp_phone','$SignUp_uname','$SignUp_pass','$SignUp_email')") or die("Unable to signup");
            header("location: signup.php?success");
            exit();
    }else{
        header("location: signup.php?exist");
        exit();
    }
}


//Change password validation
if(isset($_POST['changePW'])){
    if(!isset($pass)){
        echo 'wew';
    }
    if(empty($_POST['password'])||empty($_POST['newPassword'])||empty($_POST['confirmPassword'])){
        header("location: changepw.php?empty");
        exit();
    }
    $pass = $_SESSION['pass'];
    $user = $_SESSION['user'];
    if($_POST['password']!=$pass){
        header("location: changepw.php?incorrect");
        exit();
    }else{
        if($_POST['newPassword']!=$_POST['confirmPassword']){
            header("location: changepw.php?match");
            exit();
        }else{
            $newpass = $_POST['confirmPassword'];
            mysqli_query($DBConnect,"UPDATE userinfo SET pw='".$newpass."' WHERE uname = '".$user."'") or die ("ERROR");
            $_SESSION['pass'] = $newpass;
            header("location: changepw.php?success");
            exit();
        }
    }
}
?>
