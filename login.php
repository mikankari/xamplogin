<?php

$errmsg = "";

if(isset($_POST["username"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	if($username == "useruser" && $password == "passpass"){
		// 成功
		
		// ログイン後のページに移動する
		header("Location: http://localhost/folder/mypage.php");
		exit();
	}
	
	// 失敗
	$errmsg .= "ユーザ名またはパスワードが違います<br>";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ログインページ</title>
</head>
<body>
	<form method="post">
		<?php echo $errmsg; ?><br>
		ユーザ名<input type="text" name="username"><br>
		パスワード<input type="password" name="password"><br>
		<input type="submit" value="ログイン"><br>
	</form>
</body>
</html>
