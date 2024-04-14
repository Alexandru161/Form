<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Регистрация</title>
<link rel="stylesheet" href="register.css">
</head>
<body>

<div class="container">
  <div class="form-box">
    <form class="form" action="register.php" method="post">
        <span class="title">Регистрация</span>
        <span class="subtitle">Create a free account with your email</span>
        <div class="form-container">
          <input type="text" class="input" placeholder="Login" name="login">
          <input type="email" class="input" placeholder="Email" name="email">
          <input type="password" class="input" placeholder="Password" name="pass">
          <input type="password" class="input" placeholder="Repeat Password" name="repeatpass">
        </div>
        <button type="submit">Sign up</button>
    </form>
    <div class="form-section">
      <p>Уже есть аккаунт? <a href="log.php">Войдите</a> </p>
    </div>
  </div>
</div>

</body>
</html>
