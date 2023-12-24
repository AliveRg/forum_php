<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
      body {
         margin: 0;
         font-family: Arial, sans-serif;
      }

      header {
         background-color: #333;
         color: #fff;
         padding: 10px;
         text-align: center;
      }

      .header_wrapper {
         display: flex;
         align-items: center;
         justify-content: space-between;
         gap: 30px;
      }

      header h1 {
         margin: 0;
      }

      nav {
         display: flex;
         align-items: center;
         justify-content: space-around;
         gap: 40px;

      }

      a {

         color: #fff;
         text-decoration: none;
      }

      .button-container {
         display: flex;
      }

      .button-container button {
         margin-left: 10px;
         padding: 5px 10px;
         background-color: #4CAF50;
         color: #fff;
         border: none;
         cursor: pointer;
      }
   </style>
</head>

<body>
   <?php
      include './connect.php';
      
   ?>

   <header>
      <div class="header_wrapper">
         <h1>Форум</h1>
         <nav>
            <a href="./index.php">Главная</a>
            <a href="#">О нас</a>
            <a href="#">Контакты</a>
            <a href="./create_cat.php">Создание категории</a>
         </nav>
         <div class="button-container">

            <?php 
               if($_SESSION['signed_in']) {
                  ?>
                  <div style="display: flex; gap: 10px">
                     <p>Hello, <?= $_SESSION['user_name']?></p>
                     <button onclick="location.href='./signout.php'">Sign out</a>
                  </div>
                  

                  <?php
               }
               else {
               ?> 
                  <button onclick="location.href='./singup.php'">Регистрация</button>
                  <button onclick="location.href='./signin.php'">Вход</button>
            <?php
               }
            ?>
            
         </div>
      </div>
   </header>


   <?php
   
   ?>
   <!-- Остальной контент страницы -->

</body>

</html>