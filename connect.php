<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   
   $db_host = 'localhost';
   $db_user = 'root';
   $db_password = 'root';
   $db_db = 'forum';
  
   $mysqli = @new mysqli(
     $db_host,
     $db_user,
     $db_password,
     $db_db
   );
    
   if ($mysqli->connect_error) {
     echo 'Errno: '.$mysqli->connect_errno;
     echo '<br>';
     echo 'Error: '.$mysqli->connect_error;
     exit();
   }
 
   echo 'Success: A proper connection to MySQL was made.';
   echo '<br>';
   echo 'Host information: '.$mysqli->host_info;
   echo '<br>';
   echo 'Protocol version: '.$mysqli->protocol_version;
// Проверяем соединение
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
   die("Connection sucsess ");
}

// SQL-запрос для создания таблицы
// Таблица пользователей


$sql_create_table = "
CREATE TABLE IF NOT EXISTS users (
user_id INT AUTO_INCREMENT PRIMARY KEY,
user_name VARCHAR(30) NOT NULL UNIQUE INDEX,
user_pass VARCHAR(255) NOT NULL,
user_email VARCHAR(255) NOT NULL,
user_date DATETIME NOT NULL,
user_level INT(8) NOT NULL,
);
";


// Выполняем запрос
if ($mysqli->query($sql_create_table) === TRUE) {
   echo "Table created successfully";
} else {
   echo "Error creating table: " . $mysqli->error;
}


// // Таблица категорий
// $sql_create_table1 = "
// CREATE TABLE categories (
// cat_id INT(8) NOT NULL AUTO_INCREMENT,
// cat_name VARCHAR(255) NOT NULL,
// cat_description VARCHAR(255) NOT NULL, 
// UNIQUE INDEX cat_name_unique (cat_name), 
// PRIMARY KEY (cat_id)
// ) ENGINE=INNODB;

// ";

// // Таблица тем
// $sql_create_table2 = "
// CREATE TABLE topics (
//    topic_id INT(8) NOT NULL AUTO_INCREMENT,
//    topic_subject VARCHAR(255) NOT NULL,
//    topic_date DATETIME NOT NULL,
//    topic_cat INT(8) NOT NULL,
//    topic_by INT(8) NOT NULL, 
//    PRIMARY KEY (topic_id) 
//    ) ENGINE=INNODB;
// ";

// // Таблица сообщений
// $sql_create_table3 = "
// CREATE TABLE posts (
//    post_id INT(8) NOT NULL AUTO_INCREMENT,
//    post_content TEXT NOT NULL,
//    post_date DATETIME NOT NULL,
//    post_topic INT(8) NOT NULL,
//    post_by INT(8) NOT NULL, 
//    PRIMARY KEY (post_id) 
//    ) ENGINE=INNODB;
// ";

// if ($mysqli->query($sql_create_table) === TRUE) {
//    echo "Table created successfully";
// } else {
//    echo "Error creating table: " . $mysqli->error;
// };
// Закрываем соединение с базой данных
$mysqli->close();
?>
</body>

</html>