<?php

if(isset($_POST['loginname'])
&&
(isset($_POST['passwort']))
&&
(isset($_POST['wdhlg-passwort']))
&&
(isset($_POST['vorname']))
&&
(isset($_POST['nachname']))
&&
(isset($_POST['strasse']))
&&
(isset($_POST['hausnummer']))
&&
(isset($_POST['plz']))
&&
(isset($_POST['email'])) 
&&
(isset($_POST['wdhlg-email']))        
) {
    $data = $_POST['loginname']         . '-' . 
            $_POST['passwort']          . '-' .
            $_POST['wdhlg-passwort']    . '-' . 
            $_POST['vorname']           . '-' .
            $_POST['nachname']          . '-' .
            $_POST['strasse']           . '-' .
            $_POST['hausnummer']        . '-' .
            $_POST['plz']               . '-' .
            $_POST['email']             . '-' .
            $_POST['wdhlg-email'] ."\r\n";
    $ret = file_put_contents('../files/.data.txt', $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else{
        //echo "$ret bytes written to file";
        header("Location:../login.html");
    }        
} 
else {
    die('no post data to process');
}

?>
 
