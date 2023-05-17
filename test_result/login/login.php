<?php declare(strict_types=1);

session_start();

require "../func/function.php";

if(isset($_POST[('login_id')]) && isset($_POST['password'])){
    $user = loginFunc($_POST['login_id'], $_POST['password']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
<header class="site-header">
        <div class="wrapper site-header__wrapper">
            <a href="#" class="header-chara">5教科成績確認ページ</a>
            <nav class="nav">
                    <button class="nav__toggle" aria-expanded="false" type="button">
                        menu
                    </button>
                    <ul class="nav__wrapper">
                    <li class="nav__item"><a href="#"></a></li>
                    <li class="nav__item"><a href="#"></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <h2>ログイン</h2>
    <div class="box">
    <form name="login-form" action="login.php" method="POST">
        <p>ログインID: <input class="box" type="text" value="" name="login_id" placeholder="ログインID" required></p>
        <p>パスワード: <input class="box" type="password" value="" name="password" placeholder="パスワード" required></p>
        <button type="submit" name="operation" value="login" class="button">ログイン</button><br><br>
    </form>
    <?php if(isset($_POST['operation']) && $_POST['operation'] === 'login'): ?>
        <?php if(isset($_SESSION['t_name'])): ?>
            <?php header('Location: ../form/top.php'); ?>
        <?php else : ?>
            <p>ログインに失敗しました。</p>
            <p>もう一度入力してください</p>
        <?php endif; ?>
    <?php endif;?>
        </div>
        <div class="students"></div>

</body>
</html>