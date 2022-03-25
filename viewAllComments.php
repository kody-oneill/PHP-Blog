<!-- HTML for fromating and visuals 
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
	<form action="viewComment.php" method="POST">
 <?php 
 
 session_start();
 require_once 'myfuncs.php';
 $conn = dbConnect();
 $blogPost = $_SESSION["BLOGID"];
 $table_name2 = $_SESSION["TABLE3"];
 
 $sql2 = $conn->query("SELECT COMMENT_ID, username, COMMENT_BODY, BLOG_ID FROM $table_name2 WHERE BLOG_ID = $blogPost ");
 
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