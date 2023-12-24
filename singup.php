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
?>



    <?php

        if (isset($_GET['singup'])) {
            // Получаем данные из формы
            $user_name = $_GET['user_name'];
            $user_pass = $_GET['user_pass'];
            $user_pass_check = $_GET['user_pass_check'];
            $user_email = $_GET['user_email'];
            $user_date = $_GET['user_date'];
            $user_level = 3;
            $sql_insert_data = "INSERT INTO users (user_name, user_pass, user_email, user_date, user_level)
            VALUES ('$user_name', '$user_pass', '$user_email', '$user_date', '$user_level')
            ";
           
            if ($mysqli->query($sql_insert_data) === TRUE) {
                echo "Data inserted successfully";
            } else {
                echo "Error inserting data: " . $conn->error;
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

    <h3>Sign up</h3>

    <form action="" method="get" name="singup">
        <label for="user_name">Username:</label>
        <input type="text" name="user_name" />
        <label for="user_pass">Password:</label>
        <input type="text" name="user_pass">
        <label for="user_pass_check">Password again:</label>
        <input type="text" name="user_pass_check">
        <label for="user_email">E-mail:</label>
        <input type="email" name="user_email">
        <label for="user_date">Birthday:</label>
        <input type="date" name="user_date">
        <input type="submit" value="Create user" name="singup">
    </form>
</body>

</html>