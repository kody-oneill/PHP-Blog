<?php
//Blog
//Kody O'Neill
//inserts data in DB from BlogPostSubmission
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
<?php
session_start();
//verifys you are actually logged in
$userID = $_SESSION["USER_ID"];
if($userID==null){
    echo "You will need to sign in first before posting a blog";
    echo "<br>";
    echo "<a href=login.html>Log in</a>";
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

//verifys at least one radio button is selected for the topic
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
    
    //posts data to database
    $sql = "INSERT INTO $table_name (BLOG_TITLE, BLOG_BODY, USER_ID, BLOG_TOPIC, BLOG_ACCESS)
                    VALUES ('$blogTitle', '$blogBody', '$userID', '$blogTopicUpdate', '$blogAccess')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New blog created successfully";
        echo "<br>";
        echo "<a href=homePage.php>Home</a>";
        echo "<br>";
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}


?>
	</h2>
	<p></p>
</article>
</body>
</html>
