<?php declare(strict_types=1);

session_start();

require "../../func/function.php";

$t_name = $_SESSION['t_name'];
$s_name = $_SESSION['s_name'];
$class = $_SESSION['class'];

if(isset($_POST['result'])){

    # テストの科目と点だけの連想配列を作る
    $sub_array = $_POST;
    unset($sub_array['result']);

    $Japanese = (int)$_POST['Japanese'];
    $English = (int)$_POST['English'];
    $Mathematicts = (int)$_POST['Mathematicts'];
    $Science = (int)$_POST['Science'];
    $Social_studies = (int)$_POST['Social_studies'];

    $total = 0; # 合計点数初期化
    $red_sub = []; # 赤点だった科目を格納する配列

    # Keyの変更　英語から日本語へ
    $sub = ['国語','英語','数学','理科','社会'];
    $sub_value = array_values($sub_array);
    $sub_array = array_combine($sub, $sub_value); 

    # $totalの加算と赤点のチェック
    foreach($sub_array as $key => $score){
        $total += $score;
        if($score <= 40){
            array_push($red_sub, $key);
        }
    }

    # 平均点を出す
    $average = $total / count($sub_array);
    
    # 赤点がない場合の処理
    if(empty($red_sub)){
        $red = "なし";
    }else{
        $red = implode(",",$red_sub);
    }
    
    # 最高得点と最低得点を取り出す処理
    $max_score = 0;
    $min_score = 999;
    $max_sub = "";
    $min_sub = "";

    foreach($sub_array as $key => $score){
        if($max_score < $score){
            $max_sub = $key;
            $max_score = $score;
        }
        if($min_score > $score){
            $min_sub = $key;
            $min_score = $score;
        }
    $result = edit($s_name,$Japanese,$English,$Mathematicts,$Science,$Social_studies,$total,$average,$red,$max_sub,$max_score,$min_sub,$min_score);
    };
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/header.css">
    <title>成績確認</title>
</head>
<body>
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
            <a href="../../form/top.php" class="header-chara">5教科成績確認ページ</a>
            <nav class="nav">
                    <button class="nav__toggle" aria-expanded="false" type="button">
                        menu
                    </button>
                <ul class="nav__wrapper">
                    <li class="nav__item"><a href="#"><?php echo $class . "担当" ."\n". $t_name?>先生</a></li>
                    <li class="nav__item"><a href="../../logout/logout.php">ログアウト</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!--編集フォーム-->
    <div class="put_box">
    <form method="POST" action="edit.php" name="edit">
        <h3>学生名：<?php echo $s_name?></h3>
        <div class="line"></div>
        <p>国語：<input type="number" name="Japanese" value="" min=0 max=100 required></p>
        <p>英語：<input type="number" name="English" value="" min=0 max=100 required></p>
        <p>数学：<input type="number" name="Mathematicts" value="" min="0" max=100 required></p>
        <p>理科：<input type="number" name="Science" value="" min=0 max=100 required></p>
        <p>社会：<input type="number" name="Social_studies" value="" min=0 max=100 required></p><br>
        <button type="submit" name="result" class="button">編集</button>
        </form>

        <br><br><a href="../../form/top.php" class="put-box">トップページへ</a>
        <?php if(isset($result)):?>
            <?php header('Location: ../data.php'); ?>
        <?php endif;?>

</div>
    <!--学生リストの表示-->
        <?php 
        $students = findStudent($class);
        $cnt_student = count($students);
        $a = 0;?>
        <div class="students">
    <?php echo $class . "\n";?>成績表<br>
        <?php for ($i=0; $i < $cnt_student ; $i++) :?>
            <form action="../data.php" method="POST">
            <button class="link_style" type="submit" name="num" value=<?php echo $students[$a]['id'] ?>><?php echo $students[$a]['s_name'] . "<br>";?></button><br>
            <?php $a += 1;?>
            <?php endfor; ?>
            </div>
            </form>
</body>
</html>