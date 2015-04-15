
<?php echo $email; ?>さま。

この手続きを完了するために、以下のリンクをクリックしてください。

<?php
	if(Input::server('HTTPS') == 'on'){
		$http = 'https://';
	}else{
		$http = 'http://';
	}
	echo $http.Input::server('HTTP_HOST').'/account/register/mail-account/input/?h='.$hash;
?>

登録パスワード:<?php echo $password; ?>

あなたがこのリクエストを送信されていない場合、
他のユーザーが誤ってあなたのメールアドレスを入力したことが考えれられます。
