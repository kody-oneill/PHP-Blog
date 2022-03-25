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
$commentID = $_SESSION["COMMENT_ID"];
$commentBody = $_POST["BlogPost"];
$table_name = $_SESSION["TABLE3"];

include 'myfuncs.php';
$conn = dbConnect();

if($userID==null){
    echo "You will need to sign in first before updating a blog";
    echo "<br>";
    echo "<a href=login.html>Log in</a>";
    echo "<br>";
}else{
    
    if($commentBody == null){
        echo "comment cannot be empty";
        echo "<br>";
        echo "<a href=updateComment.php>Try again</a>";
    }else{
        //sends update to DB
        $sql = "UPDATE $table_name SET COMMENT_BODY = '$commentBody' WHERE COMMENT_ID = '$commentID'";
        if ($conn->query($sql) === TRUE) {
            echo "Comment updated successfully";
            echo "<br>";
            echo "<a href=homePage.php>Home</a>";
            echo "<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
}
?>
	</h2>
	<p></p>
</article>
</body>
</html>