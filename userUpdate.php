<?php
//HTML for formating and visual
//Kody O'Neill
//Version 1.5
//Bloging website
session_start();
//This is very similar to the BlogPostSubmission HTML but it prefills the body to make minor adjustments
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
<form action="submitUpdatedUser.php" method="POST">
  <label for="email">Email Address:</label>
  <input type="text" id="email" name="email" value=<?php echo $_SESSION["email"];?>><br><br>
  <label for="uname">User name:</label>
  <input type="text" id="uname" name="uname" value=<?php echo $_SESSION["username"];?>><br><br>
  <label for="pword">Password:</label>
  <input type="text" id="pword" name="pword" value=<?php echo $_SESSION["password"];?>><br><br>
  <label for="pwordconfirm">Confirm Password:</label>
  <input type="text" id="pwordconfirm" name="pwordconfirm" value=<?php echo $_SESSION["password"];?>><br><br>
  <label for="adminAccessDrop">What access should the user have</label>
  <select name="adminAccess" id="adminAccess">
   	<option value="0">Standard</option>
  	<option value="1">Admin</option>
  </select><br><br>
  <input type="submit" value="Update"><br><br>
 </form>
 <a href="homePage.php">Home Page</a>
 <a href="index.php">Main Menu</a>
</p> 
</article>
</body>
</html>