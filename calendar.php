<?php

echo '<script>
    if (document.cookie.indexOf("is_adult=true") === -1) {
        if(!confirm("以下畫面可能會瑟瑟  請問你滿18了嗎?")) {
            window.location.href = "https://tw.yahoo.com";
        } else {
            document.cookie = "is_adult=true; max-age=86400; path=/";
        }
    }
</script>';

// 女優生日資料
$actress = [
    ["name"=>"七沢みあ","birth"=>"1997-01-16","img"=>"./images/1.jpg"],
    ["name"=>"大槻ひびき","birth"=>"1988-01-21","img"=>"./images/2.jpg"],
    ["name"=>"橋本ありな","birth"=>"1996-02-15","img"=>"./images/3.jpg"],
    ["name"=>"蓮実クレア","birth"=>"1988-02-12","img"=>"./images/4.jpg"],
    ["name"=>"小島みなみ","birth"=>"1992-03-14","img"=>"./images/5.jpg"],
    ["name"=>"紗倉まな","birth"=>"1993-03-23","img"=>"./images/6.jpg"],
    ["name"=>"篠田ゆう","birth"=>"1989-04-12","img"=>"./images/7.jpg"],
    ["name"=>"明日花キララ","birth"=>"1988-04-19","img"=>"./images/8.jpg"],
    ["name"=>"市川まさみ","birth"=>"1991-05-24","img"=>"./images/9.jpg"],
    ["name"=>"河北彩花","birth"=>"1998-05-30","img"=>"./images/10.jpg"],
    ["name"=>"松本いちか","birth"=>"2000-02-19","img"=>"./images/11.jpg"],
    ["name"=>"深田えいみ","birth"=>"1988-06-18","img"=>"./images/12.jpg"],
    ["name"=>"蕾（つぼみ，Tsubomi）","birth"=>"1988-06-19","img"=>"./images/l.jpg"],
    ["name"=>"相沢みなみ","birth"=>"1994-07-14","img"=>"./images/13.jpg"],
    ["name"=>"伊藤舞雪","birth"=>"1998-07-14","img"=>"./images/14.jpg"],
    ["name"=>"三上悠亜","birth"=>"1993-08-16","img"=>"./images/15.jpg"],
    ["name"=>"橋本れいか","birth"=>"1998-08-03","img"=>"./images/16.jpg"],
    ["name"=>"春咲りょう","birth"=>"1995-09-03","img"=>"./images/17.jpg"],
    ["name"=>"石原希望","birth"=>"2000-09-12","img"=>"./images/18.jpg"],
    ["name"=>"葵つかさ","birth"=>"1990-10-25","img"=>"./images/19.jpg"],
    ["name"=>"東條なつ","birth"=>"1999-10-26","img"=>"./images/20.jpg"],
    ["name"=>"白石茉莉奈","birth"=>"1986-11-15","img"=>"./images/21.jpg"],
    ["name"=>"小宵こなん","birth"=>"1999-11-11","img"=>"./images/22.jpg"],
    ["name"=>"天海つばさ","birth"=>"1988-12-08","img"=>"./images/24.jpg"],
    ["name"=>"小倉由菜","birth"=>"1998-12-28","img"=>"./images/25.jpg"]
];

// 年月
$year = isset($_GET['year']) ? intval($_GET['year']) : date("Y");
$month = isset($_GET['month']) ? intval($_GET['month']) : date("m");
$prevMonth = ($month==1)?12:$month-1;
$nextMonth = ($month==12)?1:$month+1;
$prevYear = ($month==1)?$year-1:$year;
$nextYear = ($month==12)?$year+1:$year;

// 日曆計算
$firstDay = date("w", strtotime("$year-$month-01"));
$totalDay = date("t", strtotime("$year-$month-01"));

function getBirthdays($year,$month,$day,$actress){
    $list=[];
    $dateStr=sprintf("%02d-%02d",$month,$day);
    foreach($actress as $a){
        if(substr($a["birth"],5)==$dateStr) $list[]=$a;
    }
    return $list;
}

function getMonthActress($month,$actress){
    $list=[];
    foreach($actress as $a){
        if(intval(substr($a["birth"],5,2))==$month) $list[]=$a;
    }
    return $list;
}

$monthActress = getMonthActress($month,$actress);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>女優生日行事曆</title>
<style>
/* 背景 */
body {
    margin: 0;
    padding: 0;
    font-family: Arial,sans-serif;
    background-image: url('./images/bg.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    min-height: 100vh;
    color: #333;
}

/* 控制列 */
.control-bar { max-width:520px; margin:0 auto 12px auto; display:flex; justify-content:center; align-items:center; gap:10px; }
.control-bar a { padding:6px 12px; background:#e5e5e5; border-radius:6px; text-decoration:none; color:#333; font-size:18px; font-weight:bold; }
.control-bar select { padding:6px 10px; font-size:16px; }

/* 日曆容器 */
.container { display:flex; max-width:900px; margin:0 auto; gap:20px; }

/* 日曆表格 */
table { border-collapse: collapse; width: 60%; table-layout: fixed; background: rgba(255,255,255,0.7); box-shadow: 0 4px 12px rgba(0,0,0,0.2);}
th, td { border:1px solid #aaa; padding:5px; height:100px; text-align:right; vertical-align:top; overflow:hidden; }
th { background: linear-gradient(45deg,#ff9a9e,#fad0c4); color:#333; }
td strong { display:block; margin-bottom:3px; color:#d81b60; font-weight:bold; }
.has-birthday { background: linear-gradient(135deg,#ffeaea,#ffd1dc); border:2px solid #ff4081; }
td:hover { background: rgba(255, 64, 129, 0.1); transition: background 0.3s ease; }

/* 生日列表 */
.birth-list { display:flex; flex-direction:column; gap:2px; align-items:flex-start; max-height:65px; overflow:hidden; }
.birth-list img { width:30px; height:30px; border-radius:50%; object-fit:cover; }
.note { color: #c2185b; font-size:10px; cursor:pointer; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }

/* 本月女優大框 */
.month-actress { width:40%; display:flex; flex-wrap:wrap; gap:10px; background: rgba(255, 255, 255, 0); padding:10px; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.2);}
.month-actress .card { flex:0 0 30%; display:flex; justify-content:center; align-items:center; cursor:pointer; }
.month-actress .card img { width:100px; height:100px; border-radius:50%; object-fit:cover; transition: transform 0.3s ease; }
.month-actress .card img:hover { transform: scale(1.15); }

/* Modal */
.modal { display:none; position:fixed; z-index:999; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.6); justify-content:center; align-items:center; }
.modal-content { background:white; padding:20px; border-radius:10px; text-align:center; width:350px; position:relative; }
.modal-content img { width:100%; border-radius:0; object-fit:cover; }
.close { position:absolute; top:8px; right:12px; font-size:20px; cursor:pointer; }

/* hover 微放大 */
td img { transition: transform 0.3s ease; }
td img:hover { transform: scale(1.15); }
</style>
</head>
<body>

<form class="control-bar" method="get">
    <a href="?year=<?=$prevYear?>&month=<?=$prevMonth?>">&laquo;</a>
    <select name="month" onchange="this.form.submit()">
        <?php for($m=1;$m<=12;$m++): ?>
            <option value="<?=$m?>" <?=($m==$month)?'selected':''?>><?=$m?> 月</option>
        <?php endfor; ?>
    </select>
    <select name="year" onchange="this.form.submit()">
        <?php for($y=2020;$y<=2030;$y++): ?>
            <option value="<?=$y?>" <?=($y==$year)?'selected':''?>><?=$y?> 年</option>
        <?php endfor; ?>
    </select>
    <a href="?year=<?=$nextYear?>&month=<?=$nextMonth?>">&raquo;</a>
</form>

<h2 style="text-align:center; color:white; text-shadow:1px 1px 4px #000;"><?=$year?> 年 <?=$month?> 月 女優生日行事曆</h2>

<div class="container">
    <!-- 日曆 -->
    <table>
    <tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr>
    <tr>
    <?php
    for($i=0;$i<$firstDay;$i++) echo "<td></td>";
    for($day=1;$day<=$totalDay;$day++){
        $birthList=getBirthdays($year,$month,$day,$actress);
        $classToday=!empty($birthList)?"has-birthday":"";        
        echo "<td class='$classToday'><strong>$day</strong>";
        if(!empty($birthList)){
            echo "<div class='birth-list'>";
            foreach($birthList as $b){
                $id="modal_".$year."_".$month."_".$day."_".md5($b["name"]);
                echo "<img src='".$b["img"]."' alt='".$b["name"]."'>";
                echo "<span class='note' onclick=\"document.getElementById('$id').style.display='flex';\">".$b["name"]."</span>";
            }
            echo "</div>";
        }
        echo "</td>";
        if(($firstDay+$day)%7==0) echo "</tr><tr>";
    }
    ?>
    </tr>
    </table>

    <!-- 本月女優大框 -->
    <div class="month-actress">
        <?php foreach($monthActress as $b): 
            $id="modal_month_".md5($b["name"]);
        ?>
        <div class="card" onclick="document.getElementById('<?=$id?>').style.display='flex';">
            <img src="<?=$b["img"]?>" alt="<?=$b["name"]?>">
        </div>
        <div id="<?=$id?>" class="modal" onclick="this.style.display='none'">
            <div class="modal-content" onclick="event.stopPropagation();">
                <span class="close" onclick="document.getElementById('<?=$id?>').style.display='none'">&times;</span>
                <img src="<?=$b["img"]?>" alt="<?=$b["name"]?>">
                <strong><?=$b["name"]?></strong>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- 所有日曆 Modal -->
<?php
for($day=1;$day<=$totalDay;$day++){
    $birthList=getBirthdays($year,$month,$day,$actress);
    if(!empty($birthList)){
        foreach($birthList as $b){
            $id="modal_".$year."_".$month."_".$day."_".md5($b["name"]);
            echo "<div id='$id' class='modal' onclick='this.style.display=\"none\"'>
                    <div class='modal-content' onclick='event.stopPropagation();'>
                        <span class='close' onclick='document.getElementById(\"$id\").style.display=\"none\"'>&times;</span>
                        <img src='".$b["img"]."' alt='".$b["name"]."'>
                        <strong>".$b["name"]."</strong>
                    </div>
                  </div>";
        }
    }
}
?>
</body>
</html>
