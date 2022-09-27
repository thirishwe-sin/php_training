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

    

    // $users = array_replace($users[0], $updateUser[0] );
    // echo $users;

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
    // var_dump($users);
};


function addUser($addArray, $user){

    if(!isset($user["username"])) {
        echo "username is required";
    }else if(!isset($user["password"])) {
        echo "password is required";
    }else if(isset($user["password"]) && strlen($user["password"])<6) {
        echo "password must be 6 characters long";
    }else if(!isset($user["email"])){
        echo "email is required";
    }else {
        array_push($addArray, $user);
        return $addArray;
    }

    
};

    $users = addUser($users, 
    [
    "userID" => $x,
    "username" => "ag",
    "password" => "1234577",
    "status" => true,
    "email" => "aung@gmail.com",
    ]
    );

    $users = addUser($users, 
    [
    "username" => "mg",
    "password" => "1234577",
    "status" => true,
    "email" => "aung@gmail.com",
    ]
    );
    $users = addUser($users, 
    [
    "username" => "su",
    "password" => "123423u9",
    "status" => true,
    "email" => "aung@gmail.com",
    ]
    );

function updateUser( $name, $user , $array){

  for($i=0; $i<count($array); $i++){
    if($array[$i]['username'] === $name){
      
      $array[$i] = $user;
    }
  }
  
  return $array;
}

$toUpdateUser = [
  "userID" => 52,
  "email" => "qq@gmail.com",
  "password" => "qqqqqqq",
  "status" => true,
  "username"=> "updated name" 
];

$users = updateUser('ag', $toUpdateUser, $users);

// function deleteUser( $key, $array, $name) {
//     if($array[$key]['username'] === $name){
//         unset($array[$key])
//     }
// }

// $users = deleteUser($users, 'su');

        while ( ($deluser = current($users)) !== FALSE ) {
        if(key($users)){
            unset($users[1]);
            // unset($users[12]);
        }
       next($users);
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>PHP array Tutorials</title>
    <style>
        table {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        table > thead > tr > th {
            background-color: #ddd;
        }

        table > thead > tr > th,
        table > tbody > tr > td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <table>
            <thead>
                <tr>
                    <th> # </th>
                    <th> Username </th>
                    <th> Email </th>
                    <th> Password </th>
                    <th> Status </th>
                    <!-- <th> Delete </th> -->
                </tr>
            </thead>

            <tbody>
                <?php foreach($users as $key=>$user) { ?>
                    <tr>
                        <td> <?php echo $key + 1; ?> </td>
                        <td> <?php echo $user['username']; ?> </td>
                        <td> <?php echo $user['email']; ?> </td>
                        <td> <?php echo $user['password']; ?> </td>
                        <td> 
                            <?php if($user['status'] == 1) { ?>
                                <span> Active </span>
                            <?php } else { ?>
                                <span> Disable </span>
                            <?php } ?> 
                        </td>
                        <td >
                            <!-- <input type="submit" class="btn btn-danger" onClick="alert( clicked)"  name="Delete"/> -->
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</body>
</html>






















