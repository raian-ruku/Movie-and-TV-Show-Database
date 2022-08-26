<html>
<link rel="stylesheet" href="movies.css">
<body>
    <button class="glow-on-hover" onclick="location.href = 'index.php';">MovieDB</button>

<h5>list of all movies in our database</h5>


<style>
<?php include 'movies.css'; ?>
</style>

<?php
require_once "connection.php";

$sql = "SELECT * FROM movies";

$result = mysqli_query($db ,$sql);

?>

<table>
  <tr>
    <th>Name</th>
    <th>Release Date</th>
    <th>Rating</th>
    <th>Description</th>
    <th>Genre</th>
    <th>Poster</th>
  </tr>
  <?php
    if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_assoc($result))
    {
    ?>
  <tr>
    <td><?php echo  $row["name"]; ?></td>
    <td><?php echo  $row["release_date"]; ?></td>
    <td><?php echo  $row["ratings"]; ?></td>
    <td><?php echo  $row["description"]; ?></td>
    <td><?php echo  $row["genre"]; ?></td>
    <td><?php echo  "<img src='data:image;base64,".base64_encode($row["img"])."' style='height:200px;width:200px;margin-left:30px;'>"; ?></td>
  </tr>
  
  
  <?php }
 } ?>

</table>

</body>
</html>