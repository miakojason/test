    <?php
    if (isset($_GET['month'])) {
        $month = $_GET['month'];
    } else {
        $month = date('m');
    }

    switch ($month) {
        case "01":
            $Bg = "bg01.jpg";
            break;
        case "02":
            $Bg = "bg02.jpg";
            break;
        case "03":
            $Bg = "bg03.jpg";
            break;
        case "04":
            $Bg = "bg04.jpg";
            break;
        case "05":
            $Bg = "bg05.jpg";
            break;
        case "06":
            $Bg = "bg06.jpg";
            break;
        case "07":
            $Bg = "bg07.jpg";
            break;
        case "08":
            $Bg = "bg08.jpg";
            break;
        case "09":
            $Bg = "bg09.jpg";
            break;
        case "10":
            $Bg = "bg10.jpg";
            break;
        case "11":
            $Bg = "bg11.jpg";
            break;
        case "12":
            $Bg = "bg12.jpg";
            break;
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#">
    <title>萬年曆作業</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
        background-image: url(./imgs/<?php echo $Bg; ?>);
        background-size: cover;
        }
        #timebox{
            box-sizing: border-box;
            width: 200px;
            height: 40px;
            padding-top: 8px;
            margin-top: 5px;
            font-size: 20px;
            font-family: "標楷體";
            font-weight: bold;
            text-align: center;
            border-radius: 30px;
            opacity: 0.7;
            background-color: white;
            /* background-color:aqua ; */
        }
        .container{
            width: 33%;
            /* background-color: aqua; */
        }
        a{
            width: 150px;
            height: 50px;
        font-size: 30px;
        }
        
    </style>
    </head>
    <body onload="ShowTime()">
    <!-- 時間動態 -->
    <script language="JavaScript">
            function ShowTime(){
            var NowDate=new Date();
            var h=NowDate.getHours();
            var m=NowDate.getMinutes();
            var s=NowDate.getSeconds();
            document.getElementById('timebox').innerHTML = h+'時'+m+'分'+s+'秒';
            setTimeout('ShowTime()',1000);
            }
            </script>
    <h1 class="h1-1">萬年曆</h1>  
        <?php
        if (isset($_GET['month']) && isset($_GET['year'])) {
            $month = $_GET['month'];
            $year = $_GET['year'];
        } else {
            $month = date('m');
            $year = date("Y");
        }
        echo "<header>";
        echo "<h1>";
        echo date("西元{$year}年{$month}月");
        echo "</h1>";
        echo "</header>";
        $thisFirstDay = date("{$year}-{$month}-1");
        $thisFirstDate = date('w', strtotime($thisFirstDay));
        $thisMonthDays = date("t");
        $thisLastDay = date("{$year}-{$month}-$thisMonthDays");
        $weeks = ceil(($thisMonthDays + $thisFirstDate) / 7);
        $firstCell = date("Y-m-d", strtotime("-$thisFirstDate days", strtotime($thisFirstDay)));
        ?>
        <div class="container">
            <?php
            $nextYear = $year;
            $prevYear = $year;
            if (($month + 1) > 12) {
                $next = 1;
                $nextYear = $year + 1;
            } else {
                $next = $month + 1;
            }

            if (($month - 1) < 1) {
                $prev = 12;
                $prevYear = $year - 1;
            } else {
                $prev = $month - 1;
            }

            ?>
            <a href="?year=<?= $prevYear; ?>&month=<?= $prev; ?>">上一個月</a>
            <div id="timebox"></div>
            <a href="?year=<?= $nextYear; ?>&month=<?= $next; ?>">下一個月</a>
        </div>
        <div class="box">
            <div class="box1">
                <div class="box1-1">
            <marquee behavior="" direction="right" ScrollAmount="10">
                <marquee behavior="Alternate" direction="up" width="40" height="200" ScrollAmount="26">龍</marquee>
                <marquee behavior="Alternate" direction="up" width="40" height="200" ScrollAmount="24">之</marquee>
                <marquee behavior="Alternate" direction="up" width="40" height="200" ScrollAmount="22">中</marquee>
                <marquee behavior="Alternate" direction="up" width="40" height="200" ScrollAmount="20">人</marquee>
                <marquee behavior="Alternate" direction="up" width="40" height="200" ScrollAmount="16">拳</marquee>
                <marquee behavior="Alternate" direction="up" width="40" height="200" ScrollAmount="18">神</marquee>
                <marquee behavior="Alternate" direction="up" width="40" height="200" ScrollAmount="14">斗</marquee>
                <marquee behavior="Alternate" direction="up" width="40" height="200" ScrollAmount="12">北</marquee>
            </marquee>
            </div>
            </div>
            <div class="box2">
        <table>
            <tr>
                <th>日</th>
                <th>一</th>
                <th>二</th>
                <th>三</td>
                <th>四</td>
                <th>五</th>
                <th>六</th>
            </tr>
            <?php
            for ($i = 0; $i < $weeks; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 7; $j++) {
                    $addDays = 7 * $i + $j;
                    $thisCellDate = strtotime("+$addDays days", strtotime($firstCell));
                    if (date("Y-m-d", $thisCellDate) == date("Y-m-d")) {
                         // 檢查是否為今天的日期
                        echo "<td style='background-color: blue; color: white;'>";
                    }
                    elseif (date('w', $thisCellDate) == 0 || date('w', $thisCellDate) == 6) {
                        echo "<td style='color:red'>";
                    } else {
                        echo "<td>";
                    }
                    if (date("m", $thisCellDate) == date("m", strtotime($thisFirstDay))) {
                        echo date("j", $thisCellDate);
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
            ?>
    </div>
            <div class="box3">
            <!-- 這一行會bug直接調出去範圍，應該是字太多超出width範圍導致的-->
            <marquee behavior="" direction="down" width="40" height="650" ScrollAmount="24">雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨</marquee>
            <marquee behavior="" direction="down" width="40" height="650" ScrollAmount="5">雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨</marquee>
            <marquee behavior="" direction="down" width="40" height="650" ScrollAmount="16">雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨</marquee>
            <marquee behavior="" direction="down" width="40" height="650" ScrollAmount="20">雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨</marquee>
            <marquee behavior="" direction="down" width="40" height="650" ScrollAmount="8">雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨</marquee>
            <marquee behavior="" direction="down" width="40" height="650" ScrollAmount="18">雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨</marquee>
            <marquee behavior="" direction="down" width="40" height="650" ScrollAmount="9">雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨</marquee>
            <marquee behavior="" direction="down" width="40" height="650" ScrollAmount="10">雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨</marquee>
            <marquee behavior="" direction="down" width="40" height="650" ScrollAmount="16">雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨<br><br><br><br><br><br><br>雨</marquee>
            </div>
    </div>
    </body>
    </html>