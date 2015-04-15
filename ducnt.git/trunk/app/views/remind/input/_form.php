<table class="refineTable">
	<thead>
		<tr>
			<th colspan="2">ヨコチケパスワード再発行</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>新しいパスワード</th>
			<td>
				<?php echo Form::password('password', '', array('class'=>'text150')); ?>
			</td>
		</tr>
		<tr>
			<th>新しいパスワード（確認用）</th>
			<td>
				<?php echo Form::password('password_re', '', array('class'=>'text150')); ?>
			</td>
		</tr>
	</tbody>
</table>
