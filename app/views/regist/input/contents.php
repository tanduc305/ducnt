<h1><?php echo $h1_tag; ?></h1>

<?php
	$error = Session::get_flash('error','');
	 if ($error != ''){
		echo '<div id="error" class="form_error">';
	 	echo $error;
		echo '</div>';
	 }
?>
<?php echo render('regist/input/_form'); ?>
