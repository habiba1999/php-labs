<?php
require_once("config.php");
require_once("function.php");

$error = "";

if (!empty($_POST)) {

    if (empty($errors)) {
        echo print_welcome_message();
        //require_once("view/users.php");
        save_to_file();
        convert_file_to_array();
        exit();
    }
}


$parameter = isset($_GET["page"]) ? $_GET["page"] : "";
if ($parameter === "users")
    require_once('./view/users.php');
else
    require_once('./view/form.php');
?>