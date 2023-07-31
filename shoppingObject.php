<?php
session_start();
$id=$_GET["id"];
$productA=$_SESSION["pd"];
if(isset($_SESSION["tel"])){
    $fileN="user/".$_SESSION["tel"].".txt";
    $fp=fopen($fileN,"a");
    foreach ($productA as $det) {
        if (in_array($id,$det)){
            foreach ($det as $value){
                if(array_search($value,$det)!=count($det)-1){
                    fwrite($fp,$value.",");
                    echo $value;
                }else{
                    fwrite($fp,$value);
                }
            }
        }
    };
}
header("location:shoping.php")
?>