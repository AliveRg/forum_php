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
       include './header.php';
?>
   <h2>Добавить категорию</h2>

   <form action="" method="GET">
      <label for="cat_name">Название категории:</label>
      <input type="text" id="cat_name" name="cat_name" required>

      <label for="cat_description">Описание категории:</label>
      <textarea id="cat_description" name="cat_description" required></textarea>

      <input type="submit" value="Добавить категорию" name="formsub">
   </form>

   <?php
 
  
   
   if (isset($_GET['formsub'])) { 
      $cat_name = $_GET['cat_name'];
      $cat_description = $_GET['cat_description'];
      $sql_insert_category = "INSERT INTO categories (cat_name, cat_description) VALUES ('$cat_name', '$cat_description')";
      if ($mysqli->query($sql_insert_category) === TRUE) {
         echo "Категория успешно добавлена";
     } else {
         echo "Ошибка при добавлении категории: " . $mysqli->error;
     }
   }


 
   
   // Закрытие соединения с базой данных
    $mysqli->close();
   ?>
</body>

</html>