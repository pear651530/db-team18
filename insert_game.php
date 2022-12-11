<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "team18_database.php";

    $game_name=$_POST["game_name"];
    $developer=$_POST["developer"];
    $logo_link=$_POST["logo_link"];
    $game_description=$_POST["game_description"];
    $query=("insert into game values(?,?,?,?)");
    $stmt=$db->prepare($query);
    $stmt->execute(array($game_name,$developer,$logo_link,$game_description));
    //header("Location:infrom.php");

?>