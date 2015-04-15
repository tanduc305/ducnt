<h1><?php echo $h1_tag; ?></h1>
個人情報の取り扱いについては個人情報の取り扱いについてをご覧ください。<br />
SSL対応（入力された情報は暗号化して安全に送信いたします）

<?php
	$error = Session::get_flash('error','');
	 if ($error != ''){
		echo '<div id="error" class="form_error">';
	 	echo $error;
		echo '</div>';
	 }
?>

<?php echo Form::open(array('action' => '/account/login/check', 'method' => 'post')); ?>
<input type="hidden" name="<?php echo Config::get('security.csrf_token_key'); ?>" value="<?php echo Security::fetch_token(); ?>" />

<?php echo render('account/login/_form'); ?>

<?php echo Form::submit('btn_regist','ログイン'); ?>

<?php echo Form::close(); ?>
