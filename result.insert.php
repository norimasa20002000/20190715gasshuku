<?php
include('functions.php');

// 入力チェック
if (
    !isset($_POST['name']) || $_POST['name']=='' ||
    !isset($_POST['shoubu']) || $_POST['shoubu']==''
) {
    exit('ParamError');
}

//POSTデータ取得
$name = $_POST['name'];
$shoubu = $_POST['shoubu'];
$wincount = $_POST['wincount'];
$losecount = $_POST['losecount'];
$drawcount = $_POST['drawcount'];


//DB接続
$pdo = db_conn();

//データ登録SQL作成
$sql ='INSERT INTO result_index_table (name, shoubu, wincount, losecount, drawcount)
VALUES(:a1, :a2, :a3, :a4, :a5)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $shoubu, PDO::PARAM_STR);
$stmt->bindValue(':a3', $wincount, PDO::PARAM_STR);
$stmt->bindValue(':a4', $losecount, PDO::PARAM_STR);
$stmt->bindValue(':a5', $drawcount, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    //index.phpへリダイレクト
    header('Location: result_index.php');
}
