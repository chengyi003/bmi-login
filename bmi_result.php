<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>BMI 計算結果</title>
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
        <h2>您的 BMI 計算結果</h2>
        <?php
        if (isset($_GET['height']) && isset($_GET['weight'])) {
            $height = floatval($_GET['height']);
            $weight = floatval($_GET['weight']);
            if ($height > 0 && $weight > 0) {
                $bmi = $weight / pow($height / 100, 2);
                echo "<p>身高：{$height} 公分</p>";
                echo "<p>體重：{$weight} 公斤</p>";
                echo "<p><strong>BMI：". round($bmi, 2) ."</strong></p>";

                // 顯示簡單評語
                if ($bmi < 18.5) {
                    echo "<p>💧 體重過輕，要多吃一點喔！</p>";
                } elseif ($bmi < 24) {
                    echo "<p>🌸 體重正常，保持得很好！</p>";
                } else {
                    echo "<p>🔥 體重過重，記得多活動運動喔～</p>";
                }
            } else {
                echo "<p>請輸入正確的身高與體重！</p>";
            }
        } else {
            echo "<p>請從表單進入本頁～</p>";
        }
        ?>
        <br><br>
        <a href="bmi.php">重新計算</a> |
        <a href="index.html">回首頁</a>
    </div>
</body>
</html>
