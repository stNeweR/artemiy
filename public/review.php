<?php
try {
    $pdo = new PDO('mysql:host=db;dbname=artemiy', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}

$sql = "SELECT * FROM reviews";
$reviews = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Отзывы</title>
    <style>
        .slider {
            position: relative;
            width: 80%;
            margin: auto;
            overflow: hidden;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .review {
            min-width: 100%;
            box-sizing: border-box;
            padding: 20px;
        }

        .review__person {
            font-weight: bold;
        }

        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            cursor: pointer;
            padding: 10px;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px; 
        }
    </style>
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
        <div class="slider">
            <div class="slides">
                <?php foreach ($reviews as $review) { ?>
                    <div class="review">
                        <div class="review__person">
                            <b>Автор отзыва: <?= htmlspecialchars($review['name']) ?></b><br>
                            Номер телефона: <?= htmlspecialchars($review['phone']) ?>
                        </div>
                        <p>Отзыв:<br><?= nl2br(htmlspecialchars($review['body'])) ?></p>
                    </div>
                <?php } ?>
            </div>

            <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="next" onclick="changeSlide(1)">&#10095;</button>
        </div>

        <script>
            let currentSlide = 0;

            function showSlide(index) {
                const slides = document.querySelector('.slides');
                const totalSlides = document.querySelectorAll('.review').length;

                if (index >= totalSlides) {
                    currentSlide = 0;
                } else if (index < 0) {
                    currentSlide = totalSlides - 1;
                } else {
                    currentSlide = index;
                }

                slides.style.transform = 'translateX(' + (-currentSlide * 100) + '%)';
            }

            function changeSlide(direction) {
                showSlide(currentSlide + direction);
            }

            // Автоматическая смена слайдов
            setInterval(() => {
                showSlide(currentSlide + 1);
            }, 5000); // смена каждые 5 секунд

            // Показать первый слайд
            showSlide(currentSlide);
        </script>

    </main>

    <footer>
        <p>&copy; 2024 Шахматы</p>
    </footer>
</body>

</html>
