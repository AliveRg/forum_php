<?php
    include './connect.php';
?>
    <h3>Sign up</h3>

    <form action="" method="POST" name="singup">
        Username: <input  type="text" name="user_name"/>
        Password: <input type="text" name="user_pass">
        Password again <input type="text" name="user_pass_check">
        E-mail: <input type="text" name="user_email">
        Birthday: <input type="datetime-local" name="user_date">
        <input type="submit" value="Create user">
    </form>


<?php

        if (isset($_POST['singup'])) {
            // Получаем данные из формы
            $user_name = $_POST['user_name'];
            $user_pass = $_POST['user_pass'];
            $user_pass_check = $_POST['user_pass_check'];
            $user_email = $_POST['user_email'];
            $user_date = $_POST['user_date'];

            echo $user_name ;

            $sql_insert_data = "INSERT INTO users (user_name, user_pass, user_email, user_date)
            VALUES ('$user_name', '$user_pass', '$user_email', '$user_date')
            ";
            $result = mysqli_query($mysqli, $sql_insert_data);
            if (!$result) {
                echo 'что-то пошло не так при регистрации';
            }
            else {
                echo 'Вы успешно зарегистрировались';
            }
        }

        $mysqli->close();

        // if (isset($_POST['user_name'])) {
        //     if (!ctype_alnum($_POST['user_name'])) {
        //         $errors[] = 'The username can only contain letters and digits';
        //     }
        //     if (strlen($_POST['user_name']) > 30) {
        //         $errors[] = 'The username cannot be longer than 30 characters';
        //     }
        // }
        // else {
        //     $errors[] = 'The username field must not be empty';
        // }

        // if (isset($_POST['user_pass'])) {
        //     if ($_POST['user_pass'] !== $_POST['user_pass_check']) {
        //         $errors[] = 'The two passwords did not match';
        //     }
        // }
        // else {
        //     $errors[]= 'The password field cannot be empty';
        // }

        // if (!isset($_POST['user_date'])) {
        //     $errors[] = 'Поле дня рождения обязательно';
        // }

        // if (!empty($errors)) {
        //     echo 'Uh-oh....  a couple of fields are not filled in correctly';
        //     echo '<ul>';
        //     foreach($errors as $key => $value) {
        //         echo '<li> '. $value . '</li>' ;
        //     }
        //     echo '</ul>';
        // }
        // else {
        //     $sql_insert_data = "INSERT INTO users (user_name, user_pass, user_email, user_date)
        //     VALUES ('$user_name', '$user_pass', '$user_email', '$user_date')
        //     ";
        //     $result = mysqli_query($mysqli, $sql_insert_data);
        //     if (!$result) {
        //         echo 'что-то пошло не так при регистрации';
        //     }
        //     else {
        //         echo 'Вы успешно зарегистрировались';
        //     }
        // }
    

?>