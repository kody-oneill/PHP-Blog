<!-- HTML for fromating and visuals 
//HTML for formating and visual
//Kody O'Neill
//Version 1.5
//Bloging website-->

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
	<form action="submitUpdatedComment.php" method="POST">
	<textarea id="BlogPost" name="BlogPost" rows="10" cols="50">
	<?php echo $_SESSION["COMMENT_BODY"]?>
  	</textarea><br><br>
 	<input type="submit" value="Update Comment"><br><br>
	</form>
	<form action="homePage.php" method="POST">
    <input type="submit" value="Home"><br><br>
    </form>
	</p>
</article>
</body>
</html>