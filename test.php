<?php

$host = 'localhost';
$dbname = 'test';
$user = 'newuser';
$pass = 'password';


$dsn = "mysql:host=$host;dbname=$dbname";
try {

      $pdo = new PDO($dsn, $user, $pass);
      echo" connection done";
      $result = $pdo->query('SELECT Department.Dname,Employee.Fname FROM `Department` 
          INNER JOIN Employee ON Department.DNumber=Employee.Dno;'); 
      foreach( $result->fetchAll(PDO::FETCH_ASSOC) as $row_of_depart)
        {
           echo '<pre>';
          echo "<li>".$row_of_depart['Dname'].$row_of_depart['Fname']."</li>". "\n";
          echo '</pre>';
        }
    }

    catch (PDOException $e) {
    //throw new \PDOException($e->getMessage(), (int)$e->getCode());
    echo"error";
   }


?>