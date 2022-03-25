<?php //This is the portal to be used for managing user roles and rights
//HTML for formating and visual
//Kody O'Neill
//Version 1.5
//Bloging website?>



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

<form action="userProfileView.php" method="POST">
<?php
session_start();
$admin = $_SESSION["ADMIN"];

if($admin == 1){
    require_once 'myfuncs.php';
    $conn = dbconnect();
    
    $table_name = $_SESSION["TABLE2"];
    
    //1 means that is is publically available
    $sql = $conn->query("SELECT USER_ID, email, username, password, ADMIN FROM $table_name");
    
    if($sql->num_rows>0){
        while($row = $sql->fetch_assoc()){
            echo "USER ID: ".$row["USER_ID"]." Email: ".$row["email"]. " Username: " .$row["username"] . " Password: ".
            $row["password"]. " Admin status: ". $row["ADMIN"] . "<br>";
            echo "<br>";
        }
        echo "Choose which User ID would you like to update or remove?" . "<br>" . "<br>";
    }
}else{
    echo "You need to be an administrator to view this page"."<br>";
}

$conn->close();
?>
  <input type="number" name="userid" id="userid" min="1" ><br><br>
  <input type="submit" value="Select"><br><br>
</form>
<a href="homePage.php">Home Page</a>
<a href="index.php">Main Menu</a>
</p>
</article>

</body>
</html>

