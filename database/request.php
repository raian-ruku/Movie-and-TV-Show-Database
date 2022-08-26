<style>
<?php include 'request.css'; ?>
</style>



<?php require_once "connection.php"; ?>


<html>
    <link rel="stylesheet" href="request.css">
    <link rel="stylesheet" href="path/to/fontawesome.min.css">
<body>
    <div class="app">
     
        <button class="glow-on-hover" onclick="location.href = 'index.php';">MovieDB</button>
       
        <div class="msg">
        <div class="mov">
          <a href="show_all_movies.php">Movies</a>
        </div>
        <div class="shows">
          <a href="show_all_shows.php">Shows</a>
        </div>
        <div class="user"><a href="user.php">User</a></div>   
        </div>
        <form action="" method="POST">
            <input type="text" id="type" name="type"placeholder="What do you want to be added?" required><br>
            <input type="text" name="request" placeholder="Which movie or show do you want to be on the database?" required><br>
            <br>
            <input type="submit" value="Submit Request">
        </form>
        </body>
        </html>

        <?php
        error_reporting(0);
        
        $type = $_POST['type'];
        $req = $_POST['request'];

        $sql = "INSERT INTO request (type, name) VALUES ('$type', '$req')";

        if(mysqli_query($db, $sql)){
?>
<?php
}

else echo "Could Not Submit Request";
 ?>