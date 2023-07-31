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
    $sql = "SELECT ID,pID FROM orderdetail WHERE telPhone=('".$_SESSION["tel"]."')";
    if($result=mysqli_query($link, $sql)){
        $productArray=array();
        while($rowP=mysqli_fetch_array($result)){
            array_push($productArray,$rowP);
        }
    }
    ?>
</head>
<body>
<div class="container">
        <h1>商品目錄</h1>
        <h2><a href="shoping.php">返回商品目錄</a></h2>
        <form action='shopObject.php' method='post'>
            <div class="table_Container">
                <?php
                    $total=0;
                    if(isset($productArray)){
                        foreach ($productArray as $pID) {
                            $sql = "SELECT * FROM product WHERE pID=('".$pID[1]."')";
                            if($result=mysqli_query($link, $sql)){
                                $product=mysqli_fetch_array($result);
                                echo 
                                "
                                <table>
                                <tr>
                                <td rowspan='3'><img src='pics\\".$product[3]."'></td>
                                <td >ID：".$product[0]."</td>
                                </tr>
                                <tr>
                                    <td>名稱：".$product[1]."</td>
                                </tr>
                                <tr>
                                    <td>價格".$product[2]."</td>
                                </tr>
                                    <td colspan='2' style='text-align:center'><a href='cleanCart_product.php?id=".$pID[0]."'>刪除</a></td>
                                </table>
                                ";
                            }
                            $total+=$product[2];
                        }
                        $_SESSION["total"]=$total;
                    }
                ?>
            </div>
        </form>
        <?php echo"<h2>總金額：".$total."</h2>"; ?>
        <h2><a href="finCart.php">確認購買</h2>
        <h2><a href="cleanCart.php">清空購物車</h2>
    </div>
</body>
</html>