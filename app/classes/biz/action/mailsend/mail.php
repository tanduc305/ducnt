<?php

class Biz_Action_Mailsend_Mail
{

	// mail send
	public static function send($val,$mail_hash,$password)
	{
		Config::load('master');

		$email = Email::forge();
		$email->from(Config::get('email_from'));
		$email->to($val->validated('email'));
		$email->subject(Config::get('registmail.subject'));
		$body = \View::forge('email/registmail',array('hash'=>$mail_hash,'email'=>$val->validated('email'),'password'=>$password));
		$email->body($body);
		try{
			$email->send();
		} catch(\EmailValidationFailedException $e) {

		} catch(\EmailSendingFailedException $e) {

		}
	}
}
