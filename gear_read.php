<?php

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
// ここで表示したいことを書く（絞り込み、並び替えなど）
$sql = 'SELECT * FROM `my_table`';

$stmt = $pdo->prepare($sql);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $output = "";
// foreach ($result as $record) {
//   $output .= "
//     <tr>
//       <td>{$record["item"]}</td>
//       <td>{$record["genre"]}</td>
//       <td>{$record["weight"]}</td>
//     </tr>
//   ";
// }


// DB接続，SQL実行など(JS使う場合)

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:'.$error[2]);
} else {
  // PHPではデータを取得するところまで実施
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>キャンプギアリスト（一覧画面）</title>
  <!-- bulma -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <!-- jQuery 公式より -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <fieldset>
    <legend>キャンプギアリスト（一覧画面）</legend>
    <a href="gear_input.php">入力画面へ</a>
    <table class="table is-bordered is-striped is-hoverable">
      <thead>
        <tr>
          <th>アイテム名</th>
          <th>ジャンル</th>
          <th>重さ（ｇ）</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td id="itemAll">アイテムを表示</td>
          <td id="genreAll">ジャンルを表示</td>
          <td id="weightAll">重さを表示</td>
        </tr>

      </tbody>
    </table>
  </fieldset>

<script>
      // PHPのデータをJSに渡す
      const resultArray = <?=json_encode($result) ?>;
      console.log(resultArray);
      
      // 空の配列を用意
      const itemAllHtml = [];
      const genreAllHtml = [];
      const weightAllHtml = [];

      // 配列からタグ生成し，画面表示する
      for(let i= 0; i< resultArray.length; i++){
        // console.log(resultArray[i].item);
        itemAllHtml.push("<tr><td>" + resultArray[i].item + "</tr></td>");
        genreAllHtml.push("<tr><td>" + resultArray[i].genre + "</tr></td>"); 
        weightAllHtml.push("<tr><td>" + resultArray[i].weight + "</tr></td>");
      }
      $("#itemAll").html(itemAllHtml);
      $("#genreAll").html(genreAllHtml);
      $("#weightAll").html(weightAllHtml);





</script>


</body>

</html>