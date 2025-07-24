<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }

    .form-container {
      background-color: #fff;
      padding: 40px 30px;
      border-radius: 10px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #5d4037;
      font-size: 24px;
    }

    input {
      width: 100%;
      padding: 10px 12px;
      margin-top: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 14px;
      background-color: #eaf1ff;
    }

    input::placeholder {
      color: #888;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #805b4b;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      font-size: 16px;
      margin-top: 20px;
    }

    button:hover {
      background-color: #6d4c41;
    }

    .link-register {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .link-register a {
      color: #5d4037;
      text-decoration: none;
      font-weight: bold;
    }

    .link-register a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <form class="form-container" action="index.php?act=login" method="POST">
    <h2>Đăng nhập</h2>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Mật khẩu:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Đăng nhập</button>

    <div class="link-register">
      Chưa có tài khoản? <a href="index.php?act=register">Đăng ký ngay</a>
    </div>
  </form>

</body>

</html>
