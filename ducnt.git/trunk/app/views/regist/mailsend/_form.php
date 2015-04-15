<table class="refineTable">
	<thead>
		<tr>
			<th colspan="2">ヨコチケ会員登録</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>メールアドレス</th>
			<td>
				<?php echo Form::input('email', Session::get_flash('email',''), array('class'=>'text150')); ?>
			</td>
		</tr>
		<tr>
			<th>ニックネーム</th>
			<td>
				<?php echo Form::input('alias', Session::get_flash('alias',''), array('class'=>'text150')); ?>
			</td>
		</tr>
	</tbody>
</table>
