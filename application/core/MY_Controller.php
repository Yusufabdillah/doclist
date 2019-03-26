<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	
	function __construct(){
		parent::__construct();
		
		//session lookup here : example code::--
		//if(!$this->sessions->userdata('userid')) {
          // redirect(base_url('login'));
		  // return;
		//}
		//---end session
		
		//temporary session
		
		if(!$this->session->userdata('user'))
			$this->session->set_userdata('user','sys');

		//loading models
		$this->load_models();

		//loading libraries
		//$this->load_librarys();
	}

	protected function load_models(){
       //load model
	}

//	protected function load_librarys(){
//       //load library
//	}
	
	
	
	//This for datatables server side --	
    protected function GetRequestFromDataTable(){
      $param = array();
      $startrec = $this->input->post('start');
      $length = $this->input->post('length');
      $column = $this->input->post('columns');
      $draw = $this->input->post('draw');
      $search=$this->input->post('search');
      $orders=$this->input->post('order');
      $extradata=$this->input->post('extradata');
      $columnorder = $this->input->post('columnorder');

      $js = json_decode($this->input->post('extradata'),true);
      if(is_array($js)){
      	$param['extradata']=$js;
      }else{
         $param['extradata']=$extradata;
      }
      $param['start']=$startrec;
      $param['length']=$length;
      $param['column']=$column;
      $param['draw']=$draw;
      $param['search']=$search;
      $param['order']=$orders;
      $param['columnorder']=$columnorder;
      
      return $param;
    }
	
	protected function makemessage($msg,$status=null){
		if(null==$status)
			$status = 'success';
		$this->session->set_flashdata('status',$status);
		$this->session->set_flashdata('msg',$msg);
	}
	
}
