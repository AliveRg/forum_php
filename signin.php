<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        h3 {
            font-family: Arial, sans-serif;
            font-size: 20px;
        }
      form {
         max-width: 400px;
      }

      form div {
        display: flex;
        gap: 10px;
      }

      label {
        font-family: Arial, sans-serif;
         display: block;
         margin-bottom: 8px;
      }

      input {
         width: 100%;
         padding: 8px;
         margin-bottom: 16px;
      }

      input[type="submit"] {
         background-color: #4CAF50;
         border-radius: 7px;
         color: #fff;
         border: none;
         padding: 10px;
         cursor: pointer;
      }

      a {
        width: fit-content;
        display: inline-block;
        padding: 10px;
        background-color: #4CAF50;
        border-radius: 7px;
        text-decoration: none;
        color: #fff;
        font-family: Arial, sans-serif;
        font-size: 18px;
      }
   </style>
</head>
<body>

<?php

    include './connect.php';   
      

    if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
        echo 'Вы уже авторизованы, вы можете выйти из аккаунта <button onclick="location.href=`./signout.php`">sign out</button>';
    }
    else {
        if(isset($_GET['signin'])) {
            $user_name = $_GET['user_name'];
            $user_pass = $_GET['user_pass'];
    
            $sql = "SELECT user_id, user_name, user_level FROM users WHERE user_name = '$user_name' AND user_pass = $user_pass";

            $result = $mysqli->query($sql);

            if (!$result) {
                echo 'Пароль или имя не правильные';
            }
            else {
                if (mysqli_num_rows($result) == 0) {
                    echo 'Пароль или имя не правильные';
                }
                else {
                    $_SESSION['signed_in'] = true;
    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_name'] = $row['user_name'];
                        $_SESSION['user_level'] = $row['user_level'];
                    };
    
                    echo 'Добро пожаловать, ' ;
                    echo $user_name ;

                    ?>

                    <a class="./index.php" href="./index.php"> на главную</a>
                    <?php
                }
    
            }
        }
    }
    $mysqli->close();
    
    
?>

<h3>Sign in</h3>

<form action="" method="get" name="signin">
    <div>
        <label for="user_name">Username: </label>
        <input type="text" name="user_name">
    </div>
    <div>
        <label for="user_pass">Password: </label>
        <input type="text" name="user_pass">
    </div>
    <input type="submit" value="Sign in" name="signin">
</form>

    
</body>
</html>