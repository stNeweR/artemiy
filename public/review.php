<?php 
$jsonFile = file_get_contents('data.json');
$reviews = json_decode($jsonFile, true);
?>

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
            <h1>Отзывы</h1>
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
            <h2>Отзывы</h2>
            <div>
                <?php
                foreach ($reviews as $key => $review) {
                    ?>
                    <div class="review">
                        <div class="review__person">
                            <b>Автор отзыва: <?=$review['name']?></b>
                            <p>Номер телефона: <?=$review['phone']?></p>
                        </div>
                        <p>
                            Отзыв:
                            <?=$review['body']?>
                        </p>
                    </div>
                <?php
                }
                ?>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Шахматы</p>
        </footer>
    </body>
</html>