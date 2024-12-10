<?php 

if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['body'])) {
    // Получаем данные из массива $_POST
    $data = [
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'body' => $_POST['body'],
    ];

    // Кодируем данные в формат JSON
    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    // Указываем имя файла для сохранения
    $file_path = 'data.json';

    // Проверяем, существует ли файл и если да, то добавляем данные
    if (file_exists($file_path)) {
        // Читаем существующий файл
        $existing_data = file_get_contents($file_path);
        $existing_array = json_decode($existing_data, true);

        // Добавляем новые данные в существующий массив
        $existing_array[] = $data;

        // Кодируем обновленный массив обратно в JSON
        $json_data = json_encode($existing_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } else {
        // Если файл не существует, создаем новый массив с данными
        $existing_array = [$data];
        $json_data = json_encode($existing_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // Записываем данные в файл
    if (file_put_contents($file_path, $json_data)) {
        header("Location: /contact.php");
        exit();
    } else {
        echo "Ошибка при записи данных в файл.";
    }
} else {
    echo "Не все необходимые поля заполнены.";
}