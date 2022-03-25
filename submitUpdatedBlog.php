<!-- //HTML for formating and visual
//Kody O'Neill
//Version 1.5
//Bloging website -->

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
//This is very similar the to blog post and will take the form and submit the changes to the DB
session_start();
$userID = $_SESSION["USER_ID"];
$blogID = $_SESSION["BLOG_ID"];
if($userID==null){
    echo "You will need to sign in first before updating a blog";
    echo "<br>";
    echo "<a href=http://localhost/Blog/login.html>Log in</a>";
    echo "<br>";
}else{
    
}

$blogTitle = $_POST["title"];
$blogBody = $_POST["BlogPost"];
$blogAccess = $_POST['publicAccess'];
$blogTopic1 = $_POST["topic1"];
$blogTopic2 = $_POST["topic2"];
$blogTopic3 = $_POST["topic3"];
$blogTopic4 = $_POST["topic4"];
$blogTopic5 = $_POST["topic5"];
$blogTopic6 = $_POST["topic6"];
$blogTopic7 = $_POST["topic7"];
$table_name = $_SESSION["TABLE1"];

//makes sure a topic is chosen
if($blogTopic1!=null){
    $blogTopicUpdate = $blogTopic1;
}elseif($blogTopic2 != null){
    $blogTopicUpdate = $blogTopic2;
}elseif ($blogTopic3 != null){
    $blogTopicUpdate = $blogTopic3;
}elseif ($blogTopic4 != null){
    $blogTopicUpdate = $blogTopic4;
}elseif ($blogTopic5 != null){
    $blogTopicUpdate = $blogTopic5;
}elseif ($blogTopic6 != null){
    $blogTopicUpdate = $blogTopic6;
}elseif ($blogTopic7 != null){
    $blogTopicUpdate = $blogTopic7;
}else {
    $blogTopicUpdate = "No Topic Selected";
}


//replaces single apostrophe with two so SQL can understand it as a string
$blogBody = str_replace("'", "''", $blogBody);

//filter to replace SQL key words/phrases
$blogBody = str_replace("SELECT * FROM", "select from", $blogBody);
$blogBody = str_replace("select * from", "select from", $blogBody);
$blogBody = str_replace("INSERT INTO", "insert into", $blogBody);


include 'myfuncs.php';
$conn = dbConnect();

if($blogTitle==null||$blogBody==null){
    echo "Not all fields filled out";
    echo "<br>";
    echo "<a href=BlogPostSubmission.html>Try again</a>";
}else{

    //sends update to DB
    $sql = "UPDATE $table_name SET BLOG_TITLE = '$blogTitle', BLOG_BODY = '$blogBody', BLOG_TOPIC = '$blogTopicUpdate', BLOG_ACCESS = '$blogAccess' 
            WHERE BLOG_ID = '$blogID'";
    if ($conn->query($sql) === TRUE) {
        echo "Blog updated successfully";
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