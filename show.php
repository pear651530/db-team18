<!DOCTYPE html>
<html>

<head>
    <title>顯示資料</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Pragma" Content="No-cache">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        @import url(https://fonts.googleapis.com/earlyaccess/cwtexfangsong.css);

        body {
            font-family: "cwTeXFangSong";
            font-size: 25px;
            width: 100%;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-color: rgb(205, 202, 202);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>

</head>

<body>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <a href="home.php">
                    <button type="button" class="button1">
                        <span class="glyphicon glyphicon-home"></span> 首頁
                    </button>
                </a>
            </div>
            <div class="col-sm-6">
                <h1>顯示資料</h1>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:30px">
        <form action="show.php" method="post">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-2">要顯示哪種表格:</div>
                <div class="col-sm-4">
                    <select name="que" id="que">
                        <option value="region">全部遊戲的賽區</option>
                        <option value="contest">全部遊戲的賽程</option>
                        <option value="team">全部遊戲的隊伍資訊</option>
                        <option value="team_onlywin">有獲勝的全部遊戲的隊伍資訊</option>
                        <option value="player">全部遊戲的選手資訊</option>
                        <option value="counter_team_cnt">每個國家有的隊伍數</option>
                    </select>
                    <input type="submit" name="submit" value="查詢">
                    <script type="text/javascript">
                        document.getElementById('que').value = "<?php echo $_POST['que']; ?>";
                    </script>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <?php
                header("Content-type:text/html;charset=utf-8");
                include_once "team18_database.php";
                $check = $_POST;
                if ($check) {
                    $que = $_POST['que'];
                    if ($que == "region") {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th>遊戲名稱</th>";
                        echo "<th>賽區</th>";
                        echo "<th>季賽</th>";
                        echo "<th>開始日期</th>";
                        echo "<th>結束日期</th>";
                        echo "</tr>";

                        $query = ("select * from region_name");
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        for ($i = 0; $i < count($result); $i++) {
                            echo "<tr>";
                            echo "<td>" . $result[$i]['game_name'] . "</td>";
                            echo "<td>" . $result[$i]['region'] . "</td>";
                            echo "<td>" . $result[$i]['season'] . "</td>";
                            echo "<td>" . $result[$i]['begin_month'] . "/" . $result[$i]['begin_date'] . "</td>";
                            echo "<td>" . $result[$i]['end_month'] . "/" . $result[$i]['end_date'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else if ($que == "contest") {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th>遊戲名稱</th>";
                        echo "<th>賽區</th>";
                        echo "<th>月份</th>";
                        echo "<th>日期</th>";
                        echo "<th>時間</th>";
                        echo "<th>隊伍1</th>";
                        echo "<th>隊伍2</th>";
                        echo "<th>獲勝隊伍</th>";
                        echo "</tr>";

                        $query = ("SELECT * FROM contest");
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        for ($i = 0; $i < count($result); $i++) {
                            echo "<tr>";
                            echo "<td>" . $result[$i]['game_name'] . "</td>";
                            echo "<td>" . $result[$i]['region'] . "</td>";
                            echo "<td>" . $result[$i]['month'] . "</td>";
                            echo "<td>" . $result[$i]['date'] . "</td>";
                            echo "<td>" . $result[$i]['time'] . "</td>";
                            echo "<td>" . $result[$i]['team1'] . "</td>";
                            echo "<td>" . $result[$i]['team2'] . "</td>";
                            echo "<td>" . $result[$i]['win_team'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else if ($que == "team") {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th>遊戲名稱</th>";
                        echo "<th>隊伍名稱</th>";
                        echo "<th>隊伍所在國家</th>";
                        echo "<th>勝場數</th>";
                        echo "</tr>";

                        $query = ("SELECT game_name, team,location,win_cnt(team,team_info.game_name) as wincnt 
                        FROM team_info
                        WHERE 1");
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        for ($i = 0; $i < count($result); $i++) {
                            echo "<tr>";
                            echo "<td>" . $result[$i]['game_name'] . "</td>";
                            echo "<td>" . $result[$i]['team'] . "</td>";
                            echo "<td>" . $result[$i]['location'] . "</td>";
                            echo "<td>" . $result[$i]['wincnt'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else if ($que == "team_onlywin") {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th>遊戲名稱</th>";
                        echo "<th>隊伍名稱</th>";
                        echo "<th>隊伍所在國家</th>";
                        echo "<th>勝場數</th>";
                        echo "</tr>";

                        $query = ("SELECT team_info.game_name, team,location,win_cnt(team,team_info.game_name) as wincnt 
                        FROM team_info,contest
                        WHERE team_info.team = contest.win_team and team_info.game_name = contest.game_name");
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        for ($i = 0; $i < count($result); $i++) {
                            echo "<tr>";
                            echo "<td>" . $result[$i]['game_name'] . "</td>";
                            echo "<td>" . $result[$i]['team'] . "</td>";
                            echo "<td>" . $result[$i]['location'] . "</td>";
                            echo "<td>" . $result[$i]['wincnt'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else if ($que == "player") {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th>選手</th>";
                        echo "<th>國家</th>";
                        echo "<th>隊伍</th>";
                        echo "<th>遊戲名稱</th>";
                        echo "</tr>";

                        $query = ("SELECT * FROM player");
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        for ($i = 0; $i < count($result); $i++) {
                            echo "<tr>";
                            echo "<td>" . $result[$i]['name'] . "</td>";
                            echo "<td>" . $result[$i]['country'] . "</td>";
                            echo "<td>" . $result[$i]['team'] . "</td>";
                            echo "<td>" . $result[$i]['game_name'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else if ($que == "counter_team_cnt") {
                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th>國家</th>";
                        echo "<th>隊伍數</th>";
                        echo "</tr>";

                        $query = ("SELECT team_info.location,COUNT(DISTINCT team) as teams
                        FROM team_info
                        GROUP BY team_info.location");
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        for ($i = 0; $i < count($result); $i++) {
                            echo "<tr>";
                            echo "<td>" . $result[$i]['location'] . "</td>";
                            echo "<td>" . $result[$i]['teams'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                }
                ?>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </div>

</body>

</html>
