<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "team18_database.php";

    $game_name=$_POST["game_name"];
    $region=$_POST["region"];
    $month=$_POST["month"];
    $date=$_POST["date"];
    $time=$_POST["time"];
    $team1=$_POST["team1"];
    $team2=$_POST["team2"];
    $winteam=$_POST["winteam"];
    $query=("insert into contest values(?,?,?,?,?,?,?,?)");
    $stmt=$db->prepare($query);
    $stmt->execute(array($game_name,$region,$month,$date,
                    $time,$team1,$team2,$winteam));
    //header("Location:infrom.php");

?>
