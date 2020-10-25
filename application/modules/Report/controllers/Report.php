<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Report extends Drn_Controller {

	
	function __construct()
	{
		parent::__construct();
	}

	
	public function index_get()
	{
	    // Initialize the array with a 'title' element for use for the <title> tag.
		$this->data['title'] = 'Report';
		$this->data['version'] = $this->uri->segment(1);

		$this->data['js'] = array(
			// 'assets/bootstrap/datepicker/js/bootstrap-datetimepicker.min.js',
			'assets/js/app/report.js'
		);

		$this->data['css'] = array(
			'assets/css/app/report.css'
			// 'assets/bootstrap/datepicker/css/bootstrap-datetimepicker.min.css'
		);

		$this->template->load($this->data, null, 'index');

	}
}
