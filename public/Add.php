<?php 

if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['body'])) {
    // Получаем данные из массива $_POST
    $data = [
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'body' => $_POST['body'],
    ];

    try {
        $pdo = new PDO('mysql:host=db;dbname=artemiy', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Ошибка подключения: " . $e->getMessage();
    }

    $sql = 'INSERT INTO reviews (name, phone, body) VALUES (:name, :phone, :body)';
    $stmt = $pdo->prepare($sql);


    $stmt->bindValue(':name', $data['name']);
    $stmt->bindValue(':phone', $data['phone']);
    $stmt->bindValue(':body', $data['body']);

    $stmt->execute();
    header("Location: /contact.php");
    exit();
} else {
    echo "Не все необходимые поля заполнены.";
}