<?php
// POSTデータ確認

$item = $_POST['item'];
$category = $_POST['category'];
$genre = $_POST['genre'];
$maker = $_POST['maker'];
$purchase_date = $_POST['purchase_date'];
$price = $_POST['price'];
$long_side = $_POST['long_side'];
$short_side = $_POST['short_side'];
$thickness = $_POST['thickness'];
$weight = $_POST['weight'];


if (
  !isset($_POST['todo']) || $_POST['todo'] === '' ||
  !isset($_POST['deadline']) || $_POST['deadline'] === ''
) {
  exit('ParamError');
}

// 各種項目設定
$dbn ='mysql:dbname=camping_gear;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成&実行
$sql = 'INSERT INTO my_table (
  id, item, category, genre, maker, purchase_date, price, long_side, short_side, thickness, weight, created_at, updated_at
  ) VALUES (NULL, :todo, :deadline, now(), now())';
INSERT INTO my_table VALUES(NULL, 'ポータブルチェア　ポリコットン　ノーマル','家具','チェア','フィールドア','2023-2-1',4200,38,11,13,1000, now(), now());

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理
header('Location:gear_input.php');
exit();
