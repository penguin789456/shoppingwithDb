<?php 
$link = mysqli_connect(
    'localhost',
    // MySQL主機名稱
    'root',
    // 使用者名稱 
    '123456',
    // 密碼 
    'shoppingwithdb'
);
if(isset($_GET["id"])){
    $sql="DELETE FROM orderdetail WHERE ID='".$_GET["id"]."'";
    mysqli_query($link, $sql);
}
header("location:showCart.php")
?>