
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: black;
}

* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    padding: 16px;
    background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
</style>
</head>
<body>

<form action="control.php" method="POST" enctype="multipart/form-data"> 
  <div class="container">
    <h1>Register</h1>
    <hr>
    <label for="name"><b>name</b></label>
    <input type="text" placeholder="Enter name" name="name" >

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" >
 

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" >
    <hr>


    <label for="avatar"><b> upload your image</b></label><br>
    <input type="file" placeholder="please upload your image" name="avatar" required >
    <hr>
    <label for="age"><b>age</b></label>
    <input type="number" name="age">
    <hr>

    <label for="gender: " ><b>gender</b></label><br>
    <input type="radio" name="gender" checked> Male<br>
   <input type="radio" name="gender" > Female<br>
       <hr>
   

    <button name="submit" type="submit" class="registerbtn">Register</button>
  </div>
  
  
</form>

</body>
</html>
