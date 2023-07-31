<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="shoppingCss.css" rel="stylesheet">
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
    if(isset($_POST["tel"])){
        $_SESSION["tel"]=$_POST["tel"];
        $sql = "INSERT INTO customer values('".$_POST["tel"]."')";
        mysqli_query($link, $sql);
    }
    ?>
</head>

<body>
    <?php
    $sql = "SELECT * FROM product;";
    $product=array();
    if($result=mysqli_query($link, $sql)){
        while($rowP=mysqli_fetch_array($result)){
            array_push($product,$rowP);
        }
    }
    ?>
    <div class="container">
        <h1>商品目錄</h1>
        <form action='shopObject.php' method='post'>
            <div class="table_Container">
                <?php
                    foreach ($product as $det) {
                        echo 
                        "
                        <table>
                        <tr>
                        <td rowspan='3'><img src='pics\\".$det[3]."'></td>
                        <td >ID：".$det[0]."</td>
                        </tr>
                        <tr>
                            <td>名稱：".$det[1]."</td>
                        </tr>
                        <tr>
                            <td>價格".$det[2]."</td>
                        </tr>
                        <tr>
                            <td colspan='2' style='text-align:center'><a href='shoppingObject.php?id=".$det[0]."'>加入購物車</a></td>
                        </tr>
                        </table>
                        ";
                    }
                ?>
            </div>
        </form>
        <h2><a href="login.html">返回登入頁</h1>
        <h2><a href="showCart.php">結帳</h1>
    </div>
</body>

</html>