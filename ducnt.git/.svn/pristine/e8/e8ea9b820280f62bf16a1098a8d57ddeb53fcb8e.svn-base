<?php

class Biz_Model_Member_Regist
{
	// insert mail data
	public static function insert_member($val)
	{
		$member = Model_Member::forge();

		$member->alias         = $val->validated('alias');
		$member->email         = $val->validated('email');
		$member->name          = '';
		$member->name_kana     = '';
		$member->kana          = '';
		$member->password      = md5($val->validated('password'));
		$member->password_temp = md5($val->validated('password_temp'));
		$member->member_status = 0;
		$member->score_plus    = 0;
		$member->score_minus   = 0;
		$member->is_active     = 1;

		$member->save();
	}
}
