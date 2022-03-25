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
$blogPost = $_SESSION["BLOGID"];
$comment_body = $_POST["BlogPost"];

require_once 'myfuncs.php';
$conn = dbConnect();


$table_name = $_SESSION["TABLE2"];
$table_name2 = $_SESSION["TABLE3"];
$userID = $_SESSION["USER_ID"];


 

if($userID==null){
    
    echo "You will need to sign in first before posting a blog";
    echo "<br>";
    echo "<a href=login.html>Log in</a>";
    echo "<br>";
    
}else{
    
    $sql2 = $conn->query("SELECT username FROM $table_name WHERE USER_ID = $userID");
    while($row = $sql2->fetch_assoc()){
        $USER_NAME = $row["username"];
    }
    
    $sql = "INSERT INTO $table_name2 (COMMENT_BODY, BLOG_ID, username)
                    VALUES ('$comment_body','$blogPost', '$USER_NAME')";
    if ($conn->query($sql) === TRUE) {
        echo "New post created successfully";
        echo "<br>";
        echo "<a href=homePage.php>Home</a>";
        echo "<br>";
    } else {
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