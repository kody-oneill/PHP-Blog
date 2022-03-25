<?php
//HTML for formating and visual
//Kody O'Neill
//Version 1.5
//Bloging website
// Start the session
session_start();
?>

<!-- Logs user off so no unauthorized access to blog posts is possible -->
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
	<p></p>
	<h2> 
<?php

//Unsets all session variables
unset($_SESSION["USER_ID"]);
unset($_SESSION["BLOG_BODY"]);
unset($_SESSION["BLOG_ID"]);
unset($_SESSION["ADMIN"]);
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["email"]);
echo "You have been logged out";
echo "<br>";
echo "<a href=login.html>Log in</a>";
echo "<br>";
echo "<a href=index.php>Main Menu</a>";
?>
	</h2>
	<p></p>
</article>
</body>
</html>