
<?php echo $email; ?>さま。

この手続きを完了するために、以下のリンクをクリックしてください。

<?php
	if(Input::server('HTTPS') == 'on'){
		$http = 'https://';
	}else{
		$http = 'http://';
	}
	echo $http.Input::server('HTTP_HOST').'/account/passward-reminder/step3/?h='.$hash;
?>

あなたがこのリクエストを送信されていない場合、
他のユーザーが誤ってあなたのメールアドレスを入力したことが考えれられます。
