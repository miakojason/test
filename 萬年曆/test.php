<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script language="JavaScript">
        function ShowTime(){
        var NowDate=new Date();
        var h=NowDate.getHours();
        var m=NowDate.getMinutes();
        var s=NowDate.getSeconds();
        document.getElementById('showbox').innerHTML = h+'時'+m+'分'+s+'秒';
        setTimeout('ShowTime()',1000);
        }
        </script>
        <body onload="ShowTime()">
        <div #="showbox"></div>
        </body>
</body>
</html>