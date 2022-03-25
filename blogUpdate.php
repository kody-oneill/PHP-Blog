<?php
//Blog
//Kody O'Neill
//gathers updated fields for submitUpdatedBlog
?>


<?php
session_start();
?>

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
<form action="submitUpdatedBlog.php" method="POST">
  <label for="title">Blog title:</label>
  <input type="text" id="title" name="title"><br><br>
  <label for="publicAccess">Private or public visibility</label>
  <select name="publicAccess" id="publicAccess">
   	<option value="0">Private</option>
  	<option value="1">Public</option>
  </select><br><br>
  <label for="topics">Topics:</label><br>
  <input type="radio" id="topic1" name= "topic1" value="Politics">
  <label for="topic1">Politics</label><br>
  <input type="radio" id="topic2" name= "topic2" value="Lesiure">
  <label for="topic2">Leisure</label><br>
  <input type="radio" id="topic3" name= "topic3" value="Sports">
  <label for="topic3">Sports</label><br>
  <input type="radio" id="topic4" name= "topic4" value="Pets">
  <label for="topic4">Pets</label><br>
  <input type="radio" id="topic5" name= "topic5" value="Random">
  <label for="topic5">Random</label><br>
  <input type="radio" id="topic6" name= "topic6" value="Projects">
  <label for="topic6">Projects</label><br>
  <input type="radio" id="topic7" name= "topic7" value="Adventure">
  <label for="topic7">Adventure</label><br><br>
  <label for="BlogPost">Blog Post Body</label><br><br>
  <textarea id="BlogPost" name="BlogPost" rows="20" cols="100">
  <?php echo $_SESSION["BLOG_BODY"]?>
  </textarea><br><br>
  <input type="submit" value="Update"><br><br>
 </form>
 <a href="homePage.php">Home Page</a>
 <a href="index.php">Main Menu</a>
</p> 
</article>
</body>
</html>