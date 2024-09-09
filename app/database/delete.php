<?php

require_once("connect.php");

// ステートメントを準備
$stmt = $pdo->prepare('DELETE FROM comment WHERE id = ?');
if(!$stmt){
    die('ステートメントの準備に失敗しました: ' . $pdo->errorInfo()[2]);
}

// IDを取得し、数値であることを確認
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!$id){
    echo '削除できませんでした。';
    exit();
}

// パラメータをバインドして実行
$stmt->bindValue(1, $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo 'コメントが削除されました。';
} else {
    echo '削除に失敗しました。';
}
?>