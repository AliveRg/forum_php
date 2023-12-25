<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>


        body, p {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        h1 {
            margin: 20px;
        }

        form {
            margin: 20px;
            width: 500px;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        form textarea {
            height: 300px;
        }

        .submit {
            width: fit-content;
        }

        .topic {
            width: 80%;
            margin: 5px auto;
            background-color: red;
            display: flex;
            border: 2px solid black;
        }

        .post {
            width: 80%;
            margin: 5px auto;
            border: 1px solid black;
            display: flex;
        }

        .post div, .topic div {
            width: 20%;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 10px;
            border-right: 1px solid black;
            margin-right: 10px;
        }
        
    </style>
    
</head>
<body>
    


    <?php
       include './connect.php';
       include './header.php';
       echo '<div>';
   
       if (isset($_GET['topic_id'])) {
           $topic_id = $_GET['topic_id'];
        }

        if ($topic_id) {
            $sql_select_data1 = "SELECT * FROM topics WHERE topic_id=$topic_id";
           $result = $mysqli->query($sql_select_data1);
           if ($result->num_rows > 0) {
               while($row = mysqli_fetch_assoc($result)) {
                $topic_by= $row['topic_by'];
                $sql_select_data1 = "SELECT user_name FROM users WHERE user_id = $topic_by ";
                $user = $mysqli->query($sql_select_data1);
                $user = mysqli_fetch_all($user);
           ?>
           <div class="topic">
            <div >
                <p><?= $user[0][0] ?></p>
                <p><?= $row['topic_date'] ?></p>
                
            </div>
            <h1><?= $row['topic_subject'] ?></h1>
           </div>
           
            <?php
        }}}
        
        $sql_select_data1 = "SELECT * FROM posts WHERE post_topic=$topic_id";
        $result = $mysqli->query($sql_select_data1);
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                $post_by = $row['post_by'];
                $sql_select_data1 = "SELECT user_name FROM users WHERE user_id = $post_by ";
                $user = $mysqli->query($sql_select_data1);
                $user = mysqli_fetch_all($user);

                ?>
                <div class="post">
                <div>
                    <p><?= $user[0][0];?></p>
                    <p><?= $row['post_date'] ?></p>
                </div>
                <h3><?= $row['post_content'] ?></h3> 
            </div>            
         <?php
        }}
        



        // getPosts($topic_id, $mysqli);

           // SQL-запрос для выборки данных по ID

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addPost"])) {

        $post = $_POST['reply_topic'];
        $post_date = date('Y-m-d H:i:s');
        $post_topic = $topic_id;
        $post_by = $_SESSION['user_id'];
        $sql_insert_post = "INSERT INTO posts (post_content, post_date, post_topic, post_by) VALUES ('$post', '$post_date', '$post_topic', '$post_by')";
             
        if ($mysqli->query($sql_insert_post) === TRUE) {
            
            ?>
            
            <div class="post">
                <div>
                    <p><?= $_SESSION['user_name'] ?></p>
                    <p><?= $post_date ?></p>
                </div>
                <h3><?= $post ?></h3> 
            </div>
            <p id="sucssesResult">Каментарий успешно добавлен</p>
            <script>
                const vidget = document.getElementById('sucssesResult')
                console.log('1',vidget);
                vidget.style.color = 'green'
                setTimeout(() => hideVidget(), 5000)
                function hideVidget() {
                vidget.style.display = "none";
                }
            
            </script>
            <?php
                } else {
                    echo "Ошибка при добавлении комментария: " . $mysqli->error;
                }
        };


        
        
       
   ?>

   <form action="" method="post" name="addPost">
        <input type="hidden" name="edit_id" value="<?php echo $row["cat_id"]; ?>">
      <label for="reply_topic">Комментарий:</label>
      <textarea type="text" id="reply_topic" name="reply_topic" required></textarea>
      <input type="submit" class="submit" value="Добавить комментарий" name="addPost">
   </form>

    </div>

   <?php 
        include './footer.php'
    ?>    
</body>
</html>