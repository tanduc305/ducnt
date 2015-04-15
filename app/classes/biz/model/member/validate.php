<?php

class Biz_Model_Member_Validate
{

	// mailsend validation
	public static function check($factory)
	{
		$val = Validation::forge($factory);
		if ($factory == 'login')
		{
			self::set_email($factory,$val);
			self::set_password($factory,$val);
			return $val;
		}
		if ($factory == 'mailsend')
		{
			self::set_email($factory,$val);
			self::set_alias($factory,$val);
			return $val;
		}
		if ($factory == 'input')
		{
			self::set_email($factory,$val);
			self::set_alias($factory,$val);
			self::set_password_temp($factory,$val);
			self::set_password($factory,$val);
			self::set_password_re($factory,$val);
			return $val;
		}
		// password reminder mailaddress input
		if ($factory == 'remind')
		{
			self::set_email($factory,$val);
			return $val;
		}
		// password reminder password input
		if ($factory == 'remindinput')
		{
			self::set_password($factory,$val);
			self::set_password_re($factory,$val);
			return $val;
		}
	}

	// login
	public static function login($val)
	{
		$member = Biz_Model_Member_Select::find_by_email($val->validated('email'));
		if ($member == null || $member->password != md5($val->validated('password')))
		{
			return null;
		}
		return $member;
	}

	// login
	public static function remind($val)
	{
		return Biz_Model_Member_Select::find_by_email($val->validated('email'));
	}

	// vadalite email
	public static function set_email($factory,&$val)
	{
		if ($factory == "login" || $factory == "remind")
		{
			$val->add('email', 'メールアドレス')
				->add_rule('required')
				->add_rule(function($form) { return mb_convert_kana($form, 'a');})
				->add_rule('valid_email')
				->add_rule('max_length',255);
			return;
		}

		$val->add('email', 'メールアドレス')
			->add_rule('required')
			->add_rule(function($form) { return mb_convert_kana($form, 'a');})
			->add_rule('valid_email')
			->add_rule('max_length',255)
			->add_rule(array('already_exists' => function($val) {
				$member = Model_Member::find_by_email($val);
				return $member == null ? true:false;
			}));
	}
	// vadalite nickname
	public static function set_alias($factory,&$val)
	{
		$val->add('alias', 'ニックネーム')
			->add_rule('required')
			->add_rule(function($form) { return mb_convert_kana($form, 'a');})
			->add_rule('max_length',256)
			->add_rule(array('already_exists' => function($val) {
				$member = Model_Member::find_by_name($val);
				return $member == null ? true:false;
			}));
	}
	// vadalite password_temp
	public static function set_password_temp($factory,&$val)
	{
		$val->add('password_temp', '仮パスワード')
			->add_rule('required')
			->add_rule('max_length',256)
			->add_rule(array('password_temp_mismatch' => function($val) {
				$mail_hash = Input::get('h','');
				if (empty($mail_hash))
				{
					return true;
				}
				$member = Model_MemberTemp::find_by_mail_hash($mail_hash);
				return $member->password_temp == $val ? true:false;
			}));
	}
	// vadalite password
	public static function set_password($factory,&$val)
	{
		$val->add('password', 'パスワード')
			->add_rule('min_length',6)
			->add_rule('required')
			->add_rule('max_length',256);
	}
	public static function set_password_re($factory,&$val)
	{
		$val->add('password_re', 'パスワード確認用')
			->add_rule('required')
			->add_rule('min_length',6)
			->add_rule('max_length',256)
			->add_rule('match_field','password');
	}
}
