<?php
class Controller_Index extends Controller_Base
{
    public function action_index()
	{
		$this->set_view();
		$this->set_seotags('index');   
        $counties = DB::select('*')
           ->from('gazetteer')
           ->as_object()
           ->execute();
        
             $data['counties_dropdown'] = array('' => 'Select a county'); // Initialise
        
             foreach ($counties as $county)
             {
                $data['counties_dropdown'][$county->county] = $county->county;
             }
             //$this->template->head = View::forge('common/head');
            //$this->template->foot = View::forge('common/foot');
		    //$this->template->header = View::forge('common/header');
		    //$this->template->footer = View::forge('common/footer');
            //$this->template->title = 'Search Page';
            $this->template->contents = View::forge('index/'.Request::active()->action.'/contents',$data);
        //$result = DB::select()->from('address')->where('address', 'LIKE', e(Input::post('content_search')).'%')->limit(10)->as_object()->execute();
        //print_r($result);
        //exit();
    }
    public function action_detail()
	{
	   echo "Input data is: ".Input::post('content_search'); 
		//$this->set_view();
		//$this->set_seotags('index');
        //$result = DB::select()->from('address')->where('address', 'LIKE', e(Input::post('content_search')).'%')->limit(10)->as_object()->execute();
        //print_r($result);
        exit();
    }
}
?>