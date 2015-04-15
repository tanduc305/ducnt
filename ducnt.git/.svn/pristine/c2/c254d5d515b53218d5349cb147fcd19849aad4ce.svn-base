<?php

class Biz_Model_Member_Update
{
	// insert mail data
	public static function password_remind($id, $val)
	{
		$member = Model_Member::find($id);
		if ($member != null)
		{
			$member->password     = md5($val->validated('password'));
			$member->save();
		}
	}
}
