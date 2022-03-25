<?php
// This is to give the users a little menu to navigate between posting, viewing posted blobs, and logging out
session_start();
$username = $_POST["username"];
$userID = $_SESSION["USER_ID"];
$admin = $_SESSION["ADMIN"];
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["email"]);
//HTML for formating and visual
//Kody O'Neill
//Version 1.5
//Bloging website
?>

<head>
<title>'My Blog Application</title>
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
<h1>
<?php 
if($userID==null){
    echo "No user logged in";
}else{
    echo "Login was successful: ". $username;
}
?>
</h1><br><br>
<article>
<p></p>
<h2>
<?php 


//verifies you are logged in 
if($userID==null){
    echo "You will need to sign in first before accessing the home page";
    echo "<br>";
    echo "<a href=login.html>Log in</a>";
    echo "<br>";
}else{
    //this gives different options based on admin status
    if($admin == 1){
        echo "<a href=BlogPostSubmission.html>Post a new blog</a><br><br>";
        echo "<a href=blogSearch.php>See your blogs</a><br><br>";
        echo "<a href=searchAdmin.html>Search Blogs</a><br><br>";
        echo "<a href=userAdmin.php>User administration</a><br><br>";
        echo " <a href=logOut.php>Log out</a>";
    }else{
        echo "<a href=BlogPostSubmission.html>Post a new blog</a><br><br>";
        echo "<a href=blogSearch.php>See your blogs</a><br><br>";
        echo "<a href=search.html>Search for Blogs</a><br><br>";
        echo " <a href=logOut.php>Log out</a>";
    }

}
?>
</h2>
<p></p>
</article>
</body>
