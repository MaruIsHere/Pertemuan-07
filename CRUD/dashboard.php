<?php
session_start();
if(isset($_GET["aksi"])){
    if($_GET["aksi"] == 'logout'){
        session_destroy();
        header("location: login.php");
    }
}
if(!isset($_SESSION["login"])){
 header("location: login.php");
}
    $konten = "";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <ul>
        <li> Data Mahasiswa </li>
        <li> Data MataKuliah </li>
        <li> Data Dosen </li>
        <li> Data User </li>
        <li><a href="?aksi=logout"><?= $_SESSION["user"] ?> - Logout</a> </li>
    </ul>

    <div>  
        <?php
            echo $konten;
        ?>
    </div>
    
</body>
</html>