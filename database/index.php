<style>
  <?php include 'index.css'; ?>
  </style>

  <?php require_once "connection.php"; ?>
<html>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="path/to/fontawesome.min.css">
<body>
    <div class="app">
     
        <button class="glow-on-hover">MovieDB</button>
       
        <div class="msg">
        <div class="mov">
          <a href="show_all_movies.php">Movies</a>
        </div>
        <div class="shows">
          <a href="show_all_shows.php">Shows</a>
        </div>
        <div class="user"><a href="user.php">User</a></div>   
        <form method="POST" action="">
          <input type="text" placeholder="Search for movies and shows" id="search" name="keyword">
         <input type="submit" value="Search" id="searchbtn"/>
        </form>  
        </div>
        <table>
        <?php
        if(isset($_POST['keyword']))
        {$search = $_POST['keyword'];
        
        

        $sql = "SELECT * FROM movies WHERE name LIKE '%$search%' UNION SELECT * FROM shows WHERE name LIKE '%$search%'";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
            <th>Name</th>
            <th>Release Date</th>
            <th>Rating</th>
            <th>Description</th>
            <th>Genre</th>
            <th>Poster</th>
            <tr>
    <td><?php echo  $row["name"]; ?></td>
    <td><?php echo  $row["release_date"]; ?></td>
    <td><?php echo  $row["ratings"]; ?></td>
    <td><?php echo  $row["description"]; ?></td>
    <td><?php echo  $row["genre"]; ?></td>
    <td><?php echo  "<img src='data:image;base64,".base64_encode($row["img"])."' style='height:200px;width:200px;margin-left:30px;'>"; ?></td>
  </tr>
            <?php
         
        }

      }
      else echo "<p id='error'>Nothing related to your search criteria was found. Do you want to submit a request to add your favorite show/movie?</p> <span><button onclick=location.href='request.php'>Submit a request</button></span>";
    }
        ?>
        </table>  
        
        <div class="msg"><h1>Discussion</h1>
        <?php
        $sql = "SELECT user_name, discussion FROM user_details WHERE user_name IS NOT NULL";

        $result = mysqli_query($db, $sql);
        
        if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_assoc($result))
    {
      echo "<p>".$row["user_name"]."</p>";
      echo "<p>".$row["discussion"]."</p>";
    
    
    }}
        ?>
        <form method="POST" action="">
         <span id="discs">you must have an account to join discussion.</span><br>
          <textarea name="disc_info" id="disc" cols="70" rows="20" placeholder="What would you like to discuss about?"></textarea>
          <br>
          <input type="submit">
          
        </form>  
        </div>
        
    </div>
</body>
</html>

<?php
error_reporting(0);
$disc = $_POST['disc_info'];

$sql = "INSERT INTO user_details (discussion) VALUES ('$disc')";

if(mysqli_query($db, $sql)){

}

else echo "Could not submit discussion";

?>