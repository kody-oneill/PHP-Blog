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
<p>
<form action="userUpdate.php" method="POST">
<?php
session_start();
$admin = $_SESSION["ADMIN"];

if($admin == 1){
    $User = $_POST["userid"];
    require_once 'myfuncs.php';
    $conn = dbconnect();
    
    $table_name = $_SESSION["TABLE2"];
    
    //1 means that is is publically available
    $sql = $conn->query("SELECT USER_ID, email, username, password, ADMIN FROM $table_name WHERE USER_ID = $User");
    
    //if($sql->num_rows>0){
    while($row = $sql->fetch_assoc()){
        echo "USER ID: ".$row["USER_ID"]."<br>"." Email: ".$row["email"]."<br>"." Username: " .$row["username"] ."<br>". " Password: ".
            $row["password"]."<br>". " Admin status: ". $row["ADMIN"] . "<br>";
            echo "<br>";
            saveUserUsername($row["username"]);
            saveUserPassword($row["password"]);
            saveUserEmail($row["email"]);
            saveViewedUserID($row["USER_ID"]);
    }
    
    echo "Would you like to view users blogs, update or remove this user?" . "<br>" . "<br>";
    
}else{
    echo "You need to be an administrator to view this page"."<br>";
}


?>
  <input type="submit" value="Update"><br><br>
 </form>
 <form action="deleteUserConfirmation.php" method="POST" id="formDelete">
 	<input type="submit" value="Delete"><br><br>
 </form>
  <form action="viewUserBlogs.php" method="POST" id="formView">
 	<input type="submit" value="Blog List"><br><br>
 </form>
 <a href="homePage.php">Home Page</a>
 <a href="index.php">Main Menu</a>
</p> 
</article>
</body>
</html>