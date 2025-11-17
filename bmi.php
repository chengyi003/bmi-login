<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI 計算表單</title>
    <style>
        body {
            font-family: "Microsoft JhengHei", sans-serif;
            background: linear-gradient(135deg, #f8fbff, #e0eeff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
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
        <h2>🌸 BMI 計算器 🌸</h2>
        <form action="bmi_result.php" method="post">
            <label for="height">身高（公分）</label>
            <input type="number" id="height" name="height" step="0.1" required placeholder="請輸入身高">

            <label for="weight">體重（公斤）</label>
            <input type="number" id="weight" name="weight" step="0.1" required placeholder="請輸入體重">

            <button type="submit">計算 BMI</button>
        </form>
        <a href="index.html">回首頁</a>
    </div>
</body>
</html>
