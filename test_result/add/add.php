<?php declare(strict_types=1);

session_start();

require "../func/function.php";

$t_name = $_SESSION['t_name'];
$class = $_SESSION['class'];

if(isset($_POST["add"])){
    $result = addStudent($_POST["s_name"],$class);
}

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
                    <li class="nav__item"><a href=""><?php echo $class . "担当" ."\n". $t_name?>先生</a></li>
                    <li class="nav__item"><a href="../logout/logout.php">ログアウト</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="put_box">
        <?php
        #studentテーブルから学生の名前を取り出し、名簿を出力
        $students = findStudent($class);
        $cnt_student = count($students);
        $a = 0;
        ?>
        <h3>学生名簿</h3>
        <hr class="line">
        <?php for ($i=0; $i < $cnt_student; $i++):?>
            <p><?php echo "・". $students[$a]["s_name"]; ?>
            <?php $a += 1?>
        <?php endfor;?>
        <br><br><br><hr>
        <form action="../form/top.php" method="POST">
        <p>学生名：<input type="text" name="s_name" value="" required></p>
        <button class="link_style" type="submit" name="add">学生を追加する</button></div>
    </div>
    <div class="students"></div>
</body>
</html>