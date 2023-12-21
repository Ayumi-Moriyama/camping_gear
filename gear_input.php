<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>キャンプギアリスト（入力画面）</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


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
        カテゴリー: <input type="text" id="category" name="category">
      </div>
      <div>
        ジャンル: <input type="text" id="genre" name="">
      </div>
      <div>
        メーカー: <input type="text" id="maker" name="maker">
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

  <script>
$(function() {
let categoryWords = [
      "タープ・シェード",
      "グリル・焚火",
      "家具",
      "寝具",
      "テント",
      "小物類",
      "バッグ類",
      "保冷グッズ",
      "電化製品",
    ];
    $( "#category" ).autocomplete({
      source: categoryWords,
    });
});

$(function() {
let genreWords = [
      "シェード",
      "焚火台",
      "テーブル",
      "チェア",
      "テント",
      "寝袋",
      "タープ",
      "ポール",
      "リュック",
      "ハンマー",
      "ペグ",
      "クッション",
      "スツール",
      "クーラーボックス",
      "保冷剤",
      "ランタン",
      "トング",
      "ポケットストーブ",
    ];
    $( "#genre" ).autocomplete({
      source: genreWords,
    });
});

$(function() {
let makerWords = [
      "コールマン",
      "SOTO",
      "ワークマン",
      "フィールドア",
      "クイックキャンプ",
      "ロゴス",
      "SPICEofLife",
      "ランドポート",
      "DOD",
      "テンマクデザイン",
      "ダイソー",
    ];
    $( "#maker" ).autocomplete({
      source: makerWords,
    });
});



  </script>
</body>

</html>