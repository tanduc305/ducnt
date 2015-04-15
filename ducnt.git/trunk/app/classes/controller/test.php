<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Test extends Controller_Base
{
	/**
	 * Regist
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_regist()
	{
		$this->set_view();
		$this->template->set_global('title', 'test title');
		$this->template->set_global('h1_tag', 'test h1');
	}


	/**
	 * Regist Input Data Check
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_check()
	{
		// Post Check
		if (Input::method() != 'POST')
		{
			Response::redirect('test/regist');
			exit;
		}
		// input field list
		$fields = array('name','email');

		// validate
		$val =  Biz_Model_Test_Validate::validate('create');
		if ($val->run())
		{
			// redirect input view
			Response::redirect('test/complete');
		}
		else
		{
			// validate error
			Session::set_flash('error', $val->show_errors());
		}
		// set field
		foreach ($fields as $field) {
			Session::set_flash($field, $val->validated($field));
		}
		// redirect input view
		Response::redirect('test/regist');
	}

	/**
	 * Regist Complete
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_complete()
	{
		$this->set_view();
		$this->template->set_global('title', 'complete title');
		$this->template->set_global('h1_tag', 'complete h1');
	}
}
