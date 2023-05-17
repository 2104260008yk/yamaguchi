<?php declare(strict_types=1);

session_start();

require "../func/function.php";

$t_name = $_SESSION['t_name'];
$class = $_SESSION['class'];
if(isset($_POST['num'])){
    $_SESSION['num'] = $_POST['num'];
};
#var_dump($_POST); 動作確認

$students = findStudent($class);
$cnt_student = count($students);
$num = $_SESSION['num'];
$a = 0;
for ($i=0; $i < $cnt_student; $i++) { 
    if($students[$a]['id'] == $num){
        $student = $students[$a];
        
        $s_name = $student["s_name"];
        $_SESSION["s_name"] = $s_name;
        $Japanese = $student["Japanese"];
        $Engilish = $student["English"];
        $Mathematicts = $student["Mathematicts"];
        $Social_studies = $student["Social_studies"];
        $Science = $student["Science"];
        $total = $student["total"];
        $average = $student["average"];
        $red = $student["red"];
        $max_sub = $student["max_sub"];
        $max_score = $student["max_score"];
        $min_sub = $student["min_sub"];
        $min_score = $student["min_score"];
        # var_dump($student); 動作確認
    }else{
        $a += 1;
    };
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>成績確認</title>
</head>
<body>
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
            <a href="../form/top.php" class="header-chara">5教科成績確認ページ</a>
            <nav class="nav">
                    <button class="nav__toggle" aria-expanded="false" type="button">
                        menu
                    </button>
                <ul class="nav__wrapper">
                    <li class="nav__item"><a href="#"><?php echo $class . "担当" ."\n". $t_name?>先生</a></li>
                    <li class="nav__item"><a href="../logout/logout.php">ログアウト</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--学生データの表示-->
    <div class="put_box">
    <h3>学生名：<?php echo $s_name ;?></h3>
        <div class="line"></div>
        <p>各科目別点数</p>
        <p>国語：<?php echo $Japanese;?><br>
        英語：<?php echo $Engilish;?><br>
        数学：<?php echo $Mathematicts;?><br>
        社会：<?php echo $Social_studies;?><br>
        理科：<?php echo $Science;?><br><br>
        合計：<?php echo $total; ?><br>
        平均：<?php echo $average ;?><br>
        <div class="red">赤点</div>：<?php echo $red;?><br><br>
        最高得点：<?php echo $max_sub ."\n-\n". $max_score ;?><br>
        最低得点：<?php echo $min_sub ."\n-\n". $min_score ;?><br><br>
    <a href="edit/edit.php">編集する</p></a>
</div>
    <!--学生リストの表示-->
    <?php 
    $students = findStudent($class);
    $cnt_student = count($students);
    $a = 0;?>
    <div class="students">
    <?php echo $class . "\n";?>成績表<br>
    <?php for ($i=0; $i < $cnt_student ; $i++) :?>
        <form action="../check/data.php" method="POST">
        <button class="link_style" type="submit" name="num" value=<?php echo $students[$a]['id'] ?>><?php echo $students[$a]['s_name'] . "<br>";?></button><br>
        <?php $a += 1;?>
    <?php endfor; ?>
    </div>
</form>
</body>
</html>