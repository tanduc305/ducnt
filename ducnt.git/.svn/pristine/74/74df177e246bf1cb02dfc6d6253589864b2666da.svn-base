<?php

class Biz_Model_MemberRemind_Regist
{
	// insert mail data
	public static function insert_mail($val,$member_id,$mail_hash)
	{
		$member = Model_MemberRemind::forge();

		$member->member_id     = $member_id;
		$member->mail_hash     = $mail_hash;
		$member->is_active     = 1;

		$member->save();
	}
}
