<?php
function validate_form($var){
    if(isset($_POST[$var]) && !empty($_POST[$var])){
      return $_POST[$var];
    }
  }

?>
