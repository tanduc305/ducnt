<?php
// ************************************************************************
// account controller
// ------------------------------------------------------------------------
// [update history]
//
// 2014.06.20 create first version
// ************************************************************************
class Controller_Account extends Controller_Base
{
	/**
	 *  :ログインページ (login page)
	 *
	 * @access  public
	 * @return  Response
	 */
    public function action_mypage()
    {
        $this->set_view();
		$this->set_seotags('mypage');
    }
	public function action_login()
	{
		$this->set_view();
		$this->set_seotags('login');
	}
	/**
	 *  :ログインページ (login page)
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_logincheck()
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
		$val = Biz_Model_Member_Validate::check('login');
            
		if ($val->run())
		{
			$ret = Biz_Model_Member_Validate::login($val);
			if ($ret != null)
			{
                Session::set('email', $val->validated('email'));
                Response::redirect('account/mypage');
			}
			else
			{
				Session::set_flash('error','メールアドレスまたはパスワードが異なります。');
			}
		}
		else
		{
			Session::set_flash('error',$val->show_errors());
		}

		// set validated data to session 
		Biz_Action_Login_Session::set($val);

		// redirect input view
		Response::redirect('account/login/');
	}
    public function action_logout()
    {
        $IDemail = Session::get('email','');
        if(isset($IDemail) && $IDemail != '')
        {
            Session::delete('email');
        }
        Response::redirect('/');
    }
}
