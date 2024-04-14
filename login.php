<?php
require_once('db.php');
$path = "sucs.html";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    if (empty($login) || empty($pass)) {
        echo "Заполните поля, дурень";
    } else {
        $sql = "SELECT * FROM Users WHERE login = '$login'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (password_verify($pass, $row['pass'])) {
                    if (file_exists($path)) {
                        $mime_type = mime_content_type($path);
                        header('Content-Type: ' . $mime_type);
                        readfile($path);
                    } else {
                        echo 'File not found.';
                    }
                } else {
                    echo "Неправильный пароль";
                }
            }
        } else {
            echo "Такой пользователь не найден";
        }
    }
} else {
    echo "Метод запроса не POST";
}

$conn->close();
?>
