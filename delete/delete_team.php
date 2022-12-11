<?php 

    header("Content-type:text/html;charset=utf-8");
    include "team18_database.php";
    $stmt = $db->prepare("delete from team_info where team=?");
    $name = $_POST["team"];
    $result = $stmt->execute(array($name));

?>