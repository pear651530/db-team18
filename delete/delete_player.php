<?php 

    header("Content-type:text/html;charset=utf-8");
    include "team18_database.php";
    $stmt = $db->prepare("delete from player where name=?");
    $name = $_POST["name"];
    
    $result = $stmt->execute(array($name));

?>