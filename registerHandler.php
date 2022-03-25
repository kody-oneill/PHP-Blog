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

//This handles the data coming from the register.html form
session_start();
$table_name = $_SESSION["TABLE2"];
$email = $_POST["email"];
$blogusername = $_POST["uname"];
$password1 = $_POST["pword"];
$password2 = $_POST["pwordconfirm"];
$string_length = strlen($password1);

//connects to DB
include 'myfuncs.php';
$conn = dbConnect();

echo "<br>";

//checks to make sure all fields are filled out
if($email==null||$blogusername==null||$password1==null||$password2==null){
    echo "Not all fields filled out";
    echo "<br>";
    echo "<a href=register.html>Try again</a>";
}else{
    
    //makes sure user types in the correct password by making them do it twice and have it match
    if($password1!=$password2){
        echo "Passwords do not match";
        echo "<br>";
        echo "<a href=register.html>Try again</a>";
    }else{
        if($string_length<7){
            echo "Password must be at least 8 characters long";
            echo "<br>";
            echo "<a href=register.html>Try again</a>";
        }else{
       
            //checks to make sure we do not already have that email in use
            $result = $conn->query("SELECT USER_ID FROM $table_name WHERE email = '$email'");
            if($result->num_rows!=0){
                echo "Account already exists with that email";
                echo "<br>";
                echo "<a href=register.html>Log in (Comming soon)</a>";
            }else{
                
                //checks to make sure that this username is not in use
                $result2 = $conn->query("SELECT USER_ID FROM $table_name WHERE username = '$blogusername'");
                if($result2->num_rows!=0){
                    echo "Account already exists with that username";
                    echo "<br>";
                    echo "<a href=register.html>Log in (Comming soon)</a>";
                }else{
                    
                    //adds entry into DB
                    $sql = "INSERT INTO $table_name (email, username, password)
                    VALUES ('$email', '$blogusername','$password1')";
                    
                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                        echo "<br>";
                        echo "<a href=login.html>Log in</a>";
                        echo "<br>";
                        echo "<a href=index.php>Main Menu</a>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    
                    $conn->close();
                }
            }
        }
    }
}

?>
	</h2>
	<p></p>
</article>
</body>
</html>


