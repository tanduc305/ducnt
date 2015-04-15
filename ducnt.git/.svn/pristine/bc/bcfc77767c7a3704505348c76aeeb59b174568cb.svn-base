<?php
// ************************************************************************
// base controller
// ------------------------------------------------------------------------
// [update history]
//
// 2014.06.20 create first version
// ************************************************************************
class Controller_Base extends Controller_Template
{
	public function set_view()
	{
		$controller_name = strtolower(str_replace('Controller_','',Request::main()->controller));

		// read common header and footer
		$this->template->head = View::forge('common/head');
		$this->template->foot = View::forge('common/foot');
		$this->template->header = View::forge('common/header');
		$this->template->footer = View::forge('common/footer');

		// read /app/views/controller_name/action_name/contents.php
		$this->template->contents = View::forge($controller_name.'/'.Request::active()->action.'/contents');

		$file_array=array('head','header','footer');
		foreach ($file_array as $f) {
			$name = 'org_'.$f;
			// check /app/views/controller_name/action_name/xxx.php is exists?
			if (file_exists(APPPATH.'/views/'.$controller_name.'/'.Request::active()->action.'/'.$f.'.php')){
				// read /app/views/controller_name/action_name/xxx.php
				$this->template->$name = View::forge($controller_name.'/'.Request::active()->action.'/'.$f);
			} else {
				// read /app/views/controller_name/xxx.php
				$this->template->$name = View::forge($controller_name.'/'.$f);
			}
		}
	}
	public function set_seotags($name)
	{
		Config::load('seotags');
		$tag = Config::get($name);

		$this->template->set_global('title',$tag['title']);
		$this->template->set_global('keyword',$tag['keyword']);
		$this->template->set_global('description',$tag['description']);
		$this->template->set_global('h1_tag',$tag['h1_tag']);
	}
}
