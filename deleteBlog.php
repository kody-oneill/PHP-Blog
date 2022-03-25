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
	<p></p>
	<h2> 
<?php
session_start();
$userID = $_SESSION["USER_ID"];
$blogID = $_SESSION["BLOG_ID"];
$table_name = $_SESSION["TABLE1"];

//verifys users is signed in
if($userID==null){
    echo "You will need to sign in first before deleting a blog";
    echo "<br>";
    echo "<a href=login.html>Log in</a>";
    echo "<br>";
}else{
    
    
    require_once 'myfuncs.php';
    $conn = dbConnect();
    
    //deletes post from DB
    $sql = "DELETE FROM $table_name WHERE BLOG_ID = $blogID";   
    if ($conn->query($sql) === TRUE) {
        echo "Blog deleted successfully";
        echo "<br>";
        echo "<a href=homePage.php>Home</a>";
        echo "<br>";
        echo "<a href=blogSearch.php>Search blogs</a>";
        echo "<br>";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}




?>
	</h2>
	<p></p>
</article>
</body>
</html>