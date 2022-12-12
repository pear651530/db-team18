<!DOCTYPE html>
<html>

<head>
    <title>更新資訊</title>
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
                <h1>更新資訊</h1>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:30px">
        <form action="update.php" method="post">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-2">要更改的資訊:</div>
                <div class="col-sm-4">
                    <select name="attributes_name">
                        <option value="game_name">遊戲名稱</option>
                        <option value="developer">開發商</option>
                        <option value="logo_link">logo圖片連結</option>
                        <option value="game_description">遊戲簡介</option>
                        <option value="name">選手名稱</option>
                        <option value="country">選手國籍</option>
                        <option value="team">選手隊伍名稱</option>
                        <option value="region">賽區</option>
                        <option value="season">季賽</option>
                        <option value="begin_month">季賽開始月份</option>
                        <option value="begin_date">季賽開始日期</option>
                        <option value="end_month">季賽結束月份</option>
                        <option value="end_date">季賽結束日期</option>
                        <option value="location">該隊伍的所在國家</option>
                        <option value="month">比賽月份</option>
                        <option value="date">比賽日期</option>
                        <option value="time">比賽時間</option>
                        <option value="team1">參賽隊伍1</option>
                        <option value="team2">參賽隊伍2</option>
                        <option value="win_team">勝利隊伍</option>
                    </select>
                    <input type="submit" name="submit" value="確定">
                    <!--<input type="submit" name="submit" value="確定">
                    <label for="txtList">
                        <input type="text" id="txtList" placeholder="選擇資訊" list="name1" size="33" name="table_name">
                        <datalist id="name1">
                        <option value="game_name">遊戲名稱</option>
                        <option value="developer">開發商</option>
                        <option value="logo圖片連結" name="logo_link"></option>
                        <option value="遊戲簡介" name="game_description"></option>
                            <?php
                            /*header("Content-type:text/html;charset=utf-8");
                            include_once "team18_database.php";
                            $query = ("select * from game");
                            $stmt = $db->prepare($query);
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            for ($i = 0; $i < count($result); $i++) {
                            echo "<option value='" . $result[$i]['game_name'] . "'>";
                            }*/

                            ?>
                        </datalist>
                    </label> -->
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-2">原本的內容: </div>
                <div class="col-sm-4">
                    <select name="ori_data">
                        <!--<option value="game_name">跑跑</option>-->
                        <?php
                        header("Content-type:text/html;charset=utf-8");
                        include_once "team18_database.php";
                        $attributes_name = $_POST["attributes_name"];
                        if ($attributes_name == "game_name") {
                            $query = ("select * from game");
                        }
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        for ($i = 0; $i < count($result); $i++) {
                            echo "<option value='game_name'>" . $result[$i]['game_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-2"> 更新後內容: </div>
                <div class="col-sm-4">
                    <input type="text" placeholder="輸入要更新內容" name="up_data"
                        style="border: 2px solid black; background-color: white; width: 300px;">
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <input type="submit" name="submit" value="更新">

                </div>
                <div class="col-sm-3"></div>
            </div>

        </form>
        <?php
        /*header("Content-type:text/html;charset=utf-8");
        include_once "team18_database.php";
        $attributes_name = $_POST["attributes_name"];
        if ($attributes_name == "game_name") {
            $query = ("select * from game");
        }
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        for ($i = 0; $i < count($result); $i++) {
            echo "<option value='game_name'>" . $result[$i]['game_name'] . "</option>";
        }*/

        //header("Content-type:text/html;charset=utf-8");
        //include_once "team18_database.php";
        $attributes_name = $_POST["attributes_name"];
        $ori_data = $_POST["ori_data"];
        $up_data = $_POST["up_data"];
        if ($attributes_name == "game_name") {
            //echo ("update game set " . $attributes_name . "=? where " . $attributes_name . "=?");
            $query = ("update game set " . $attributes_name . "=? where " . $attributes_name . "=?");
        }
        //echo ($query);
        $stmt = $db->prepare($query);
        echo ($query);
        $error = $stmt->execute(array($up_data, $ori_data));
        $result = $stmt;
        $i = 0;
        //echo ($result);
        ?>
    </div>

</body>

</html>