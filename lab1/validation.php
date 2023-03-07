<?php 

require_once("config.php");
require_once("function.php");


  if(!empty($_POST)){
    if(empty($_POST["name"]) ||empty($_POST["email"]) || empty($_POST["message"]) ){
        $result = "All fields are required";
    }elseif(strlen($_POST["name"]) > MAX_NAME_LENGTH){
        $result = "Name must be less than less than 100 charachters";
    }elseif(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        $result = "Email is not valid";
    }elseif(strlen($_POST["message"]) > MAX_MESSAGE_LENGTH){
        $result = "Message must be less than less than 255 charachters";
    }
    else{
        $result = "<strong>". WELCOME_MESSAGE ."</strong> </br></br>
                  <strong>Name: </strong>" .$_POST["name"] . "</br>".
                  "<strong>Email: </strong>" .$_POST["email"] . "</br>".
                  "<strong>Message: </strong>" .$_POST["message"];
        
        die($result);
    }
}

require_once("form.php");


?>