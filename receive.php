
  <?php
  $kekka = 0;
  $errors = array();
  //もし（）であれば{}を行う
  if($_POST['fugou'] == '+'){
    $kekka = $_POST['suuzi1'] + $_POST['suuzi2'];
  }
  if($_POST['fugou'] == '-'){
    $kekka = $_POST['suuzi1'] - $_POST['suuzi2'];
  }
  if($_POST['fugou'] == '*'){
    $kekka = $_POST['suuzi1'] * $_POST['suuzi2'];
  }

  //もし割り算の場合、suuzi2に入れた値が正の場合の計算
  if($_POST['fugou'] == '/' ){
    // もし割り算の場合、suuzi2に入れた値が0の場合エラーを出す
    if ($_POST['suuzi2']==0) {
      $errors[] = "0で割れないよ";
    }else{
      $kekka = $_POST['suuzi1'] / $_POST['suuzi2'];
    }


  }



  //もし入力欄に何も入力されてない場合
  if (empty($_POST['suuzi1']) || empty($_POST['suuzi2'])){
    $errors[] = "数字を入力してください";
  }
//エラーが出た時の表示される場所
  if(count($errors)){
    include("casio.php");
  }else{
    include("answer.php");
  }
  ?>
