<?php

// login.php をちょっといじっただけ

session_start();

$errmsg = "";

if(isset($_POST["username"])){
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	
	$db = mysql_connect("localhost", "dbuseruser", "dbpasspass");
	if(!$db){
		exit("MySQLサーバに接続できなかった");
	}
	if(!mysql_select_db("dbnamename")){
		exit("データベースを選択できなかった");
	}
	$query = "insert into user_t (username, password) values ('$username', '$password')";
	$result = mysql_query($query);
	
	if($result){
		// 成功
		
		// セッションにログインしたことを残す
		session_regenerate_id();
		$_SESSION["username"] = $username;
		
		// ユーザIDでも残す
		$userid = mysql_insert_id();
		$_SESSION["userid"] = $userid;
		
		// ログイン後のページに移動する
		header("Location: http://localhost/folder/mypage.php");
		exit();
	}
	
	// 失敗
	$errmsg .= "ユーザ名はすでに登録されています<br>";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>新規登録ページ</title>
</head>
<body>
	<form method="post">
		<?php echo $errmsg; ?><br>
		ユーザ名<input type="text" name="username"><br>
		パスワード<input type="password" name="password"><br>
		<input type="submit" value="登録"><br>
	</form>
</body>
</html>
