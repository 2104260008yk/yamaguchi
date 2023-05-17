<?php
    session_start();
    $_SESSION = array();//セッションの中身をすべて削除
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト</title>
</head>
<body>
<header class="site-header">
        <div class="wrapper site-header__wrapper">
            <a href="../login/login.php" class="header-chara">5教科成績確認ページ</a>
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
    <div class="box">
    <p>ログアウトしました。</p>
    <a href="../login/login.php">ログインページ</a>
    <div class="students">
    </div>
</div>
</body>
</html>