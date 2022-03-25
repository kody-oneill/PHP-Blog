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
	<p>
	<form action="updateComment.php" method="POST">
	<?php
    session_start();
    
    require_once 'myfuncs.php';
    $conn = dbConnect();
    $comment_id = $_POST["commentchosen"];
    $table_name2 = $_SESSION["TABLE3"];
    
    //selects the blog chosen and pulls the data from the database
    $sql = $conn->query("SELECT COMMENT_ID, username, COMMENT_BODY FROM $table_name2 WHERE COMMENT_ID = $comment_id");
    //echo "Error: " . $sql . "<br>" . $conn->error;
    while($row = $sql->fetch_assoc()){
        $commentID = $row["COMMENT_ID"];
        $commentBody = $row["COMMENT_BODY"];
        echo $row["username"] . "<br>";
        echo $row["COMMENT_BODY"] . "<br><br><br>";
        saveCommentID($commentID);
        saveCommentBody($commentBody);
    }
    
    ?>
    <input type="submit" value="Update"><br><br>
	</form>
	 <form action="deleteComment.php" method="POST" id="formDelete">
 	 <input type="submit" value="Delete"><br><br>
 	 </form>
	</p>
</article>
</body>
</html>