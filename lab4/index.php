<?php 
require_once("./vendor/autoload.php");
$mySql = new MySQLHandler(__table_Name__);
if(isset($_GET["item"]))
{
    require_once("./views/product.php");
}else{
    require_once("./views/main.php");
}