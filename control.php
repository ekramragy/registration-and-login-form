
<?php
 error_reporting(1);

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['psw'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$photo=$_FILES['avatar']['name'];
$allawed_extention_img=['jpeg','jpg','png','gif'];

$avatar_extention=strtolower(end(explode('.',$_FILES['avatar']['name'])));

// $avatar_extention=$_FILES['avatar']['type'];
$avatarname=$_FILES['avatar']['name'];
$avatartmp=$_FILES['avatar']['tmp_name'];
$avatartype=$_FILES['avatar']['type'];
$avatersize=$_FILES['avatar']['size'];

// var_dump($avatar_extention);
//var_dump($avatartmp);

//var_dump($allawed_extention_img);
// var_dump(in_array($avatar_extention,$allawed_extention_img));


//var_dump(filter_input( INPUT_POST,'username', FILTER_VALIDATE_STRING));
$array=[
    'options'=>[
        'min'=>1,
        'max'=>100
    ]
    ];


if(filter_has_var( INPUT_POST,"submit"))
{
    

    if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['age']))
    {
        echo 'submitted';
        if(filter_input( INPUT_POST,'name', FILTER_SANITIZE_STRING))
        {
            if(filter_input( INPUT_POST,'email', FILTER_VALIDATE_EMAIL))
             {
                if(filter_var($age , FILTER_VALIDATE_INT,$array)!==false){
                    if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
                          if($_POST['psw']==$_POST['psw-repeat']){
                            if( !empty($_FILES['avatar']) && 
                            in_array($avatar_extention,$allawed_extention_img)){
                                if($avatersize < 4194304)
                                {




$host = 'localhost';
$dbname = 'customer';
$user = 'newuser';
$pass = 'password';


$dsn = "mysql:host=$host;dbname=$dbname";

            try {

                $pdo = new PDO($dsn, $user, $pass);
                echo" connection done";
                $incryptepass=md5($password);
                $username=$_POST['name'];
                $insert="INSERT INTO users (`name`, `email`, `age`,`gender`,`password`,`photo`)
                VALUES('$username','$email','$age','$gender','$incryptepass','$photo');" ;
                $pdo->exec($insert);


                move_uploaded_file($avatartmp,'uplouds/'.$avatarname);

                $file='logincontent.text';


                //var_dump( file_exists($file));
                if(file_exists($file))
                {
                    file_put_contents($file,$_POST);
                }

                $avatar=$_FILES['avatar'];



                header('Location:afterregiste.php' );

                  }
          
              catch (PDOException $e) {
              //throw new \PDOException($e->getMessage(), (int)$e->getCode());
                 echo"errror";
              }
                                 
                                }else{
                                    echo ' image size not allawed!'." ";
                                }
                             
                            }else{
                                echo ' image extention not allawed!'." ";
                               }
                     
                               
                                }
                       else{
                           echo 'the confirm does not password match the password!'." ";
                       }
                   }
                   else{
                       echo 'the password does not meet the requirements!'." ";
                   }
                   
                }
                else{
                    echo" age not valid"." ";
                }
              }
             
             }
            else{
            echo"email not valid"."  ";
              }
       }
       else{
           echo" name not valid"." ";
       }
    }
    
    //if(filter_var( INPUT_P,'age', FILTER_VALIDATE_INT))
    
else{
    echo "submit not valid";
    }

    ?>




