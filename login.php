<?php

session_start();

$errmsg = "";

if(isset($_POST["username"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$db = mysql_connect("localhost", "dbuseruser", "dbpasspass");
	if(!$db){
		exit("MySQLサーバに接続できなかった");
	}
	if(!mysql_select_db("dbnamename")){
		exit("データベースを選択できなかった");
	}
	$query = "select * from user_t where username = '$username' and password = '$password'";
	$result = mysql_query($query);
	
	if(mysql_num_rows($result) !== 0){
		// 成功
		
		// セッションにログインしたことを残す
		session_regenerate_id();
		$_SESSION["username"] = $username;
		
		// ユーザIDでも残す
		$row = mysql_fetch_array($result);
		$_SESSION["userid"] = $row["userid"];
		
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
