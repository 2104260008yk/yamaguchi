<?php
#使う関数を記述しています

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5 , 'UTF-8');
}

function connect(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=school; charset=utf8mb4','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    return $pdo;
}

function loginFunc(string $loginId,string $password): ?array
{
    $pdo = connect();
    $sql = "SELECT * FROM teacher WHERE login_id = :login_id AND password = :password";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':login_id',$loginId,PDO::PARAM_STR);
    $statement->bindValue(':password',$password,PDO::PARAM_STR);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    #echo var_dump($users); 動作確認
    if($users[0]['login_id'] == $loginId && $users[0]['password'] == $password){
        $_SESSION['t_name'] = $users[0]['t_name'];
        $_SESSION['login_id'] = $users[0]['login_id'];
        $_SESSION['password'] = $users[0]['password'];
        $_SESSION['class'] = $users[0]['class'];
        echo $_SESSION['class'];
    };
    $user = 1;
    return NULL;
}

function findStudent(string $class): ?array
{
    $pdo = connect();
    $sql = "SELECT * FROM student WHERE class = :class";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':class',$class,PDO::PARAM_STR);
    $statement->execute();
    $students = $statement->fetchAll(PDO::FETCH_ASSOC);
    #echo var_dump($students); 動作確認
    return $students;
}

function addStudent(string $s_name,string $class)
{
    $pdo = connect();
    $sql = "INSERT INTO student(s_name,class) VALUES(:s_name, :class)";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':s_name',$s_name,PDO::PARAM_STR);
    $statement->bindValue(':class',$class,PDO::PARAM_STR);
    $statement->execute();
    $result = "ok";
    return $result;
}

function edit($s_name,$Japanese,$English,$Mathematicts,$Science,$Social_studies,$total,$average,$red,$max_sub,$max_score,$min_sub,$min_score)
{
    $pdo = connect();

    $sql = "UPDATE student SET
    Japanese = :Japanese,
    English = :English,
    Mathematicts = :Mathematicts,
    Science = :Science,
    Social_studies = :Social_studies,
    total = :total,
    average = :average,
    red = :red,
    max_sub = :max_sub,
    max_score = :max_score,
    min_sub = :min_sub,
    min_score = :min_score 
    WHERE s_name = :s_name";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(':s_name',$s_name,PDO::PARAM_STR);
    $statement->bindValue(':Japanese',$Japanese,PDO::PARAM_STR);
    $statement->bindValue(':English',$English,PDO::PARAM_STR);
    $statement->bindValue(':Mathematicts',$Mathematicts,PDO::PARAM_STR);
    $statement->bindValue(':Science',$Science,PDO::PARAM_STR);
    $statement->bindValue(':Social_studies',$Social_studies,PDO::PARAM_STR);
    $statement->bindValue(':total',$total,PDO::PARAM_STR);
    $statement->bindValue(':average',$average,PDO::PARAM_STR);
    $statement->bindValue(':red',$red,PDO::PARAM_STR);
    $statement->bindValue(':max_sub',$max_sub,PDO::PARAM_STR);
    $statement->bindValue(':max_score',$max_score,PDO::PARAM_STR);
    $statement->bindValue(':min_sub',$min_sub,PDO::PARAM_STR);
    $statement->bindValue(':min_score',$min_score,PDO::PARAM_STR);
    $statement->execute();
    $result = 'ok';
    return $result;
};

?>