<?php

class Biz_Model_MemberTemp_Regist
{
	// insert mail data
	public static function insert_mail($val,$mail_hash,$password_hash)
	{
		$member = Model_MemberTemp::forge();

		$member->alias         = $val->validated('alias');
		$member->email         = $val->validated('email');
		$member->password_temp = $password_hash;
		$member->mail_hash     = $mail_hash;
		$member->is_active     = 1;

		$member->save();
	}
}
