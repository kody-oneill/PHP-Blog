<?php
//HTML for formating and visual
//Kody O'Neill
//Version 1.5
//Bloging website
// Start the session
session_start();

//HTML for formating and visual
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

<form action="blogView.php" method="POST">
<?php
include 'myfuncs.php';
$conn = dbConnect();

$table_name = $_SESSION["TABLE1"];
$userID = $_SESSION["USER_ID2"];

//pulls the necessary data from the database to know which blog post you want to look at
$sql = $conn->query("SELECT BLOG_ID, BLOG_TITLE FROM $table_name WHERE USER_ID = $userID");

if($sql->num_rows>0){
    while($row = $sql->fetch_assoc()){
        echo "Blog ID: ".$row["BLOG_ID"]." - TITLE: ".$row["BLOG_TITLE"]."<br>";
    }

    echo "<br>";
    echo "Choose which blog ID you would like to view" . "<br>" . "<br>";
}else{
    echo "No published blogs";
    echo "<br>";
    echo "<a href=homePage.php>Home</a>";
}
?>
  <input type="number" name="blogchosen" id="blogchosen" min="1" ><br><br>
  <input type="submit" value="Select"><br><br>
</form>
<a href="homePage.php">Home Page</a>
<a href="index.php">Main Menu</a>
</p>
</article>

</body>
</html>