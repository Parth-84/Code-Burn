<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    // include "/xampp/htdocs/onforum/partials/_dbconnect.php";
    include "_dbconnect.php";
    if(!$conn){
        die("Sorry we could not connect to the database");
    }
   
    $usr_email= mysqli_escape_string($conn,$_POST["email"]);
    $usr_name = mysqli_escape_string($conn,$_POST["username"]);
    $usr_pass =  mysqli_escape_string($conn,$_POST["password"]);
    $usr_cpass = mysqli_escape_string($conn,$_POST["cpassword"]);

//     $selectQuery = "SELECT * FROM `users` WHERE `usr_email`= '$usr_email'";
//     $result = mysqli_query($conn,$selectQuery);
//     // echo mysqli_error($conn);
//     // $qu = mysqli_fetch_assoc($result);
//     // echo var_dump($qu);
//     // echo $qu['usr_email'];
// // echo $usr_email;
//     $num = mysqli_num_rows($result);
//     // echo $num;
//     if($num > 0){
//         // $showEmailChangeAlert = true;
//     }
//     else{
    
    $selectQuery = "SELECT * FROM `users` WHERE  `usr_name`= '$usr_name'";
    $result = mysqli_query($conn,$selectQuery);
    $num = mysqli_num_rows($result);
    if($num > 0){
        header("location: /onforum/index.php?usrnameavail=false");
    }
    else{
        
        if($usr_pass == $usr_cpass){
            $hash = password_hash($usr_pass,PASSWORD_BCRYPT);
            $token = bin2hex(random_bytes(15));


            $insertQuery = "INSERT INTO `users` (`usr_email`, `usr_name`, `usr_password`, `usr_token`, `usr_status`, `usr_tmstamp`) VALUES (' $usr_email', '$usr_name', '$hash', ' $token', 'inactive', current_timestamp());";
            $result= mysqli_query($conn,$insertQuery);
            if($result){
                
                header("location: /onforum/index.php?success=true");

                $showSuccess = true;
                $to_email = $usr_email;
                $subject = "Account Verification - Code Burn";
                $body = "Hi, $usr_name This is a account verification mail from Code Burn - Onine Forums.\nClick this <a href=\"localhost/onforum/activate.php?token=$token&usr_name=$usr_name\">link</a> to activate your account.";
                // $sender_email = "From: codeburnForum@gmail.com"; 
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= 'From: CodeBurn' . "\r\n"; 
                // if(mail($usr_email,$subject,$body,$sender_email)){
                if(mail($to_email,$subject,$body,$headers)){
                    echo 'Email sent';
                    // $_SESSION['msg'] = "You have signed up successfully. Check your mail $usr_email to activate your account";
                    $_SESSION['msg'] = "Check your mail $usr_email to activate your account";
                    
                }
                else{
                    echo 'Email not sent';
                    
                }

            }
            else{
                echo 'Sorry we are unable to create your account at the moment please try again later..';
            }
        }
        else{
            header("location: /onforum/index.php?invalid=true");

        }
    }
    }
// }
?>