<?php

class Biz_Model_Test_Validate
{
	public static function validate($factory)
	{
		$val = Validation::forge($factory);

		$val->add('name', 'name')
			->add_rule('required')
			->add_rule('max_length',255);

		$val->add('email', 'mail')
			->add_rule('required')
			->add_rule('valid_email')
			->add_rule('max_length',255);

		return $val;
	}
}
