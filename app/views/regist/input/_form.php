<div class="wraptable">
    <?php echo Form::open(array('action' => '/account/register/complete', 'method' => 'post')); ?>
    <input type="hidden" name="<?php echo Config::get('security.csrf_token_key'); ?>" value="<?php echo Security::fetch_token(); ?>" />
	<table class="refineTable">
    	<tbody>
        	<tr>
    			<td colspan="2">
    				<?php echo Form::input('nickname','', array('class'=>'text400', 'placeholder'=>'ニックネーム')); ?>
    			</td>
    		</tr>
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
	 			   <?php echo Form::submit('btn_regist','送信', array('class'=>'btn_regist')); ?>
    			</td>
    		</tr>
    	</tbody>
    </table>
    <table class="refineTable">
        <tbody>
            <tr>
    			<td colspan="2">
                    <a class="btn_facebook"  href="https://www.facebook.com/dialog/oauth?client_id=847199978680816&redirect_uri=http://fuelphp.anhien.com/">Facebookログイン</a>
    				<input class="btn_facebook" value="Facebookログイン" />
    			</td>
    		</tr>
        </tbody>
    </table>
<?php echo Form::close(); ?>
</div>
