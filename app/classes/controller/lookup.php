<?php
class Controller_Lookup extends Controller {

 /**
  * The index action.
  * 
  * @access  public
  * @return  json encoded array
  */
 public function action_index()
 {

     // Note:
        // the e() function is just a wrapper for htmlentities
        $result = DB::select()->from('gazetteer')->where('town', 'LIKE', '%'.e(Input::post('term')).'%')->limit(10)->as_object()->execute();
        $data['response'] = 'true';
        $data['message'] = array();

        foreach($result as $row)
        {
          $data['message'][] = array( 'label'=> $row->town . ' - ' . $row->county,
                                      'value'=> $row->town,
                                      'county'=>$row->county);
        }
        echo json_encode($data);

        //$this->response->body = \Format::forge($data)->to_json();
 }
}