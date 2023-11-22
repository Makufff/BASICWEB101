<?php
    // save image
    $direc = "img/" ;
    $uploadfile = $direc . basename($_FILES['image']['name']) ;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile) ;
    
    // send data to database
    $Srv_name = "localhost";
    $user = "root";
    $pwd = "";
    $name = "test";
    $connect = new mysqli($Srv_name , $user , $pwd , $name) ;
    $catagorys = $_POST['categorys'];
    $discriptions = $_POST['discriptions'];
    $query = "INSERT INTO web_db (imgs , categorys , discriptions) VALUES('$uploadfile','$catagorys','$discriptions')";
    mysqli_query($connect,$query);
    header( "location: index.php" );
    exit(0);
?>