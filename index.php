<?php 
/**
 * Tutorial - Example001
 * 
 * Case 1;
 * - generate random email type [aungaung@hotmail.com, aungaung@gmail.com, aungaung@outlook.com]
 * - generate random email name 
 * - generate random password [min:6 digit and max:16 digit]
 * - generate random status [true, false]
 * - generate random user full name [min:3, max: 6 words]
 * - generate randon user words [min:2, max:6 chars]
 * 
 * Case 2;
 * @var users                   Array - multidimissioinal array
 * @var newUser                 Array - single array
 * 
 * - generate new user array and push on users array
 * - show users array with html template
 * 
 * Case 3;
 * create git account and push souce code
*/

$users = [];

function randomCharUserName() {
    $nameChar = range('A', 'Z'); 
    shuffle($nameChar); 
    $nameChar = array_slice($nameChar,0, rand(3, 6)); 
    $str = implode('', $nameChar); 
    return $str;
};

function randomWordUserName(){
        for($i = 0; $i < rand(3, 6); $i++){
            $finalName .= randomCharUserName()." "; 
        };
        return $finalName;
    };




for($x =1; $x <= 10; $x++) {
    //status
    $get_status = rand(0,1);
    $status = true;

    if( $get_status === 1){
        $status = true;
    }else {
        $status = 0;
    }

    //email

    $email_types = ['@gmail.com', '@outlook.com', '@hotmail.com'];
    // shuffle($email_types);
    // $chg_stremail = implode('', $email_types); 
    for($e=1; $e < count($email_types); $e++) {
        $g_email = randomCharUserName().$email_types[rand(0,count($email_types)-1)];
    }

    //password chrs
    $chars = "0123456789";
    $GeneratePassword = substr( str_shuffle( $chars ), 0, rand(6,16)); 

    $newUser = [
        "userID" => $x,
        "email" => $g_email,
        "username" =>randomWordUserName(),
        "password" => $GeneratePassword,
        "status" => $status
    ];
    array_push($users, $newUser);
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP array Tutorials</title>
</head>
<body>
    
    <ul>
        <?php foreach($users as $user) { ?>
            <h4>userId: <?php echo $user['userID']?></h4>
            <li>username: <?php echo $user['username']?></li>
            <li>email: <?php echo $user['email']?></li>
            <li>password: <?php echo $user['password']?></li>
            <li>status: <?php echo $user['status']?></li>
            <br>
        <?php
        }
        ?>
    </ul>
</body>
</html>























?>