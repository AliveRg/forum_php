<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    include './connect.php';   
    if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
        echo 'Вы уже авторизованы, вы можете выйти из аккаунта <a href="./signout.php">sign out </a>';
    }
    else {
        echo 'xuy';
        if(isset($_GET['signin'])) {
            $user_name = $_GET['user_name'];
            $user_pass = $_GET['user_pass'];
            echo 'xuy';
            echo $user_name, $user_pass;
    
            $sql = "SELECT
                user_id, user_name, user_level
                FROM
                    users
                WHERE
                    user_name = ".$user_name."
                AND
                    user_pass = ".$user_pass."
            ";
            $result = mysqli_query($mysqli, $sql);
            if (!$result) {
                echo 'Пароль или имя не правильные';
            }
            else {
                if (mysqli_num_rows($result) == 0) {
                    echo 'Пароль или имя не правильные';
                }
                else {
                    $_SESSION['sign_in'] = true;
    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_name'] = $row['user_row'];
                        $_SESSION['user_level'] = $row['user_level'];
                    };
    
                    echo 'Добро пожаловать,  ';
                }
    
            }
        }
    }
    $mysqli->close();
    
    
?>

<h3>Sign in</h3>

<form action="" method="get" name="signin">
    <label for="user_name">
    <input type="text" name="user_name">

    <label for="user_pass">
    <input type="text" name="user_pass">

    <input type="submit" value="Sign in" name="singin">
</form>

    
</body>
</html>