<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      form {
         max-width: 400px;
         margin: auto;
      }

      label {
         display: block;
         margin-bottom: 8px;
      }

      input,
      textarea {
         width: 100%;
         padding: 8px;
         margin-bottom: 16px;
      }

      input[type="submit"] {
         background-color: #4CAF50;
         color: #fff;
         border: none;
         padding: 10px;
         cursor: pointer;
      }
   </style>
</head>

<body>
   <?php
    include './connect.php';
    
    ?>
   <h2>Добавить тему</h2>

   <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["formsub"])) {

   $cat_id = $_GET['cat_id'];
   $topic_subject = $_POST['topic_subject'];
   $topic_date = date('Y-m-d H:i:s');
   $topic_cat = $cat_id;
   $topic_by = $_SESSION['user_id'];
      $sql_insert_category = "INSERT INTO topics (topic_subject, topic_date, topic_cat, topic_by) VALUES ('$topic_subject', '$topic_date', '$topic_cat', '$topic_by')";

      if ($mysqli->query($sql_insert_category) === TRUE) {
         echo "Запись успешно обновлена";
     } else {
         echo "Ошибка при обновлении записи: " . $mysqli->error;
     }
   };
    
     

   if (isset($_GET["cat_id"])) {
      $cat_id = $_GET["cat_id"];
      // SQL-запрос для выборки данных по ID
      $sql_select_data = "SELECT * FROM categories WHERE cat_id=$cat_id";
      $result = $mysqli->query($sql_select_data);
  
      // Проверяем, есть ли данные
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
      } else {
          echo "Категория не найдена";
          exit;
      }
  } else {
      echo "Не передан ID категории";
      exit;
  }
  




   // if (isset($_GET['formsub'])) {

   // $cat_id = $_GET['cat_id'];
   // $topic_subject = $_GET['topic_subject'];
   // $topic_date = date('Y-m-d H:i:s');
   // $topic_cat = $cat_id;
   // $topic_by = $cat_id;
   // $sql_insert_category = "INSERT INTO topics (topic_subject, topic_date, topic_cat, topic_by) VALUES ('$topic_subject',
   // '$topic_date', '$topic_cat', '$topic_by')";
   // if ($mysqli->query($sql_insert_category) === true) {
   // echo 'Тема успешно добавлена';
   // } else {
   // echo 'Ошибка при добавлении темы: ' . $mysqli->error;
   // }
   




   

   // Закрытие соединения с базой данных
   $mysqli->close();
   ?>
   <form action="" method="post">
      <input type="hidden" name="edit_id" value="<?php echo $row["cat_id"]; ?>">
      <label for="topic_subject">Название темы:</label>
      <input type="text" id="topic_subject" name="topic_subject" required>
      <input type="submit" value="Добавить тему" name="formsub">
   </form>
</body>

</html>