<!--table class="refineTable">
	<thead>
		<tr>
			<th colspan="2">ログイン</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>メールアドレス</th>
			<td>
				< ?php echo Form::input('email', Session::get_flash('email',''), array('class'=>'text150')); ?>
			</td>
		</tr>
		<tr>
			<th>パスワード</th>
			<td>
				< ?php echo Form::password('password', '', array('class'=>'text150')); ?>
			</td>
		</tr>
	</tbody>
</table-->
<div class="wraptable">
    <?php echo Form::open(array('action' => '/account/login/check', 'method' => 'post')); ?>
    <input type="hidden" name="<?php echo Config::get('security.csrf_token_key'); ?>" value="<?php echo Security::fetch_token(); ?>" />
	<table class="refineTable">
    	<tbody>
	   	   <tr>
    			<td colspan="2">
    				<?php echo Form::input('email', '', array('class'=>'text400', 'placeholder'=>'メールアドレス')); ?>
    			</td>
    		</tr>
    		<tr>
    			 <td colspan="2">
    				<?php echo Form::password('password', '', array('class'=>'text400', 'placeholder'=>'パスワード')); ?>
    			</td>
    		</tr>
            <tr>
    			<td colspan="2">
                    <?php echo Form::submit('btn_regist','ログイン', array('class'=>'btn_regist')); ?>
    			</td>
    		</tr>
    	</tbody>
    </table>
    <table class="refineTable">
        <tbody>
            <tr>
    			<td colspan="2">
    				<input class="btn_facebook" value="Facebookログイン" />
    			</td>
    		</tr>
        </tbody>
    </table>
<?php echo Form::close(); ?>
</div>

