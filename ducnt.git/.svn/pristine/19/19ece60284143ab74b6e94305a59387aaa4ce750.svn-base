<?php

class Biz_Action_Login_Session
{

	// mailsend validation
	public static function set($val)
	{
		Session::set_flash('email',$val->validated('email'));
		Session::set_flash('password',$val->validated('password'));
	}
}
