<?php
//HTML for formating and visual
//Kody O'Neill
//Version 1.5
//Bloging website
//reusable functions to use in all other forms

function dbConnect(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "blog_users";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

function saveUserId($id){
    session_start();
    $_SESSION["USER_ID"] = $id;
}

function getUserId(){
    session_start();
    return $_SESSION["USER_ID"];
}

function saveBlogBody($blogBody){
    session_start();
    $_SESSION["BLOG_BODY"] = $blogBody;
}

function saveBlogId($bid){
    session_start();
    $_SESSION["BLOG_ID"] = $bid;
}

function saveBlogTitle($bt){ 
    session_start();
    $_SESSION["BLOG_TITLE"] = $bt;
}

function saveAdminStatus($as){
    session_start();
    $_SESSION["ADMIN"] = $as;
}

function saveUserEmail($ue){
    session_start();
    $_SESSION["email"] = $ue;
}

function saveUserUsername($uun){
    session_start();
    $_SESSION["username"] = $uun;
}

function saveUserPassword($up){
    session_start();
    $_SESSION["password"] = $up;
}

function saveViewedUserID($vuid){
    session_start();
    $_SESSION["USER_ID2"] = $vuid;
}

function saveCommentID($sci){
    session_start();
    $_SESSION["COMMENT_ID"] = $sci;
}

function saveCommentBody($scb){
    session_start();
    $_SESSION["COMMENT_BODY"] = $scb;
}


?>