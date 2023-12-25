<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <?php


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

   if(!isset($_SESSION)) 
   { 
       session_start(); 
   }
    if (!isset($_SESSION['signed_in'])) {
        $_SESSION['signed_in'] = false;
    }

    
   // if ($mysqli->connect_error) {
   //   echo 'Errno: '.$mysqli->connect_errno;
   //   echo '<br>';
   //   echo 'Error: '.$mysqli->connect_error;
   //   exit();
   // }
 
   // echo 'Success: A proper connection to MySQL was made.';
   // echo '<br>';
   // echo 'Host information: '.$mysqli->host_info;
   // echo '<br>';
   // echo 'Protocol version: '.$mysqli->protocol_version;
   // // Проверяем соединение
   // if ($mysqli->connect_error) {
   //    die("Connection failed: " . $mysqli->connect_error);
   // } 

// SQL-запрос для создания таблицы
// Таблица пользователей


$sql_create_table = "
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(30) NOT NULL UNIQUE,
    user_pass VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_date DATETIME NOT NULL,
    user_level INT(8) NOT NULL
);
";


// Выполняем запрос
// if ($mysqli->query($sql_create_table) === TRUE) {
//    echo "<br> Table created successfully";
// } else {
//    echo "Error creating table:  " . $mysqli->error;
// }


$sql_create_table1 = "
CREATE TABLE IF NOT EXISTS categories (
    cat_id INT AUTO_INCREMENT PRIMARY KEY,
    cat_name VARCHAR(255) NOT NULL UNIQUE,
    cat_description VARCHAR(255) NOT NULL
) ENGINE=INNODB;
";


// if ($mysqli->query($sql_create_table1) === TRUE) {
//    echo "<br> Table created successfully";
// } else {
//    echo "Error creating table: " . $mysqli->error;
// };

$sql_create_table2 = "
CREATE TABLE IF NOT EXISTS topics (
    topic_id INT AUTO_INCREMENT PRIMARY KEY,
    topic_subject VARCHAR(255) NOT NULL,
    topic_date DATETIME NOT NULL,
    topic_cat INT NOT NULL,
    topic_by INT NOT NULL,
    FOREIGN KEY (topic_cat) REFERENCES categories(cat_id),
    FOREIGN KEY (topic_by) REFERENCES users(user_id)
) ENGINE=INNODB;
";

// if ($mysqli->query($sql_create_table2) === TRUE) {
//    echo "<br> Table created successfully";
// } else {
//    echo "Error creating table: " . $mysqli->error;
// };

// Таблица сообщений
$sql_create_table3 = "
CREATE TABLE IF NOT EXISTS posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    post_content TEXT NOT NULL,
    post_date DATETIME NOT NULL,
    post_topic INT NOT NULL,
    post_by INT NOT NULL,
    FOREIGN KEY (post_topic) REFERENCES topics(topic_id),
    FOREIGN KEY (post_by) REFERENCES users(user_id)
) ENGINE=INNODB;
";

// if ($mysqli->query($sql_create_table3) === TRUE) {
//    echo "<br> Table created successfully";
// } else {
//    echo "Error creating table: " . $mysqli->error;
// };
// Закрываем соединение с базой данных

?>
</body>

</html>