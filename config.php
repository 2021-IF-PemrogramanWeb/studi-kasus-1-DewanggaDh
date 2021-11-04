<?php
 $db_host = "localhost";
 $db_user = "id17847623_root";
 $db_pass = "DataDataData-2";
 $db_name = "id17847623_tali_sepatu";

 try {    
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    die("Error Error: " . $e->getMessage());
}
