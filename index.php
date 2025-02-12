<?php
$submit = false;
if(isset($_POST['name'])){
    //variable decleration for server
$server = "localhost";
$username = "root";
$password = "";
//Database Connection
$con = mysqli_connect($server,$username,$password);
//Check connection
if(!$con){
    die("DB Connection Faild ".mysqli_connect_error());
}
// echo"DB Connection Sucessful";

//post data in database

$name = $_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc = $_POST['desc'];
//inser sql quer
$sql = "INSERT INTO `trip`.`trip`(`name`,`age`,`gender`,`email`,`phone`,`other`,`dt`) VALUES('$name','$age','$gender','$email'
,'$phone','$desc',current_timestamp());";
// echo $sql;
//connection is true go forword
if($con->query($sql)==TRUE){
    // echo"Sucessful Inserted";
    $submit = true;
}else{
    echo"Error :$sql <br> $con->error";
}
//close DB connection

$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travels Website</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <img class="bg" src="./bg.jpg" alt="IIT Mumbai" />
    <div class="container">
      <h1>Welcome to Collage  US Trip form</h1>
      <p>
        Enter your Details and Submit this form to Confirm your participation in
        the trips
      </p>
      <?php
      if($submit == true){
      echo"<p class='msg'>
        Thanks for Submitting your form . We are happy to see you joining us for
        the US trip
      </p>";
    }
      ?>
      <form action="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter Your Name here"
        />
        <input
          type="number"
          name="age"
          id="age"
          placeholder="Enter Your Age here"
        />
        <input
          type="text"
          name="gender"
          id="gender"
          placeholder="Enter Your Gender here"
        />
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Enter Your Email here"
        />
        <input
          type="phone"
          name="phone"
          id="phone"
          placeholder="Enter Your Phone here"
        />
        <textarea
          name="desc"
          id="desc"
          placeholder="Enter any another information here"
        ></textarea>
        <button class="btn">Submit</button>
        <!-- <button class="btn">Reset</button> -->
      </form>
    </div>
     
  </body>
</html>