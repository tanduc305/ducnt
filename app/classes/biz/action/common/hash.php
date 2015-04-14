<?php

class Biz_Action_Common_Hash
{
	public static function create()
	{
		return md5(date('YmdHis').rand(1,99999));
	}
}
