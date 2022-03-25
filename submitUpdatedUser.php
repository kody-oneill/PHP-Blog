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
	session_start();
//This handles the data coming from the register.html form
	$admin = $_SESSION["ADMIN"];
	
	if($admin == 1){
	    $table_name = $_SESSION["TABLE2"];
	    $email = $_POST["email"];
	    $blogusername = $_POST["uname"];
	    $password1 = $_POST["pword"];
	    $password2 = $_POST["pwordconfirm"];
	    $string_length = strlen($password1);
	    $viewedUserID = $_SESSION["USER_ID2"];
	    $adminAccess = $_POST['adminAccess'];
	    

	    
	    
	    
	    
	    //connects to DB
	    include 'myfuncs.php';
	    $conn = dbConnect();
	    
	    echo "<br>";
	    
	    //checks to make sure all fields are filled out
	    if($email==null||$blogusername==null||$password1==null||$password2==null){
	        echo "Not all fields filled out";
	        echo "<br>";
	        echo "<a href=userUpdate.php>Try again</a>";
	    }else{
	        
	        //makes sure user types in the correct password by making them do it twice and have it match
	        if($password1!=$password2){
	            echo "Passwords do not match";
	            echo "<br>";
	            echo "<a href=userUpdate.php>Try again</a>";
	        }else{
	            if($string_length<7){
	                echo "Password must be at least 8 characters long";
	                echo "<br>";
	                echo "<a href=userUpdate.php>Try again</a>";
	            }else{
	                $sql = "UPDATE $table_name SET email = '$email', username = '$blogusername', password = '$password1', ADMIN = '$adminAccess'
                         WHERE USER_ID = '$viewedUserID'";
	                
	                if ($conn->query($sql) === TRUE) {
	                    echo "Record updated successfully";
	                    echo "<br>";
	                    echo "<a href=homePage.php>Home Page</a>";
	                    echo "<br>";
	                    echo "<a href=index.php>Main Menu</a>";
	                } else {
	                    echo "Error: " . $sql . "<br>" . $conn->error;

	                }
	                
	                $conn->close();
	            }
	        }
	    }
	}else{
	    echo "You need to be an administrator to view this page"."<br>";
	    echo "<a href=index.php>Main Menu</a>";
	}

    

?>
	</h2>
	<p></p>
</article>
</body>
</html>

