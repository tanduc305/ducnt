<?php

class Biz_Model_MemberTemp_Select
{
	// get information
	public static function get_data($hash)
	{
		return Model_MemberTemp::find_by_mail_hash(intval($hash));
	}
}
