<?php
require_once('Db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $repeatpass = mysqli_real_escape_string($conn, $_POST['repeatpass']);

    if (empty($login) || empty($email) || empty($pass) || empty($repeatpass)) {
        echo "Заполните все поля";
    } elseif ($pass != $repeatpass) {
        echo "Пароли не совпадают";
    } else {
        $sql = "SELECT * FROM Users WHERE login = '$login'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Такой логин уже занят";
        } else {
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
            $insert_sql = "INSERT INTO Users (login, pass, email) VALUES ('$login', '$hashed_password', '$email')";
            if ($conn->query($insert_sql) === TRUE) {
                echo "Регистрация прошла успешно";
            } else {
                echo "Ошибка: " . $insert_sql . "<br>" . $conn->error;
            }
        }
    }
} else {
    echo "Метод запроса не POST";
}

$conn->close();
?>
