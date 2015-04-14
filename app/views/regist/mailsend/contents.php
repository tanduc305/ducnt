<h1><?php echo $h1_tag; ?></h1>


<?php
	$error = Session::get_flash('error','');
	 if ($error != ''){
		echo '<div id="error" class="form_error">';
	 	echo $error;
		echo '</div>';
	 }
?>

<?php echo Form::open(array('action' => '/account/register/mail-account/send/check', 'method' => 'post')); ?>
<input type="hidden" name="<?php echo Config::get('security.csrf_token_key'); ?>" value="<?php echo Security::fetch_token(); ?>" />

<?php echo render('regist/mailsend/_form'); ?>

<?php echo Form::submit('btn_regist','送信する'); ?>

<?php echo Form::close(); ?>
