<?php
  $insert = false; 
  if(isset($_POST['name']))
  {
  $server = "127.0.0.1";
  $username = "root@localhost";
  $password = "";
  $dbname = "trip";

  $conn = mysqli_connect($server,$username, $password, $dbname);
  if(!$conn)
  {
    die("Connection to this database failed due to" . mysqli_connect_error());
  }

  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $descrition = $_POST['description'];
  $sql = "INSERT INTO trip ('Name`, `Age`, `Gender`, `Email`, `PhoneNo`, `Other`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '  $descrition' , current_timestamp());";
  

  if($conn->query($sql) == true)
{
    // echo "Sucessfully Inserted";
    $insert = true;
}
else
{
    echo "ERROR:". $sql ."<br>". $conn->error;
}

$conn->close();

}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href = "https://fonts.googleapis.com/css?family=Robota|Sriracha&dispalay=swap" rel = "stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <img class = "bg" src = "img1.webp" alt = "IIT Kharagpur">
    <div class="container">
        <h1>Welcome To IIT Kharagpur US Trip Form</h1>
        <p>Enter Your Details and submit this form to Confirm Your Participation in the Trip</p>
        <?php
        if($insert == true)
        {
        echo "<p class = 'submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US Trip.</p>";
        }
        ?>

        <form action = "index.php" methods = "post">
            <input type = "text" name = "name" id = "name" placeholder = "Enter Your Name">

            <input type = "text" name = "age" id = "age" placeholder = "Enter Your Age">

            <input type = "text" name = "gender" id = "gender" placeholder = "Enter Your Gender"> 

            <input type = "email" name = "email" id = "email" placeholder = "Enter Your Email">

            <input type="tel" name="phone" id="phone" placeholder = "Enter Your Phone No.">

           <textarea name="description" id="desc" cols="30" rows="10" placeholder = "Enter any other Information Here"></textarea>

           <button class="btn">Submit</button>
      </form>
    </div>

    <script src = "index.js"></script>
    
</body>
</html>