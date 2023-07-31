<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="shoppingCss.css" rel="stylesheet">
    <?php 
        session_start();
        $fileN="user/". $_SESSION["tel"].".txt";
        if(file_exists($fileN)){
            $file=file($fileN);
            $product = array();
            foreach ($file as $x) {
            array_push($product, explode(",", $x));
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
                    if(isset($product)){
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
                            </table>
                            ";
                            $total+=$det[2];
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