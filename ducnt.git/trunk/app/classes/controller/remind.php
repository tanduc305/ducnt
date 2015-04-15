<?php
// ************************************************************************
// mail reminder controller
// ------------------------------------------------------------------------
// [update history]
//
// 2014.06.20 create first version
// ************************************************************************
class Controller_Remind extends Controller_Base
{
	/**
	 * H-4-1:パスワードリマインダー (input mailadress)
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_mail()
	{
		$this->set_view();
		$this->set_seotags('remind');
	}
	/**
	 * H-4-1:パスワードリマインダー (input mailadress)
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_mailcheck()
	{
		// only POST method
		if (Input::method() != 'POST')
		{
			Response::redirect('/');
		}

		// CSRF check
		if(!\Security::check_token()){
			Response::redirect('/');
		}

		// validation
		$val = Biz_Model_Member_Validate::check('remind');
		if ($val->run())
		{
			$ret = Biz_Model_Member_Validate::remind($val);
			if ($ret != null)
			{
				// create hash
				$mail_hash = Str::random('alnum', 32);

				// insert member remind table
				Biz_Model_MemberRemind_Regist::insert_mail($val,$ret->member_id,$mail_hash);

				// send regist mail for user
				Biz_Action_Remind_Mail::send($val,$mail_hash);

				// redirect input view
				Response::redirect('/account/passward-reminder/step2/');
			}
			else
			{
				Session::set_flash('error','メールアドレスが未登録です。');
			}
		}
		else
		{
			Session::set_flash('error',$val->show_errors());
		}

		// set validated data to session 
		Biz_Action_Remind_Session::set($val);

		// redirect input view
		Response::redirect('/account/passward-reminder/step1/');
	}
	/**
	 * H-4-2-1:メール送信完了 (send e-mail page)
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_mailcomp()
	{
		$this->set_view();
		$this->set_seotags('remind');
	}
	/**
	 * H-4-3:パスワード再発行 (input passward)
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_input()
	{
		$mail_hash = Input::get('h');
		$member_remind_array = Biz_Model_MemberRemind_Select::get_data($mail_hash);
		if ($member_remind_array == null || $member_remind_array->is_active != 1)
		{
			// redirect input view
			Response::redirect('account/passward-reminder/fail/');
		}

		$this->set_view();
		$this->template->set_global('mail_hash',$mail_hash);
		$this->set_seotags('remind');
	}
	/**
	 * H-4-3(check):パスワード再発行 (input passward)
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_inputcheck()
	{
		// only POST method
		if (Input::method() != 'POST')
		{
			Response::redirect('/');
		}

		// CSRF check
		if(!\Security::check_token()){
			Response::redirect('/');
		}

		$mail_hash = Input::get('h');
		$member_remind_array = Biz_Model_MemberRemind_Select::get_data($mail_hash);
		if ($member_remind_array == null || $member_remind_array->is_active != 1)
		{
			// redirect input view
			Response::redirect('account/passward-reminder/fail/');
		}

		// validation
		$val = Biz_Model_Member_Validate::check('remindinput');
		if ($val->run())
		{
			// insert member table
			Biz_Model_Member_update::password_remind($member_remind_array->member_id,$val);

			// update member temp table
			Biz_Model_MemberRemind_Update::inactive($member_remind_array->remind_id);

			// redirect complete
			Response::redirect('account/passward-reminder/fin/');
		}
		else
		{
			Session::set_flash('error',$val->show_errors());
		}

		// set validated data to session 
		Biz_Action_Registinput_Session::set($val);

		// redirect input view
		Response::redirect('account/passward-reminder/step3/?h='.$mail_hash);
	}
	/**
	 * H-4-3(fail):パスワード再発行 (input passward)
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_inputfail()
	{
		$this->set_view();
		$this->set_seotags('remind');
	}
	/**
	 * H-4-4:完了(finsh)
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_inputcomp()
	{
		$this->set_view();
		$this->set_seotags('remind');
	}
}
