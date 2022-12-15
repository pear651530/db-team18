<!DOCTYPE html>
<html>

<head>
    <title>刪除資料</title>
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
                <h1>刪除資料</h1>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:30px">
        <form action="delete.php" method="post">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-2">要刪除的資料類型:</div>
                <div class="col-sm-4">
                    <select name="table_name">
                        <option value="game">遊戲資訊</option>
                        <option value="player">選手資訊</option>
                        <option value="region_name">賽區資訊</option>
                        <option value="team_info">隊伍資訊</option>
                        <option value="contest">比賽資訊</option>
                    </select>
                    <input type="submit" name="submit" value="確定">
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-2">要刪的內容 </div>
                <div class="col-sm-4">

                </div>
                <div class="col-sm-3"></div>
            </div>
            <?php
            header("Content-type:text/html;charset=utf-8");
            include_once "team18_database.php";
            $check = $_POST;
            if ($check) {

                $table_name = $_POST["table_name"];
                if ($table_name == "game") {
                    echo "<div class='row'><div class='col-sm-3'></div>";
                    echo "<div class='col-sm-2'>遊戲名稱:</div>";
                    echo "<div class='col-sm-4'><input type='text' placeholder='League of Legends' name='game_name'
                        style='border: 2px solid black; background-color: white; width: 300px;'></div>";
                    echo "<div class='col-sm-3'></div></div>";
                } else if ($table_name == "player") {
                    echo "<div class='row'><div class='col-sm-3'></div>";
                    echo "<div class='col-sm-2'>選手名稱:</div>";
                    echo "<div class='col-sm-4'><input type='text' placeholder='Deft' name='name'
                        style='border: 2px solid black; background-color: white; width: 300px;'></div>";
                    echo "<div class='col-sm-3'></div></div>";
                } else if ($table_name == "region_name") {
                    echo "<div class='row'><div class='col-sm-3'></div>";
                    echo "<div class='col-sm-2'>遊戲名稱:</div>";
                    echo "<div class='col-sm-4'><input type='text' placeholder='League of Legends' name='game_name'
                        style='border: 2px solid black; background-color: white; width: 300px;'></div>";
                    echo "<div class='col-sm-3'></div></div>";
                    echo "<div class='row'><div class='col-sm-3'></div>";
                    echo "<div class='col-sm-2'>賽區:</div>";
                    echo "<div class='col-sm-4'><input type='text' placeholder='LCK' name='region'
                        style='border: 2px solid black; background-color: white; width: 300px;'></div>";
                    echo "<div class='col-sm-3'></div></div>";
                    echo "<div class='row'><div class='col-sm-3'></div>";
                    echo "<div class='col-sm-2'>季賽:</div>";
                    echo "<div class='col-sm-4'><input type='text' placeholder='spring' name='season'
                        style='border: 2px solid black; background-color: white; width: 300px;'></div>";
                    echo "<div class='col-sm-3'></div></div>";
                }
            }
            ?>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <input type="submit" name="submit" value="刪除">

                </div>
                <div class="col-sm-3"></div>
            </div>

        </form>
        <?php
        include_once "team18_database.php";
        $check = $_POST;
        if ($check) {
            $button = $_POST["submit"];
            if ($button == "刪除") {
                $table_name = $_POST["table_name"];
                if ($table_name == "game") {
                    $data = $_POST["game_name"];
                    $query = ("delete from game where game_name=?");
                    $stmt = $db->prepare($query);
                    $error = $stmt->execute(array($data));
                } else if ($table_name == "player") {
                    $data = $_POST["name"];
                    $query = ("delete from player where name=?");
                    $stmt = $db->prepare($query);
                    $error = $stmt->execute(array($data));
                }
                else if ($table_name == "region_name") {
                    $data1 = $_POST["game_name"];
                    $data2 = $_POST["region"];
                    $data3 = $_POST["season"];
                    $query = ("delete from region_name where game_name=? and region=? and season=?");
                    $stmt = $db->prepare($query);
                    $error = $stmt->execute(array($data1, $data2, $data3));
                }
            }
        }
        ?>
    </div>

</body>

</html>