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



        .topic_button,
        .cat_button,
        .add_com {
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            color: #000;
            transition: all 0.2s ease-out allow-discrete;
            background-color: #4CAF50;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .topic_button:hover,
        .cat_button:hover,
        .add_com:hover {
            background-color: #0f0f0f;
            color: #fff
        }
    </style>
</head>

<body>


    <?php
    include './connect.php';
    include './header.php';

    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];
   
    
        // SQL-запрос для выборки данных по ID
       
        $sql_select_data1 = "SELECT * FROM categories WHERE cat_id=$cat_id";
        $result = $mysqli->query($sql_select_data1);
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
    <h1><?= $row['cat_name'] ?></h1>

    <?php
            }}
            $sql_select_data = "SELECT * FROM topics WHERE topic_cat=$cat_id";
            $result = $mysqli->query($sql_select_data);
        // Проверяем, есть ли данные
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>

    <div class='container'>
        <div class="" style="display: flex;   justify-content: space-between; width: 100%;">
            <h2 class='field'><?= $row['topic_subject'] ?></h2>
            <a class="add_com" href="./reply.php?topic_id=<?= $row['topic_id'] ?>">перейти к теме</a>
        </div>
        <div class="" style="display: flex;   justify-content: space-between; width: 100%;">
            <h4 class='field'><?= $row['topic_date'] ?></h4>
            <h4 class='field'><?= $row['topic_by'] ?></h4>
        </div>


    </div>
    <hr>
    <?php
          }
        } else {
            echo 'Запись не найдена';
        }
    } else {
        echo 'Не передан ID записи';
    }

    


    include './footer.php'
?>
</body>

</html>