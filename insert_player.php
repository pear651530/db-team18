<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "team18_database.php";

    $name=$_POST["name"];
    $team=$_POST["team"];
    $country=$_POST["country"];
    $query=("insert into game values(?,?,?)");
    $stmt=$db->prepare($query);
    $stmt->execute(array($name,$team,$country));
    //header("Location:infrom.php");

?>