<!-- 
 * Case 1 - [Generate User];
 * - convert case1 program to generate random user function
 * - random user function will return user list
 *
 * Case 2 -[Add User];
 * - create addUser function 
 * - add new user lists from generate random user function using addUser function
 * - return user lists and show data with html
 *
 * Case 3 - [Delete];
 * - create delete function 
 * - delete target user from userlist using delete function
 *
 * Case 4 - [Update];
 * - create update function 
 * - update target user from userlist using update function
 -->
 <?php




function getRandomWords() {
  $words = substr(str_shuffle(implode( range("A", "Z"))),3, rand(2, 6));
  
  return $words;
}

function getRandomName(){
  for($n=0; $n < rand(3,6); $n++){
    $finalName .= getRandomWords()." ";
  };
  return $finalName;
}

function getRandomPassword(){
  $password =substr(str_shuffle(implode(range(0,9))),1,rand(6, 16));
  return $password;
}
function getRandomEmail(){
  $email_types = ["@hotmail.com","@gmail.com", "@outlook.com"];
  for($z = 0; $z < count($email_types); $z++){
      $email = getRandomWords() . $email_types[rand(0, count($email_types)-1)];        
  };
  return $email;
};

$users=[];
  for($x=0;$x<=50;$x++){
    $get_random =rand(0,1);
    $status =true;
    if($get_random ===1){
      $status=true;
    }else{
      $status=0;
  };
      $newUser=[
      "ID"=>$x,
      "email"=>getRandomEmail(),
      "password"=>getRandomPassword(),
      "status" =>$status,
      "username"=>getRandomName(),
      
      ];
    array_push($users,$newUser);

  }


function addUser($addArray,$user){
      if(!isset($user['email'])){
        return "email is required";
        }else if(!isset($user['password'])){
          return "password is required";
        }else if(isset($user['password']) && strlen($user['password']<6)){
          return "password must be 6 digits";
        }else if (!isset($user['username'])){
          return "username is required";
        }else{
  array_push($addArray,$user);
  return $addArray;
};
};


$users =addUser($users,

$addnewuser=[ 
  "ID" =>$x,
  "email" => "GIgI@gmail.com",
  "password" => "123456",
  "status" => true,
  "username"=> "TinTin" 
],



);

$users =addUser($users,[
  "ID" =>$x +1,
  "email" => "2ei29I@gmail.com",
  "password" => "123456",
  "status" => true,
  "username"=> "WINWIN" 
]);
$users =addUser($users,[
  "ID" =>$x +2,
  "email" => "CCC@gmail.com",
  "password" => "1234562323",
  "status" => true,
  "username"=> "PPPWIN" 
]);
//Deleting users**//
unset($users[5]);
unset($users[0]);
//                 //

function updateUser( $name, $user , $array){

  for($i=0; $i<count($array); $i++){
    if($array[$i]['username'] === $name){
      
      $array[$i] = $user;
    }
  }
  
  return $array;
}


$toUpdateUser = [
  "ID" => 52,
  "email" => "qq@gmail.com",
  "password" => "qqqqqqq",
  "status" => true,
  "username"=> "teewerrw" 
];

  $users = updateUser('WINWIN', $toUpdateUser, $users);




?>
<html>
  <head>
    <title> PHP Tutorial </title>
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
                    <th> ID </th>
                    <th> Email </th>
                    <th> Password </th>
                    <th>Username</th>
                    <th> Status </th>
                    <th> Delete </th>
                    <th> Update</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($users as $key=>$user) { ?>
                    <tr>
                        <td> <?php echo $user['ID']; ?> </td>
                        <td> <?php echo $user['email']; ?> </td>
                        <td> <?php echo $user['password']; ?> </td>
                        <td> <?php echo $user['username']; ?> </td>
                        <td> <?php echo $user['status']; ?> </td>
                        
                        <td> <input type="submit" class="btn btn-danger" value="DELETE" name="delete" > </td>
                        <td> <input type="submit" class="btn btn-danger" value="UPDATE" name="update"> </td>
          
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</body>
  </html> 
