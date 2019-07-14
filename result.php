<?php
// セッションのスタート
// session_start();

//0.外部ファイル読み込み
include('functions.php');

//1.  DB接続します
$pdo = db_conn();


// ログイン状態のチェック
// chk_ssid();


$menu = menu();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>綱引きじゃんけん結果登録</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">綱引きじゃんけん登録</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <?=$menu?> -->
                </ul>
            </div>
        </nav>
    </header>

    <form method="post" action="result.insert.php">
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="shoubu">shoubu</label>
            <input type="text" class="form-control" id="shoubu" name="shoubu">
        </div>
        <div class="form-group">
            <label for="wincount">wincount</label>
            <input class="form-control" id="wincount" name="wincount">
        </div>
        <div class="form-group">
            <label for="losecount">losecount</label>
            <input class="form-control" id="losecount" name="losecount">
        </div>
        <div class="form-group">
            <label for="drawcount">drawcount</label>
            <input class="form-control" id="drawcount" name="drawcount">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</body>

</html>