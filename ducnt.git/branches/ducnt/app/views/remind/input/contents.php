<h1><?php echo $h1_tag; ?></h1>
新しいパスワードを入力してください。

<?php
	$error = Session::get_flash('error','');
	 if ($error != ''){
		echo '<div id="error" class="form_error">';
	 	echo $error;
		echo '</div>';
	 }
?>

<?php echo Form::open(array('action' => '/account/passward-reminder/step3/check?h='.$mail_hash, 'method' => 'post')); ?>
<input type="hidden" name="<?php echo Config::get('security.csrf_token_key'); ?>" value="<?php echo Security::fetch_token(); ?>" />

<?php echo render('remind/input/_form'); ?>

<?php echo Form::submit('btn_regist','新しいパスワードを再設定'); ?>

<?php echo Form::close(); ?>
