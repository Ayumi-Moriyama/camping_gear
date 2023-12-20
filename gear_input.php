<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>キャンプギアリスト（入力画面）</title>
</head>

<body>
  <form action="gear_create.php" method="POST">
    <fieldset>
      <legend>キャンプギアリスト（入力画面）</legend>
      <a href="gear_read.php">一覧画面</a>
      <div>
        アイテム名: <input type="text" name="item">
      </div>
      <div>
        カテゴリー: <input type="text" name="category">
      </div>
      <div>
        ジャンル: <input type="text" name="genre">
      </div>
      <div>
        メーカー: <input type="text" name="maker">
      </div>
      <div>
        購入日: <input type="date" name="purchase_date">
      </div>
      <div>
        購入時の価格（円）: <input type="number" name="price">
      </div>
      <div>
        収納サイズ（長辺）cm: <input type="number" step="0.1" name="long_side">
      </div>
      <div>
        収納サイズ（短辺）cm: <input type="number" step="0.1" name="short_side">
      </div>
      <div>
        収納サイズ（厚み）cm: <input type="number" step="0.1" name="thickness">
      </div>
      <div>
        重さ（ｇ）: <input type="number" name="weight">
      </div>

      <div>
        <button>登録する</button>
      </div>
    </fieldset>
  </form>

</body>

</html>