<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            border: solid 2px #000;
            width: 500px;
            padding: 10px 40px;
            margin: 50px auto;
            display: flex;
            flex-direction: column;
            align-items: start;
            justify-content: space-between;

        }

        .field {
            height: 10px;
        }
    </style>
</head>

<?php
    include './connect.php';
    include './header.php';

    // SQL-запрос для выборки всех данных из таблицы
    $sql_select_data = "SELECT * FROM categories";
    $result = $mysqli->query($sql_select_data);
    
    if ($result->num_rows > 0) {
        // Выводим данные
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class='container'>
                <h2 class='field'><?=  $row["cat_name"] ?></h2>
                <h4 class='field'><?= $row["cat_description"] ?></h4>
                <button onclick="location.href='./create_topic.php'">Добавить тему</button>

            </div>
            <hr>
          <?php
      }
      
    
    
       
        
    } else {
        echo "0 results";
    }


    include './footer.php';
?>




</html>