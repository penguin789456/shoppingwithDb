<?php
session_start();
$link = mysqli_connect(
    'localhost',
    // MySQL主機名稱
    'root',
    // 使用者名稱 
    '123456',
    // 密碼 
    'shoppingwithdb'
);
if(isset($_SESSION["tel"])){
    $sqlTel = "SELECT * FROM customer WHERE telPhone=('".$_SESSION["tel"]."')";
    $sqlProduct = "SELECT * FROM product WHERE pID=('".$_GET["id"]."')";
    if(mysqli_query($link, $sqlTel) and mysqli_query($link, $sqlProduct)){
        $sql="INSERT INTO orderdetail values('".$_SESSION["tel"]."','".$_GET["id"]."')";
        mysqli_query($link, $sql);
    }
}
header("location:shoping.php")
?>