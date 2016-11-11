<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>電卓</title>
</head>
<body>
<form method="post" action="receive.php">
<input type="number" name="suuzi1" value="<?php echo $_POST['suuzi1']; ?>">

<?php if(!isset($_POST['fugou'])){$_POST['fugou'] = "+";} ?>
<input type="radio" name="fugou" value="+" <?php if($_POST["fugou"] == "+"){echo "checked";} ?>>+
<input type="radio" name="fugou" value="-" <?php if($_POST["fugou"] == "-"){echo "checked";} ?>>-
<input type="radio" name="fugou" value="/" <?php if($_POST["fugou"] == "/"){echo "checked";} ?>>÷
<input type="radio" name="fugou" value="*" <?php if($_POST["fugou"] == "*"){echo "checked";} ?>>×

<input type="number" name="suuzi2" value="<?php echo $_POST["suuzi2"]; ?>">

<input type="submit" value="計算">
</form>
<?php
//POSTかGETどちらで要求がきているか
if($_SERVER["REQUEST_METHOD"] != "POST"){
	//エラーを配列で出す
	$errors = array();
}
//０からスタートしてエラーの数が増えたら付け足して表示する
for ( $i = 0; $i < count($errors); $i++ ){
	echo $errors[$i];
}
?>
</body>
</html>
