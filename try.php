<!DOCTYPE html>
<html>

<head>
    <title>首頁</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        #img1 {
            height: 200px;
            background: #aaa;
        }
    </style>
    <?php
    $game_name = "lol";
    $developer = "riot";
    $logo_link = "https://i.pinimg.com/474x/ca/19/98/ca199818f18f7a6e778be38d733516c7.jpg";
    $game_description = "一款5v5多人線上戰鬥技術型(MOBA)遊戲";
    ?>
    <script type="text/javascript">

        function start() {
            let a, b, c, d;
            a =<?php echo "'" . $game_name . "'"; ?>;
            b =<?php echo "'" . $developer . "'"; ?>;
            c =<?php echo "'" . $logo_link . "'"; ?>;
            d =<?php echo "'" . $game_description . "'"; ?>;
            print(a, b, c, d);
        }

        function print(game_name, developer, logo_link, game_description) {
            document.getElementById("img1").setAttribute("src", logo_link);
            document.getElementById("text1").innerHTML = game_name;
            document.getElementById("text2").innerHTML = developer + " " + game_description;
        }

        window.addEventListener("load", start, false);
    </script>
</head>

<body>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>吾愛吾師，但吾更愛電競</h1>
        <p>study is a work but game is my life</p>
    </div>
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <img id="img1" src="">
            </div>
            <div class="col-sm-6">
                <h2 id="text1"></h2>
                <h5 id="text2"></h5>
            </div>
        </div>
    </div>

</body>

</html>