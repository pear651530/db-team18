<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "team18_database.php";

    $team=$_POST["team"];
    $location=$_POST["location"];
    $query=("insert into team_info values(?,?)");
    $stmt=$db->prepare($query);
    $stmt->execute(array($team,$location));
    //header("Location:infrom.php");

?>
