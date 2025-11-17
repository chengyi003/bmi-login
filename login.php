<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入練習</title>
    <style>
        body {
            font-family: "Microsoft JhengHei", sans-serif;
            background: linear-gradient(135deg, #f9f9ff, #e0ecff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 40px 50px;
            border-radius: 16px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            width: 320px;
        }

        h2 {
            color: #3366cc;
            margin-bottom: 25px;
        }

        label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        button {
            background-color: #4a90e2;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #357ABD;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #4a90e2;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔐 登入練習</h2>
        <form action="login_result.php" method="post">
            <label for="account">帳號</label>
            <input type="text" id="account" name="account" required placeholder="請輸入帳號">

            <label for="password">密碼</label>
            <input type="password" id="password" name="password" required placeholder="請輸入密碼">

            <button type="submit">登入</button>
        </form>
        <a href="index.html">回首頁</a>
    </div>
</body>
</html>
