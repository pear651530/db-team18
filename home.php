<!DOCTYPE html>
<html>

<head>
    <title>首頁</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        #img1 {
            height: 240px;
            width: 260px;
            background: #aaa;
        }
    </style>
    <script type="text/javascript">

        /*function start() {
            let a, b, c, d;
            a =<?php echo "'" . $game_name . "'"; ?>;
            b =<?php echo "'" . $developer . "'"; ?>;
            c =<?php echo "'" . $logo_link . "'"; ?>;
            d =<?php echo "'" . $game_description . "'"; ?>;
            print(a, b, c, d);
        }

        function print(game_name, developer, logo_link, game_description) {
            let game_name_arr = game_name.split('#');
            let developer_arr = developer.split('#');
            let logo_link_arr = logo_link.split('#');
            let game_description_arr = game_description.split('#');
            document.getElementById("img1").setAttribute("src", logo_link);
            document.getElementById("text1").innerHTML = game_name;
            document.getElementById("text2").innerHTML = developer + " " + game_description;
            localStorage.setItem("a", "b");
            console.log(localStorage.getItem("a"));
        }

        window.addEventListener("load", start, false);*/
    </script>
</head>

<body>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>吾愛吾師，但吾更愛電競</h1>
        <p>study is a work but game is my life</p>
    </div>
    <div class="container" style="margin-top:30px">
        <?php
        header("Content-type:text/html;charset=utf-8");
        include_once "team18_database.php";

        $query = ("select * from game");
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        for ($i = 0; $i < count($result); $i++) {
            echo "<div class='row'>";
            echo "<div class='col-sm-2'></div>";
            echo "<div class='col-sm-3'>";
            echo "<a href='show.php'>";
            echo "<img id='img1' src='" . $result[$i]['logo_link'] . "'>";
            echo "</a>";
            echo "</div>";
            echo "<div class='col-sm-6'>";
            echo "<h2>" . $result[$i]['game_name'] . "</h2>";
            echo "<h5>" . $result[$i]['developer'] . "</br>" . $result[$i]['game_description'] . "</h5>";
            echo "</div>";
            echo "</div>";
            echo "<div class='col-sm-1'></div></br>";
        }
        ?>

        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                <a href="insert.php">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-plus-sign"></span> 新增資料
                    </button>
                </a>
                <a href="update.php">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-refresh"></span> 更新資訊
                    </button>
                </a>
                <a href="delete.php">
                    <button type="button" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-scissors"></span> 刪除資料
                    </button>
                </a>
                <a href="show.php">
                    <button type="button" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-search"></span> 顯示資料
                    </button>
                </a>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>

</body>

</html>
