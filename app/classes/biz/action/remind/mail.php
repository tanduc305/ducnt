<?php

class Biz_Action_Remind_Mail
{

	// mail send
	public static function send($val,$mail_hash)
	{
		Config::load('master');

		$email = Email::forge();
		$email->from(Config::get('email_from'));
		$email->to($val->validated('email'));
		$email->subject(Config::get('remindmail.subject'));
		$body = \View::forge('email/remindmail',array('hash'=>$mail_hash,'email'=>$val->validated('email')));
		$email->body($body);
		try{
			$email->send();
		} catch(\EmailValidationFailedException $e) {

		} catch(\EmailSendingFailedException $e) {

		}
	}
}
