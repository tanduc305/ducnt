<?php

class Biz_Action_Registinput_Session
{

	// mailsend validation
	public static function set($val)
	{
		Session::set_flash('alias',$val->validated('alias'));
		Session::set_flash('email',$val->validated('email'));
	}
}
