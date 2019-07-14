<?php
//0.外部ファイル読み込み
include('functions.php');


//1. DB接続
// $dbn = 'mysql:dbname=gsf_l01_db15;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = 'root';
//1.  DB接続します
$pdo = db_conn();


// try {
//     $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//     exit('dbError:'.$e->getMessage());
// }

//2. データ表示SQL作成
$sql = 'SELECT * FROM result_index_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
$httpcount=0;

//3. データ表示
$view='';
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
} else {

    //Selectデータの数だけ自動でループしてくれる
    //http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // var_dump($result);
        $view .= '<div class="list-group-item sort">';
        $view .= '<p>'.'name :'.$result['name'].'</p>';
        $view .= '<p>'.'勝負 :'.$result['shoubu'].'</p>';
        $view .= '<p>'.'jankenwincount :'.$result['wincount'].'回'.'</p>';
        $view .= '<p>'.'jankenlosecount :'.$result['losecount'].'回'.'</p>';
        $view .= '<p>'.'jankendrawcount :'.$result['drawcount'].'回'.'</p>';
        $view .= '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>結果一覧</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

        .sort {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">結果一覧</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">ログイン画面へ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <div>
        <ul class="list-group">
            <!-- ここにDBから取得したデータを表示しよう -->
            <!-- <li class="list-group-item"> -->
            <?=$view?>
            <!-- </li> -->
        </ul>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>
    <script>
        // var atag = document.getElementsByClassName('a');
        // console.log(atag[2].textContent);
        // console.log(
        <?=$httpcount?>
        // );
        // for (i = 0; i < <?=$httpcount?> ; i++) {
        //     console.log(atag[i].textContent);
        // $('.a').html('<a href="#">' + atag[i].textContent);
        // }
    </script>
</body>

</html>