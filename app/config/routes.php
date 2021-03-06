<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'account/register/mail-account/send'        => 'regist/mailsend',
	'account/register/mail-account/send/check'  => 'regist/mailcheck',
	'account/register/mail-account/send/comp'   => 'regist/mailcomp',
	'account/register/mail-account/input'       => 'regist/input',
	'account/register/mail-account/input/fail'  => 'regist/inputfail',
	'account/register/mail-account/input/check' => 'regist/inputcheck',
	'account/register/mail-account/fin'         => 'regist/inputcomp',

	'account/login'       => 'account/login',
	'account/login/check' => 'account/logincheck',

	'account/passward-reminder/step1'       => 'remind/mail',
	'account/passward-reminder/step1/check' => 'remind/mailcheck',
	'account/passward-reminder/step2'       => 'remind/mailcomp',
	'account/passward-reminder/step3'       => 'remind/input',
	'account/passward-reminder/step3/check' => 'remind/inputcheck',
	'account/passward-reminder/fin'         => 'remind/inputcomp',
	'account/passward-reminder/fail'        => 'remind/inputfail',
	
);