<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php'; // Добавляем класс для работы с SMTP

$mail = new PHPMailer(true);

// Настройки SMTP
$mail->isSMTP(); // Указываем, что используем SMTP
$mail->Host = 'mail.zzz.com.ua'; // Адрес SMTP сервера
$mail->SMTPAuth = true; // Включаем аутентификацию SMTP
$mail->Username = 'info@jlipskaya.zzz.com.ua'; // Логин SMTP
$mail->Password = 'S7D8-fbj9-Fvh7-ehrf'; // Пароль SMTP
$mail->SMTPSecure = 'tls'; // Тип шифрования, если необходимо
$mail->Port = 587; // Порт SMTP сервера

// Остальные настройки письма
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->isHTML(true);

// Отправка письма
$mail->setFrom('info@jlipskaya.zzz.com.ua', 'Lipskaya Робот - Секретарь');
$mail->addAddress('mr.xedan@gmail.com'); // Адрес получателя
$mail->addAddress('jlipskay@gmail.com'); // Адрес получателя
$mail->Subject = 'Запись на шугаринг';

$body = '<h1>Встречайте супер письмо!</h1>';

if (!empty($_POST['name'])) {
    $body .= '<p><strong>Имя:</strong> ' . $_POST['name'] . '</p>';
}

if (!empty($_POST['phone'])) {
    $body .= '<p><strong>Телефон:</strong> ' . $_POST['phone'] . '</p>';
}

// if (!empty($_POST['message'])) {
//     $body .= '<p><strong>Сообщение:</strong> ' . $_POST['message'] . '</p>';
// }

// $mail->Body = 'Текст письма';
$mail->Body = $body;

// Отправляем
if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Данные отправлены!';
}

$response = ['message' => $message];
header('Content-type: application/json');
echo json_encode($response);


// / ///////



// // От кого письмо
// $mail->setFrom('info@jlipskaya.zzz.com.ua', 'Lipskaya');

// // Кому отправить
// $mail->addAddress('mr.xedan@gmail.com');

// // Тема письма
// $mail->Subject = 'Привет! Это "Фрилансер по жизни"';

// // Рука
// $hand = "Правая";
// if ($_POST['hand'] == "left") {
//     $hand = "Левая";
// }

// // Тело письма
// $body = '<h1>Встречайте супер письмо!</h1>';

// if (!empty($_POST['name'])) {
//     $body .= '<p><strong>Имя:</strong> ' . $_POST['name'] . '</p>';
// }

// if (!empty($_POST['message'])) {
//     $body .= '<p><strong>Сообщение:</strong> ' . $_POST['message'] . '</p>';
// }
// if (!empty($_POST['email'])) {
//     $body .= '<p><strong>E-mail:</strong> ' . $_POST['email'] . '</p>';
// }

// if (!empty($_POST['hand'])) {
//     $body .= '<p><strong>Рука:</strong> ' . $hand . '</p>';
// }

// if (!empty($_POST['age'])) {
//     $body .= '<p><strong>Возраст:</strong> ' . $_POST['age'] . '</p>';
// }


// // Прикрепить файл
// if (!empty($_FILES['image']['tmp_name'])) {
//     // Путь загрузки файла
//     $filePath = __DIR__ . "/files/" . $_FILES['image']['name'];
    
//     // Грузим файл
//     if (copy($_FILES['image']['tmp_name'], $filePath)) {
//         $fileAttach = $filePath;
//         $body .= '<p><strong>Документ в приложении</strong></p>';
//         $mail->addAttachment($fileAttach);
//     }
// }

// $mail->Body = $body;

// // Отправляем
// if (!$mail->send()) {
//     $message = 'Ошибка';
// } else {
//     $message = 'Данные отправлены!';
// }

// $response = ['message' => $message];
// header('Content-type: application/json');
// echo json_encode($response);
?>
