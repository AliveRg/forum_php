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

      nav a {

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

   <header>
      <div class="header_wrapper">
         <h1>Название сайта</h1>
         <nav>
            <a href="#">Главная</a>
            <a href="#">О нас</a>
            <a href="#">Контакты</a>
         </nav>
         <div class="button-container">
            <button onclick="location.href='#'">Регистрация</button>
            <button onclick="location.href='#'">Вход</button>
         </div>
      </div>
   </header>

   <!-- Остальной контент страницы -->

</body>

</html>