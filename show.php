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
                    <select name="que">
                        <option value="region">全部遊戲的賽區</option>
                        <option value="contest">全部遊戲的賽程</option>
                        <option value="team_player">全部遊戲的隊伍及選手資訊</option>
                    </select>
                    <input type="submit" name="submit" value="查詢">
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
                            echo "<td>" . $result[$i]['begin_month']."/". $result[$i]['begin_date']. "</td>";
                            echo "<td>" . $result[$i]['end_month']."/". $result[$i]['end_date']. "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else if ($que == "contest") {
                    } else if ($que == "team_player") {
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
                            echo "<td>" . $result[$i]['begin_month']."/". $result[$i]['begin_date']. "</td>";
                            echo "<td>" . $result[$i]['end_month']."/". $result[$i]['end_date']. "</td>";
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