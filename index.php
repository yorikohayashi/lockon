<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>レシピの一覧</title>
</head>
<body>
  <h1>レシピの一覧</h1>
  <a href="form.html">レシピの新規登録</a>
  <?php
require_once '/Applications/MAMP/db_config.php';
try {
  $dbh = new PDO('mysql:host=localhost;dbname=db1;charset=utf8', $user, $pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FORM recipes";
  $stmt = $dbh->query($sql);
  $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
  echo "<table>￥n";
  echo "<tr>￥n";
  echo "<th>料理名</th><th>予算</th><th>難易度</th>￥n";
  echo "</tr>￥n";
  foreach ($result as $row) {
    echo "<tr>￥n";
    echo "<td>".htmlspecialchars($row['recipe_name'],ENT_QUOTES,'UTF-8')."</td>￥n";
    echo "<td>".htmlspecialchars($row['budget'],ENT_QUOTES,'UTF-8')."</td>￥n";
    echo "<td>".htmlspecialchars($row['difficulty'],ENT_QUOTES,'UTF-8')."</td>￥n";
    echo "</tr>￥n";
       echo "<a href=detail.php?id=" . htmlspecialchars($row['id'],ENT_QUOTES,'UTF-8') . ">詳細</a>";
       echo "|<a href=edit.php?id=" . htmlspecialchars($row['id'],ENT_QUOTES,'UTF-8') . ">変更</a>";
       echo "|<a href=delete.php?id=" . htmlspecialchars($row['id'],ENT_QUOTES,'UTF-8') . ">削除</a>";
  }
    echo "</table>￥n";
  $dbh = null;
  print_r($result);
  $dbh = null;
} catch (PDOException $e) {
  echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
  die();
}
 ?>
</body>
</html>
