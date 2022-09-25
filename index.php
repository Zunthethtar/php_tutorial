
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
  for($x=0;$x<=5;$x++){
    $get_random =rand(0,1);
    $status =true;
    if($get_random===1){
      $status=true;
    }else{
      $status=0;
  };
      $newUser=[
      "ID"=>$x,
      "email"=>getRandomEmail(),
      "password"=>getRandomPassword(),
      "status" =>$status,
      "user_name"=>getRandomName(),
      
      ];
    array_push($users,$newUser);
  }



?>
<html>
  <head>
    <title> PHP Tutorial </title>
</head>
<body>
  <ul>

    <?php foreach($users as $key => $user ){?>
      <li>ID : <?php echo $user ['ID'];?></li>
      <li>Email:  <?php echo $user['email'];?> </li>
      <li> Password :<?php echo $user['password'];?> </li>
      <li> Status :<?php echo $user['status'];?> </li>
      <li> User Full Name :<?php echo $user['user_name'];?> </li>
      <br>
     <?php }  ?>


</ul>
</body>
  </html>