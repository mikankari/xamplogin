<?php

session_start();
$username = $_SESSION["username"];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>マイページ</title>
</head>
<body>
<?php
	if($username){
		echo "ようこそ" . $username . "さん<br>";
		echo "<a href=\"logout.php\">ログアウトする</a>";
	}else{
		echo "ちゃんとログインページから来なさい";
	}
?>
</body>
</html>
