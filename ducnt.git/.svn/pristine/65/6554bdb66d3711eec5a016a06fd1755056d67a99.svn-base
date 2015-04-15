<?php

class Biz_Model_Member_Select
{
	// get information
	public static function find_by_email($email)
	{
		$member = Model_Member::find_by_email($email);
		if ($member == null || $member->is_active != 1)
		{
			return null;
		}
		return $member;
	}
}
