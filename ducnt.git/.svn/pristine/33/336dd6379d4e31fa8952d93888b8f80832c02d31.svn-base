<?php

class Biz_Model_MemberTemp_Update
{
	// insert mail data
	public static function inactive($id)
	{
		$member = Model_MemberTemp::find($id);
		if ($member != null)
		{
			$member->is_active     = 0;
			$member->registed_at   = DB::expr('now()');
			$member->save();
		}
	}
}
