<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
書き込みを行います。<br>
This is a Pen. とdata.txt に書き込みます。
<?php
//文字作成
$str = date("Y-m-d H:i:s");
//File書き込み
$file = fopen("data/data.txt","a");	// ファイル読み込み
fwrite($file, $str."\n");
fclose($file);
?>


<ul>
<li><a href="#">戻る</a></li>
</ul>
</body>
</html>