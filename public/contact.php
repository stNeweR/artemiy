<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Контакты</title>
    </head>
    <body>
        <header>
            <h1>Контакты</h1>
            <nav>
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="figure.php">Фигуры</a></li>
                    <li><a href="about.php">О сайте</a></li>
                    <li><a href="contact.php">Контакты</a></li>
                    <li><a href="review.php">Отзывы</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <h2>Контакты</h2>
            <p>Шахматный клуб: <b>"Победитель"</b></p>
            <p>Адрес: <b>просп. имени газеты Красноярский Рабочий, 31, Красноярск, Красноярский край, 660000</b></p>
            <p>Телефон: <b>8 988 555 55 55</b></p>
            <img src = "images/photo_2024-09-12_08-50-48.jpg" alt = "2GIS Карта" class = "gallerymain">
            <div class="form">
                <h1>Оставьте свой отзыв</h1>
                <form action="Add.php" method="post">
                    <div class="input">
                        <label for="name">Введите свое ФИО:</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="input">
                        <label for="phone">Введите свой номер телефона:</label>
                        <input type="tel" name="phone" id="phone">
                    </div>
                    <div class="input">
                        <label for="body">Текст отзыва:</label>
                        <textarea id="body" name="body"></textarea>
                    </div>
                    <button type="submit">Оставить отзыв</button>
                </form>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Шахматы</p>
        </footer>
    </body>
</html>