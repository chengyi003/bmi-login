<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>登入結果</title>
    <style>
        body {
            font-family: "Microsoft JhengHei", sans-serif;
            background: #f4f8ff;
            text-align: center;
            padding-top: 80px;
        }

        .box {
            background: white;
            display: inline-block;
            padding: 30px 50px;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 { color: #3366cc; }
        p { font-size: 18px; }
        a { color: #4a90e2; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="box">
        <h2>登入結果</h2>
        <?php
        $correctAccount = "admin";
        $correctPassword = "12345678";

        if (isset($_POST['account']) && isset($_POST['password'])) {
            $account = trim($_POST['account']);
            $password = trim($_POST['password']);

            if ($account === $correctAccount && $password === $correctPassword) {
                echo "<p>🎉 登入成功，歡迎回來 <strong>{$account}</strong>！</p>";
            } else {
                echo "<p>❌ 登入失敗，帳號或密碼錯誤！</p>";
            }
        } else {
            echo "<p>請從登入頁面進入本頁～</p>";
        }
        ?>
        <br><br>
        <a href="login.php">回登入頁</a> |
        <a href="index.html">回首頁</a>
    </div>
</body>
</html>
