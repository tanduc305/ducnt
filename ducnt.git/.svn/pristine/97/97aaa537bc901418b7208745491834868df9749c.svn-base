<?php
// ************************************************************************
// regist controller
// ------------------------------------------------------------------------
// [update history]
//
// 2014.06.20 create first version
// ************************************************************************
class Controller_Regist extends Controller_Base
{
	/**
	 * D-1-1:メール会員登録のメール送信 (send e-mail page)
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_mailsend()
	{
		$this->set_view();
		$this->set_seotags('mailsend');
	}
	/**
	 * D-1-1(check):メール会員登録のメール送信 (send e-mail page)
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
		$val = Biz_Model_Member_Validate::check('mailsend');
		if ($val->run())
		{
			// create hash
			$mail_hash = Str::random('alnum', 32);
			// create password
			$password = Str::random('alnum', 6);

			// insert member table
			Biz_Model_MemberTemp_Regist::insert_mail($val,$mail_hash,$password);

			// send regist mail for user
			Biz_Action_Mailsend_Mail::send($val,$mail_hash,$password);

			// redirect complete
			Response::redirect('account/register/mail-account/send/comp/');
		}
		else
		{
			Session::set_flash('error',$val->show_errors());
		}

		// set validated data to session 
		Biz_Action_Mailsend_Session::set($val);

		// redirect input view
		Response::redirect('account/register/mail-account/send/');
	}
	/**
	 * D-1-1(complete):メール会員登録のメール送信 (send e-mail page)
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_mailcomp()
	{
		$this->set_view();
		$this->set_seotags('mailsend');
	}
	/**
	 * D-2:メール会員登録の本登録入力画面
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_input()
	{
		$mail_hash = Input::get('h');
		$member_temp_array = Biz_Model_MemberTemp_Select::get_data($mail_hash);
		if ($member_temp_array == null || $member_temp_array->is_active != 1)
		{
			// redirect input view
			Response::redirect('account/register/mail-account/input/fail/');
		}

		// check back for error
		$error = Session::get_flash('error','');
		if (empty($error))
		{
			Session::set_flash('alias',$member_temp_array->alias);
			Session::set_flash('email',$member_temp_array->email);
		}

		$this->set_view();
		$this->template->set_global('mail_hash',$mail_hash);
		$this->set_seotags('mailinput');
	}
	/**
	 * D-2(check):メール会員登録の本登録入力画面
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
		$member_temp_array = Biz_Model_MemberTemp_Select::get_data($mail_hash);
		if ($member_temp_array == null || $member_temp_array->is_active != 1)
		{
			// redirect input view
			Response::redirect('account/register/mail-account/input/fail/');
		}

		// validation
		$val = Biz_Model_Member_Validate::check('input');
		if ($val->run())
		{
			// insert member table
			Biz_Model_Member_Regist::insert_member($val);

			// update member temp table
			Biz_Model_MemberTemp_Update::inactive($member_temp_array->member_id);

			// redirect complete
			Response::redirect('account/register/mail-account/fin/');
		}
		else
		{
			Session::set_flash('error',$val->show_errors());
		}

		// set validated data to session 
		Biz_Action_Registinput_Session::set($val);

		// redirect input view
		Response::redirect('account/register/mail-account/input?h='.$mail_hash);
	}
	/**
	 * D-2(fail):メール会員登録の本登録入力画面
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_inputfail()
	{
		$this->set_view();
		$this->set_seotags('mailinput');
	}
	/**
	 * D-3:メール会員登録の本登録完了画面
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_inputcomp()
	{
		$this->set_view();
		$this->set_seotags('mailinput');
	}
}
