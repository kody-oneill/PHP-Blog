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
$viewedUserID = $_SESSION["USER_ID2"];
$table_name1 = $_SESSION["TABLE1"];
$table_name2 = $_SESSION["TABLE2"];

//verifys users is signed in
if($userID==null){
    echo "You will need to sign in first before deleting a blog";
    echo "<br>";
    echo "<a href=http://localhost/Blog/login.html>Log in</a>";
    echo "<br>";
}else{
    
    
    require_once 'myfuncs.php';
    $conn = dbConnect();
    
    //deletes post from DB
    $sql = "DELETE FROM $table_name1 WHERE USER_ID = $viewedUserID";   
    if ($conn->query($sql) === TRUE) {
        echo "Blogs deleted successfully from " . "$viewedUserID";
        echo "<br>";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $sql2 = "DELETE FROM $table_name2 WHERE USER_ID = $viewedUserID";
    if ($conn->query($sql2) === TRUE) {
        echo "User deleted successfully from Kody's Blog website";
        echo "<br>";
    }else{
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
    echo "<a href=homePage.php>Home</a>";
    echo "<br>";
    echo "<a href=blogSearch.php>Search blogs</a>";
    echo "<br>";
    $conn->close();
}




?>
	</h2>
	<p></p>
</article>
</body>
</html>