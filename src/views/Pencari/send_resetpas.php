<?php 
function generateRandomString($length){
    $ch = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $chLength = strLen($ch);
    $randomString = '';

    for($i = 0; $i < $length; $i++){
        $randomString .= $ch[rand(0, $chLength -1)];  
    }
    return $randomString;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $code_reset = generateRandomString(6);
    $email_template = "
             
    ";

    $query = "SELECT * FROM user WHERE email_user = '$email'";
    $sql = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($sql);

    if ($result){
        if($result['reset_pascode'] != '0'){
            $_SESSION['status'] = "danger, Kode sudah dikirimkan";
            header('Location: lupapassword.php');
        }else{
            $query = "UPDATE user SET reset_pascode = '$code_reset' WHERE email='$email'";

            if($con -> query($query))
        }
    }
}

?>