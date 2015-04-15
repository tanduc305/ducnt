<?php

class Biz_Action_Remind_Session
{

	// mailsend validation
	public static function set($val)
	{
		Session::set_flash('email',$val->validated('email'));
	}
}
