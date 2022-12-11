<?php 

    header("Content-type:text/html;charset=utf-8");
    include "team18_database.php";
    $stmt = $db->prepare("delete from contest where game_name=? and region=? and 
    month=? and date=? and time=? and team1=? and team2=? ");
    $game_name = $_POST["game_name"];
    $region = $_POST["region"];
    $month = $_POST["month"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $team1 = $_POST["team1"];
    $team2 = $_POST["team2"];
    $result = $stmt->execute(array($game_name,$region,$month,$date,$time,$team1,$team2));

?>
