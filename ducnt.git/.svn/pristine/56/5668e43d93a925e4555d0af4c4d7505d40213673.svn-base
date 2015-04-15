<h1><?php echo $h1_tag; ?></h1>


<?php
	 if ($error = Session::get_flash('error','') != ''){
		echo '<div id="error" class="form_error">';
	 	echo $error;
		echo '</div>';
	 }
?>

<?php echo Form::open(array('action' => '/test/check', 'method' => 'post')); ?>

<table class="refineTable">
	<thead>
		<tr>
			<th colspan="2">member</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>name</th>
			<td>
				<?php echo Form::input('name', Session::get_flash('name',''), array('class'=>'text150')); ?>
			</td>
		</tr>
		<tr>
			<th>email</th>
			<td>
				<?php echo Form::input('email', Session::get_flash('email',''), array('class'=>'text150')); ?>
			</td>
		</tr>
	</tbody>
</table>

<?php echo Form::submit('btn_regist', 'regist'); ?>

<?php echo Form::close(); ?>
