<?php

class Biz_Model_MemberRemind_Update
{
	// insert mail data
	public static function inactive($id)
	{
		$member = Model_MemberRemind::find($id);
		if ($member != null)
		{
			$member->is_active     = 0;
			$member->registed_at   = DB::expr('now()');
			$member->save();
		}
	}
}
