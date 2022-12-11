<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "team18_database.php";

    $name=$_POST["name"];
    $country=$_POST["country"];
    $team=$_POST["team"];
    $query=("insert into player values(?,?,?)");
    $stmt=$db->prepare($query);
    $stmt->execute(array($name,$country,$team));
    //header("Location:infrom.php");

?>
