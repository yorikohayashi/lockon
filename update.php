<?php
require_once '/Applications/MAMP/db_config.php';
$recipe_name = $_POST['recipe_name'];
$difficulty = $_POST['difficulty'];
$budget = (int) $_POST['budget'];
$howto = (int) $_POST['howto'];
try {
    if (empty($_POST['id'])) throw new Exception('Error');
    $id = (int) $_POST['id'];
    $dbh = new PDO('mysql:host=localhost;dbname=keijiban;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE recipes SET recipe_name = ?, difficulty = ?, budget = ?, howto  = ? WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $recipe_name, PDO::PARAM_STR);
    $stmt->bindValue(2, $difficulty, PDO::PARAM_INT);
    $stmt->bindValue(3, $budget, PDO::PARAM_INT);
    $stmt->bindValue(4, $howto, PDO::PARAM_STR);
    $stmt->bindValue(5, $id, PDO:: PARAM_INT);
    $stmt->execute();
    $dbh = null;
    echo "ID: " . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . "レシピの更新が完了しました。";
    echo "<a href='index.php'>トップページへ戻る</a>";
} catch (PDOException $e) {
    echo "エラー発生: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "<br>";
    die();
}
