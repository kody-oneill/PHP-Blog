<?php

//clears all session variables to disable unauthorized access to specific php and html files
//Lets users login, register, or see publically available Blog Posts
//HTML for formating and visual
//Kody O'Neill
//Version 1.5
//Bloging website
session_start();
unset($_SESSION["USER_ID"]);
unset($_SESSION["BLOG_BODY"]);
unset($_SESSION["BLOG_ID"]);
unset($_SESSION["ADMIN"]);
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["email"]);
$_SESSION["TABLE1"] = "blog_posts";
$_SESSION["TABLE2"] = "users";
$_SESSION["TABLE3"] = "blog_comments";
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
	<p></p>
	<h2> 
	<a href="login.html">Login</a><br><br>
	<a href="register.html">Register</a><br><br>
	<a href="search.html">Search Public Posts</a>
	</h2>
	<p></p>
</article>
</body>
</html>