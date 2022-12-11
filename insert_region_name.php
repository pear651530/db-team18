<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "team18_database.php";

    $game_name=$_POST["game_name"];
    $region=$_POST["region"];
    $season=$_POST["season"];
    $begin_month=$_POST["begin_month"];
    $begin_date=$_POST["begin_date"];
    $end_month=$_POST["end_month"];
    $end_date=$_POST["end_date"];
    $query=("insert into game values(?,?,?,?,?,?,?)");
    $stmt=$db->prepare($query);
    $stmt->execute(array($game_name,$region,$season,$begin_month,
                    $begin_date,$end_month,$end_date));
    //header("Location:infrom.php");

?>