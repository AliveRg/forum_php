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