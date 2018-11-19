<?php

session_start();
// for detect errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$host = 'localhost';
$dbname = 'customer';
$user = 'newuser';
$pass = 'password';



$dsn = "mysql:host=$host;dbname=$dbname";
$user_name=$_POST['name'];
$userpassword=$_POST['password'];


try {

    $pdo = new PDO($dsn, $user, $pass);
    echo" connection done";
    
  
    $incryptepass=md5($userpassword);
  
   $result = $pdo->query("SELECT * FROM `users` WHERE `name`='".$user_name."' and `password`='".$incryptepass."'"); 
    $selected_array=$result->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($result);
    //var_dump($selected_array);
    //var_dump(count($selected_array));
    //header('Location:profile.php' );

    if (!empty($selected_array)) {
       echo"array not empty". "<br>";
   
       for($i=0;$i<count($selected_array);$i++)
       {
         $name= $selected_array [$i]['name'] ;
         $photo=$selected_array [$i]['photo'];
         $email=$selected_array [$i]['email'];
         $id=$selected_array [$i]['id'];
          echo $name . "<br>";
          echo $photo. "<br>";
          echo $email. "<br>"; 
          echo $id."<br>";
       }
       $_SESSION['name']=$name;
       $_SESSION['email']=$email;
       $_SESSION['photo']=$photo;
       $_SESSION['id']=$id;
       //$_SESSION['image_source']=$source_image;
       echo" session name".$_SESSION['name']."<br>";
       echo" session image".$_SESSION['photo']."<br>";


       $source_image="'uplouds/".$photo."'";
       echo $source_image;
       header('Location:profile.php' );

          } else {
      echo "0 results";
   }

}  
    
  catch (PDOException $e) {
  //throw new \PDOException($e->getMessage(), (int)$e->getCode());
     echo"errror";
  }
                  






?>