<?php
//HTML for formating and visual
//Kody O'Neill
//Version 1.5
//Bloging website
// Start the session
session_start();
$_SESSION["TABLE1"] = "blog_posts";
$_SESSION["TABLE2"] = "users";
$_SESSION["TABLE3"] = "blog_comments";
?>

<?php
//This form verifies that you are actually filling in the blanks, gives you 5 tries before you are locked out, and logs you in once
//username and password combo has been confirmed
$table_name = $_SESSION["TABLE2"];
$uname = $_POST["username"];
$pword = $_POST["password"];


//connects to DB
include 'myfuncs.php';
$conn = dbConnect();

if($uname == null){
    echo "Username field cannot be empty";
    echo "<br>";
    echo "<a href=login.html>Log in</a>";
    exit('');
}

if($pword == null){
    echo "Password field cannot be empty";
    echo "<br>";
    echo "<a href=login.html>Log in</a>";
    exit('');
}

$sql_login = "SELECT LOGIN_ATTEMPTS FROM $table_name WHERE username = '$uname'";
$result = $conn->query($sql_login);
$row = $result->fetch_assoc();
$check_login_attempts = $row["LOGIN_ATTEMPTS"];


if($check_login_attempts > 5){
    echo "Too many login trys. Please wait 5 minutes to try again";
    echo "<br>";
    echo "<a href=login.html>Log in</a>";
    exit('');
}


$sql = $conn->query("SELECT USER_ID, ADMIN FROM $table_name WHERE username = '$uname' AND password = '$pword'");
if($sql->num_rows==0){
    
    //increments LOGIN_ATTEMPTS value 
    $check_login_attempts = ++$check_login_attempts;
    $sql_update_table = "UPDATE $table_name SET LOGIN_ATTEMPTS = '$check_login_attempts' WHERE username = '$uname'";
    if($conn->query($sql_update_table)!=TRUE){
        echo "Error updating record: " . $conn->error;
    }
    echo "Login failed";
    echo "<br>";
    echo "<a href=login.html>Log in</a>";
}else{
    if($sql->num_rows==1){
        
        //resets LOGIN_ATTEMPTS to 0
        $sql_update_table = "UPDATE $table_name SET LOGIN_ATTEMPTS = '0' WHERE username = '$uname'";
        if($conn->query($sql_update_table)!=TRUE){
            echo "Error updating record: " . $conn->error;
        }
        $row = $sql->fetch_assoc();	// Read the Row from the Query
        saveUserId($row["USER_ID"]);		// Save User ID in the Session
        saveAdminStatus($row["ADMIN"]);
        include('homePage.php');
    }
}

$conn->close();
?>
