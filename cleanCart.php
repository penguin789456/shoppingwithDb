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
    $sql="DELETE FROM orderdetail WHERE telPhone='".$_SESSION["tel"]."'";
    echo $sql;
    mysqli_query($link, $sql);
}
header("location:showCart.php")
?>