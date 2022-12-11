<?php 

    header("Content-type:text/html;charset=utf-8");
    include "team18_database.php";
    $stmt = $db->prepare("delete from region_name where game_name=? and region=? and 
    season=? ");
    $game_name = $_POST["game_name"];
    $region = $_POST["region"];
    $season = $_POST["season"];
    
    $result = $stmt->execute(array($game_name,$region,$season));

?>