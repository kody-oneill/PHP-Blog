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
	<form action="blogPublicView.php" method="POST">
<?php
session_start();
$title = $_POST["title"];
$body = $_POST["body"];

$blogTopic1 = $_POST["topic1"];
$blogTopic2 = $_POST["topic2"];
$blogTopic3 = $_POST["topic3"];
$blogTopic4 = $_POST["topic4"];
$blogTopic5 = $_POST["topic5"];
$blogTopic6 = $_POST["topic6"];
$blogTopic7 = $_POST["topic7"];

require_once 'myfuncs.php';
$table1 = $_SESSION["TABLE1"];

$conn = dbConnect();

if($blogTopic1!=null){
    $topicvalue = $blogTopic1;
}elseif($blogTopic2 != null){
    $topicvalue = $blogTopic2;
}elseif ($blogTopic3 != null){
    $topicvalue = $blogTopic3;
}elseif ($blogTopic4 != null){
    $topicvalue = $blogTopic4;
}elseif ($blogTopic5 != null){
    $topicvalue = $blogTopic5;
}elseif ($blogTopic6 != null){
    $topicvalue = $blogTopic6;
}elseif ($blogTopic7 != null){
    $topicvalue = $blogTopic7;
}else {
    $topicvalue = null;
}

if($topicvalue != null && $title == null && $body == null){
    $sql = $conn->query("SELECT BLOG_ID, BLOG_TITLE FROM $table1 WHERE BLOG_TOPIC LIKE '%$topicvalue%' AND BLOG_ACCESS = 1");
    
    if($sql->num_rows>0){
        while($row = $sql->fetch_assoc()){
            echo $row["BLOG_ID"]." ".$row["BLOG_TITLE"]."<br>";
        }
        echo "<br>";
        echo "Choose which blog ID you would like to view" . "<br>" . "<br>";
    }
    
}elseif($topicvalue == null && $title != null && $body == null){

    $sql = $conn->query("SELECT BLOG_ID, BLOG_TITLE FROM $table1 WHERE BLOG_TITLE LIKE '%$title%' AND BLOG_ACCESS = 1");
    
    if($sql->num_rows>0){
        while($row = $sql->fetch_assoc()){
            echo $row["BLOG_ID"]." ".$row["BLOG_TITLE"]."<br>";
        }
        echo "<br>";
        echo "Choose which blog ID you would like to view" . "<br>" . "<br>";
    }
    
}elseif($topicvalue == null && $title == null && $body != null){
    
    $sql = $conn->query("SELECT BLOG_ID, BLOG_TITLE FROM $table1 WHERE BLOG_BODY LIKE '%$body%' AND BLOG_ACCESS = 1");
    
    if($sql->num_rows>0){
        while($row = $sql->fetch_assoc()){
            echo $row["BLOG_ID"]." ".$row["BLOG_TITLE"]."<br>";
        }
        echo "<br>";
        echo "Choose which blog ID you would like to view" . "<br>" . "<br>";
    }
    
}elseif($topicvalue != null && $title != null && $body == null){
    
    $sql = $conn->query("SELECT BLOG_ID, BLOG_TITLE FROM $table1 WHERE BLOG_TOPIC LIKE '%$topicvalue%' AND BLOG_TITLE LIKE '%$title%' AND BLOG_ACCESS = 1");
    
    if($sql->num_rows>0){
        while($row = $sql->fetch_assoc()){
            echo $row["BLOG_ID"]." ".$row["BLOG_TITLE"]."<br>";
        }
        echo "<br>";
        echo "Choose which blog ID you would like to view" . "<br>" . "<br>";
    }
    
}elseif($topicvalue != null && $title == null && $body != null){
    
    $sql = $conn->query("SELECT BLOG_ID, BLOG_TITLE FROM $table1 WHERE BLOG_TOPIC LIKE '%$topicvalue%' AND BLOG_BODY LIKE '%$body%' AND BLOG_ACCESS = 1");
    
    if($sql->num_rows>0){
        while($row = $sql->fetch_assoc()){
            echo $row["BLOG_ID"]." ".$row["BLOG_TITLE"]."<br>";
        }
        echo "<br>";
        echo "Choose which blog ID you would like to view" . "<br>" . "<br>";
    }
    
}elseif($topicvalue != null && $title != null && $body != null){
    
    $sql = $conn->query("SELECT BLOG_ID, BLOG_TITLE FROM $table1 WHERE BLOG_TOPIC LIKE '%$topicvalue%' AND BLOG_BODY LIKE '%$body%' AND
 BLOG_TITLE LIKE '%$title%' AND BLOG_ACCESS = 1");
    
    if($sql->num_rows>0){
        while($row = $sql->fetch_assoc()){
            echo $row["BLOG_ID"]." ".$row["BLOG_TITLE"]."<br>";
        }
        echo "<br>";
        echo "Choose which blog ID you would like to view" . "<br>" . "<br>";
    }
    
}elseif($topicvalue == null && $title != null && $body != null){
    
    $sql = $conn->query("SELECT BLOG_ID, BLOG_TITLE FROM $table1 WHERE BLOG_BODY LIKE '%$body%' AND BLOG_TITLE LIKE '%$title%' AND BLOG_ACCESS = 1");
    
    if($sql->num_rows>0){
        while($row = $sql->fetch_assoc()){
            echo $row["BLOG_ID"]." ".$row["BLOG_TITLE"]."<br>";
        }
        echo "<br>";
        echo "Choose which blog ID you would like to view" . "<br>" . "<br>";
    }
    
}elseif($topicvalue == null && $title == null && $body == null){
    $sql = $conn->query("SELECT BLOG_ID, BLOG_TITLE FROM $table1 WHERE BLOG_ACCESS = 1");
    
    if($sql->num_rows>0){
        while($row = $sql->fetch_assoc()){
            echo "Blog ID: ".$row["BLOG_ID"]." - TITLE: ".$row["BLOG_TITLE"]."<br>";
        }
        echo "<br>";
        echo "Choose which blog ID you would like to view" . "<br>" . "<br>";
}
}else{
    echo "Error: No blogs found";
}
?>
  <input type="number" name="blogchosen" id="blogchosen" min="1" ><br><br>
  <input type="submit" value="Select"><br><br>
</form>
<a href="index.php">Main Menu</a>
	</p>
</article>
</body>
</html>