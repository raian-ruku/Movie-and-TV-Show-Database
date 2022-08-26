
<style>
<?php include 'user.css'; ?>
</style>
<html lang="en">
<link rel="stylesheet" href="user.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
    <button class="glow-on-hover" onclick="location.href = 'index.php';">MovieDB</button>
    <div class="sign">
    <h1>Sign-up</h1>
    <h4>Please Sign-up if you are a new user!</h4>
    <form action="" method="post">
        <label for="user_name" ></label>
        <input type="text" name = "user_name" placeholder=" Enter Your username" required>
        <br> <br>
        <label for="date_of_birth" ></label>
        <input type="text" name = "date_of_birth" placeholder="Enter Your date of birth" required onfocus="(this.type='date')" onblur="(this.type='text')" required>
        <br><br>
        <label for="mobile"></label>
        <input type="text" name = "mobile" placeholder=" Enter Your mobile number" required >
        <br><br>
        <label for="email" ></label>        
        <input name = "email" type="email" placeholder=" Enter Your email address" required >
        <br><br>
        <label for="password" ></label>
        <input name = "password" type="password" placeholder=" Enter Your password" required>    
        <br>
        <input type="submit" value="Create Account">
        <br><br>
        <h5>Already Have An Account? <a href="login.html">Sign In</a></h5>
    </div>
        
    </form>

</body>
</html>

<?php
error_reporting(0);

require_once "connection.php";

$user_name = $_POST['user_name'];
$date_of_birth = $_POST['date_of_birth'];
$mobile = $_POST['mobile'];
$email  = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO user_details (user_name,mobile,date_of_birth,email,password ) VALUES ('$user_name', $mobile , '$date_of_birth','$email','$password')";

if (mysqli_query($db, $sql)) {
    ?>
    
    <script>
      alert("New record created successfully");
    </script>

    <?php
    
  } else {
    echo "Error: " . $sql . "<br>" . $db->error;
  }
  
  $db->close();
?>