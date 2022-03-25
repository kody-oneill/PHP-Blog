<!-- Confirms that the user does actually want to delete the post 
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
	<p></p>
	<h2> 
<?php
session_start();
$userID = $_SESSION["USER_ID"];
if($userID==null){
    echo "You will need to sign in first before deleting a blog";
    echo "<br>";
    echo "<a href=login.html>Log in</a>";
    echo "<br>";
}else{
    
//gives option to go back to search or launch the deleteBlog.php file    
echo "Are you sure you want to delet this user? This will delete all blog posts associated and CANNOT BE UNDONE.";
echo "<br>";
echo "<a href=deleteUser.php>Yes delete this User and blogs from the system</a>";
echo "<br>";
echo "<a href=userAdmin.php>No go back to users list</a>";



}
?>
	</h2>
	<p></p>
</article>
</body>
</html>