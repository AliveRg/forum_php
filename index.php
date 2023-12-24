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

        .topic_button,
        .cat_button {
            text-decoration: none;
            color: #000;
            transition: all 0.2s ease-out allow-discrete;
            background-color: #4CAF50;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .topic_button:hover,
        .cat_button:hover {
            background-color: #0f0f0f;
            color: #fff
        }
    </style>
</head>

<body>

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
        <div class="" style="display: flex;   justify-content: space-between; width: 100%;">

            <a class="topic_button" href="./create_topic.php?cat_id=<?=  $row["cat_id"] ?>">edit</a>
            <a class="cat_button" href="./Category.php?cat_id=<?=  $row["cat_id"] ?>">Show</a>
        </div>

    </div>
    <hr>
    <?php
      }
     
    
    
       
        
    } else {
        echo "0 results";
    }

    include './footer.php';
   
?>

</body>


</html>