<!-- HTML for formatting and visual

Pulls up the blog in a similar fomat as posting to see and read what is writting. 
 
 //HTML for formating and visual
//Kody O'Neill
//Version 1.5
//Bloging website-->

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<style>

article { 
display: grid;
grid-template-columns: 1fr 1fr 1fr;
}

article * { grid-column: 2/3;}
</style>

</head>
<body>
<h1>Kody's Blog</h1><br><br>
<article>
<p>
<form action="blogUpdate.php" method="POST">
<?php
session_start();
$blogPost = $_POST["blogchosen"];
require_once 'myfuncs.php';
$conn = dbConnect();
$_SESSION["BLOGID"] = $blogPost;

$table_name = $_SESSION["TABLE1"];
$table_name2 = $_SESSION["TABLE3"];

//selects the blog chosen and pulls the data from the database
$sql = $conn->query("SELECT BLOG_ID, BLOG_TITLE, BLOG_BODY, DATE, BLOG_TOPIC FROM $table_name WHERE BLOG_ID = $blogPost");
//echo "Error: " . $sql . "<br>" . $conn->error;
while($row = $sql->fetch_assoc()){
    $blogTitle = $row["BLOG_TITLE"];
    $blogBody = $row["BLOG_BODY"];
    $blogID = $row["BLOG_ID"];
    echo "<h2 align='center'>$blogTitle</h2>";
    echo "<br><br>";
    echo "Date: " . $row["DATE"];
    echo "<br><br>";
    echo $row["BLOG_TOPIC"];
    echo "<br><br>";
    echo "<p2>$blogBody</p2>";
    echo "<br><br>";
    saveBlogBody($blogBody);
    saveBlogId($blogID);
    saveBlogTitle($blogTitle);
}

?>
<input type="submit" value="Update"><br><br>
</form>
 <form action="deleteBlogConfirmation.php" method="POST" id="formDelete">
 	<input type="submit" value="Delete"><br><br>
 </form>
<form action="postComment.php" method="POST">
 <textarea id="BlogPost" name="BlogPost" rows="10" cols="50">
  </textarea><br><br>
 <input type="submit" value="Post Comment"><br><br>
</form>


<form action="viewComment.php" method="POST">
 <?php 
 
 $sql2 = $conn->query("SELECT COMMENT_ID, username, COMMENT_BODY, BLOG_ID FROM $table_name2 WHERE BLOG_ID = $blogPost LIMIT 3");
 
 echo "Comments: "."<br><br>";
 while($row = $sql2->fetch_assoc()){
     echo $row["COMMENT_ID"] . ": " . $row["username"] . "<br>";
     echo $row["COMMENT_BODY"] . "<br><br><br>";
 }
 
 echo "Select which comment ID you want to update or delete:";
 echo "<br>";
 ?>
   <input type="submit" value="Select">
   <input type="number" name="commentchosen" id="commentchosen" min="1" ><br><br>

 </form>
    <form action="viewAllComments.php" method="POST" id="formDelete">
 	<input type="submit" value="View All comments"><br><br>
 </form>
  <form action="search.html" method="POST" id="formDelete">
 	<input type="submit" value="Search Again"><br><br>
 </form>
  <form action="homePage.php" method="POST">
  <input type="submit" value="Home"><br><br>
 </form>
<form action="index.php" method="POST">
  <input type="submit" value="Main Menu"><br><br>
 </form>
</p> 
</article>
</body>
</html>